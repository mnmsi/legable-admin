<?php

namespace Database\Seeders;

use App\Models\Content\InformationType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InformationTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table((new InformationType())->getTable())
          ->insert([
              [
                  "name"       => "Banking Information",
              ],
              [
                  "name"       => "Memo",

              ],
              [
                  "name"       => "Passwords",

              ],
              [
                  "name"       => "Proposals",

              ],
              [
                  "name"       => "Contracts",

              ],
              [
                  "name"       => "Notary",

              ],
              [
                  "name"       => "E-Signature",
              ]
          ]);
    }
}
