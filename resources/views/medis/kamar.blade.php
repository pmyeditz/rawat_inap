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

                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="mb-0 fw-bold text-dark">Daftar Kamar</h5>
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCreate">
                                + Tambah Kamar
                            </button>
                        </div>
                        <div class="card-body table-responsive">
                            <div class="table-responsive">
                                <table id="medisTable" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Kamar</th>
                                            <th>Kelas</th>
                                            <th>Kapasitas</th>
                                            <th>Tersedia</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($kamars as $index => $kamar)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $kamar->nama_kamar }}</td>
                                                <td>{{ $kamar->kelas }}</td>
                                                <td>{{ $kamar->kapasitas }}</td>
                                                <td>{{ $kamar->tersedia }}</td>
                                                <td>
                                                    <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#modalEdit{{ $kamar->id_kamar }}">
                                                        Edit
                                                    </button>

                                                    <form action="{{ route('kamar.destroy', $kamar->id_kamar) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-danger btn-sm">Hapus</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="6" class="text-center">Belum ada data kamar.</td>
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
                <form action="{{ route('kamar.store') }}" method="POST" class="modal-content">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Kamar</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        @if ($errors->any() && session('from') == 'create')
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="mb-3">
                            <label>Nama Kamar</label>
                            <input type="text" name="nama_kamar" class="form-control" value="{{ old('nama_kamar') }}" required>
                        </div>
                        <div class="mb-3">
                            <label>Kelas</label>
                            <input type="text" name="kelas" class="form-control" value="{{ old('kelas') }}" required>
                        </div>
                        <div class="mb-3">
                            <label>Kapasitas</label>
                            <input type="number" name="kapasitas" class="form-control" value="{{ old('kapasitas') }}" required>
                        </div>
                        <div class="mb-3">
                            <label>Tersedia</label>
                            <input type="number" name="tersedia" class="form-control" value="{{ old('tersedia') }}" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Modal Edit (diluar tabel) -->
        @foreach($kamars as $kamar)
            <div class="modal fade" id="modalEdit{{ $kamar->id_kamar }}" tabindex="-1">
                <div class="modal-dialog">
                    <form action="{{ route('kamar.update', $kamar->id_kamar) }}" method="POST" class="modal-content">
                        @csrf
                        @method('PUT')
                        <div class="modal-header">
                            <h5 class="modal-title">Edit Kamar</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label>Nama Kamar</label>
                                <input type="text" name="nama_kamar" class="form-control" value="{{ old('nama_kamar', $kamar->nama_kamar) }}" required>
                            </div>
                            <div class="mb-3">
                                <label>Kelas</label>
                                <input type="text" name="kelas" class="form-control" value="{{ old('kelas', $kamar->kelas) }}" required>
                            </div>
                            <div class="mb-3">
                                <label>Kapasitas</label>
                                <input type="number" name="kapasitas" class="form-control" value="{{ old('kapasitas', $kamar->kapasitas) }}" required>
                            </div>
                            <div class="mb-3">
                                <label>Tersedia</label>
                                <input type="number" name="tersedia" class="form-control" value="{{ old('tersedia', $kamar->tersedia) }}" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button class="btn btn-success">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        @endforeach

        @push('scripts')
        <script>
            @if ($errors->any() && session('from') == 'create')
                var modalCreate = new bootstrap.Modal(document.getElementById('modalCreate'));
                modalCreate.show();
            @endif
        </script>
        @endpush
    @endsection
    </x-main>
