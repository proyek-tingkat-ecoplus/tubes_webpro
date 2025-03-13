<nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
    id="layout-navbar">
    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
            <i class="bx bx-menu bx-sm"></i>
        </a>
    </div>

    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
        <!-- Search -->
        <div class="navbar-nav align-items-center">
            <div class="nav-item d-flex align-items-center">
            </div>
        </div>
        <!-- /Search -->

        <ul class="navbar-nav flex-row align-items-center ms-auto">
            <!-- Notifications -->
             <li class="nav-item navbar-dropdown dropdown-user dropdown me-4">
                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    <div type="button" class=" position-relative">
                        <i class="bx bx-bell me-2" style="font-size: 40px"></i>
                        <span class="position-absolute start-100 translate-middle badge rounded-pill bg-danger Notifications-count" style="font-size: 10px;top:5px">
                          2
                          <span class="visually-hidden">unread messages</span>
                        </span>
                      </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end Notifications-dropwdown">
                    <li>
                        {{-- <a class="dropdown-item">
                            <i class="bx bx-bell me-2" ></i>
                            <span class="align-middle">Proposal anda sudah di submit</span>
                        </a>
                        <a class="dropdown-item">
                            <i class="bx bx-bell me-2"></i>
                            <span class="align-middle">Proposal anda sudah di terima</span>
                        </a> --}}
                    </li>
                </ul>
            </li>
            <!-- User -->
            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    <div class="avatar avatar-online profile-img" id="">
                        {{-- <img src="https://th.bing.com/th/id/OIP.IGNf7GuQaCqz_RPq5wCkPgHaLH?rs=1&pid=ImgDetMain" alt="User Profile Picture"
                            class="w-px-30 h-auto rounded-pill" /> --}}
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                        <a class="dropdown-item" href="#">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0 me-3">
                                    <div class="avatar avatar-online profile-img">
                                        {{-- <img src="https://th.bing.com/th/id/OIP.IGNf7GuQaCqz_RPq5wCkPgHaLH?rs=1&pid=ImgDetMain" alt="User Profile Picture"
                                            class="w-px-30 h-auto rounded-pill" /> --}}
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <span class="fw-semibold d-block nav_profile">John Doe</span>
                                    <small class="text-muted nav_role">Administrator</small>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <div class="dropdown-divider"></div>
                    </li>
                    <li>
                        <a class="dropdown-item" href="/edit-profile">
                            <i class="bx bx-user me-2"></i>
                            <span class="align-middle">Edit Profile</span>
                        </a>
                        <a class="dropdown-item" id="logout">
                            <i class="bx bx-power-off me-2"></i>
                            <span class="align-middle">Log Out</span>
                        </a>
                    </li>
                </ul>
            </li>
            <!--/ User -->
        </ul>
    </div>
</nav>

