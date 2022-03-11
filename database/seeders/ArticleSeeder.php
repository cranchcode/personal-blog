<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Article;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Article::insert([
            [
                'title'=>'This is Article One',
                'content'=>'This is the content of article one',
                'user_id'=>1
            ],
            [
                'title'=>'This is Article Two',
                'content'=>'This is the content of article two',
                'user_id'=>1
            ],
            [
                'title'=>'This is Article Three',
                'content'=>'This is the content of article three',
                'user_id'=>2
            ]
        ]);
    }
}
