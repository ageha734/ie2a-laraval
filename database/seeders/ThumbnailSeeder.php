<?php

namespace Database\Seeders;

use App\Models\Article;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use App\Models\Thumbnail;

class ThumbnailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::transaction(function () {
            Thumbnail::insert([
                [
                    'name' => 'ecc01.jpg',
                    'article_id' => Article::inRandomOrder()->first()->id,
                    'created_at' => date('Y-m-d H:i:s')
                ],
                [
                    'name' => 'ecc01.jpg',
                    'article_id' => Article::inRandomOrder()->first()->id,
                    'created_at' => date('Y-m-d H:i:s')
                ],
                [
                    'name' => 'ecc01.jpg',
                    'article_id' => Article::inRandomOrder()->first()->id,
                    'created_at' => date('Y-m-d H:i:s')
                ],
                [
                    'name' => 'ecc01.jpg',
                    'article_id' => Article::inRandomOrder()->first()->id,
                    'created_at' => date('Y-m-d H:i:s')
                ],
                [
                    'name' => 'ecc02.jpg',
                    'article_id' => Article::inRandomOrder()->first()->id,
                    'created_at' => date('Y-m-d H:i:s')
                ]
            ]);
        });
    }
}
