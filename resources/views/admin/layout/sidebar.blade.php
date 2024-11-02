<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="index.html" class="app-brand-link">
            <span class="app-brand-logo demo">
                <!-- Logo bisa ditambahkan di sini -->
            </span>
            <span class="app-brand-text demo fw-bolder text-capitalize">EchoPulse</span>
        </a>
        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>
    <ul class="menu-inner py-1">
        <!-- Dashboard -->
        <li class="menu-item @if (Request::is('/dashboard')) active @endif">
            <a href="index.html" class="menu-link">
                {{-- ini make box icons --}}
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
            </a>
        </li>

        <!-- Master Data -->
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Master Data</span>
        </li>
        <li class="menu-item @if (Request::is('pages/user', 'pages/user/*')) active @endif">
            <a href="/pages/user"  class="menu-link ">
                <i class="menu-icon tf-icons bx bx-user"></i>
                <div data-i18n="User Management">Data Pengguna</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link">
                <i class="menu-icon tf-icons bx bx-lock"></i>
                <div data-i18n="Role Management">Data Peran</div>
            </a>
        </li>

        <!-- Form Section -->
        <li class="menu-header small text-uppercase"><span class="menu-header-text">Formulir</span></li>
        <li class="menu-item">
            <a href="cards-basic.html" class="menu-link">
                <i class="menu-icon tf-icons bx bx-collection"></i>
                <div data-i18n="Tags">Data Tag</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="cards-basic.html" class="menu-link">
                <i class="menu-icon tf-icons bx bx-comment-dots"></i>
                <div data-i18n="Forum Data">Data Forum</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="cards-basic.html" class="menu-link">
                <i class="menu-icon tf-icons bx bx-chat"></i>
                <div data-i18n="Comment Data">Data Komentar Forum</div>
            </a>
        </li>

        <!-- Proposal Section -->
        <li class="menu-header small text-uppercase"><span class="menu-header-text">Proposal</span></li>
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link">
                <i class="menu-icon tf-icons bx bx-file"></i>
                <div data-i18n="Proposal Data">Data Proposal</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link">
                <i class="menu-icon tf-icons bx bx-check-circle"></i>
                <div data-i18n="Proposal Status">Status Proposal</div>
            </a>
        </li>

        <!-- Mapping Section -->
        <li class="menu-header small text-uppercase"><span class="menu-header-text">Pemetaan</span></li>
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link">
                <i class="menu-icon tf-icons bx bx-cog"></i>
                <div data-i18n="Inventory Data">Inventaris Alat</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link">
                <i class="menu-icon tf-icons bx bx-map"></i>
                <div data-i18n="Mapping Data">Pemetaan Alat</div>
            </a>
        </li>

        <!-- Reports Section -->
        <li class="menu-header small text-uppercase"><span class="menu-header-text">Laporan</span></li>
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link">
                <i class="menu-icon tf-icons bx bx-file-blank"></i>
                <div data-i18n="Monthly Reports">Laporan Bulanan</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link">
                <i class="menu-icon tf-icons bx bx-file-blank"></i>
                <div data-i18n="Yearly Reports">Laporan Tahunan</div>
            </a>
        </li>

        <!-- Settings Section -->
        <li class="menu-header small text-uppercase"><span class="menu-header-text">Pengaturan</span></li>
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link">
                <i class="menu-icon tf-icons bx bx-user-circle"></i>
                <div data-i18n="Account Settings">Pengaturan Akun</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link">
                <i class="menu-icon tf-icons bx bx-cog"></i>
                <div data-i18n="System Settings">Pengaturan Sistem</div>
            </a>
        </li>

        <!-- Help Section -->
        <li class="menu-header small text-uppercase"><span class="menu-header-text">Bantuan</span></li>
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link">
                <i class="menu-icon tf-icons bx bx-help-circle"></i>
                <div data-i18n="Help Center">Pusat Bantuan</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link">
                <i class="menu-icon tf-icons bx bx-book-open"></i>
                <div data-i18n="Documentation">Dokumentasi</div>
            </a>
        </li>
    </ul>
</aside>
