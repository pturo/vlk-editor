<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testimonial;

class VLKTestimonialsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $testimonials = Testimonial::latest()->get();
        return view('vlkeditor.testimonials.index', compact('testimonials'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('vlkeditor.testimonials.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validateForm($request);

        $image = $request->file('client_avatar');
        $client_avatar = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/testimonials/client_avatar');
        $image->move($destinationPath, $client_avatar);

        Testimonial::create([
            'client_avatar'=>$client_avatar,
            'name'=>$request->get('name'),
            'occupation'=>$request->get('occupation'),
            'review'=>$request->get('review')
        ]);

        return redirect()->back()->with('message', 'Opinia została utworzona pomyślnie.');
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
        $testimonial = Testimonial::find($id);
        return view('vlkeditor.testimonials.edit', compact('testimonial'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validateForm($request);

        $testimonial = Testimonial::find($id);
        $client_avatar = $testimonial->client_avatar;

        if($request->hasFile('client_avatar')) {
            $image = $request->file('client_avatar');
            $client_avatar = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/testimonials/client_avatar');
            $image->move($destinationPath, $client_avatar);
        }

        $testimonial->client_avatar = $client_avatar;
        $testimonial->name = $request->get('name');
        $testimonial->occupation = $request->get('occupation');
        $testimonial->review = $request->get('review');
        $testimonial->save();

        return redirect()->back()->with('message', 'Opinia została zaktualizowana pomyślnie.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $testimonial = Testimonial::find($id);
        $testimonial->delete();

        return redirect()->back()->with('message', 'Opinia została usunięta pomyślnie.');
    }

    private function validateForm(Request $request) {
        return $this->validate($request, [
            'client_avatar'=>'required|mimes:jpg,jpeg,png,gif|max:4096',
            'name'=>'required',
            'occupation'=>'required',
            'review'=>'required'
        ], [
            'client_avatar.required'=>'Zdjęcie klienta jest wymagane.',
            'client_avatar.mimes'=>'Plik ma nieprawidłowy format.',
            'client_avatar.max'=>'Przekroczono rozmiar pliku (4 MB).',
            'name.required'=>'Imię i nazwisko klienta jest wymagane.',
            'occupation.required'=>'Profesja/Stanowisko jest wymagane.',
            'review.required'=>'Treść opinii jest wymagana.'
        ]);
    }
}
