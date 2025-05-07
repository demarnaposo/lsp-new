<x-app-layout>

    @push('styles')
        <link rel="stylesheet" href="{{ asset('assets/extensions/filepond/filepond.css') }}">
        <link rel="stylesheet"
            href="{{ asset('assets/extensions/filepond-plugin-image-preview/filepond-plugin-image-preview.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/extensions/toastify-js/src/toastify.css') }}">
    @endpush
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Tambah Data</h3>
                    <p class="text-subtitle text-muted">Tambah Data Skema Sertifikasi Profesi</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Skema Sertifikasi Profesi</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Tambah Data</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <form action="{{ route('skema-kkni.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="kode_skema">Kode Skema</label>
                                    <input type="text" id="kode_skema"
                                        class="form-control @error('kode_skema') is-invalid @enderror"
                                        placeholder="Masukkan Kode Skema" name="kode_skema">
                                    @error('kode_skema')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="judul">Judul Skema</label>
                                    <input type="text" id="judul"
                                        class="form-control @error('judul') is-invalid @enderror"
                                        placeholder="Masukkan Judul" name="judul">
                                    @error('judul')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="judul_eng">Judul Skema (Bahasa Inggris)</label>
                                    <input type="text" id="judul_eng"
                                        class="form-control @error('judul_eng') is-invalid @enderror"
                                        placeholder="Masukkan Judul" name="judul_eng">
                                    @error('judul_eng')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="kbji">Kode KBJI</label>
                                                <input type="text" id="kbji"
                                                    class="form-control @error('kbji') is-invalid @enderror"
                                                    placeholder="Masukkan Kode KBJI" name="kbji">
                                                @error('kbji')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="jenjang">Jenjang / Level KKNI</label>
                                                <select id="jenjang" name="jenjang"
                                                    class="form-select @error('jenjang') is-invalid @enderror">
                                                    <option value="">-- Pilih Jenjang --</option>
                                                    <option value="9">Level 9</option>
                                                    <option value="8">Level 8</option>
                                                    <option value="7">Level 7</option>
                                                    <option value="6">Level 6</option>
                                                    <option value="5">Level 5</option>
                                                    <option value="4">Level 4</option>
                                                    <option value="3">Level 3</option>
                                                    <option value="2">Level 2</option>
                                                    <option value="1">Level 1</option>
                                                </select>
                                                @error('jenjang')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="skema_induk">Skema Induk</label>
                                    <select id="skema_induk" name="skema_induk"
                                        class="form-select @error('skema_induk') is-invalid @enderror">
                                        <option value="">-- Pilih Skema --</option>
                                        <option value="9">Level 9</option>
                                        <option value="8">Level 8</option>
                                        <option value="7">Level 7</option>
                                        <option value="6">Level 6</option>
                                        <option value="5">Level 5</option>
                                        <option value="4">Level 4</option>
                                        <option value="3">Level 3</option>
                                        <option value="2">Level 2</option>
                                        <option value="1">Level 1</option>
                                    </select>
                                    @error('skema_induk')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="skema_induk">Kedalaman bukti yang akan diperoleh</label>
                                    <select id="skema_induk" name="skema_induk"
                                        class="form-select @error('skema_induk') is-invalid @enderror">
                                        <option value="">-- Pilih Skema --</option>
                                        {{-- <option value="9">Level 9</option>
                                        <option value="8">Level 8</option>
                                        <option value="7">Level 7</option>
                                        <option value="6">Level 6</option>
                                        <option value="5">Level 5</option>
                                        <option value="4">Level 4</option>
                                        <option value="3">Level 3</option>
                                        <option value="2">Level 2</option>
                                        <option value="1">Level 1</option> --}}
                                    </select>
                                    @error('skema_induk')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="areakerja">Bidang / Area Kerja Okupasi</label>
                                    <input type="text" id="areakerja"
                                        class="form-control @error('areakerja') is-invalid @enderror"
                                        placeholder="Masukkan Bidang / Area Kerja" name="areakerja">
                                    @error('areakerja')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="areakerja_eng">Bidang / Area Kerja Okupasi (Bahasa Inggris)</label>
                                    <input type="text" id="areakerja_eng"
                                        class="form-control @error('areakerja_eng') is-invalid @enderror"
                                        placeholder="Masukkan Bidang / Area Kerja" name="areakerja_eng">
                                    @error('areakerja_eng')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="kode_sektor">Kode Sektor</label>
                                                <input type="text" id="kode_sektor"
                                                    class="form-control @error('kode_sektor') is-invalid @enderror"
                                                    placeholder="Masukkan Kode Sektor" name="kode_sektor">
                                                @error('kode_sektor')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="kbli">Kode KBLI</label>
                                                <input type="text" id="kbli"
                                                    class="form-control @error('kbli') is-invalid @enderror"
                                                    placeholder="Masukkan Kode KBLI" name="kbli">
                                                @error('kbli')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="jenis_skema">Jenis Skema</label>
                                    <select id="jenis_skema" name="jenis_skema"
                                        class="form-select @error('jenis_skema') is-invalid @enderror">
                                        <option value="">-- Pilih Jenis Skema --</option>
                                        <option value="KKNI">KKNI</option>
                                        <option value="Okupasi">Okupasi</option>
                                        <option value="Klaster">Klaster</option>
                                    </select>
                                    @error('jenis_skema')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="keterangan_bukti">Keterangan Bukti yang akan diperoleh</label>
                                    <input type="text" id="keterangan_bukti"
                                        class="form-control @error('keterangan_bukti') is-invalid @enderror"
                                        placeholder="Masukkan Keterangan Bukti" name="keterangan_bukti">
                                    @error('keterangan_bukti')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="file">Dokumen Skema</label>
                                    <div class="card">
                                        <div class="card-body">
                                            <input type="file" name="file" id="file"
                                                class="basic-filepond" accept="application/pdf">
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>

            </form>
        </section>


        <!-- validations start -->
        {{-- <section id="input-validation">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Input Validation States</h4>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <p>You can indicate invalid and valid form fields with <code>.is-invalid</code> and
                                        <code>.is-valid</code>. Note that <code>.invalid-feedback</code> is also supported
                                        with these classes.
                                    </p>
                                </div>
                                <div class="col-sm-6">
                                    <label for="valid-state">Valid State</label>
                                    <input type="text" class="form-control is-valid" id="valid-state" placeholder="Valid"
                                        value="Valid" required>
                                    <div class="valid-feedback">
                                        <i class="bx bx-radio-circle"></i>
                                        This is valid state.
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label for="invalid-state">Invalid State</label>
                                    <input type="text" class="form-control is-invalid" id="invalid-state"
                                        placeholder="Invalid" value="Invalid" required>
                                    <div class="invalid-feedback">
                                        <i class="bx bx-radio-circle"></i>
                                        This is invalid state.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}
        <!-- validations end -->

    </div>

    @push('scripts')
        <!-- FilePond Plugin dan FilePond JS -->
        <script
            src="{{ asset('assets/extensions/filepond-plugin-file-validate-size/filepond-plugin-file-validate-size.min.js') }}">
        </script>
        <script
            src="{{ asset('assets/extensions/filepond-plugin-file-validate-type/filepond-plugin-file-validate-type.min.js') }}">
        </script>
        <script src="{{ asset('assets/extensions/filepond-plugin-image-crop/filepond-plugin-image-crop.min.js') }}"></script>
        <script
            src="{{ asset('assets/extensions/filepond-plugin-image-exif-orientation/filepond-plugin-image-exif-orientation.min.js') }}">
        </script>
        <script src="{{ asset('assets/extensions/filepond-plugin-image-filter/filepond-plugin-image-filter.min.js') }}">
        </script>
        <script src="{{ asset('assets/extensions/filepond-plugin-image-preview/filepond-plugin-image-preview.min.js') }}">
        </script>
        <script src="{{ asset('assets/extensions/filepond-plugin-image-resize/filepond-plugin-image-resize.min.js') }}">
        </script>
        <script src="{{ asset('assets/extensions/filepond/filepond.js') }}"></script>

        <!-- Toastify JS (Optional) -->
        <script src="{{ asset('assets/extensions/toastify-js/src/toastify.js') }}"></script>

        <!-- Custom JS untuk FilePond -->
        <script src="{{ asset('assets/static/js/pages/filepond.js') }}"></script>
    @endpush




</x-app-layout>
