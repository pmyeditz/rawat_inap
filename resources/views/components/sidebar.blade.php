@php
    function isActive($routeName) {
        return request()->routeIs($routeName) ? 'active' : '';
    }
@endphp

<div class="col-lg-3 mb-4">
    <div class="sidebar-custom">
        <div class="sidebar-header">
            <h5 class="mb-0"><i class="fas fa-bars me-2"></i> Menu</h5>
        </div>
        <ul class="sidebar-menu list-unstyled">

            <li>
                <a href="{{ url('/dashboard') }}" class="{{ request()->is('dashboard') ? 'active' : '' }}">
                    <i class="fas fa-tachometer-alt me-2"></i> Dashboard
                </a>
            </li>

            <li>
                <a href="{{ route('pasien.index') }}" class="{{ isActive('pasien.*') }}">
                    <i class="fas fa-user-injured me-2"></i> Pasien
                </a>
            </li>

            <li>
                <a href="{{ route('jadwal.index') }}" class="{{ isActive('jadwal.*') }}">
                    <i class="fas fa-calendar-alt me-2"></i> Jadwal Medis
                </a>
            </li>

            <li>
                <a href="{{ route('medis.index') }}" class="{{ isActive('medis.*') }}">
                    <i class="fas fa-users me-2"></i> Tim Medis
                </a>
            </li>

            <li>
                <a href="{{ route('kamar.index') }}" class="{{ isActive('kamar.*') }}">
                    <i class="fas fa-bed me-2"></i> Kamar
                </a>
            </li>

            <li>
                <a href="{{ route('profile') }}" class="{{ request()->routeIs('profile') ? 'active' : '' }}">
                    <i class="fas fa-cog me-2"></i> Pengaturan
                </a>
            </li>

            <li>
                <a href="{{ route('logout') }}">
                    <i class="fas fa-sign-out-alt me-2"></i> Logout
                </a>
            </li>

        </ul>
    </div>
</div>
