<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Admin User
        User::factory()->create([
            'name' => 'Admin KV',
            'email' => 'admin@kvhomestay.com',
            'password' => bcrypt('password123'),
        ]);

        // Seed Sample Rooms
        \App\Models\Room::create([
            'name' => 'Deluxe Nature Room',
            'description' => 'Kamar luas dengan pemandangan taman langsung, dilengkapi tempat tidur king-size dan interior earth-tone.',
            'price' => 550000,
            'amenities' => ['WiFi', 'AC', 'Smart TV'],
            'image' => 'assets/images/room.png',
            'is_popular' => true,
        ]);

        \App\Models\Room::create([
            'name' => 'Private Garden Villa',
            'description' => 'Vila terpisah dengan taman pribadi yang menenangkan, cocok untuk keluarga kecil atau pasangan.',
            'price' => 850000,
            'amenities' => ['WiFi', 'Dapur', 'Bathtub'],
            'image' => 'assets/images/exterior.png',
            'is_popular' => false,
        ]);

        \App\Models\Room::create([
            'name' => 'Superior Cozy Room',
            'description' => 'Kenyamanan maksimal dengan desain minimalis, ideal untuk traveler solo atau perjalanan bisnis.',
            'price' => 350000,
            'amenities' => ['WiFi', 'AC', 'Shower Panas'],
            'image' => 'assets/images/hero.png',
            'is_popular' => false,
        ]);
    }
}
