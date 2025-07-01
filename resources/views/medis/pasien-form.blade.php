@php use Carbon\Carbon; @endphp

<div class="row g-3">

    <div class="col-md-6">
        <label class="form-label fw-semibold">Nama Lengkap <span class="text-danger">*</span></label>
        <input type="text" name="nama_lengkap" class="form-control" placeholder="Masukkan nama lengkap" value="{{ old('nama_lengkap', $pasien->nama_lengkap ?? '') }}" required>
    </div>

    <div class="col-md-6">
        <label class="form-label fw-semibold">No Telepon</label>
        <input type="text" name="no_telp" class="form-control" placeholder="08xxxx" value="{{ old('no_telp', $pasien->no_telp ?? '') }}">
    </div>

    <div class="col-12">
        <label class="form-label fw-semibold">Alamat <span class="text-danger">*</span></label>
        <textarea name="alamat" class="form-control" rows="2" placeholder="Alamat lengkap" required>{{ old('alamat', $pasien->alamat ?? '') }}</textarea>
    </div>

    <div class="col-md-4">
        <label class="form-label fw-semibold">Usia <span class="text-danger">*</span></label>
        <input type="number" name="usia" class="form-control" placeholder="Usia pasien" value="{{ old('usia', $pasien->usia ?? '') }}" required>
    </div>

    <div class="col-md-8">
        <label class="form-label fw-semibold">Jenis Penyakit</label>
        <textarea name="jenis_penyakit" class="form-control" rows="2" placeholder="Contoh: Demam, Covid, DBD">{{ old('jenis_penyakit', $pasien->jenis_penyakit ?? '') }}</textarea>
    </div>

    <div class="col-md-6">
        <label class="form-label fw-semibold">Kamar</label>
        <select name="id_kamar" class="form-select">
            <option value="">-- Pilih Kamar --</option>
            @foreach(\App\Models\Kamar::all() as $kamar)
                <option value="{{ $kamar->id_kamar }}" {{ old('id_kamar', $pasien->id_kamar ?? '') == $kamar->id_kamar ? 'selected' : '' }}>
                    {{ $kamar->nama_kamar }} ({{ $kamar->kelas }})
                </option>
            @endforeach
        </select>
    </div>

    <div class="col-md-6">
        <label class="form-label fw-semibold">Tenaga Medis</label>
        <select name="id_medis" class="form-select">
            <option value="">-- Pilih Medis --</option>
            @foreach(\App\Models\TenagaMedis::all() as $medis)
                <option value="{{ $medis->id_medis }}" {{ old('id_medis', $pasien->id_medis ?? '') == $medis->id_medis ? 'selected' : '' }}>
                    {{ $medis->nama_medis }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="col-md-6">
        <label class="form-label fw-semibold">Tanggal Masuk <span class="text-danger">*</span></label>
        <input type="date" name="tanggal_masuk" class="form-control" value="{{ old('tanggal_masuk', $pasien->tanggal_masuk ?? now()->toDateString()) }}" required>
    </div>

</div>
