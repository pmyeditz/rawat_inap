<x-main>
    @section('login')
    <div class="login-container">
        <div class="login-card">
            <div class="login-header">
                <h3>Reset Password</h3>
            </div>
            <div class="login-body">
                @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('password.reset') }}">
                    @csrf

                    <div class="form-group">
                        <label for="password">Password Baru</label>
                        <input type="password" name="password" id="password" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="password_confirmation">Konfirmasi Password</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
                    </div>

                    <button type="submit" class="btn-login">Simpan Password</button>
                </form>
            </div>
            <div class="login-footer mb-5">
                <a href="{{ route('login') }}" class="forgot-password">Kembali ke Login</a>
            </div>
        </div>
    </div>
    @endsection
</x-main>
