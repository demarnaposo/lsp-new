<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\District;
use App\Models\Province;
use Illuminate\View\View;
use App\Models\SubDistrict;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {

        return view('auth.register', [
            'provinces' => Province::all(),
        ]);
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        // Validate request data
        $request->validate([
            'no_ktp' => ['required', 'numeric', 'digits:16', 'unique:profiles,no_ktp'],
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'numeric', 'digits_between:11,13'],
            'address' => ['required', 'string', 'max:255'],
            'province_id' => ['required', 'integer'],
            'regency_id' => ['required', 'integer'],
            'district_id' => ['required', 'integer'],
            'sub_district_id' => ['required', 'integer'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ], [
            'no_ktp.required' => 'Nomor KTP belum diisi!',
            'no_ktp.numeric' => 'Nomor KTP harus berupa angka!',
            'no_ktp.digits' => 'Nomor KTP harus terdiri dari 16 angka!',
            'no_ktp.unique' => 'Nomor KTP sudah terdaftar!',
            'name.required' => 'Nama belum diisi!',
            'phone.required' => 'Nomor HP belum diisi!',
            'phone.numeric' => 'Nomor HP harus berupa angka!',
            'phone.digits_between' => 'Nomor HP harus terdiri dari 11 sampai 13 angka!',
            'address.required' => 'Alamat belum diisi!',
            'province_id.required' => 'Provinsi belum dipilih!',
            'regency_id.required' => 'Kota/Kabupaten belum dipilih!',
            'district_id.required' => 'Kecamatan belum dipilih!',
            'sub_district_id.required' => 'Kelurahan/Desa belum dipilih!',
            'email.required' => 'Email belum diisi!',
            'email.email' => 'Email harus berupa alamat email!',
            'email.unique' => 'Email sudah terdaftar!',
            'password.required' => 'Kata Sandi belum diisi!',
            'password.confirmed' => 'Konfirmasi kata sandi tidak cocok!',]);

        // Create user
        $user = User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Create user profile
        $user->profile()->create([
            'no_ktp' => $request->no_ktp,
            'name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address,
            'province_id' => $request->province_id,
            'regency_id' => $request->regency_id,
            'district_id' => $request->district_id,
            'sub_district_id' => $request->sub_district_id
        ]);

        // Fire registered event
        event(new Registered($user));

        // Log in user
        Auth::login($user);

        // Redirect to dashboard
        return redirect()->route('dashboard');
    }


}
