<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoomsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $hostels = \App\Models\Hostel::all();

        if ($hostels->isEmpty()) {
            $this->command->info('No hostels found. Run HostelSeeder first.');
            return;
        }

        foreach ($hostels as $hostel) {
            // Create 10 rooms per hostel
            for ($i = 1; $i <= 10; $i++) {
                // Mix of single, double, quad rooms
                $capacity = rand(1, 4);
                $roomType = match($capacity) {
                    1 => 'single',
                    2 => 'double',
                    3 => 'triple',
                    4 => 'quad',
                    default => 'double',
                };
                
                $price = match($capacity) {
                    1 => 1500,
                    2 => 1200,
                    3 => 1000,
                    4 => 800,
                    default => 1000,
                };

                $room = \App\Models\Room::create([
                    'hostel_id' => $hostel->id,
                    'room_number' => $hostel->code . '-' . str_pad($i, 3, '0', STR_PAD_LEFT),
                    'room_type' => $roomType,
                    'capacity' => $capacity,
                    'occupied' => 0,
                    'price_per_semester' => $price,
                    'price_per_year' => $price * 2,
                    'floor_number' => ceil($i / 5),
                    'status' => 'available',
                    'description' => "Standard " . ucfirst($roomType) . " Room",
                    'facilities' => ['WiFi', 'Fan', 'Desk', 'Wardrobe'],
                ]);

                // Create beds for this room
                for ($b = 1; $b <= $capacity; $b++) {
                    \App\Models\Bed::create([
                        'room_id' => $room->id,
                        'bed_number' => "Bed $b",
                        'is_occupied' => false,
                        'student_id' => null,
                    ]);
                }
            }
        }
    }
}
