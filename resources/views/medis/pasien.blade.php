<x-main>
    @section('main')
        <x-navbar />
        <div class="container my-4">
            <div class="row">
                <x-sidebar />

                <div class="col-md-9">

                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <!-- Card Tabel Pasien -->
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="mb-0 fw-bold text-dark">Daftar Pasien</h5>
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCreate">
                                + Tambah Pasien
                            </button>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="medisTable" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Usia</th>
                                            <th>Kamar</th>
                                            <th>Medis</th>
                                            <th>Tanggal Masuk</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($pasiens as $index => $pasien)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $pasien->nama_lengkap }}</td>
                                                <td>{{ $pasien->usia }}</td>
                                                <td>{{ $pasien->kamar->nama_kamar ?? '-' }}</td>
                                                <td>{{ $pasien->tenagaMedis->nama_medis ?? '-' }}</td>
                                                <td>{{ $pasien->tanggal_masuk }}</td>
                                                <td>
                                                    <!-- Edit -->
                                                    <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#modalEdit{{ $pasien->id_pasien }}">Edit</button>

                                                    <!-- Hapus -->
                                                    <form action="{{ route('pasien.destroy', $pasien->id_pasien) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus data?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-danger btn-sm">Hapus</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="7" class="text-center">Belum ada data pasien.</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Tambah -->
        <div class="modal fade" id="modalCreate" tabindex="-1">
            <div class="modal-dialog">
                <form action="{{ route('pasien.store') }}" method="POST" class="modal-content">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Pasien</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        @include('medis.pasien-form', ['pasien' => null])
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Modal Edit -->
        @foreach($pasiens as $pasien)
            <div class="modal fade" id="modalEdit{{ $pasien->id_pasien }}" tabindex="-1">
                <div class="modal-dialog">
                    <form action="{{ route('pasien.update', $pasien->id_pasien) }}" method="POST" class="modal-content">
                        @csrf
                        @method('PUT')
                        <div class="modal-header">
                            <h5 class="modal-title">Edit Pasien</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            @include('medis.pasien-form', ['pasien' => $pasien])
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button class="btn btn-success">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        @endforeach
    @endsection
</x-main>
