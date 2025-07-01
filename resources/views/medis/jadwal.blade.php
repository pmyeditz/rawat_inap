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
                            <h5 class="mb-0 fw-bold" style="color: var(--dark-accent);">Daftar Jadwal Medis</h5>

                            <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#modalCreate">
                                + Tambah Jadwal
                            </button>
                        </div>

                        <div class="card-body table-responsive">
                            <div class="table-responsive">
                                <table id="medisTable" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Medis</th>
                                            <th>Hari</th>
                                            <th>Jam</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($jadwal as $index => $item)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $item->tenagaMedis->nama_medis }}</td>
                                            <td>{{ $item->hari }}</td>
                                            <td>{{ $item->jam_mulai }} - {{ $item->jam_selesai }}</td>
                                            <td>
                                                <button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#modalEdit{{ $item->id_jadwal }}">
                                                    Edit
                                                </button>
                                                <form action="{{ route('jadwal.destroy', $item->id_jadwal) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus data?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-sm btn-danger">Hapus</button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- Modal Edit (PINDAH KE SINI) -->
                    @foreach($jadwal as $item)
                    <div class="modal fade" id="modalEdit{{ $item->id_jadwal }}" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog">
                            <form action="{{ route('jadwal.update', $item->id_jadwal) }}" method="POST" class="modal-content">
                                @csrf
                                @method('PUT')
                                <div class="modal-header">
                                    <h5 class="modal-title">Edit Jadwal</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label>Tenaga Medis</label>
                                        <select name="id_medis" class="form-control" required>
                                            @foreach($tenagaMedis as $medis)
                                                <option value="{{ $medis->id_medis }}" {{ $medis->id_medis == $item->id_medis ? 'selected' : '' }}>
                                                    {{ $medis->nama_medis }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label>Hari</label>
                                        <input type="text" name="hari" value="{{ $item->hari }}" class="form-control" required>
                                    </div>
                                    <div class="mb-3">
                                        <label>Jam Mulai</label>
                                        <input type="time" name="jam_mulai" value="{{ $item->jam_mulai }}" class="form-control" required>
                                    </div>
                                    <div class="mb-3">
                                        <label>Jam Selesai</label>
                                        <input type="time" name="jam_selesai" value="{{ $item->jam_selesai }}" class="form-control" required>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                    <button class="btn btn-success">Simpan Perubahan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    @endforeach


                    <!-- Modal Tambah -->
                    <div class="modal fade" id="modalCreate" tabindex="-1">
                        <div class="modal-dialog">
                            <form action="{{ route('jadwal.store') }}" method="POST" class="modal-content">
                                @csrf
                                <div class="modal-header">
                                    <h5 class="modal-title">Tambah Jadwal</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body">
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul class="mb-0">
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif

                                    <div class="mb-3">
                                        <label>Tenaga Medis</label>
                                        <select name="id_medis" class="form-control" required>
                                            @foreach($tenagaMedis as $medis)
                                                <option value="{{ $medis->id_medis }}" {{ old('id_medis') == $medis->id_medis ? 'selected' : '' }}>
                                                    {{ $medis->nama_medis }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label>Hari</label>
                                        <input type="text" name="hari" value="{{ old('hari') }}" class="form-control" placeholder="contoh: Senin-Jumat" required>
                                    </div>
                                    <div class="mb-3">
                                        <label>Jam Mulai</label>
                                        <input type="time" name="jam_mulai" value="{{ old('jam_mulai') }}" class="form-control" step="60" required>
                                    </div>
                                    <div class="mb-3">
                                        <label>Jam Selesai</label>
                                        <input type="time" name="jam_selesai" value="{{ old('jam_selesai') }}" class="form-control" step="60" required>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                    <button class="btn btn-primary">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    @push('scripts')
                        <script>
                            @if ($errors->any())
                                new bootstrap.Modal(document.getElementById('modalCreate')).show();
                            @endif
                        </script>
                    @endpush
                </div>
            </div>
        </div>
    @endsection
</x-main>
