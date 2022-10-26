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
        $reservation->client_id = 1;
        $reservation->save();

        $reservation= new Reservation();
        $reservation->name = "Reserva 2";
        $reservation->client_id = 1;
        $reservation->save();
    }
}
