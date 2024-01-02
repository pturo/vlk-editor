<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Service;

class VLKServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Service::latest()->get();
        return view('vlkeditor.services.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('vlkeditor.services.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validateForm($request);

        $image = $request->file('thumbnail');
        $thumbnail = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/services/thumbnails');
        $image->move($destinationPath, $thumbnail);

        Service::create([
            'name'=>$request->get('name'),
            'slug'=>Str::slug($request->get('name')),
            'thumbnail'=>$thumbnail,
            'excerpt'=>$request->get('excerpt'),
            'content'=>$request->get('content')
        ]);

        return redirect()->back()->with('message', 'Usługa została pomyślnie dodana.');
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
        $service = Service::find($id);
        return view('vlkeditor.services.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validateForm($request);

        $service = Service::find($id);
        $thumbnail = $service->thumbnail;

        if($request->hasFile('thumbnail')) {
            $image = $request->file('thumbnail');
            $thumbnail = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/services/thumbnails');
            $image->move($destinationPath, $thumbnail);
        }

        $service->name = $request->get('name');
        $service->slug = Str::slug($request->get('name'));
        $service->thumbnail = $thumbnail;
        $service->excerpt = $request->get('excerpt');
        $service->content = $request->get('content');
        $service->save();

        return redirect()->back()->with('message', 'Usługa została pomyślnie zaktualizowana.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $service = Service::find($id);
        $service->delete();

        return redirect()->back()->with('message', 'Usługa została pomyślnie usunięta.');
    }

    private function validateForm(Request $request) {
        return $this->validate($request, [
            'name'=>'required',
            'thumbnail'=>'required|mimes:jpg,jpeg,png,gif|max:4096',
            'excerpt'=>'required',
            'content'=>'required'
        ], [
            'name.required'=>'Nazwa usługi jest wymagana.',
            'thumbnail.required'=>'Miniatura jest wymagana.',
            'thumbnail.mimes'=>'Nieprawidłowy typ miniatury.',
            'thumbnail.max'=>'Przekroczono rozmiar miniautury (4 MB).',
            'excerpt.required'=>'Opis usługi jest wymagany.',
            'content.required'=>'treść usługi jest wymagana.'
        ]);
    }
}
