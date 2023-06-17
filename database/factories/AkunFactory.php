<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\akun>
 */
class AkunFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            $akun = [
                'username' => 'mhs',
                'id_pegawai' => '1234567890',
                'nim' => 'c012345678',
                'email' => 'mhs@gmail.com',
                'password' => bcrypt('cobamhs'),
                'role' => 'mahasiswa'
            ],
            [
                'username' => 'admin',
                'id_pegawai' => '0987654321',
                'nim' => 'c087654321',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('cobaadmin'),
                'role' => 'admin'
            ],
        ];
    }
}
