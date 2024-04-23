<?php

namespace Database\Seeders;

use App\Models\User\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table((new User())->getTable())
          ->insert([
              [
                  'name'       => 'Saiful Islam',
                  'email'      => 'saiful.iotait@gmail.com',
                  'phone'      => '01855333451',
                  'password'   => Hash::make('1234567890'),
                  'master_key' => Hash::make('saiful')
              ],
              [
                  'name'       => 'IOTA IT',
                  'email'      => 'iotait.dev@gmail.com',
                  'phone'      => '01855333452',
                  'password'   => Hash::make('1234567890'),
                  'master_key' => Hash::make('iotait')
              ]
          ]);
    }
}
