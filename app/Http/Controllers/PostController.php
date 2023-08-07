<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index() {
        // выбрать все и вывести все значения тайтла
        $posts = Post::all();
        foreach ($posts as $post) {
           dump($post->title);
        }
        dump('end 1 stolbik');

        // или выбрать только те что имеют 1 в столбике is_published
        $posts2 = Post::where('is_published', 1)->get();
        foreach ($posts2 as $post2) {
            dump($post2->title);
        }
        dump('end 2 stolbik');

        // или выбрать только первую линию что имеют 1 в столбике is_published
        $posts3 = Post::where('is_published', 1)->first();
        dump($posts3->title);
        dump('end video yrok');
    }
}
