<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\Province;
use Illuminate\View\View;
use App\Models\Kebangsaan;
use App\Models\Pendidikan;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */

    public function index(): View {

        $title = 'Profil';


        // dd(Auth::user());

        $profile = Profile::with('user')->where('user_id', Auth::id())->firstOrFail();

        // dd($profile);


        return view('profile.index', [
            'profile' => $profile,
        ]);
    }
    
    public function edit($id): View
    {

        $title = 'Ubah Profil';

        $profile = Profile::with('user', 'kebangsaan', 'pendidikan')->findOrFail($id);
        

        return view('profile.edit', [
            'title' => $title,
            'profile' => $profile,
            'provinces' => Province::all(),
            'bangsa' => Kebangsaan::all(),
            'pendidikan' => Pendidikan::all()
        ]);
    }

    /**
     * Update the user's profile information.
     */

     public function update(Request $request, $id)
     {

         $request->validate([
             'no_ktp'            => ['required', 'numeric', 'digits:16', Rule::unique('profiles', 'no_ktp')->ignore($id)],
             'name'              => ['required', 'string', 'max:255'],
             'place_birth'       => ['required', 'string', 'max:100'],
             'date_birth'        => ['required', 'date'],
             'gender'            => ['required'], 
             'universitas'       => ['required', 'string', 'max:255'],
             'jurusan'           => ['required', 'string', 'max:255'],
             'tahun'             => ['required', 'numeric', 'digits:4'],
             'pendidikan_id'     => ['required', 'exists:pendidikans,id'], 
             'kebangsaan_id'     => ['required', 'exists:kebangsaans,id'],
             'phone'             => ['required', 'string', 'max:15'],
             'address'           => ['required', 'string', 'max:255'],
             'province_id'       => ['required', 'exists:provinces,id'],
             'regency_id'        => ['required', 'exists:regencies,id'],
             'district_id'       => ['required', 'exists:districts,id'], 
             'sub_district_id'   => ['required', 'exists:sub_districts,id'], 
             'foto'              => ['nullable', 'image', 'mimes:jpeg,jpg,png', 'max:2048'],
         ], [
            'no_ktp.required'           => 'Nomor KTP belum diisi!',
            'no_ktp.numeric'            => 'Nomor KTP harus berupa angka!',
            'no_ktp.digits'             => 'Nomor KTP harus terdiri dari 16 angka!',
            'name.required'             => 'Nama Lengkap belum diisi!',
            'place_birth.required'      => 'Tempat lahir belum diisi!',
            'date_birth.required'       => 'Tanggal lahir belum diisi!',
            'gender.required'           => 'Jenis kelamin belum dipilih!',
            'universitas.required'      => 'Universitas belum diisi!',
            'jurusan.required'          => 'Jurusan belum diisi!',
            'tahun.required'            => 'Tahun belum diisi!',
            'tahun.numeric'             => 'Tahun harus berupa angka!',
            'tahun.digits'              => 'Tahun harus terdiri dari 4 angka!',
            'pendidikan_id.required'    => 'Pendidikan belum dipilih!',
            'kebangsaan_id.required'    => 'Kebangsaan belum dipilih!',
            'phone.required'            => 'Nomor HP belum diisi!',
            'address.required'          => 'Alamat belum diisi!',
            'province_id.required'      => 'Provinsi belum dipilih!',
            'regency_id.required'       => 'Kota/Kabupaten belum dipilih!',
            'district_id.required'      => 'Kecamatan belum dipilih!',
            'sub_district_id.required'  => 'Kelurahan/Desa belum dipilih!',
            'foto.image'                => 'File upload harus berupa file gambar!',
            'foto.max'                  => 'Ukuran file upload maksimal 2MB!',
            'foto.mimes'                => 'Format file upload harus berekstensi jpeg/jpg/png!',
        ]);
     
         $profile = Profile::findOrFail($id);


         $profile->no_ktp = $request->input('no_ktp');
         $profile->name = $request->input('name');
         $profile->place_birth = $request->input('place_birth');
         $profile->date_birth = $request->input('date_birth');
         $profile->gender = $request->input('gender');
         $profile->universitas = $request->input('universitas');
         $profile->jurusan = $request->input('jurusan');
         $profile->tahun = $request->input('tahun');
         $profile->pendidikan_id = $request->input('pendidikan_id');
         $profile->kebangsaan_id = $request->input('kebangsaan_id');
         $profile->phone = $request->input('phone');
         $profile->address = $request->input('address');
         $profile->province_id = $request->input('province_id');
         $profile->regency_id = $request->input('regency_id');
         $profile->district_id = $request->input('district_id');
         $profile->sub_district_id = $request->input('sub_district_id');
     
         if ($request->hasFile('foto')) {
         
            if ($profile->foto && file_exists(public_path('storage/images/profile/' . $profile->foto))) {
                unlink(public_path('storage/images/profile/' . $profile->foto));
            }
     
             $file = $request->file('foto');
             $filename = time() . '.' . $file->getClientOriginalExtension();
             $file->move(public_path('storage/images/profile'), $filename);

          $profile->foto = $filename;
    
         }

         $profile->save();
     
     
         return redirect()->route('profile.index')->with('success', 'Profile berhasil diperbarui!');
     }
     

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
