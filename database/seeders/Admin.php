<?php

namespace Database\Seeders;
use App\Models\AdminTable;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
class Admin extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AdminTable::create([
            'name' => 'Mwinyi',
            'phone' => '0798320932',
            'email' => 'abdillahmwinyikai1@gmail.com',
            'password' => bcrypt('12345678'),
            'admin_role_id' => 1,
            'remembertoken' => Str::random(10),// hashed password
        ]);
    }
}
