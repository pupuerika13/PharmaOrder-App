<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Medicine;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', function () {
    return view('auth.register');
});

Route::post('/register', function (Request $request) {
    $user = User::create([
        'name' => $request->input('name'),
        'phone' => $request->input('phone'),
        'password' => Hash::make($request->input('password')),
        'role' => 'customer'
    ]);

    return response()->json(['success' => true]);
});

Route::get('/login', function () {
    return view('auth.login');
});

Route::post('/login', function (Request $request) {
    $identity = $request->input('identity');
    $password = $request->input('password');
    $role = $request->input('role');

    $user = User::where(function($query) use ($identity) {
                $query->where('phone', $identity)
                      ->orWhere('name', $identity);
            })
            ->where('role', $role)
            ->first();

    if ($user && Hash::check($password, $user->password)) {
        Auth::login($user);
        return response()->json([
            'success' => true,
            'redirect' => ($role === 'admin') ? '/admin-dashboard' : '/dashboard'
        ]);
    }

    return response()->json(['success' => false, 'message' => 'Identitas atau kata sandi salah.']);
});

Route::get('/dashboard', function () {
    // Fetch all medicines from DB
    $medicines = Medicine::all()->keyBy('id')->toArray();
    return view('dashboard', ['medicines' => $medicines]);
});

Route::get('/pesanan/{id}', function ($id) {
    $obat = Medicine::find($id);
    if (!$obat) {
        abort(404);
    }
    return view('pesanan', ['obat' => $obat->toArray()]);
});

Route::post('/checkout', function (Request $request) {
    $obatId = $request->input('obat_id');
    $qty = $request->input('qty');
    $alamat = $request->input('alamat');
    $pembayaran = $request->input('pembayaran');

    $obat = Medicine::find($obatId);
    if (!$obat) abort(404);

    $newId = 'ORD-' . rand(10000, 99999) . '-' . chr(rand(65, 90));
    
    Transaction::create([
        'id' => $newId,
        'obat_id' => $obatId,
        'nama_obat' => $obat->nama,
        'harga_satuan' => $obat->harga,
        'qty' => $qty,
        'total' => $obat->harga * $qty,
        'nama_klien' => 'Pupu Erika',
        'alamat' => $alamat,
        'pembayaran' => $pembayaran,
        'status' => 'Menunggu Proses',
        'waktu' => now()
    ]);
    
    return response()->json(['success' => true, 'transaction_id' => $newId]);
});

Route::get('/admin-dashboard', function () {
    $transactions = Transaction::all()->keyBy('id')->toArray();
    return view('admin.dashboard', ['transactions' => $transactions]);
});

Route::get('/riwayat-pesanan', function () {
    // For now, fetch all transactions but in real case filter by auth user
    $transactions = Transaction::orderBy('waktu', 'desc')->get()->toArray();
    return view('riwayat-pesanan', ['transactions' => $transactions]);
});

Route::get('/admin-obat', function () {
    $medicines = Medicine::all()->keyBy('id')->toArray();
    return view('admin.obat', ['medicines' => $medicines]);
});

Route::get('/admin-obat/tambah', function () {
    return view('admin.tambah-obat');
});

Route::post('/admin-obat/tambah', function (Request $request) {
    $nama = $request->input('nama');
    $newId = strtolower(preg_replace('/[^a-zA-Z0-9]+/', '', $nama)) . rand(10, 99);
    
    $stok_angka = (int) $request->input('stok_awal');
    $stok_label = 'Tersedia';
    if ($stok_angka <= 30) $stok_label = 'Stok Menipis';
    if ($stok_angka <= 0) $stok_label = 'Habis';
    
    Medicine::create([
        'id' => $newId,
        'kategori' => strtoupper($request->input('kategori')),
        'nama' => $nama,
        'harga' => (int) $request->input('harga'),
        'gambar' => '/images/amoxicillin.png',
        'wajib_resep' => false,
        'stok' => $stok_label,
        'stok_angka' => $stok_angka,
        'pabrikan' => 'PharmaOrder Admin',
        'bentuk' => $request->input('satuan'),
        'kemasan' => 'Bungkus',
        'deskripsi' => $request->input('deskripsi'),
        'catatan' => 'Ditambahkan melalui admin portal.'
    ]);
    
    return response()->json(['success' => true]);
});

Route::get('/admin-transaksi', function () {
    $transactions = Transaction::all()->keyBy('id')->toArray();
    return view('admin.transaksi', ['transactions' => $transactions]);
});

Route::post('/admin/proses/{id}', function ($id) {
    $transaction = Transaction::find($id);
    if (!$transaction) {
        return response()->json(['success' => false, 'message' => 'Not found'], 404);
    }

    $transaction->update(['status' => 'Selesai']);

    $obatId = $transaction->obat_id;
    $qty = $transaction->qty;
    
    $obat = Medicine::find($obatId);
    if ($obat) {
        $newStokAngka = $obat->stok_angka - $qty;
        
        $stokLabel = 'Tersedia';
        if ($newStokAngka <= 30) $stokLabel = 'Stok Menipis';
        if ($newStokAngka <= 0) $stokLabel = 'Habis';

        $obat->update([
            'stok_angka' => $newStokAngka,
            'stok' => $stokLabel
        ]);
    }

    return response()->json(['success' => true]);
});
