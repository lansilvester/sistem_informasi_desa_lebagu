<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="/" target="_blank">
            Desa Lebagu
        </a>
        <ul class="sidebar-nav">
            <li class="sidebar-header">
                Halaman
            </li>

            <li class="sidebar-item {{ Request::is('dashboard') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('dashboard') }}">
                    <i class="align-middle" data-feather="sliders"></i> <span
                        class="align-middle">Dashboard</span>
                </a>
            </li>
            @if(Auth::user()->role !== 'masyarakat')
            <li class="sidebar-item {{ Request::is('penduduk*') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('penduduk.index') }}">
                    <i class="align-middle" data-feather="users"></i> <span
                        class="align-middle">Kependudukan</span>
                </a>
            </li>
            <li class="sidebar-item {{ Request::is('kegiatan*') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('kegiatan.index') }}">
                    <i class="align-middle" data-feather="check"></i> <span
                        class="align-middle">Kegiatan Desa</span>
                </a>
            </li>
            <li class="sidebar-item {{ Request::is('pengajuan_penduduk*') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('pengajuan_penduduk.index') }}">
                    <i class="align-middle" data-feather="check"></i> <span
                        class="align-middle">Pengajuan Penduduk</span>
                </a>
            </li>
            <li class="sidebar-item {{ Request::is('surat_kematian*') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('surat_kematian.index') }}">
                    <i class="align-middle" data-feather="check"></i> <span
                        class="align-middle">Surat Kematian</span>
                </a>
            </li>
            <li class="sidebar-item {{ Request::is('surat_kelahiran*') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('surat_kelahiran.index') }}">
                    <i class="align-middle" data-feather="check"></i> <span
                        class="align-middle">Surat Kelahiran</span>
                </a>
            </li>
        
            @endif
    </div>
</nav>