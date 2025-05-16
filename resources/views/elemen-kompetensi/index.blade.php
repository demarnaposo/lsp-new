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
                    <p class="text-subtitle text-muted">Data {{ $title }}</p>
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
                        <a href="{{ route('elemen-kompetensi.create', $id) }}" class="btn btn-primary">Tambah Data</a>
                    </h5>

                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table" id="table1">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama Elemen</th>
                                    <th>Unit Kompetensi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($elemen as $no => $e)
                                    <tr>
                                        <td>{{ $no + 1 }}.</td>

                                        <td>
                                            <div>{{ $e->elemen_kompetensi }}</div>
                                             <div>
                                                <a href="{{ route('kriteria-unjukkerja.index', $e->id) }}" class="badge bg-primary">Input Kriteria Unjuk Kerja</a>
                                            </div>
                                        </td>
                                        <td>
                                             <div>{{ $e->kode_unit }}</div>
                                            <div>{{ $e->judul }}</div>
                                            <div>{{ $e->judul_eng }}</div>
                                        </td>

                                        <td>
                                            <div><a href="#" class="badge bg-success">Ubah</a></div>
                                            {{-- <a href="#" class="badge bg-success">Ubah</a> --}}
                                        </td>

                                    </tr>
                                @empty

                                {{-- <tr>
                                    <td colspan="5" class="text-center text-muted">Data tidak tersedia</td>
                                </tr> --}}

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
