<?php

use Illuminate\Database\Seeder;

use App\Type;

class TypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // BANTU BANTU
        factory(Type::class)->create([
            'nama_jenis_pinjaman' => 'Maks',
            'minimum_jumlah_pinjaman' => '30000000',
            'maksimum_jumlah_pinjaman' => '50000000',
            'minimum_lama_angsuran' => '20',
            'maksimum_lama_angsuran' => '36',
            'bunga' => '1',
        ]);

        // UKM
        factory(Type::class)->create([
            'nama_jenis_pinjaman' => 'Min',
            'minimum_jumlah_pinjaman' => '1000000',
            'maksimum_jumlah_pinjaman' => '29000000',
            'minimum_lama_angsuran' => '20',
            'maksimum_lama_angsuran' => '36',
            'bunga' => '2',
        ]);

        $this->command->info('>_ Jenis pinjaman berhasil');
    }
}
