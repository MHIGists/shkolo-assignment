<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ButtonsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $buttons = [];

        for ($i = 1; $i <= 9; $i++) {
            $buttons[] = [
                'title' => "Button $i",
                'color' => '#111111',
                'hyperlink' => '#',
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('buttons')->insert($buttons);
    }
}
