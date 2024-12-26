<section class="navbar-area rounded-circle">
    <div class="">
        <nav class="navbar1 navbar-expand-lg navbar-light bg-light mx-auto">
            <div class="row justify-content-center">
                <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12" >
                    <img src="{{asset('asset/image/fixbgt.png')}}" alt="Logo" class="navbar-image">
                </div>
                <div class="col-xl-2 col-lg-3 col-md-3 col-sm-5" style="background: #003030;">
                    <p class="navbar-text">
                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor"
                            class="bi bi-telephone-fill me-2" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z" />
                        </svg> 022-6631883</p>
                </div>
                <div class="col-xl-6 col-lg-5 col-md-5 col-sm-7" style="background: #003030;">
                    <p class="navbar-text">
                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor"
                            class="bi bi-envelope-fill me-2" viewBox="0 0 16 16">
                            <path
                                d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555ZM0 4.697v7.104l5.803-3.558L0 4.697ZM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757Zm3.436-.586L16 11.801V4.697l-5.803 3.546Z" />
                        </svg> admin.ecopulse@gmail.com</p>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12" style="background: #003030;">
                    <div class="navbar-btn-area" id="btn-area">
                    </div>
                </div>
            </div>
        </nav>
        <nav class="navbar navbar2 navbar-expand-md navbar-light bg-light">
            <div class="container-fluid">
                <a href=""></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation" style="border: 0px; margin-top: 8px;
                    margin-bottom: 8px;">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav" style="text-align: center">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link @if(Request::is('/')) active @endif" href="/">BERANDA</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if(Request::is('informasi')) active @endif" href="/informasi">INFORMASI</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if(Request::is('pemetaan')) active @endif" href="/pemetaan">PEMETAAN ENERGI BERSIH</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if(Request::is('forum')) active @endif" href="/forum">FORUM</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if(Request::is('profil')) active @endif" href="/profil">PROFILE DINAS</a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link @if(Request::is('kontak')) active @endif"  href="/kontak">HUBUNGI KAMI</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</section>
