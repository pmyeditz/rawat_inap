<nav class="navbar navbar-expand-lg navbar-dark navbar-custom">
    <div class="container">
        <a class="navbar-brand" href="">
            <i class="fas fa-hospital me-2"></i>
            Ztrix<span style="font-weight: 300">Dev</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">

                {{-- <!-- Dashboard -->
                <li class="nav-item">
                    <a class="nav-link" href="">
                        <i class="fas fa-home me-1"></i> Dashboard
                    </a>
                </li>

                <!-- Data Pasien -->
                <li class="nav-item">
                    <a class="nav-link" href="">
                        <i class="fas fa-user-injured me-1"></i> Pasien
                    </a>
                </li> --}}

                <!-- Rekam Medis -->
                {{-- <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="rekamDropdown" role="button"
                       data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-file-medical me-1"></i> Rekam Medis
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="rekamDropdown">
                        <li><a class="dropdown-item" href="">
                            <i class="fas fa-user-md me-2"></i> Tenaga Medis</a></li>
                        <li><a class="dropdown-item" href="">
                            <i class="fas fa-calendar-alt me-2"></i> Jadwal Medis</a></li>
                    </ul>
                </li> --}}

                <!-- Kamar -->
                {{-- <li class="nav-item">
                    <a class="nav-link" href="">
                        <i class="fas fa-bed me-1"></i> Kamar
                    </a>
                </li> --}}

                <!-- Hubungi Kami -->
                <li class="nav-item">
                    <a class="nav-link" href="">
                        <i class="fas fa-envelope me-1"></i> Hubungi Kami
                    </a>
                </li>

                <!-- Akun -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-user me-1"></i> {{ session('user_name', 'Akun') }}
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#">
                            <i class="fas fa-user-circle me-2"></i> Profil</a></li>
                        <li><a class="dropdown-item" href="#">
                            <i class="fas fa-cog me-2"></i> Pengaturan</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="{{ route('logout') }}">
                            <i class="fas fa-sign-out-alt me-2"></i> Keluar</a></li>
                    </ul>
                </li>


                <!-- Toggle Mode Gelap -->
                <li class="nav-item">
                    <button class="btn btn-outline-light" id="theme-toggle">
                        <i class="fas fa-adjust"></i> Mode Gelap
                    </button>
                </li>
            </ul>
        </div>
    </div>
</nav>
