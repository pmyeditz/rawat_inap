<div class="row">
    <div class="col-md-6 mb-4">
        <label class="form-label">Nama Lengkap</label>
        <input type="text" name="nama_medis" class="form-control @error('nama_medis') is-invalid @enderror"
               value="{{ old('nama_medis', $editData->nama_medis ?? '') }}" required>
        @error('nama_medis')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-3 mb-4">
        <label class="form-label">Jenis Kelamin</label>
        <select name="jenis_kelamin" class="form-control @error('jenis_kelamin') is-invalid @enderror" required>
            <option value="">-- Pilih --</option>
            <option value="L" {{ old('jenis_kelamin', $editData->jenis_kelamin ?? '') == 'L' ? 'selected' : '' }}>Laki-laki</option>
            <option value="P" {{ old('jenis_kelamin', $editData->jenis_kelamin ?? '') == 'P' ? 'selected' : '' }}>Perempuan</option>
        </select>
        @error('jenis_kelamin')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-3 mb-4">
        <label class="form-label">Jenis Medis</label>
        <select name="jenis_medis" class="form-control @error('jenis_medis') is-invalid @enderror" required>
            <option value="">-- Pilih --</option>
            <option value="Dokter" {{ old('jenis_medis', $editData->jenis_medis ?? '') == 'Dokter' ? 'selected' : '' }}>Dokter</option>
            <option value="Bidan" {{ old('jenis_medis', $editData->jenis_medis ?? '') == 'Bidan' ? 'selected' : '' }}>Bidan</option>
        </select>
        @error('jenis_medis')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-6 mb-4">
        <label class="form-label">Spesialisasi</label>
        <input type="text" name="spesialisasi" class="form-control @error('spesialisasi') is-invalid @enderror"
               value="{{ old('spesialisasi', $editData->spesialisasi ?? '') }}">
        @error('spesialisasi')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-6 mb-4">
        <label class="form-label">No Telepon</label>
        <input type="text" name="no_telp" class="form-control @error('no_telp') is-invalid @enderror"
               value="{{ old('no_telp', $editData->no_telp ?? '') }}">
        @error('no_telp')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-6 mb-4">
        <label class="form-label">Username</label>
        <input type="text" name="username" class="form-control @error('username') is-invalid @enderror"
               value="{{ old('username', $editData->username ?? '') }}" required>
        @error('username')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-6 mb-4">
        <label class="form-label">Email</label>
        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
               value="{{ old('email', $editData->email ?? '') }}" required>
        @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-6 mb-4">
        <label class="form-label">Password {{ isset($editData) ? '(Kosongkan jika tidak diubah)' : '' }}</label>
        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
               {{ isset($editData) ? '' : 'required' }}>
        @error('password')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-6 mb-4">
        <label class="form-label">Foto</label>
        <input type="file" name="poto" class="form-control @error('poto') is-invalid @enderror">
        @if(isset($editData) && $editData->poto)
            <div class="mt-2">
                <img src="{{ asset($editData->poto) }}" width="80" style="border-radius: 10px; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
            </div>
        @endif
        @error('poto')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>
