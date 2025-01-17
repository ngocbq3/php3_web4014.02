<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            ['name' => 'Thời sự'],
            ['name' => 'Văn hóa'],
            ['name' => 'Thể thao'],
            ['name' => 'Xã hội']
        ]);
    }
}
