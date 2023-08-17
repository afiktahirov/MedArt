<?php

namespace Database\Seeders;

use App\Models\Language;
use Illuminate\Database\Seeder;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $langs = [
            ["name" => "Azərbaycanca", "lang" => "az"],
        ];
        foreach ($langs as $lang) {
            Language::create($lang);
        }
    }
}
