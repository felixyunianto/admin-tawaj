<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Sort;

class SortSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sorts = [
            [
                'name'=> 'Highlight',
                'code'=> 'HIGHLIGHT',
                'order'=> 1,
            ],
            [
                'name'=> 'Big Button',
                'code'=> 'BIG_BUTTON',
                'order'=> 2,
            ],
            [
                'name'=> 'Big Tab',
                'code'=> 'BIG_TAB',
                'order'=> 3,
            ]
        ];

        foreach ($sorts as $sort) {
            Sort::create($sort);
        }

    }
}
