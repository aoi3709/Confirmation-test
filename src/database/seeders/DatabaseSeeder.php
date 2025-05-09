<?php

namespace Database\Seeders;

use App\Models\Contact;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    
    public function run(): void
    {
        $this->call([
            CategorySeeder::class,
            Contact::factory(35)->create()
        ]);
    }
}
