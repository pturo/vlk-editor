<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function login_index() {
        return view('vlkeditor.login');
    }

    public function register_index() {
        return view('vlkeditor.register');
    }

    public function reset_index() {
        return view('vlkeditor.reset');
    }

    public function register(Request $request) {
        $this->validateRegisterForm($request);

        $image = $request->file('profile_avatar');
        $profileAvatarImg = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('images/profile-avatar');
        $image->move($destinationPath, $profileAvatarImg);

        User::create([
            'name'=>$request->get('name'),
            'email'=>$request->get('email'),
            'password'=>$request->get('password'),
            'profile_avatar'=>$profileAvatarImg
        ]);

        return redirect()->route('vlk_login_index')->with('message', 'Użytkownik pomyślnie zarejestrowany.');
    }

    public function login(Request $request) {
        $this->validateLoginForm($request);

        $credentials = $request->only('name', 'password');
        if(Auth::attempt($credentials)) {
            return redirect()->route('vlkadm_dashboard.index');
        }

        return redirect()->route('vlk_login_index')->withInput()->with('error', 'Błąd logowania użytkownika.');
    }

    public function logout() {
        Session::flush();
        Auth::logout();

    return redirect()->route('vlk_login_index')->with('message', 'Użytkownik pomyślnie wylogowany.');
    }

    public function validateRegisterForm($request) {
        return $this->validate($request, [
            'name'=>'required|string',
            'email'=>'required|email',
            'password'=>'required|confirmed|min:6',
            'password_confirmation'=>'required|min:6',
            'profile_avatar'=>'required|mimes:jpg,jpeg,png,gif|max:4096'
        ], [
            'name.required'=>'Nazwa użytkownika jest wymagana.',
            'name.string'=>'Nazwa użytkownika powinna być ciągiem znaków.',
            'email.required'=>'Adres e-mail jest wymagany.',
            'email.email'=>'Nieprawidłowy adres e-mail.',
            'password.required'=>'Hasło jest wymagane.',
            'password.min'=>'Hasło powinno mieć więcej niż 6 znaków.',
            'password.confirmed'=>'Hasła nie są takie same.',
            'password_confirmation.required'=>'Trzeba powtórzyć hasło.',
            'password_confirmation.min'=>'Hasło powinno mieć więcej niż 6 znaków.',
            'profile_avatar.required'=>'Zdjęcie profilowe jest wymagane.',
            'profile_avatar.mimes'=>'Nieprawidłowy typ pliku.',
            'profile_avatar.max'=>'Rozmiar zdjęcia przekracza 4MB.'
        ]);
    }

    public function validateLoginForm($request) {
        return $this->validate($request, [
            'name'=>'required|string',
            'password'=>'required|string'
        ], [
            'name.required'=>'Nazwa użytkownika jest wymagana.',
            'name.string'=>'Nazwa użytkownika powinna być ciągiem znaków.',
            'password.required'=>'Hasło jest wymagane.',
            'password.string'=>'Hasło powinno być ciągiem znaków.'
        ]);
    }
}
