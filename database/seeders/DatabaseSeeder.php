<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\News;
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
        User::create([
            'name' => 'admin@admin.admin',
            'email' => 'admin@admin.admin',
            'password' => bcrypt('admin@admin.admin'),
        ]);


        Category::factory()->count(5)->create([
            'title' => 'title',
        ])->each(function ($category) {
            News::factory()->count(5)->create([
                'title' => 'title',
                'text' => 'text',
                'category_id' => $category->id,
            ]);
        });
    }
}
