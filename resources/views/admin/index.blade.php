<x-main>
    @section('main')
        <x-navbar></x-navbar>
        <div class="container my-4">
            <div class="row">
                <x-sidebar></x-sidebar>

                <div class="col-lg-9">
                    <!-- Stats Cards -->
                    <div class="row mb-4">
                        <x-dashboard-card icon="fa-user-injured" count="{{ $totalPasien }}" label="Total Pasien"/>
                        <x-dashboard-card icon="fa-hospital" count="{{ $kamarTersedia }}" label="Kamar Tersedia"/>
                        <x-dashboard-card icon="fa-calendar-check" count="{{ $janjiHariIni }}" label="Janji Temu Hari Ini"/>
                        <x-dashboard-card icon="fa-user-md" count="{{ $dokterAktif }}" label="Dokter Aktif"/>
                    </div>

                    <!-- Recent Patients -->
                    <div class="main-content mb-4">
                        <h4><i class="fas fa-users me-2 text-primary"></i> Pasien Terbaru</h4>
                        <div class="table-responsive">
                            <table class="table table-hover mt-3">
                                <thead class="table-light">
                                    <tr>
                                        <th>Nama</th>
                                        <th>Usia</th>
                                        <th>Diagnosa</th>
                                        <th>Kamar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($recentPasiens as $pasien)
                                        <tr>
                                            <td>{{ $pasien->nama_lengkap }}</td>
                                            <td>{{ $pasien->usia }}</td>
                                            <td>{{ $pasien->jenis_penyakit ?? '-' }}</td>
                                            <td>{{ $pasien->kamar->nama_kamar ?? '-' }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="text-center">Tidak ada data.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <x-footer></x-footer>
            </div>
        </div>
    @endsection
</x-main>
