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

    public function create() {
        $postsArr = [
          [
              'title' => 'title of post from phpstorm',
              'content' => 'some interesting content',
              'image' => 'iamgeblablabla.jpg',
              'likes' => 20,
              'is_published' => '1',
          ],
            [
                'title' => 'another title of post from phpstorm',
                'content' => 'another some interesting content',
                'image' => 'another iamgeblablabla.jpg',
                'likes' => 50,
                'is_published' => '1',
            ],
        ];

        foreach ($postsArr as $item) {
            Post::create($item);
        }


        dd('created');
    }

    public function update() {
        $post = Post::find(6);

        $post->update([
            'title' => 'updated',
            'content' => 'updated',
            'image' => 'updated',
            'likes' => 1000,
            'is_published' => 1,
        ]);
        dd('updated');
    }

    public function delete() {
        // метод удаления
//        $post = Post::find(2);
//        $post->delete();
//        dd('deleted');

        // метод восстановления из мусорки
        $post = Post::withTrashed()->find(2);
        $post->restore();
        dd('restored');
    }

    public function firstOrCreate() {

        $anotherPost = [
            'title' => 'some post',
            'content' => 'some content',
            'image' => 'some iamgeblablabla.jpg',
            'likes' => 5000,
            'is_published' => '1',
        ];

        $post = Post::firstOrCreate([
            'title' => 'some title phpstorm'
        ],[
            'title' => 'some title phpstorm',
            'content' => 'some content',
            'image' => 'some iamgeblablabla.jpg',
            'likes' => 5000,
            'is_published' => '1',
        ]);
        dump($post->content);
        dump('finised');
    }

    public function updateOrCreate(){
        $anotherPost = [
            'title' => 'updateorcreate some post',
            'content' => 'updateorcreate some content',
            'image' => 'updateorcreate some iamgeblablabla.jpg',
            'likes' => 500,
            'is_published' => '0',
        ];

        $post = Post::updateOrCreate([
            'title' => 'some title not phpstorm'
        ],[
            'title' => 'some title not phpstorm',
            'content' => 'updateorcreate some content',
            'image' => 'updateorcreate some iamgeblablabla.jpg',
            'likes' => 500,
            'is_published' => '0',
        ]);
        dump($post->title);
    }
}
