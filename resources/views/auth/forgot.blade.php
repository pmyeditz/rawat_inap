<x-main>
    @section('login')
    <div class="login-container">
        <div class="login-card">
            <div class="login-header">
                <h3>Lupa Password</h3>
            </div>
            <div class="login-body">
                @if(session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @elseif(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('password.sendotp') }}">
                    @csrf
                    <div class="form-group">
                        <label for="login">Email atau Username</label>
                        <input type="text" placeholder="masukan Username atau Email" name="login" id="login" class="form-control" required>
                    </div>
                    <button type="submit" class="btn-login">Kirim OTP</button>
                </form>
            </div>
            <div class="login-footer mb-5">
                <a href="{{ route('login') }}" class="forgot-password">Kembali ke Login</a>
            </div>
        </div>
    </div>
    @endsection
</x-main>
