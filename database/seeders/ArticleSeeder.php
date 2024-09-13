<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Article;

class ArticleSeeder extends Seeder
{
    public function run()
    {
        Article::create([
            'title' => 'Sample Article 1',
            'category' => 'terbaru',
            'content' => 'This is the content for sample article 1.',
            'image' => 'path/to/image1.jpg',
        ]);

        Article::create([
            'title' => 'Sample Article 2',
            'category' => 'kecantikan',
            'content' => 'This is the content for sample article 2.',
            'image' => 'path/to/image2.jpg',
        ]);

        // Add more sample articles as needed
    }
}
