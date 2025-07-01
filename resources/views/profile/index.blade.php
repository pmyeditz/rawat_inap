<x-main>
    @section('main')
        <x-navbar />

        <div class="container my-5">
            <div class="row">
                <x-sidebar />

                <div class="col-md-9">
                    <div class="profile-glass p-4 rounded position-relative">
                        {{-- Header Profil --}}
                        <div class="text-center mb-4">
                            <h2 class="fw-bold text-gradient">🩺 Profil Pengguna</h2>
                        </div>

                        {{-- Avatar --}}
                        @if ($loginType === 'medis' && $user->poto)
                            <div class="d-flex justify-content-center mb-4">
                                <div class="avatar-ring">
                                    <img src="{{ asset($user->poto) }}" alt="Foto Profil"
                                        class="profile-avatar img-thumbnail">
                                </div>
                            </div>
                        @endif

                        {{-- Biodata --}}
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">Nama Lengkap</label>
                                <div class="profile-field">
                                    {{ $loginType === 'admin' ? $user->nama_lengkap : $user->nama_medis }}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Email</label>
                                <div class="profile-field">{{ $user->email }}</div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Username</label>
                                <div class="profile-field">{{ $user->username }}</div>
                            </div>

                            @if ($loginType === 'medis')
                                <div class="col-md-6">
                                    <label class="form-label">Jenis Kelamin</label>
                                    <div class="profile-field">{{ $user->jenis_kelamin === 'L' ? 'Laki-laki' : 'Perempuan' }}</div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Jenis Medis</label>
                                    <div class="profile-field">{{ $user->jenis_medis }}</div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Spesialisasi</label>
                                    <div class="profile-field">{{ $user->spesialisasi ?? '-' }}</div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">No Telepon</label>
                                    <div class="profile-field">{{ $user->no_telp ?? '-' }}</div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
</x-main>
