<x-app-layout>
    @push('styles')
        <link rel="stylesheet" href={{ asset('assets/extensions/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}>
        <link rel="stylesheet" href={{ asset('assets/extensions/@fortawesome/fontawesome-free/css/all.min.css') }}>
    @endpush
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>{{ $title }}</h3>
                    <p class="text-subtitle text-muted">Data SKKNI</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">{{ $title }}</li>
                            {{-- <li class="breadcrumb-item active" aria-current="page">DataTable jQuery</li> --}}
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Basic Tables start -->
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">
                        {{-- <a href="{{ route('skkni.create') }}" class="btn btn-primary">Tambah Data</a> --}}
                    </h5>

                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table" id="table1">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Identitas dan Data Standar Kompetensi</th>
                                    <th>Penerbit</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($skkni as $no => $s)
                                    <tr>
                                        <td>{{ $no + 1 }}.</td>
                                        <td>
                                            <div>{{ $s->no_skkni }}</div>
                                            <div>{{ $s->nama }}</div>
                                            <div>Jenis : <strong>{{ $s->jenis_standard }}</strong></div>
                                        </td>
                                        {{-- <td>
                                            <div>{{ $s->kode_skema }}</div>
                                            <div><span class="badge bg-success">Kedalaman bukti :
                                                    {{ $s->apl02 }}</span></div>
                                        </td> --}}
                                        <td>{{ $s->penyusun }}</td>

                                        {{-- <td>
                                            <a href="{{ asset('storage/file/' . $s->file) }}" target="_blank">

                                                <i class="far fa-file-pdf fa-2x text-danger"></i>
                                            </a>
                                        </td> --}}

                                        <td>
                                            <a href="#" class="badge bg-success">Ubah</a>
                                            <a href="#" class="badge bg-danger">Hapus</a>
                                        </td>

                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center">Data tidak tersedia</td>
                                    </tr>
                                @endforelse
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>

        </section>
        <!-- Basic Tables end -->

    </div>

    @push('scripts')
        <script src={{ asset('assets/extensions/jquery/jquery.min.js') }}></script>
        <script src={{ asset('assets/extensions/datatables.net/js/jquery.dataTables.min.js') }}></script>
        <script src={{ asset('assets/extensions/datatables.net-bs5/js/dataTables.bootstrap5.min.js') }}></script>
        <script src={{ asset('assets/static/js/pages/datatables.js') }}></script>
    @endpush
</x-app-layout>
