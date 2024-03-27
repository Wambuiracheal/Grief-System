@include('Trainer/Layouts.header')
@include('Trainer/Layouts.sidebar')

        <div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row align-items-center">
                    <div class="col-6">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 d-flex align-items-center">
                              <li class="breadcrumb-item"><a href="index.html" class="link"><i class="mdi mdi-home-outline fs-4"></i></a></li>
                              <li class="breadcrumb-item active" aria-current="page">Profile</li>
                            </ol>
                          </nav>
                        <h1 class="mb-0 fw-bold">Profile</h1>
                    </div>
                    {{-- <div class="col-6">
                        <div class="text-end upgrade-btn">
                            <a href="https://www.wrappixel.com/templates/flexy-bootstrap-admin-template/" class="btn btn-primary text-white"
                                target="_blank">Upgrade to Pro</a>
                        </div>
                    </div> --}}
                </div>
            </div>

            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- Row -->
                <div class="row">
                    <!-- Column -->


                        <div class="col-lg-4 col-xlg-3 col-md-5">
                            <div class="card">
                                <div class="card-body">
                                    <center class="m-t-30"> <img src="../assets/images/users/5.png" class="rounded-circle" width="150" />
                                        <h4 class="card-title m-t-10">{{ $profile->Name }}</h4>
                                        <h6 class="card-subtitle">{{ $profile->Sector }}</h6>
                                        <div class="row text-center justify-content-md-center">
                                            <div class="col-4"><a href="javascript:void(0)" class="link"><i
                                                        class="icon-people"></i>
                                                    <font class="font-medium">Training</font>
                                                    <br>
                                                    <font class="font-medium">{{$traininghours}} hrs</font>

                                                </a></div>
                                            
                                        </div>
                                    </center>
                                </div>
                                <div>
                                    <hr>
                                </div>
                                {{-- <div class="card-body">
                                    <small class="text-muted">Email address </small>
                                        <h6>hannagover@gmail.com</h6>
                                    <small class="text-muted p-t-30 db">Phone</small>
                                        <h6>{{ $profile->Phone }}</h6>
                                    <small class="text-muted p-t-30 db">Address</small>
                                        <h6>71 Pilgrim Avenue Chevy Chase, MD 20815</h6>

                                </div> --}}
                            </div>
                        </div>
                        <!-- Column -->
                        <!-- Column -->
                        <div class="col-lg-8 col-xlg-9 col-md-7">
                            <div class="card">
                                <div class="card-body">
                                    <form class="form-horizontal form-material mx-2">
                                        <div class="form-group">
                                            <label class="col-md-12">Full Name</label>
                                            <div class="col-md-12">
                                                <input type="text" placeholder="{{ $profile->Name }}"
                                                    class="form-control form-control-line">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-12">Sector</label>
                                            <div class="col-md-12">
                                                <input type="text" placeholder="{{ $profile->Sector }}"
                                                    class="form-control form-control-line">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="example-email" class="col-md-12">Email</label>
                                            <div class="col-md-12">
                                                <input type="email" placeholder="{{ Auth::user()->email }}" class="form-control form-control-line" name="example-email"
                                                    id="example-email" disabled>
                                            </div>
                                        </div>
                                        {{-- <div class="form-group">
                                            <label class="col-md-12">Password</label>
                                            <div class="col-md-12">
                                                <input type="password" value="password" class="form-control form-control-line" disabled>
                                            </div>
                                        </div> --}}
                                        <div class="form-group">
                                            <label class="col-md-12">Phone No</label>
                                            <div class="col-md-12">
                                                <input type="text" placeholder="0{{ $profile->Phone }}"
                                                    class="form-control form-control-line">
                                            </div>
                                        </div>


                                        {{-- <div class="form-group">
                                            <div class="col-sm-12">
                                                <button class="btn btn-success text-white">Update Profile</button>
                                            </div>
                                        </div> --}}
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Column -->


                </div>
                <!-- Row -->
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>

        </div>

@include('Trainer/Layouts.footer')
