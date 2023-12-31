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
        $category = Category::find(1);
        $tag = Tag::find(1);
        dd($post->tags);
        return view('post.index', compact('posts'));
    }

    public function create() {
        $categories = Category::all();
        $tags = Tag::all();

        return view('post.create', compact('categories', 'tags'));
    }

    public function store() {
        $data = request()->validate([
            'title' => 'required|string',
            'content' => 'string',
            'image' => 'string',
            'category_id' => '',
            'tags' => '',
        ]);
        $tags = $data['tags'];
        unset($data['tags']);


        $post = Post::create($data);

        $post->tags()->attach($tags);

        return redirect()->route('post.index');
    }

    public function show(Post $post) {
        return view('post.show', compact('post'));
    }

    public function edit(Post $post) {
        $categories = Category::all();
        $tags = Tag::all();

        return view('post.edit', compact('post', 'categories', 'tags'));
    }

    public function update(Post $post) {
        $data = request()->validate([
            'title' => 'string',
            'content' => 'string',
            'image' => 'string',
            'category_id' => '',
            'tags' => '',
        ]);
        $tags = $data['tags'];
        unset($data['tags']);

        $post->update($data);
        $post->tags()->sync($tags);
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
