<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Service;
use App\Models\BlogPost;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Admin user
        User::firstOrCreate([
            'email' => 'admin@example.com'
        ],[
            'name' => 'Admin',
            'password' => Hash::make('password'),
            'role' => 'admin'
        ]);

        Service::insert([
            [
                'name' => 'Kamar Standard',
                'type' => 'room',
                'capacity' => 2,
                'price_per_night' => 350000,
                'description' => 'Kamar standar nyaman untuk 2 orang',
                'is_available' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Kamar Deluxe',
                'type' => 'room',
                'capacity' => 3,
                'price_per_night' => 550000,
                'description' => 'Kamar luas dengan fasilitas premium',
                'is_available' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        BlogPost::firstOrCreate([
            'slug' => 'tips-menginap-nyaman'
        ],[
            'title' => 'Tips Menginap Nyaman',
            'excerpt' => 'Beberapa tips agar pengalaman menginap lebih nyaman.',
            'body' => 'Konten blog lengkap ditulis di sini.',
            'author_id' => 1,
            'published_at' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Additional dummy users
        \App\Models\User::factory(5)->create();

        $user = \App\Models\User::where('role','user')->first() ?? \App\Models\User::factory()->create();

        // Additional blog posts
        for ($i=1;$i<=5;$i++) {
            \App\Models\BlogPost::firstOrCreate([
                'slug' => 'contoh-blog-'.$i
            ],[
                'title' => 'Contoh Blog Post '.$i,
                'excerpt' => 'Cuplikan konten untuk blog '.$i,
                'body' => 'Isi konten blog nomor '.$i,
                'author_id' => $user->id,
                'published_at' => now()->subDays($i),
            ]);
        }

        // Create sample bookings and transactions
        $service = Service::first();
        if ($service) {
            for ($i=1;$i<=3;$i++) {
                $checkIn = now()->addDays($i);
                $checkOut = (clone $checkIn)->addDays(1);
                $booking = \App\Models\Booking::create([
                    'user_id' => $user->id,
                    'service_id' => $service->id,
                    'booking_code' => 'AR-'.now()->format('Ymd').'-'.strtoupper(\Illuminate\Support\Str::random(4)),
                    'check_in' => $checkIn->toDateString(),
                    'check_out' => $checkOut->toDateString(),
                    'guest_count' => 2,
                    'total_price' => $service->price_per_night * 1 * 2,
                    'status' => $i===1 ? 'booked' : 'pending',
                    'guest_info' => ['name' => $user->name, 'email' => $user->email]
                ]);

                \App\Models\Transaction::create([
                    'booking_id' => $booking->id,
                    'amount' => $booking->total_price,
                    'payment_method' => $i===1 ? 'dummy' : null,
                    'transaction_code' => $i===1 ? 'TX-'.strtoupper(\Illuminate\Support\Str::random(6)) : null,
                    'status' => $i===1 ? 'completed' : 'pending',
                ]);

                if ($i===3) {
                    \App\Models\Cancellation::create([
                        'booking_id' => $booking->id,
                        'user_id' => $user->id,
                        'reason' => 'Perlu membatalkan karena jadwal berubah',
                        'status' => 'requested',
                    ]);
                }
            }
        }

        // Add some activity logs
        \App\Models\ActivityLog::create([
            'user_id' => $user->id,
            'action' => 'seeded_example',
            'model_type' => 'Booking',
            'model_id' => 1,
            'old_values' => null,
            'new_values' => json_encode(['note' => 'sample seed'] ),
            'ip_address' => '127.0.0.1',
        ]);

    }
}
