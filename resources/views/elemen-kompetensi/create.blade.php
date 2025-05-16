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
            <form action="{{ route('elemen-kompetensi.store', $id) }}" method="POST">
            @csrf
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="elemen_kompetensi">Nama Elemen Kompetensi</label>
                                <input type="text" id="elemen_kompetensi"
                                    class="form-control @error('elemen_kompetensi') is-invalid @enderror"
                                    placeholder="Masukkan Elemen Kompetensi" name="elemen_kompetensi" value="{{ old('elemen_kompetensi') }}">
                                @error('elemen_kompetensi')
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

</x-app-layout>
