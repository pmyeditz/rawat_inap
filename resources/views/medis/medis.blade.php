<x-main>
    @section('main')
        <x-navbar />
        <div class="container my-4">
            <div class="row">
                {{-- Sidebar --}}
                    <x-sidebar />

                {{-- Konten utama --}}
                <div class="col-md-9">
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif



                    {{-- Tabel --}}
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="mb-0 fw-bold" style="color: var(--dark-accent);">Daftar Tenaga Medis</h5>

                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTambah">
                                <i class="fas fa-plus me-1"></i> Tambah
                            </button>
                        </div>

                        <div class="card-body table-responsive">
                            <div class="table-responsive">
                                <table id="medisTable" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>JK</th>
                                            <th>Jenis</th>
                                            <th>Spesialisasi</th>
                                            <th>No Telp</th>
                                            <th>Username</th>
                                            <th>Email</th>
                                            <th>Foto</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($data as $medis)
                                        <tr>
                                            <td>{{ $medis->nama_medis }}</td>
                                            <td>{{ $medis->jenis_kelamin }}</td>
                                            <td>{{ $medis->jenis_medis }}</td>
                                            <td>{{ $medis->spesialisasi }}</td>
                                            <td>{{ $medis->no_telp }}</td>
                                            <td>{{ $medis->username }}</td>
                                            <td>{{ $medis->email }}</td>
                                            <td>
                                                @if($medis->poto)
                                                    <img src="{{ asset($medis->poto) }}" width="50">
                                                @else
                                                    Tidak ada
                                                @endif
                                            </td>
                                            <td>
                                                <button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#modalEdit{{ $medis->id_medis }}">Edit</button>
                                                <form action="{{ route('medis.destroy', $medis->id_medis) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-sm btn-danger">Hapus</button>
                                                </form>
                                            </td>
                                        </tr>

                                        {{-- Modal Edit --}}
                                        <div class="modal fade" id="modalEdit{{ $medis->id_medis }}" tabindex="-1">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Edit Tenaga Medis</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                    </div>
                                                    <form action="{{ route('medis.update', $medis->id_medis) }}" method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="modal-body">
                                                            @include('medis.form', ['editData' => $medis])
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-primary">Update</button>
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        @empty
                                        <tr>
                                            <td colspan="9" class="text-center">Belum ada data.</td>
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


        {{-- Modal Tambah --}}
        <div class="modal fade" id="modalTambah" tabindex="-1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Tenaga Medis</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <form action="{{ route('medis.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            @include('medis.form')
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        {{-- Script buka modal otomatis saat error --}}
        @if ($errors->any())
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                var modalTambah = new bootstrap.Modal(document.getElementById('modalTambah'));
                modalTambah.show();
            });
        </script>
        @endif
    @endsection
</x-main>
