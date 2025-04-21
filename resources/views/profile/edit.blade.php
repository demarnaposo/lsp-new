<x-app-layout>

    @push('styles')
        <link rel="stylesheet" href={{ asset('assets/extensions/flatpickr/flatpickr.min.css') }}>

        <link href={{ asset('assets/select2/dist/css/select2.min.css') }} rel="stylesheet" />
    @endpush
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>{{ $title ?? '' }}</h3>
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
            <form action="{{ route('profile.update', $profile->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-center align-items-center flex-column">
                                    <label for="foto" style="cursor: pointer; position: relative;">
                                        <img id="profile-pic" src="{{ asset('storage/images/profile/' . $profile->foto) }}"
                                            style="width: 120px; height: 120px; border-radius: 50%;" alt="foto">
                                        <input type="file" id="foto" name="foto" style="display: none;"
                                            accept="image/*" onchange="previewImage(event)">
                                    </label>
                                    <h3 class="mt-3">{{ $profile->name }}</h3>
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
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="no_ktp">Nomor Induk Kependudukan (KTP)</label>
                                            <input type="text" id="no_ktp"
                                                class="form-control @error('no_ktp') is-invalid @enderror"
                                                value="{{ old('no_ktp', $profile->no_ktp) }}"
                                                placeholder="Masukkan Nomor KTP" name="no_ktp" autocomplete="off">
                                            @error('no_ktp')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    {{-- <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="text" id="email"
                                                class="form-control @error('email') is-invalid @enderror"
                                                value="{{ old('email', $profile->user->email) }}"
                                                placeholder="Masukkan Email" name="email" autocomplete="email">
                                            @error('email')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div> --}}

                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="name">Nama Lengkap</label>
                                            <input type="text" id="name"
                                                class="form-control @error('name') is-invalid @enderror"
                                                value="{{ old('name', $profile->name) }}"
                                                placeholder="Masukkan Nama Lengkap" name="name">
                                            @error('name')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="phone">Nomor Handphone</label>
                                            <input type="number" id="phone"
                                                class="form-control @error('phone') is-invalid @enderror"
                                                value="{{ old('phone', $profile->phone) }}"
                                                placeholder="Masukkan Nomor Handphone" name="phone">
                                            @error('phone')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="place_birth">Tempat Lahir</label>
                                            <input type="text" id="place_birth"
                                                class="form-control @error('place_birth') is-invalid @enderror"
                                                value="{{ old('place_birth', $profile->place_birth) }}"
                                                placeholder="Masukkan Tempat Lahir" name="place_birth">
                                            @error('place_birth')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="address">Alamat</label>
                                            <input type="text" id="address"
                                                class="form-control @error('address') is-invalid @enderror"
                                                value="{{ old('address', $profile->address) }}"
                                                placeholder="Masukkan Alamat" name="address">
                                            @error('address')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="date_birth">Tanggal Lahir</label>
                                            <input type="text" id="tanggal"
                                                class="form-control @error('date_birth') is-invalid @enderror mb-3 flatpickr-no-config"
                                                value="{{ old('date_birth', $profile->date_birth) }}"
                                                placeholder="Pilih Tanggal Lahir" name="date_birth">
                                                @error('date_birth')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="province_id">Provinsi</label>
                                            <select class="form-select @error('province_id') is-invalid @enderror"
                                                id="province" name="province_id">
                                                <option value="{{ $profile->province->id }}">
                                                    {{ $profile->province->name }}</option>
                                                <option value="">--- Pilih Provinsi ---</option>
                                                @foreach ($provinces as $province)
                                                    <option value="{{ $province->id }}">{{ $province->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('province_id')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="gender">Jenis Kelamin</label>
                                            <select class="form-select @error('gender') is-invalid @enderror" id="gender" name="gender">
                                                <option value="" {{ $profile->gender == null ? 'selected' : '' }}>--- Pilih Jenis Kelamin ---</option>
                                                <option value="Laki - Laki" {{ $profile->gender == 'Laki - Laki' ? 'selected' : '' }}>Laki - Laki</option>
                                                <option value="Perempuan" {{ $profile->gender == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                            </select>
                                            @error('gender')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    


                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="regency_id">Kota/Kabupaten</label>
                                            <select class="form-select" id="regency" name="regency_id">
                                                <option value="{{ $profile->regency->id }}">
                                                    {{ $profile->regency->name }}</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="kebangsaan_id">Kebangsaan</label>
                                            <select class="form-select @error('kebangsaan_id') is-invalid @enderror"
                                                id="kebangsaan_id" name="kebangsaan_id">
                                                <option value="">--- Pilih Kebangsaan ---</option>
                                                @foreach ($bangsa as $b)
                                                <option value="{{ $b->id }}" {{ $profile->kebangsaan_id == $b->id ? 'selected' : '' }}>{{ $b->nama }}</option>
                                                @endforeach

                                                {{-- <option value="{{ $profile->kebangsaan->id }}">
                                                    {{ $profile->kebangsaan->nama }}</option>
                                                <option value="">--- Pilih Kebangsaan ---</option>
                                                @foreach ($bangsa as $b)
                                                    <option value="{{ $b->id }}">{{ $b->nama }}
                                                    </option>
                                                @endforeach --}}
                                            </select>
                                            @error('kebangsaan_id')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="district_id">Kecamatan</label>
                                            <select class="form-select" id="district" name="district_id">
                                                <option value="{{ $profile->district->id }}">
                                                    {{ $profile->district->name }}</option>
                                                <option value="">--- Pilih Kecamatan ---</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="pendidikan_id">Pendidikan Terakhir</label>
                                            <select class="form-select @error('pendidikan_id') is-invalid @enderror"
                                                id="pendidikan_id" name="pendidikan_id">
                                                <option value="">--- Pilih Pendidikan Terakhir ---</option>
                                                @foreach ($pendidikan as $p)
                                                    <option value="{{ $p->id }}" {{ $profile->pendidikan_id == $p->id ? 'selected' : '' }}>{{ $p->nama }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('pendidikan_id')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="sub_district_id">Kelurahan</label>
                                            <select class="form-select" id="sub_district" name="sub_district_id">
                                                <option value="{{ $profile->sub_district->id }}">
                                                    {{ $profile->sub_district->name }}</option>
                                                <option value="">--- Pilih Kelurahan ---</option>
                                            </select>
                                        </div>
                                    </div>



                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="universitas">Universitas/Lembaga Pendidikan</label>
                                            <input type="text" id="universitas" 
                                                class="form-control @error('universitas') is-invalid @enderror"
                                                value="{{ old('universitas', $profile->universitas) }}" 
                                                placeholder="Masukkan Nama Universitas/Lembaga Pendidikan" name="universitas">
                                                @error('universitas')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="jurusan">Jurusan/Program Studi</label>
                                            <input type="text" id="jurusan"
                                                class="form-control @error('jurusan') is-invalid @enderror"
                                                value="{{ old('jurusan', $profile->jurusan) }}"
                                                placeholder="Masukkan Jurusan" name="jurusan">
                                                @error('jurusan')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="tahun">Tahun Lulus</label>
                                            <input type="number" id="tahun" 
                                                class="form-control @error('tahun') is-invalid @enderror"
                                                value="{{ old('tahun', $profile->tahun) }}"
                                                placeholder="Masukkan Tahun Lulus" name="tahun">
                                        </div>
                                    </div>




                                    {{-- <div class="form-group col-12">
                                            <div class='form-check'>
                                                <div class="checkbox">
                                                    <input type="checkbox" id="checkbox5" class='form-check-input' checked>
                                                    <label for="checkbox5">Remember Me</label>
                                                </div>
                                            </div>
                                        </div> --}}
                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary rounded-pill">Submit</button>
                                        {{-- <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button> --}}
                                    </div>


                                </>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    @push('scripts')
        <script src={{ asset('assets/extensions/flatpickr/flatpickr.min.js') }}></script>
        <script src={{ asset('assets/static/js/pages/date-picker.js') }}></script>

        <!-- jQuery (Required for Select2) -->
        <script src={{ asset('assets/extensions/jquery/jquery.min.js') }}></script>
        <!-- Select2 JS -->
        <script src={{ asset('assets/select2/dist/js/select2.min.js') }}></script>





        <script>
            // Fungsi get Kabupaten/Kota, Kecamatan, dan Kelurahan


            $(document).ready(function() {
                $('.select2').select2();

                $('#province').change(function() {
                    let provinceId = $(this).val();
                    $('#regency').html('<option value="">Loading...</option>');
                    $.get('/regencies/' + provinceId, function(data) {
                        $('#regency').html('<option value="">--- Pilih Kota/Kabupaten ---</option>');
                        $.each(data, function(index, value) {
                            $('#regency').append('<option value="' + value.id + '">' + value
                                .name + '</option>');
                        });
                    });
                });

                $('#regency').change(function() {
                    let regencyId = $(this).val();
                    $('#district').html('<option value="">Loading...</option>');
                    $.get('/districts/' + regencyId, function(data) {
                        $('#district').html('<option value="">--- Pilih Kecamatan ---</option>');
                        $.each(data, function(index, value) {
                            $('#district').append('<option value="' + value.id + '">' + value
                                .name + '</option>');
                        });
                    });
                });

                $('#district').change(function() {
                    let districtId = $(this).val();
                    $('#sub_district').html('<option value="">Loading...</option>');
                    $.get('/sub-districts/' + districtId, function(data) {
                        $('#sub_district').html('<option value="">--- Pilih Kelurahan ---</option>');
                        $.each(data, function(index, value) {
                            $('#sub_district').append('<option value="' + value.id + '">' +
                                value.name + '</option>');
                        });
                    });
                });
            });


            // Fungsi Preview Image

            function previewImage(event) {
                const reader = new FileReader();
                reader.onload = function() {
                    document.getElementById('profile-pic').src = reader.result;
                };
                reader.readAsDataURL(event.target.files[0]);
            }

            flatpickr("#tanggal", {
                enableTime: false, // Hilangin jam
                dateFormat: "Y-m-d"
            });
        </script>
    @endpush
</x-app-layout>
