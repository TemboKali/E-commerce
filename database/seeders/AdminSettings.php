<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Setting;

class AdminSettings extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Setting::create([
            'blog_name' => 'Zaki Closest',
            'logo' => 'storage/settings/logo.png',
        ]);
        //
    }
}
