<?php

namespace Database\Seeders;

 use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
//         \App\Models\User::factory(1000)->create();
         \App\Models\User::create([
                '_id'       => time(),
             'email'        => 'khaironbiz@gmail.com',
             'password'     => bcrypt(123456),
             'nama'         => 'khairon',
             'nama_depan'   => 'Khairon',
             'nama_belakang'=> 'Anas',
             'birth_date'   => '1984-09-09',
             'gender'       => 'male',
             'nik'          => 1234567891123456,
             'nomor_telepon'=> '081213798746',
             'address'      => [
                 'provinsi' => 'Jawa Barat',
                 'kota'     => 'Kab. Bogor',
                 'kecamatan'=> 'Sukaraja',
                 'kelurahan'=> 'Cilebut Barat',
                 'kode_pos' => 16710
             ],
             'health_overview'=>[
                 'chol' =>[
                     'value'    => 186.6,
                     'unit'     => 'mg/dL'
                 ],
                 'gluc' =>[
                     'value'    => 106.6,
                     'unit'     => 'mg/dL'
                 ],
                 'suhu' =>[
                     'value'    => 36.6,
                     'unit'     => 'C'
                 ],
                 'tb'   =>[
                     'value'    => 165,
                     'unit'     => 'cm'
                 ],
                 'bb'   =>[
                     'value'    => 72.6,
                     'unit'     => 'Kg'
                 ],
                 'imt'  =>[
                     'value'    => 24,
                     'unit'     => 'kg/m2'
                 ]
             ],
             'wallet'       => [
                 'currency' => 'IDR',
                 'value'    => 360000
             ]

         ]);
    }
}
