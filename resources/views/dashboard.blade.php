@include('layouts.header')
@include('layouts.sidebar')

    <div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="page-breadcrumb">
            <div class="row align-items-center mb-3">
                <div class="col-6">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 d-flex align-items-center">
                            <li class="breadcrumb-item"><a href="/index" class="link"><i class="mdi mdi-home-outline fs-4"></i></a></li>
                            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                        </ol>
                    </nav>
                    <h1 class="mb-0 fw-bold">Dashboard</h1>
                </div>
                <div class="col-6">
                    <div class="text-end upgrade-btn">
                        <a href="/book-session" class="btn btn-primary text-white" >Book Session</a>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center mt-2">
                <div class="col-md-8">

                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Hello {{Auth::user()->name}}</h4>
                            <h5 class="text-center">Upcoming classes</h5>
                        </div>
                        <div class="comment-widgets scrollable">
                            <!-- Comment Row -->
                            @foreach ($bookings as $booking)
                                <div class="d-flex flex-row comment-row m-t-0">
                                    <div class="p-2"><img src="../assets/images/users/1.jpg" alt="user" width="50"
                                            class="rounded-circle"></div>
                                    <div class="comment-text w-100">
                                        <h6 class="font-medium">{{ $booking->session }} </h6>
                                        <span class="m-b-15 d-block">{{ $booking->session }} session with <strong>{{ $booking->trainer }}</strong> </span>
                                        <div class="comment-footer">
                                            <span class="text-muted float-end">{{ $booking->Date }}</span> <span
                                                class="badge bg-primary">{{ $booking->Duration }} minutes</span> <span
                                                class="action-icons">
                                                <a href="javascript:void(0)"><i class="ti-pencil-alt"></i></a>
                                                <a href="javascript:void(0)"><i class="ti-check"></i></a>
                                                <a href="javascript:void(0)"><i class="ti-heart"></i></a>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>

                <!------------------------------------ Sidebar for programs ------------------------------>

                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Programs</h4>
                            <h6 class="card-subtitle">Top Gym programs</h6>
                                @foreach ($programs as $program)
                                    <div class="mt-5  d-flex align-items-center">
                                        <span class="btn btn-primary btn-circle d-flex align-items-center">
                                            <i class="mdi mdi-dumbbell fs-4" ></i>
                                        </span>
                                        <div class="ms-3">
                                            <h5 class="mb-0 fw-bold">{{ $program->program }}</h5>
                                            <span class="text-muted fs-6">{{ $program->trainer }}</span>
                                            <p class="fs-5">Kshs {{ $program->Price }}</p>
                                        </div>
                                        <div class="ms-auto">
                                            <span class="badge bg-light text-muted">{{ $program->Duration }} minutes</span>
                                        </div>
                                    </div>
                                @endforeach


                        </div>
                    </div>
                </div>
            </div>


            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <!-- title -->
                        <div class="d-md-flex">
                            <div>
                                <h4 class="card-title">Attended Sessions</h4>
                                <h5 class="card-subtitle">Overview of Last attended sessions</h5>
                            </div>
                            {{-- <div class="ms-auto">
                                <div class="dl">
                                    <select class="form-select shadow-none">
                                        <option value="0" selected>Monthly</option>
                                        <option value="1">Daily</option>
                                        <option value="2">Weekly</option>
                                        <option value="3">Yearly</option>
                                    </select>
                                </div>
                            </div> --}}
                        </div>
                        <!-- title -->
                        <div class="table-responsive">
                            <table class="table mb-0 table-hover align-middle text-nowrap">
                                <thead>
                                    <tr>
                                        <th class="border-top-0">Session</th>
                                        <th class="border-top-0">Trainer</th>
                                        <th class="border-top-0">Date</th>
                                        <th class="border-top-0">Duration (Min)</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($present_sessions as $session)

                                    <tr>
                                        <td>{{ $session->session }}</td>
                                        <td>{{ $session->trainer }}</td>
                                        <td>{{ $session->Date }}</td>
                                        <td>{{ $session->Duration }}</td>
                                    </tr>

                                    @endforeach


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>


@include('layouts.footer')
