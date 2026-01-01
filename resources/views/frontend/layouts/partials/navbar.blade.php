<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bold d-flex align-items-center" href="/">
            <i class="bi bi-app-indicator me-2 fs-4"></i> Laravel
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMain"
            aria-controls="navbarMain" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="navbarMain">
            <ul class="navbar-nav">
                @guest
                <!-- Saat belum login -->
                <li class="nav-item">
                    <a class="nav-link fw-semibold" href="{{ route('login') }}">
                        <i class="bi bi-box-arrow-in-right me-1"></i> Login
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-semibold" href="{{ route('register') }}">
                        <i class="bi bi-person-plus-fill me-1"></i> Register
                    </a>
                </li>
                @endguest

                @auth
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle d-flex align-items-center gap-2 px-2"
                        href="#" id="userDropdown" role="button"
                        data-bs-toggle="dropdown" data-bs-display="static" data-bs-offset="10,8"
                        aria-expanded="false">
                        {{-- Avatar kecil (ikon) --}}
                        <span class="rounded-circle bg-light d-inline-flex align-items-center justify-content-center"
                            style="width:28px;height:28px;">
                            <i class="bi bi-person-fill text-secondary" style="font-size:16px;"></i>
                        </span>
                        {{-- Nama (truncate di layar kecil) --}}
                        <span class="fw-semibold d-none d-sm-inline text-truncate" style="max-width:140px;">
                            {{ Auth::user()->name }}
                        </span>
                    </a>

                    <ul class="dropdown-menu dropdown-menu-end shadow border-0 rounded-4 p-2"
                        aria-labelledby="userDropdown" style="min-width: 260px;">
                        {{-- Header user --}}
                        <li class="px-2 py-2">
                            <div class="d-flex align-items-center">
                                <span class="rounded-circle bg-primary bg-gradient text-white d-inline-flex align-items-center justify-content-center me-2"
                                    style="width:40px;height:40px;">
                                    <i class="bi bi-person-fill" style="font-size:20px;"></i>
                                </span>
                                <div class="min-w-0">
                                    <div class="fw-semibold text-truncate">{{ Auth::user()->name }}</div>
                                    <div class="text-muted small text-truncate">
                                        {{ Auth::user()->email ?? '—' }}
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        {{-- Logout (tetap form POST) --}}
                        <li>
                            <form action="{{ route('logout') }}" method="POST" class="m-0">
                                @csrf
                                <button type="submit" class="dropdown-item d-flex align-items-center gap-2 text-danger">
                                    <i class="bi bi-box-arrow-right"></i>
                                    <span>Logout</span>
                                </button>
                            </form>
                        </li>
                    </ul>
                </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>