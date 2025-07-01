<x-main>
    @section('login')
        <div class="login-container">
            <div class="login-card">
                <div class="login-header">
                    <h3><i class="fas fa-hospital me-2"></i> LOGIN</h3>
                    <p class="mb-0">Sistem Pasien Rawat Inap</p>
                </div>

                @if ($errors->any())
                    <div class="alert alert-danger m-2">
                        {{ $errors->first() }}
                    </div>
                @endif

                <div class="login-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-text bg-transparent border-end-0">
                                    <i class="fas fa-user"></i>
                                </span>
                                <input type="text" name="login" class="form-control border-start-0" placeholder="Username / Email" required>
                            </div>
                        </div>

                        <div class="form-group position-relative">
                            <div class="input-group">
                                <span class="input-group-text bg-transparent border-end-0">
                                    <i class="fas fa-lock"></i>
                                </span>
                                <input type="password" id="password" name="password" class="form-control border-start-0" placeholder="Password" required>
                                <span class="input-group-text bg-transparent border-start-0" id="togglePassword" style="cursor: pointer;">
                                    <i class="fas fa-eye" id="eyeIcon"></i>
                                </span>
                            </div>
                        </div>

                        <div class="form-group form-check mb-4">
                            <input type="checkbox" class="form-check-input" name="remember">
                            <label class="form-check-label" for="rememberMe">Ingat saya</label>
                            <a href="forgot-password" class="forgot-password float-end">Lupa password?</a>
                        </div>

                        <button type="submit" class="btn btn-login mb-3">
                            <i class="fas fa-sign-in-alt me-2"></i> MASUK
                        </button>
                    </form>

                    <div class="login-footer">
                        <p>Tidak punya akun? <a href="#" class="text-primary">Hubungi admin</a></p>
                    </div>
                </div>
            </div>
        </div>

        {{-- Script toggle password --}}
        @push('scripts')
        <script>
            const togglePassword = document.getElementById('togglePassword');
            const password = document.getElementById('password');
            const eyeIcon = document.getElementById('eyeIcon');

            togglePassword.addEventListener('click', function () {
                const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
                password.setAttribute('type', type);
                eyeIcon.classList.toggle('fa-eye');
                eyeIcon.classList.toggle('fa-eye-slash');
            });
        </script>
        @endpush
    @endsection
</x-main>
