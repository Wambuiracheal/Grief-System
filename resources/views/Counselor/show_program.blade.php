@include('Trainer/Layouts.header')
@include('Trainer/Layouts.sidebar')

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
                            <li class="breadcrumb-item active" aria-current="page">{{$program->name}}</li>
                        </ol>
                    </nav>
                    <h1 class="mb-0 fw-bold">Program info</h1>
                </div>
                
            </div>

            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <!-- title -->
                        <div class="d-md-flex">
                            <div>
                                <h4 class="card-title">{{$program->name}} Sessions</h4>
                                <h5 class="card-subtitle">Overview of clients sessions</h5>
                            </div>            
                        </div>
                        <div class="text-center my-3">
                            <button class="btn btn-primary" id="viewapproved">Approved</button><button class="btn btn-warning" id="viewpending">Pending</button>    
                        </div> 
                        <!-- title -->
                        <div class="table-responsive">
                            <table class="table mb-0 table-hover align-middle text-nowrap"  id="approved">
                                
                                <thead>
                                    <br>
                                    <tr>
                                        <th class="border-top-0">Name</th>
                                        <th class="border-top-0">Date</th>
                                        <th class="border-top-0">Duration (Min)</th>
                                        <th class="border-top-0">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($approved as $clients)

                                    <tr>
                                        <td>{{ $clients->Name }}</td>
                                        <td>{{ $clients->Date }}</td>
                                        <td>{{ $clients->Duration }}</td>
                                        <td>
                                            <button class="btn btn-outline-primary" disabled><i class="m-r-10 mdi mdi-clock"></i>{{ $clients->Status }}
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>                               
                            </table>
                            
                            <table class="table mb-0 table-hover align-middle text-nowrap" style="display:none;" id="pending">
                                <thead>
                                    <tr>
                                        <th class="border-top-0">Name</th>
                                        <th class="border-top-0">Date</th>
                                        <th class="border-top-0">Duration (Min)</th>
                                        <th class="border-top-0">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pending as $clients)

                                    <tr>
                                        <td>{{ $clients->Name }}</td>
                                        <td>{{ $clients->Date }}</td>
                                        <td>{{ $clients->Duration }}</td>
                                        <td>
                                            <button class="btn btn-outline-warning" disabled><i class="m-r-10 mdi mdi-clock"></i>{{ $clients->Status }}
                                        </td>
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

    <script>
        $('#viewapproved').click(function(){
            $("#approved").toggle();
            $("#pending").hide();

        });

        $('#viewpending').click(function(){
            $("#pending").toggle();
            $("#approved").hide();

        });
    
    </script>


@include('Trainer/Layouts.footer')
