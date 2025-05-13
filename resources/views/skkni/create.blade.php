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
                    <p class="text-subtitle text-muted">Tambah Data {{ $title }}</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">{{ $title }}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Tambah Data</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <form action="{{ route('skkni.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="jenis_standar">Jenis Standar</label>
                                    <select id="jenis_standar" name="jenis_standar"
                                        class="form-select @error('jenis_standar') is-invalid @enderror">
                                        <option value="">-- Pilih Jenis Standar --</option>
                                        <option value='SKKNI'>Standar Kompetensi Kerja Nasional Indonesia (SKKNI)</option>
                                        <option value='SKK'>Standar Kompetensi Khusus (SKK)</option>
                                        <option value='SI'>Standar Internasional (SI)</option>
                                    </select>
                                    @error('jenis_standar')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="nama">Nama Standar/SKKNI/SKK</label>
                                    <input type="text" id="nama"
                                        class="form-control @error('nama') is-invalid @enderror"
                                        placeholder="Masukkan Nama" name="nama" value="{{ old('nama') }}">
                                    @error('judul')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="penyusun">Penerbit / Kementerian</label>
                                    <input type="text" id="penyusun"
                                        class="form-control @error('penyusun') is-invalid @enderror"
                                        placeholder="Masukkan Penerbit / Kementerian" name="penyusun" value="{{ old('penyusun') }}">
                                    @error('penyusun')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="no_skkni">No. Standar</label>
                                    <input type="text" id="no_skkni"
                                        class="form-control @error('no_skkni') is-invalid @enderror"
                                        placeholder="Masukkan Nomor Standar" name="no_skkni"
                                        value="{{ old('no_skkni') }}">
                                    @error('no_skkni')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="legalitas">Legalitas / Perundangan</label>
                                    <input type="text" id="legalitas"
                                        class="form-control @error('legalitas') is-invalid @enderror"
                                        placeholder="Masukkan Legalitas" name="legalitas"
                                        value="{{ old('legalitas') }}">
                                    @error('legalitas')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="sektor">Sektor</label>
                                                <input type="text" id="sektor"
                                                    class="form-control @error('sektor') is-invalid @enderror"
                                                    placeholder="Masukkan Sektor" name="sektor"
                                                    value="{{ old('sektor') }}">
                                                @error('sektor')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="subsektor">Sub Sektor</label>
                                                <input type="text" id="subsektor"
                                                    class="form-control @error('subsektor') is-invalid @enderror"
                                                    placeholder="Masukkan Sub Sektor" name="subsektor"
                                                    value="{{ old('subsektor') }}">
                                                @error('subsektor')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label for="file">Dokumen Standar</label>
                                    <div class="card">
                                        <div class="card-body">
                                            <input type="file" name="file" id="file"
                                                class="basic-filepond @error('file') is-invalid @enderror"
                                                accept="application/pdf">
                                            @error('file')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
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
