<x-app-layout>

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
            <form action="{{ route('unit-kompetensi.store', $skema->id) }}" method="POST">
                @csrf
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="kode_unit">Kode Unit</label>
                                    <input type="text" id="kode_unit"
                                        class="form-control @error('kode_unit') is-invalid @enderror"
                                        placeholder="Masukkan Kode Unit" name="kode_unit"
                                        value="{{ old('kode_unit') }}">
                                    @error('kode_unit')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="judul">Nama Unit Kompetensi Profesi</label>
                                    <input type="text" id="judul"
                                        class="form-control @error('judul') is-invalid @enderror"
                                        placeholder="Masukkan Judul" name="judul" value="{{ old('judul') }}">
                                    @error('judul')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="jenis">Jenis Standard</label>
                                    <select id="jenis" name="jenis"
                                        class="form-select @error('jenis') is-invalid @enderror">
                                        <option value="">-- Pilih Jenis --</option>
                                        <option value="SKKNI">SKKNI</option>
                                        <option value="Standar Khusus">Standar Khusus</option>
                                        <option value="Standar Internasional">Standar Internasional</option>
                                    </select>
                                    @error('jenis')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="judul_eng">Nama Unit Kompetensi Profesi (Bahasa Inggris)</label>
                                    <input type="text" id="judul_eng"
                                        class="form-control @error('judul_eng') is-invalid @enderror"
                                        placeholder="Masukkan Judul" name="judul_eng" value="{{ old('judul_eng') }}">
                                    @error('judul_eng')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>


                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="skkni_id">Standar Kompetensi / Standar Khusus / Standar
                                        Internasional</label>
                                    <select id="skkni_id" name="skkni_id"
                                        class="form-select @error('skkni_id') is-invalid @enderror">
                                        <option value="">-- Pilih Jenis --</option>
                                        @foreach ($skkni as $s)
                                            <option value="{{ $s->id }}"
                                                {{ old('skkni_id') == $s ? 'selected' : '' }}>{{ $s->no_skkni }} -
                                                {{ $s->nama }}</option>
                                        @endforeach
                                    </select>
                                    @error('skkni_id')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>

            </form>
        </section>
    </div>

    @push('scripts')
        <script src="{{ asset('assets/static/js/pages/form-element-select.js') }}"></script>
    @endpush




</x-app-layout>
