<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class AlatMusikSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $produk = [
            [
                'name'          => 'Paket full band',
                'description'   => 'Harga sewa paket full band 5 juta Rupiah per hari, belum termasuk ongkos kirim dan biaya crew standby.',
                'image'         => '/images/full_band.jpg',
                'price'         => 5000000,
            ],
            [
                'name'          => 'Drum lengkap full set',
                'description'   => 'Harga sewa drum lengkap fullset adalah sekitar 700 ribu Rupiah per hari hingga 800 ribu Rupiah per hari, tergantung jenis merknya',
                'image'         => '/images/drum-full.jpg',
                'price'         => 800000,
            ],
            [
                'name'          => 'Paket Hemat 3000 Watt',
                'description'   => 'Paket hemat sebesar 3 ribu watt ini dikemas dengan rincian sebagai berikut :
                Active Speaker Merk JK MHD 450
                Subwoofer Single 18″ Merk JK
                Mic Wireless (2 pcs)
                Mic Cable (1 pcs)
                Mixer Analog
                Cable
                Harga sewanya adalah 1,2 juta Rupiah',
                'image'         => '/images/300-watt.jpg',
                'price'         => 1200000,
            ],
            [
                'name'          => 'Paket Promo Custom 5000 Watt',
                'description'   => 'paket promo custom 5 ribu watt, dengan rincian sebagai berikut :
                Speaker 6 Box isi 2
                Power CA 20              
                Speaker Monitor Passive (2 pcs)   
                Mic Cable (4 pcs)
                Stand Mic (2 pcs)
                SI Box (2 pcs)
                Mixer Analog
                Harga sewanya adalah 1,5 juta Rupiah',
                'image'         => '/images/custom-5000.jpg',
                'price'         => 1500000,
            ],
        ];
        
        DB::table('alat_musiks')->insert($produk);
    }
}
