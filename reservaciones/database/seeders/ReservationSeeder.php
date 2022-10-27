<?php

namespace Database\Seeders;

use App\Models\Reservation;
use Illuminate\Database\Seeder;

class ReservationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $reservation= new Reservation();
        $reservation->name = "Reserva 1";
        $reservation->date = "2022-10-15";
        $reservation->price = 699.99;
        $reservation->client_id = 1;
        $reservation->save();

        $reservation= new Reservation();
        $reservation->name = "Reserva 2";
        $reservation->date = "2022-10-20";
        $reservation->price = 499.99;
        $reservation->client_id = 1;
        $reservation->save();

        $reservation= new Reservation();
        $reservation->name = "Reserva 3";
        $reservation->date = "2022-10-25";
        $reservation->price = 999.99;
        $reservation->client_id = 2;
        $reservation->save();
    }
}
