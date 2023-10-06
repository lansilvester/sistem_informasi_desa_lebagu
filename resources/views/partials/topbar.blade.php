<nav class="navbar navbar-expand navbar-light navbar-bg">
 
    <div class="navbar-collapse collapse">
        <ul class="navbar-nav navbar-align">
            <li class="nav-item dropdown">
                <a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#"
                    data-bs-toggle="dropdown">
                    <i class="align-middle"></i>
                </a>

                <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#"
                    data-bs-toggle="dropdown">
                    <i data-feather="user"></i> {{ Auth::user()->nama }}
                </a>
                <div class="dropdown-menu dropdown-menu-end">

                    {{-- <a class="dropdown-item" href="{{ route('penduduk.edit_password', Auth::user()->id) }}" >
                        <i class="bi bi-key"></i> Ubah Password
                    </a> --}}
                    <a class="dropdown-item">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="dropdown-item">
                                <i class="bi bi-arrow-left-square"></i> Logout
                            </button>
                        </form>
                    </a>

                </div>
            </li>
        </ul>
    </div>
</nav>