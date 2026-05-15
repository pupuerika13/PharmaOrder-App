<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Medicine;

class MedicineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $medicines = [
            // PENCERNAAN
            [
                'id' => 'omeprazole',
                'kategori' => 'Pencernaan',
                'nama' => 'Omeprazole 20mg',
                'harga' => 12000,
                'gambar' => '/images/omeprazole.png',
                'wajib_resep' => false,
                'stok' => 'Tersedia',
                'stok_angka' => 300,
                'pabrikan' => 'Generic Pharma',
                'bentuk' => 'Kapsul',
                'kemasan' => 'Strip',
                'deskripsi' => 'Pereda asam lambung persisten dan mulas.',
                'catatan' => 'Minum 30 menit sebelum makan pagi.'
            ],
            [
                'id' => 'mylanta',
                'kategori' => 'Pencernaan',
                'nama' => 'Mylanta',
                'harga' => 25000,
                'gambar' => '/images/mylanta.png',
                'wajib_resep' => false,
                'stok' => 'Stok Menipis',
                'stok_angka' => 28,
                'pabrikan' => 'Bayer',
                'bentuk' => 'Cair',
                'kemasan' => 'Botol 50 ml',
                'deskripsi' => 'Menetralkan asam lambung dan mengatasi masalah pencernaan.',
                'catatan' => 'Kocok dahulu sebelum diminum.'
            ],
            [
                'id' => 'lactulax',
                'kategori' => 'Pencernaan',
                'nama' => 'Lactulax',
                'harga' => 60000,
                'gambar' => '/images/lactulax.png',
                'wajib_resep' => false,
                'stok' => 'Tersedia',
                'stok_angka' => 100,
                'pabrikan' => 'Ikapharmindo',
                'bentuk' => 'Cair',
                'kemasan' => 'Botol 60 ml',
                'deskripsi' => 'Mengatasi sembelit dan membantu melancarkan BAB.',
                'catatan' => 'Gunakan sesuai dosis anjuran.'
            ],
            [
                'id' => 'promag',
                'kategori' => 'Pencernaan',
                'nama' => 'Promag',
                'harga' => 9000,
                'gambar' => '/images/promag.png',
                'wajib_resep' => false,
                'stok' => 'Stok Menipis',
                'stok_angka' => 10,
                'pabrikan' => 'Kalbe Farma',
                'bentuk' => 'Tablet',
                'kemasan' => 'Strip',
                'deskripsi' => 'Mengurangi gejala maag dan menetralkan asam lambung.',
                'catatan' => 'Kunyah tablet sebelum ditelan.'
            ],

            // VITAMIN
            [
                'id' => 'imboost',
                'kategori' => 'Vitamin',
                'nama' => 'Imboost Force',
                'harga' => 72000,
                'gambar' => '/images/imboodt.png',
                'wajib_resep' => false,
                'stok' => 'Tersedia',
                'stok_angka' => 50,
                'pabrikan' => 'Soho Global Health',
                'bentuk' => 'Tablet',
                'kemasan' => 'Strip',
                'deskripsi' => 'Meningkatkan daya tahan tubuh dan membantu memulihkan kondisi setelah sakit.',
                'catatan' => 'Konsumsi 1 kali sehari.'
            ],
            [
                'id' => 'sidomuncul-vitd3',
                'kategori' => 'Vitamin',
                'nama' => 'Sido Muncul Vitamin D3 400 IU',
                'harga' => 107000,
                'gambar' => '/images/sidomuncul.png',
                'wajib_resep' => false,
                'stok' => 'Tersedia',
                'stok_angka' => 50,
                'pabrikan' => 'Sido Muncul',
                'bentuk' => 'Kapsul',
                'kemasan' => 'Botol 50 kapsul',
                'deskripsi' => 'Meningkatkan imunitas dan kesehatan autoimun.',
                'catatan' => 'Cocok untuk kebutuhan vitamin harian.'
            ],
            [
                'id' => 'vitamind3',
                'kategori' => 'Vitamin',
                'nama' => 'Vitamin D3 2000IU',
                'harga' => 80000,
                'gambar' => '/images/vitamind3.png',
                'wajib_resep' => false,
                'stok' => 'Tersedia',
                'stok_angka' => 500,
                'pabrikan' => 'NatureWise',
                'bentuk' => 'Kapsul',
                'kemasan' => 'Botol 60 Kapsul',
                'deskripsi' => 'Mendukung kesehatan tulang dan fungsi sistem kekebalan tubuh.',
                'catatan' => 'Konsumsi setelah makan.'
            ],
            [
                'id' => 'vit-b-complex',
                'kategori' => 'Vitamin',
                'nama' => 'Vitamin B Complex IPI',
                'harga' => 16000,
                'gambar' => '/images/vitaminbcomplex.png',
                'wajib_resep' => false,
                'stok' => 'Stok Menipis',
                'stok_angka' => 10,
                'pabrikan' => 'IPI',
                'bentuk' => 'Tablet',
                'kemasan' => 'Pot 45 Tablet',
                'deskripsi' => 'Memenuhi kebutuhan vitamin B kompleks dalam tubuh.',
                'catatan' => 'Tablet kecil mudah ditelan.'
            ],

            // PEREDA NYERI (ANALGESIK)
            [
                'id' => 'panadol',
                'kategori' => 'Pereda Nyeri',
                'nama' => 'Panadol',
                'harga' => 12000,
                'gambar' => '/images/panadol.png',
                'wajib_resep' => false,
                'stok' => 'Tersedia',
                'stok_angka' => 200,
                'pabrikan' => 'GSK',
                'bentuk' => 'Tablet',
                'kemasan' => 'Strip',
                'deskripsi' => 'Untuk meredakan nyeri (seperti sakit kepala, sakit gigi, nyeri otot).',
                'catatan' => 'Cepat bereaksi meredakan nyeri.'
            ],
            [
                'id' => 'sumagesic',
                'kategori' => 'Pereda Nyeri',
                'nama' => 'Sumagesic',
                'harga' => 8000,
                'gambar' => '/images/sumagesic.png',
                'wajib_resep' => false,
                'stok' => 'Tersedia',
                'stok_angka' => 150,
                'pabrikan' => 'Darya-Varia',
                'bentuk' => 'Tablet',
                'kemasan' => 'Isi 4 tablet',
                'deskripsi' => 'Meredakan nyeri dan menurunkan demam.',
                'catatan' => 'Mengandung Paracetamol.'
            ],
            [
                'id' => 'ibuprofen',
                'kategori' => 'Pereda Nyeri',
                'nama' => 'Prosis Ibuprofen',
                'harga' => 11000,
                'gambar' => '/images/prosisibuprofen.png',
                'wajib_resep' => false,
                'stok' => 'Tersedia',
                'stok_angka' => 100,
                'pabrikan' => 'Combiphar',
                'bentuk' => 'Kapsul',
                'kemasan' => 'Isi 10/strip',
                'deskripsi' => 'Meredakan nyeri ringan hingga sedang dan menurunkan demam.',
                'catatan' => 'Tidak disarankan untuk penderita maag akut.'
            ],
            [
                'id' => 'neorheumacyl',
                'kategori' => 'Pereda Nyeri',
                'nama' => 'Neo Rheumacyl',
                'harga' => 10000,
                'gambar' => '/images/neorheumacyl.png',
                'wajib_resep' => false,
                'stok' => 'Tersedia',
                'stok_angka' => 120,
                'pabrikan' => 'Tempo Scan',
                'bentuk' => 'Tablet',
                'kemasan' => 'Isi 20',
                'deskripsi' => 'Meredakan nyeri otot, nyeri sendi, pegal linu, hingga sakit kepala dan sakit gigi.',
                'catatan' => 'Multifungsi untuk berbagai nyeri.'
            ],

            // OBAT RESEP / LAINNYA
            [
                'id' => 'amoxicillin',
                'kategori' => 'Obat Resep',
                'nama' => 'Amoxicillin 500mg',
                'harga' => 12000,
                'gambar' => '/images/amoxicillin.png',
                'wajib_resep' => true,
                'stok' => 'Stok Menipis',
                'stok_angka' => 1240,
                'pabrikan' => 'GlobalPharma Labs.',
                'bentuk' => 'Kapsul',
                'kemasan' => 'Strip',
                'deskripsi' => 'Mengobati berbagai infeksi bakteri.',
                'catatan' => 'Wajib dengan resep dokter.'
            ]
        ];

        foreach ($medicines as $medicine) {
            Medicine::create($medicine);
        }
    }
}
