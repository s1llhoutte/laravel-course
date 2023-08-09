<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index() {
        $post = Post::find(1);
        $tag = Tag::find(1);

        dd($tag->posts);

     //   return view('post.index', compact('posts'));
    }

    public function create() {
        return view('post.create');
    }

    public function store() {
        $data = request()->validate([
            'title' => 'string',
            'content' => 'string',
            'image' => 'string',
        ]);
        Post::create($data);
        return redirect()->route('post.index');
    }

    public function show(Post $post) {
        return view('post.show', compact('post'));
    }

    public function edit(Post $post) {
        return view('post.edit', compact('post'));
    }

    public function update(Post $post) {
        $data = request()->validate([
            'title' => 'string',
            'content' => 'string',
            'image' => 'string',
        ]);
        $post->update($data);
        return redirect()->route('post.show', $post->id);
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

    public function destroy(Post $post) {
        $post->delete();
        return redirect()->route('post.index');
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
