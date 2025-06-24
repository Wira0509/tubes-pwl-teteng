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
                'image' => 'vegan-food-unscreen.gif',
            ],
            [
                'name' => 'Transport',
                'is_expense' => true,
                'image' => 'bus-unscreen.gif',
            ],
            [
                'name' => 'Salary',
                'is_expense' => false,
                'image' => 'salary-unscreen.gif',
            ],
            [
                'name' => 'Entertainment',
                'is_expense' => true,
                'image' => 'cinema-unscreen.gif',
            ],
             [
                'name' => 'Monthly Bills',
                'is_expense' => true,
                'image' => 'money-bills-stack_icon-icons.jpg',
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
