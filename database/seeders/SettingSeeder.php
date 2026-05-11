<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settings = [
            ['key' => 'hero_title', 'value' => 'Ketenangan Alam dalam Kenyamanan Rumah'],
            ['key' => 'hero_subtitle', 'value' => 'Lepaskan penat dan temukan kedamaian di KV Homestay. Rasakan pengalaman menginap dengan sentuhan alam dan pelayanan terbaik.'],
            ['key' => 'about_text', 'value' => 'KV Homestay dirancang untuk memberikan pengalaman menginap yang tak terlupakan. Memadukan desain modern minimalis dengan kehangatan elemen alam, kami berkomitmen menjadi rumah kedua bagi setiap tamu. Nikmati fasilitas premium di tengah lingkungan yang asri dan tenang.'],
            ['key' => 'address', 'value' => '📍 Jl. Alam Sari No. 12, Bali, Indonesia'],
            ['key' => 'phone', 'value' => '📞 +62 812 3456 7890'],
            ['key' => 'email', 'value' => '✉️ hello@kvhomestay.com'],
            ['key' => 'footer_text', 'value' => 'Menyediakan pengalaman menginap dengan kenyamanan seperti di rumah sendiri, berpadu dengan ketenangan alam.'],
        ];

        foreach ($settings as $setting) {
            \App\Models\Setting::updateOrCreate(['key' => $setting['key']], ['value' => $setting['value']]);
        }
    }
}
