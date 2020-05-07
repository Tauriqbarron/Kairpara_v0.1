<?php

use Illuminate\Database\Seeder;

class BookingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $booking = new \App\Booking([
            'client_id' => 1,
            'booking_type_id' => 1,
            'description' => 'Bouncer',
            'street' => '67  Caroni Way',
            'suburb' => 'Ohariu',
            'city' => 'Wellington',
            'postcode' => 6037,
            'date' => today(),
            'start_time' => '14:00',
            'status' => 'assigned'

        ]);
        $booking->save();

        $booking = new \App\Booking([
            'client_id' => 2,
            'booking_type_id' => 2,
            'description' => 'Wedding Security',
            'street' => '205  Argyle Street',
            'suburb' => 'Kew',
            'city' => 'Invercargill',
            'postcode' => 9812,
            'date' => today(),
            'start_time' => '08:00',
            'status' => 'assigned'

        ]);
        $booking->save();

        $booking = new \App\Booking([
            'client_id' => 3,
            'booking_type_id' => 3,
            'description' => 'Security',
            'street' => '97  Industry Road',
            'suburb' => 'Onehunga',
            'city' => 'Auckland',
            'postcode' => 1061,
            'date' => today(),
            'start_time' => '06:00',
            'status' => 'assigned'
        ]);
        $booking->save();

        $booking = new \App\Booking([
            'client_id' => 1,
            'booking_type_id' => 1,
            'description' => 'Bouncer',
            'street' => '67  Farmhouse Lane',
            'suburb' => 'Meadowbank',
            'city' => 'Auckland',
            'postcode' => 1072,
            'date' => today(),
            'start_time' => '14:00'

        ]);
        $booking->save();

        $booking = new \App\Booking([
            'client_id' => 2,
            'booking_type_id' => 2,
            'description' => 'Wedding Security',
            'street' => '194  Curran Street',
            'suburb' => 'Freemans Bay',
            'city' => 'Auckland',
            'postcode' => 1011,
            'date' => today(),
            'start_time' => '08:00'

        ]);
        $booking->save();

        $booking = new \App\Booking([
            'client_id' => 3,
            'booking_type_id' => 3,
            'description' => 'Security',
            'street' => '97  Industry Road',
            'suburb' => 'Onehunga',
            'city' => 'Auckland',
            'postcode' => 1061,
            'date' => today(),
            'start_time' => '06:00'
        ]);
        $booking->save();

    }
}
