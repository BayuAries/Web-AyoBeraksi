<div id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block sidebar">
    <img src="/img/AyoBeraksi.svg" class="img-fluid" alt="">
    <div class="position-fixed pt-3">
        <ul class="nav flex-column mb-2">
            <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" aria-current="page" href="{{ route('dashboard') }}">
                <span data-feather="home"></span>
                Dashboard
            </a>
            </li>
            <li class="nav-item">
            <a class="nav-link {{ Request::is('role*') ? 'active' : '' }}" href="{{ route('role.index') }}" hidden>
                <span data-feather="users"></span>
                Role
            </a>
            </li>
        </ul>
        @if (in_array("Admin", Auth::user()->role->toArray()) || in_array("Ketua Tim Kepatuhan", Auth::user()->role->toArray()) || in_array("Kepala Balai", Auth::user()->role->toArray()))
            <ul class="nav flex-column mb-2">
                <button class="dropdown-btn {{ Request::is('laporan*') ? "active" : '' }} ml-3" type="button" data-toggle="dropdown" aria-expanded="false" id="navbarDropdown">Laporan <i class="fa fa-caret-down"></i></button>
                <div class="dropdown-container" style="{{ Request::is('laporan*') ? "display: block" : '' }}" id="container-laporan" aria-labelledby="navbarDropdown">
                    <a class="nav-link {{ Request::is('laporan/penyuapan*') ? 'active' : '' }}" href="{{ route('laporan.penyuapan.index') }}">
                        <span data-feather="file-text"></span>
                        Laporan Penyuapan
                    </a>
                    <a class="nav-link {{ Request::is('laporan/pengaduan*') ? 'active' : '' }}" href="{{ route('laporan.pengaduan.index') }}">
                        <span data-feather="file-text"></span>
                        Laporan Pengaduan
                    </a>
                    <a class="nav-link {{ Request::is('laporan/gratifikasi*') ? 'active' : '' }}" href="{{ route('laporan.gratifikasi.index') }}">
                        <span data-feather="file-text"></span>
                        Laporan Gratifikasi
                    </a>
                    <a class="nav-link {{ Request::is('feedback*') ? 'active' : '' }}" href="{{ route('feedback.index') }}" hidden>
                        <span data-feather="message-square"></span>
                        Feedback
                    </a>
                </div>
            </ul>
        @endif

        {{-- Monitoring Analisis Kepala Balai --}}
        @if (in_array("Admin", Auth::user()->role->toArray()) || in_array("Kepala Balai", Auth::user()->role->toArray()) || in_array("Ketua Tim Kepatuhan", Auth::user()->role->toArray()))
            <ul class="nav flex-column mb-2">
                <button class="dropdown-btn {{ Request::is('analisis*') || Request::is('klasifikasi*') ? "active" : '' }} ml-3 " type="button" data-toggle="dropdown" aria-expanded="false" id="navbarDropdown">Analisis dan Klasifikasi<i class="fa fa-caret-down"></i></button>
                <div class="dropdown-container" style="{{ Request::is('analisis*') || Request::is('klasifikasi*') ? "display: block" : '' }}" aria-labelledby="navbarDropdown">
                    <a class="nav-link {{ Request::is('analisis/penyuapan*') ? 'active' : '' }}" href="{{ route('analisisLaporan.penyuapan.view') }}">
                        <span data-feather="file-text"></span>
                        Analisis Penyuapan
                    </a>
                    <a class="nav-link {{ Request::is('klasifikasi/pengaduan*') ? 'active' : '' }}" href="{{ route('klasifikasi.pengaduan.view') }}">
                        <span data-feather="file-text"></span>
                        Klasifikasi Pengaduan
                    </a>
                    <a class="nav-link {{ Request::is('analisis/gratifikasi*') ? 'active' : '' }}" href="{{ route('analisisLaporan.gratifikasi.view') }}">
                        <span data-feather="file-text"></span>
                        Analisis Gratifikasi
                    </a>
                </div>
            </ul>
        @endif

        {{-- Analisis Tim Kepatuhan --}}
        @if (in_array("Tim Kepatuhan", Auth::user()->role->toArray()))
            <ul class="nav flex-column mb-2">
                <button class="dropdown-btn {{ Request::is('analisis*') || Request::is('klasifikasi*') ? "active" : '' }} ml-3 " type="button" data-toggle="dropdown" aria-expanded="false" id="navbarDropdown">Penugasan<i class="fa fa-caret-down"></i></button>
                <div class="dropdown-container" style="{{ Request::is('analisis*') || Request::is('klasifikasi*') ? "display: block" : '' }}" aria-labelledby="navbarDropdown">
                    <a class="nav-link {{ Request::is('analisis/penyuapan*') ? 'active' : '' }}" href="{{ route('analisisLaporan.penyuapan.index') }}">
                        <span data-feather="file-text"></span>
                        Analisis Penyuapan
                    </a>
                    <a class="nav-link {{ Request::is('klasifikasi/pengaduan*') ? 'active' : '' }}" href="{{ route('klasifikasi.pengaduan.index') }}">
                        <span data-feather="file-text"></span>
                        Klasifikasi Pengaduan
                    </a>
                    <a class="nav-link {{ Request::is('analisis/gratifikasi*') ? 'active' : '' }}" href="{{ route('analisisLaporan.gratifikasi.index') }}">
                        <span data-feather="file-text"></span>
                        Analisis Gratifikasi
                    </a>
                </div>
            </ul>
        @endif

        {{-- Monitoring Logbook Kepala Balai --}}
        @if (in_array("Admin", Auth::user()->role->toArray()) || in_array("Kepala Balai", Auth::user()->role->toArray()) || in_array("Ketua Tim Kepatuhan", Auth::user()->role->toArray()))
            <ul class="nav flex-column mb-2">
                <button class="dropdown-btn {{ Request::is('logbook*') ? "active" : '' }} ml-3" type="button" data-toggle="dropdown" aria-expanded="false" id="navbarDropdown">Logbook<i class="fa fa-caret-down"></i></button>
                <div class="dropdown-container" style="{{ Request::is('logbook*') ? "display: block" : 'active' }}" aria-labelledby="navbarDropdown">
                    <a class="nav-link {{ Request::is('logbook/penyuapan*') ? 'active' : '' }}" href="{{ route('logbook.penyuapan.view') }}">
                        <span data-feather="book-open"></span>
                        Logbook Penyuapan
                    </a>
                    <a class="nav-link {{ Request::is('logbook/gratifikasi*') ? 'active' : '' }}" href="{{ route('logbook.gratifikasi.view') }}">
                        <span data-feather="book-open"></span>
                        Logbook Gratifikasi
                    </a>
                </div>
            </ul>
        @endif

        {{-- Logbook Tim Kepatuhan --}}
        @if (in_array("Tim Kepatuhan", Auth::user()->role->toArray()))
            <ul class="nav flex-column mb-2">
                <button class="dropdown-btn {{ Request::is('logbook*') ? "active" : '' }} ml-3" type="button" data-toggle="dropdown" aria-expanded="false" id="navbarDropdown">Logbook<i class="fa fa-caret-down"></i></button>
                <div class="dropdown-container" style="{{ Request::is('logbook*') ? "display: block" : 'active' }}" aria-labelledby="navbarDropdown">
                    <a class="nav-link {{ Request::is('logbook/penyuapan*') ? 'active' : '' }}" href="{{ route('logbook.penyuapan.index') }}">
                        <span data-feather="book-open"></span>
                        Logbook Penyuapan
                    </a>
                    <a class="nav-link {{ Request::is('logbook/gratifikasi*') ? 'active' : '' }}" href="{{ route('logbook.gratifikasi.index') }}">
                        <span data-feather="book-open"></span>
                        Logbook Gratifikasi
                    </a>
                </div>
            </ul>
        @endif
    </div>
</div>

<script>
var dropdown = document.getElementsByClassName("dropdown-btn");
var i;

    for (i = 0; i < dropdown.length; i++) {
        dropdown[i].addEventListener("click", function() {
        this.classList.toggle("active");
        var dropdownContent = this.nextElementSibling;
        if (dropdownContent.style.display === "block") {
            dropdownContent.style.display = "none";
        } else {
            dropdownContent.style.display = "block";
        }
    });
    }

</script>
