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
                  "created_at" => now()
              ],
              [
                  "name"       => "Memo",
                  "created_at" => now()

              ],
              [
                  "name"       => "Passwords",
                  "created_at" => now()

              ],
              [
                  "name"       => "Proposals",
                  "created_at" => now()

              ],
              [
                  "name"       => "Contracts",
                  "created_at" => now()

              ],
              [
                  "name"       => "Notary",
                  "created_at" => now()

              ],
              [
                  "name"       => "E-Signature",
                  "created_at" => now()
              ]
          ]);
    }
}
