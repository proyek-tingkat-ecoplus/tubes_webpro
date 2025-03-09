<nav class="navbar navbar-expand-lg fixed-top navbar-light bg-light m-5  shadow-lg">
    <div class="container-fluid">
        <a class="navbar-brand m-md-3 " href="#">EchoPulse</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            {{-- Nav item --}}
            <ul class="navbar-nav text-center me-auto ms-auto mb-2 mb-lg-0">
                <li class="nav-item ">
                    <a class="nav-link @if(Request::is('/')) active @endif" href="/">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @if (Request::is('informasi')) active @endif" href="/informasi">Informasi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @if (Request::is('forum')) active @endif" href="/forum">Forum</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @if (Request::is('profile')) active @endif" href="/profile">Profile Dinas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @if (Request::is('kontak')) active @endif" href="/kontak">Hubungi Kami</a>
                </li>
            </ul>
            <div class="avatars">

            </div>
        </div>
    </div>
</nav>
