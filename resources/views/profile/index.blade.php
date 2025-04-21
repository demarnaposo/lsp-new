<x-app-layout>

    @push('styles')
        <link rel="stylesheet" href="{{ asset('assets/extensions/sweetalert2/sweetalert2.min.css') }}">
    @endpush
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Profil</h3>
                    <p class="text-subtitle text-muted">A page where users can change profile information</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Akun</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Profil</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-center align-items-center flex-column">
                                <img src="{{ $profile->foto ? asset('storage/images/profile/' . $profile->foto) : asset('assets/static/images/faces/2.jpg') }}"
                                    alt="Avatar" style="width: 120px; height: 120px; border-radius: 50%;">

                                <h3 class="mt-3">{{ $profile->name }}</h3>
                                <div class="d-flex justify-content-center">
                                    <a href="{{ route('profile.edit', $profile->id) }}"
                                        class="btn btn-primary rounded-pill">Ubah</a>
                                </div>
                                {{-- <p class="text-small">Junior Software Engineer</p> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="multiple-column-form">
            <div class="row match-height">
                <div class="col-12">
                    <div class="card">
                        {{-- <div class="card-header">
                        <h4 class="card-title">Multiple Column</h4>
                    </div> --}}
                        <div class="card-content">
                            <div class="card-body">
                                <form class="form">
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="no_ktp">Nomor Induk Kependudukan (KTP)</label>
                                                <input type="number" id="no_ktp" class="form-control"
                                                    value="{{ $profile->no_ktp }}" placeholder="Masukkan Nomor KTP"
                                                    name="no_ktp" disabled>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <input type="text" id="email" value="{{ $profile->user->email }}"
                                                    class="form-control" name="email" placeholder="Masukkan Email"
                                                    disabled>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="name">Nama Lengkap</label>
                                                <input type="text" id="name" class="form-control"
                                                    value="{{ $profile->name }}" placeholder="Masukkan Nama Lengkap"
                                                    name="name" disabled>
                                            </div>
                                        </div>


                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="phone">Nomor Handphone</label>
                                                <input type="number" id="phone" value="{{ $profile->phone }}"
                                                    class="form-control" placeholder="Masukkan Nomor Handphone"
                                                    name="phone" disabled>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="place_birth">Tempat Lahir</label>
                                                <input type="text" id="place_birth" class="form-control"
                                                    value="{{ $profile->place_birth ?? '--- Belum Diisi ---' }}"
                                                    placeholder="Masukkan Tempat Lahir" name="place_birth" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="address">Alamat</label>
                                                <input type="text" id="company-column"
                                                    value="{{ $profile->address }}" class="form-control" name="address"
                                                    placeholder="Masukkan Alamat" disabled>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="date_birth">Tanggal Lahir</label>
                                                <input type="date" id="date_birth" class="form-control"
                                                    value="{{ $profile->date_birth ?? '' }}" name="date_birth"
                                                    placeholder="Pilih Tanggal Lahir" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="province_id">Provinsi</label>
                                                <input type="text" id="province_id"
                                                    value="{{ $profile->province->name }}" class="form-control"
                                                    name="province_id" placeholder="Pilih Provinsi" disabled>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="gender">Jenis Kelamin</label>
                                                <input type="text" id="gender"
                                                    value="{{ $profile->gender ?? '--- Belum Dipilih ---' }}"
                                                    class="form-control" name="gender"
                                                    placeholder="Pilih Jenis Kelamin" disabled>
                                            </div>
                                        </div>


                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="regency_id">Kota/Kabupaten</label>
                                                <input type="text" id="regency_id"
                                                    value="{{ $profile->regency->name }}" class="form-control"
                                                    name="regency_id" placeholder="Pilih Kota/Kabupaten" disabled>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="kebangsaan_id">Kebangsaan</label>
                                                <input type="text" id="kebangsaan_id"
                                                    value="{{ $profile->kebangsaan->nama ?? '--- Belum Dipilih ---' }}"
                                                    class="form-control" name="kebangsaan_id"
                                                    placeholder="Pilih Kebangsaan" disabled>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="regency_id">Kecamatan</label>
                                                <input type="text" id="regency_id"
                                                    value="{{ $profile->district->name }}" class="form-control"
                                                    placeholder="Pilih Kecamatan" name="regency_id" disabled>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="education_id">Pendidikan Terakhir</label>
                                                <input type="text" id="education_id"
                                                    value="{{ $profile->pendidikan->nama ?? '' }}"
                                                    class="form-control" name="education_id"
                                                    placeholder="Pilih Pendidikan Terakhir" disabled>
                                            </div>
                                        </div>


                                        {{-- @dd(Auth::user()->profile()) --}}
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="sub_district_id">Kelurahan</label>
                                                <input type="text" id="sub_district_id"
                                                    value="{{ $profile->sub_district->name }}" class="form-control"
                                                    name="sub_district_id" placeholder="Pilih Kelurahan" disabled>
                                            </div>
                                        </div>



                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="universitas">Universitas/Lembaga Pendidikan</label>
                                                <input type="text" id="universitas"
                                                    value="{{ $profile->universitas ?? '' }}" class="form-control"
                                                    name="universitas"
                                                    placeholder="Masukkan Nama Universitas/Lembaga Pendidikan"
                                                    disabled>
                                            </div>
                                        </div>



                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="universitas">Jurusan/Program Studi</label>
                                                <input type="text" id="universitas"
                                                    value="{{ $profile->universitas ?? '' }}" class="form-control"
                                                    name="universitas"
                                                    placeholder="Masukkan Nama Universitas/Lembaga Pendidikan"
                                                    disabled>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="jurusan">Jurusan/Program Studi</label>
                                                <input type="text" id="jurusan"
                                                    value="{{ $profile->jurusan ?? '' }}" class="form-control"
                                                    name="jurusan" placeholder="Masukkan Jurusan" disabled>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="universitas">Jurusan/Program Studi</label>
                                                <input type="text" id="universitas"
                                                    value="{{ $profile->universitas ?? '' }}" class="form-control"
                                                    name="universitas"
                                                    placeholder="Masukkan Nama Universitas/Lembaga Pendidikan"
                                                    disabled>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="tahun">Tahun Lulus</label>
                                                <input type="number" id="tahun"
                                                    value="{{ $profile->tahun ?? '' }}" class="form-control"
                                                    name="tahun" placeholder="Masukkan Tahun Lulus" disabled>
                                            </div>
                                        </div>




                                        {{-- <div class="form-group col-12">
                                        <div class='form-check'>
                                            <div class="checkbox">
                                                <input type="checkbox" id="checkbox5" class='form-check-input' checked>
                                                <label for="checkbox5">Remember Me</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                        <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                    </div> --}}


                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    @push('scripts')
        <script src="{{ asset('assets/extensions/sweetalert2/sweetalert2.min.js') }}"></script>>
        {{-- <script src="{{ asset('assets/static/js/pages/sweetalert2.js') }}"></script> --}}


        <script>
            document.addEventListener("DOMContentLoaded", function() {
                @if (session('success'))
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: "{{ session('success') }}",
                    });
                @endif

                @if (session('error'))
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: "{{ session('error') }}",
                    });
                @endif
            });
        </script>
    @endpush
</x-app-layout>
