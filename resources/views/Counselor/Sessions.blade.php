@include('Trainer/Layouts.header')
@include('Trainer/Layouts.sidebar')

    <div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="page-breadcrumb">
            <div class="row align-items-center">
                <div class="col-6">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-1 d-flex align-items-center">
                            <li class="breadcrumb-item"><a href="/index" class="link"><i class="mdi mdi-home-outline fs-4"></i></a></li>
                            <li class="breadcrumb-item active" aria-current="page">Sessions</li>
                        </ol>
                    </nav>
                </div>
            </div>

            <div class="container-fluid">
                <div class="mt-1 row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Training sessions</h4>
                                <h6 class="card-subtitle">All training sessions</h6>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Session Name</th>
                                            <th scope="col">Client</th>
                                            <th scope="col">Date</th>
                                            <th scope="col">Duration</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Attendance</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($Allsessions as $session)
                                            <tr>
                                                <th scope="row">{{ $loop->iteration }}</th>
                                                <td><a href="{{ route('show.program',$session->ProgramId)}}" >{{$session->session}}</a></td>
                                                <td>{{ $session->client }}</td>
                                                <td>{{ $session->Date }}</td>
                                                <td>{{ $session->Duration }}</td>
                                                <td>
                                                    <button class="btn btn-outline-primary" disabled><i class="m-r-10 mdi mdi-thumb-up"></i>{{ $session->Status }}
                                                </td>
                                                <td>
                                                    <form action="{{route('mark.attendance', $session->id )}}" method="POST"  >
                                                        @csrf
                                                        @if ($session->Attendance !== 'Present')
                                                            {{-- <button value="Present" name="Attendance" id="Attendance" type="submit" class="btn btn-outline-primary " disabled>
                                                                <i class="m-r-10 mdi mdi-human-handsup"></i>{{ $session->Attendance }}
                                                            </button>&nbsp; --}}
                                                            <button value="Present" name="Attendance" id="Attendance" type="submit" class="btn btn-danger">
                                                                <i class="m-r-10 mdi mdi-account-minus"></i>{{ $session->Attendance }}
                                                            </button>&nbsp;

                                                        @else
                                                            {{-- <button value="Absent" name="Attendance" id="Attendance" type="submit" class="btn btn-danger">
                                                                <i class="m-r-10 mdi mdi-account-minus"></i>{{ $session->Attendance }}
                                                            </button>&nbsp; --}}
                                                            <button value="Absent" name="Attendance" id="Attendance" type="submit" class="btn btn-outline-primary " >
                                                                <i class="m-r-10 mdi mdi-human-handsup"></i>{{ $session->Attendance }}
                                                            </button>&nbsp;
                                                        @endif
                                                    </form>
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



    </div>


@include('Trainer/Layouts.footer')
