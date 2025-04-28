<x-app-layout>
    @push('styles')
        <link rel="stylesheet" href={{ asset('assets/extensions/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}>
    @endpush
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>{{ $title }}</h3>
                    <p class="text-subtitle text-muted">Powerful interactive tables with datatables (jQuery required).</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">DataTable jQuery</li>
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
                        Tambah Data
                    </h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table" id="table1">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Kode Skema</th>
                                    <th>Nama Skema Sertifikasi</th>
                                    <th>Standar Kompetensi</th>
                                    <th>Persyaratan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($skema as $no => $s)
                                    <tr>
                                        <td>{{ $no + 1 }}.</td>
                                        <td>{{ $s->kode_skema }}</td>
                                        <td>{{ $s->judul }}</td>
                                        <td>Offenburg</td>
                                        <td>Offenburg</td>
                                        <td>
                                            <span class="badge bg-success">Active</span>
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
    <script src={{ asset('assets/extensions/datatables.net-bs5/js/dataTables.bootstrap5.min.js')}}></script>
    <script src={{ asset('assets/static/js/pages/datatables.js') }}></script>
    @endpush
</x-app-layout>