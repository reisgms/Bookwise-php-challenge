<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\User;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    public function run(): void
    {
        User::all()->each(function (User $user) {
            Book::factory()->count(random_int(4, 20))->create([
                'user_id' => $user->id
            ]);
        });
    }
}
