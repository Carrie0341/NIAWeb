<?php

use Illuminate\Database\Seeder;

class AllianceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $alliances = [
            ["name" => "延展實境應用技術產學聯盟"],
            ["name" => "化學迴路程序於資源化技術聯盟"],
            ["name" => "A技術聯盟"],
            ["name" => "B技術聯盟"],
            ["name" => "C技術聯盟"],
        ];
        DB::table('alliance')->insert($alliances);
    }
}
