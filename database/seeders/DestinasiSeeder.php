<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Destinasi;

class DestinasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
{
    Destinasi::truncate();
 
    Destinasi::create([
        'nama' => 'Puncak Kompe',
        'deskripsi' => 'destinasi wisata alam di Kabupaten Kampar, Riau, yang terkenal karena lanskap pulau-pulau kecil di atas perairan luas yang mirip dengan Raja Ampat.',
        'gambar' => 'puncak kompe.jpg',
        'jam_buka' => '08:00:00',
        'jam_tutup' => '18:00:00',
        'lokasi' => 'Kecamatan 13 Koto Kampar, Kabupaten Kampar',
    ]);

    Destinasi::create([
        'nama' => 'Candi Muara Takus',
        'deskripsi' => 'situs candi Buddha tertua di Sumatera peninggalan Kerajaan Sriwijaya, yang terletak di Desa Muara Takus, Kabupaten Kampar, Riau, berjarak sekitar 135 km dari Kota Pekanbaru',
        'gambar' => 'candi.jpg',
        'jam_buka' => '08:00:00',
        'jam_tutup' => '18:00:00',
        'lokasi' => 'Kecamatan 13 Koto Kampar, Kabupaten Kampar',
    ]);
 
    Destinasi::create([
        'nama' => 'Air Terjun Batu Dinding',
        'deskripsi' => 'destinasi wisata alam eksotis yang terletak di Desa Tanjung, Kecamatan XIII Koto Kampar (saat ini masuk pemekaran Kecamatan Koto Kampar Hulu), Kabupaten Kampar, Riau',
        'gambar' => 'poto air terjun batu hidung 13 koto kampar.jpeg',
        'jam_buka' => '08:00:00',
        'jam_tutup' => '18:00:00',
        'lokasi' => 'Kecamatan 13 Koto Kampar, Kabupaten Kampar',
    ]);
}

}
