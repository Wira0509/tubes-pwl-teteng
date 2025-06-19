<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $defaultCategories = [
            [
                'name' => 'Food',
                'is_expense' => true,
                'image' => 'food.png',
            ],
            [
                'name' => 'Transport',
                'is_expense' => true,
                'image' => 'transport.png',
            ],
            [
                'name' => 'Salary',
                'is_expense' => false,
                'image' => 'salary.gif',
            ],
            [
                'name' => 'Entertainment',
                'is_expense' => true,
                'image' => 'entertainment.png',
            ],
        ];

        foreach ($defaultCategories as $category) {
            Category::updateOrCreate(
                ['name' => $category['name']],
                $category
            );
        }
    }
}
