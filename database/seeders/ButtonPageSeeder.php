<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ButtonPage;

class ButtonPageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $button_pages = [
            [
                'title' => "Parent 1",
                'title2' => "Parent 1",
                'deskripsi' => "Test deskripsi",
                'link_type' => 'article',
                'link' => 'https://github.com',
                'order' => 1,
                'button_page_id' => null,
            ],
            [
                'title' => "Child 1",
                'title2' => "Child 1",
                'deskripsi' => "Test deskripsi",
                'link_type' => 'article',
                'link' => 'https://github.com',
                'order' => null,
                'button_page_id' => null,
            ],
            [
                'title' => "Child 2",
                'title2' => "Child 2",
                'deskripsi' => "Test deskripsi",
                'link_type' => 'article',
                'link' => 'https://github.com',
                'order' => null,
                'button_page_id' => 1,
            ],
            [
                'title' => "Parent 2",
                'title2' => "Parent 2",
                'deskripsi' => "Test deskripsi",
                'link_type' => 'article',
                'link' => 'https://github.com',
                'order' => 2,
                'button_page_id' => null,
            ]
            ];

            foreach($button_pages as $bp){
                ButtonPage::create($bp);
            }
    }
}
