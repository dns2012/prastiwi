<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Client;
use App\Models\Loan;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Saving;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(1)->create();
        Client::factory(1)->create();
        Saving::factory(5)->create();
        Loan::factory(5)->create();
        Product::factory(4)->create();
        ProductImage::factory(8)->create();
        Admin::factory(1)->create();
    }
}
