@extends('admin.layout.master')
@section('title', 'Dashboard')
@section('content')
<div class="row">
    <div class="col-lg-3 col-md-3 col-6 mb-4 d-none dash-total-user">
        <div class="card">
            <div class="card-body mt-2">
                <div class="row">
                    <div class="col-md-4">
                        <i class="menu-icon tf-icons bx bx-home-circle  pt-sm-0" style="font-size:60px"></i>
                    </div>
                    <div class="col-md-7 ">
                        <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="row">
                                <span class="fw-semibold d-block mb-1 mt-2">Total User</span>
                                <h3 class="card-title mb-2 total_user" id="total-user">0</h3>
                            </div>
                            <div class="dropdown ms-3">
                                <button class="btn p-0" type="button" id="cardOpt3" data-bs-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                                    <a class="dropdown-item" href="{{ route('pages.user.index') }}">View
                                        More</a>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-6 mb-4 d-none dash-total-forum">
        <div class="card">
            <div class="card-body mt-2">
                <div class="row">
                    <div class="col-md-4">
                        <i class="menu-icon tf-icons bx bx-home-circle  pt-sm-0" style="font-size:60px"></i>
                    </div>
                    <div class="col-md-7">
                        <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="row">
                                <span class="fw-semibold d-block mb-1 mt-2 fs-5"> Forum</span>
                                <h3 class="card-title mb-2 total_forum" id="total-forum">0</h3>
                            </div>
                            <div class="dropdown ms-3">
                                <button class="btn p-0" type="button" id="cardOpt3" data-bs-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                                    <a class="dropdown-item" href="{{ route('pages.forum.index') }}">Delete</a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-6 mb-4 d-none dash-total-proposal">
        <div class="card">
            <div class="card-body mt-2">
                <div class="row">
                    <div class="col-md-4">
                        <i class="menu-icon tf-icons bx bx-home-circle  pt-sm-0" style="font-size:60px"></i>
                    </div>
                    <div class="col-md-7">
                        <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="row">
                                <span class="fw-semibold d-block mb-1 mt-2">Proposal</span>
                                <h3 class="card-title mb-2 total_proposal" id="total-proposal">0</h3>
                            </div>
                            <div class="dropdown ms-3">
                                <button class="btn p-0" type="button" id="cardOpt3" data-bs-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                                    <a class="dropdown-item" href="javascript:void(0);">View
                                        More</a>
                                    <a class="dropdown-item" href="{{ route('pages.proposal.index') }}">Delete</a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-6 mb-4 d-none dash-total-pemetaan">
        <div class="card">
            <div class="card-body mt-2">
                <div class="row">
                    <div class="col-md-4">
                        <i class="menu-icon tf-icons bx bx-home-circle  pt-sm-0" style="font-size:60px"></i>
                    </div>
                    <div class="col-md-7">
                        <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="row">
                                <span class="fw-semibold d-block mb-1 mt-2">Pemetaan</span>
                                <h3 class="card-title mb-2 total_pemetaan" id="total-pemetaan"></h3>
                            </div>
                            <div class="dropdown ms-3">
                                <button class="btn p-0" type="button" id="cardOpt3" data-bs-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                                    <a class="dropdown-item" href="{{ route('pages.pemetaanalat.index') }}">View More</a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <!-- Total Revenue -->
    <div class="col-12 col-lg-9 order-2 order-md-3 order-lg-2 mb-4">
        <div class="card mt-md-0 mt-4">
            <div class="row row-bordered g-0">
                <div class="col-md-12">
                    <h5 class="card-header m-0 me-2 pb-3 fw-bold ">Rekap proposal</h5>
                    <div class="bar_chart p-3 pe-5"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div id="calendar"></div>
    </div>

</div>
<div class="row">
    <!-- Total Revenue -->
    <div class="col-12 col-lg-9 order-2 order-md-3 order-lg-2 mb-4">
        <div class="card mt-md-0 mt-4">
            <div class="row row-bordered g-0">
                <div class="col-md-12">
                    <h5 class="card-header m-0 me-2 pb-3 fw-bold ">Rekap proposal daerah</h5>
                    <div class="bar_chart_daerah p-3 pe-5"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
    <div class="card shadow-sm border-0 rounded-3">
        <div class="card-body p-4">
            <h5 class="card-title mb-4 fw-bold ">Latest Forum</h5>
            @foreach ($mostCommented as $post)
            <a href="" class="text-decoration-none d-block mb-3 p-3 bg-light rounded-3">
                <h6 class="mb-1 fw-semibold text-dark">{{ $post->name }}</h6>
                    <div class="row">
                        <div class="col-md-6">
                            <small class="text-muted">{{ $post->created_at->diffForHumans() }}</small><br>
                        </div>
                        <div class="col-md-6">
                            <small class="text-muted"><i class="fas fa-comments me-1 text-primary"></i>{{ $post->comments_count }} komentar</small>
                        </div>
                    </div>
            </a>
            @endforeach
        </div>
    </div>
</div>

    </div>
</div>

@endsection
@push('scripts')
<script type="module" src="https://cdn.jsdelivr.net/npm/color-calendar/dist/bundle.js"></script>
@endpush
