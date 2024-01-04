<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Blog;

class VLKBlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blog = Blog::latest()->get();
        return view('vlkeditor.blog.index', compact('blog'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('vlkeditor.blog.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validateForm($request);

        $image = $request->file('thumbnail');
        $thumbnail = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/blog/thumbnails');
        $image->move($destinationPath, $thumbnail);

        Blog::create([
            'title'=>$request->get('title'),
            'slug'=>Str::slug($request->get('title')),
            'author'=>$request->get('author'),
            'category'=>$request->get('category'),
            'tags'=>$request->get('tags'),
            'thumbnail'=>$thumbnail,
            'excerpt'=>$request->get('excerpt'),
            'content'=>$request->get('content')
        ]);

        return redirect()->back()->with('message', 'Wpis został dodany pomyślnie.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Blog::find($id);
        return view('vlkeditor.blog.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validateForm($request);

        $post = Blog::find($id);
        $thumbnail = $post->thumbnail;

        if($request->hasFile('thumbnail')) {
            $image = $request->file('thumbnail');
            $thumbnail = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/blog/thumbnails');
            $image->move($destinationPath, $thumbnail);
        }

        $post->title = $request->get('title');
        $post->slug = Str::slug($request->get('title'));
        $post->author = $request->get('author');
        $post->category = $request->get('category');
        $post->tags = $request->get('tags');
        $post->thumbnail = $thumbnail;
        $post->excerpt = $request->get('excerpt');
        $post->content = $request->get('content');
        $post->save();

        return redirect()->back()->with('message', 'Wpis został zaktualizowany pomyślnie.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Blog::find($id);
        $post->delete();

        return redirect()->back()->with('message', 'Wpis został usunięty pomyślnie.');
    }

    private function validateForm(Request $request) {
        return $this->validate($request, [
            'title'=>'required',
            'author'=>'required',
            'category'=>'required',
            'tags'=>'required',
            'thumbnail'=>'required|mimes:jpg,jpeg,png,gif|max:4096',
            'excerpt'=>'required',
            'content'=>'required'
        ], [
            'title.required'=>'Tytuł jest wymagany.',
            'author.required'=>'Autor jest wymagany.',
            'category.required'=>'Kategoria jest wymagana.',
            'tags.required'=>'Tagi są wymagane (co najmniej jeden w formacie: #tag).',
            'thumbnail.required'=>'Miniatura jest wymagana.',
            'thumbnail.mimes'=>'Nieprawidłowy typ pliku.',
            'thumbnail.max'=>'Rozmiar miniatury przekroczony (4MB).',
            'excerpt.required'=>'Opis jest wymagany.',
            'content.required'=>'Treść jest wymagana.'
        ]);
    }
}
