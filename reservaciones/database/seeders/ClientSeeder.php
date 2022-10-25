<?php

namespace Database\Seeders;

use App\Models\Client;
use Illuminate\Database\Seeder;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $client = new Client();
        $client->name = "angel";
        $client->phone_number = "6123123";
        $client->email = "angel2_19@alu.uabcs.mx";
        $client->save();

        $client = new Client();
        $client->name = "angel2";
        $client->phone_number = "6123123";
        $client->email = "angel22_19@alu.uabcs.mx";
        $client->save();
    }
}
