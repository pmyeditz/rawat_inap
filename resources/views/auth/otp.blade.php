<x-main>
    @section('login')
    <div class="login-container">
        <div class="login-card">
            <div class="login-header">
                <h3>Verifikasi OTP</h3>
            </div>
            <div class="login-body">
                @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('password.verifyotp') }}">
                    @csrf
                    <div class="form-group">
                        <label for="otp">Kode OTP</label>
                        <input type="text" name="otp" id="otp" class="form-control" required>
                    </div>
                    <button type="submit" class="btn-login">Verifikasi</button>
                </form>
            </div>
            <div class="login-footer mb-5">
                <a href="{{ route('password.request') }}" class="forgot-password">Kirim ulang OTP?</a>
            </div>
        </div>
    </div>
    @endsection
</x-main>

