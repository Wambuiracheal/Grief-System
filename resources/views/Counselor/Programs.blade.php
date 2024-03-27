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
                            <li class="breadcrumb-item"><a href="/Trainer/index" class="link"><i class="mdi mdi-home-outline fs-4"></i></a></li>
                            <li class="breadcrumb-item active" aria-current="page">Programs</li>
                        </ol>
                    </nav>
                </div>
            </div>

            <div class="row mb-2">
                <div class="d-grid gap-2 d-md-block">
                    <button class="btn btn-info text-white" type="button" id="add">Add program</button>
                </div>
            </div>

            <div class="row" style="display: none;" id="addprogram">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action= "{{ route('create.program') }} " method="POST">
                                @csrf
                                <fieldset>
                                    <legend>Program details:</legend>
                                    <p>Add program </p>
                                    <div class="row p-2 mb-4">
                                        <div class="col-md-4">
                                            <div class="mb-0 p-2">
                                                <label for="Name" class="form-label">Program Name</label>
                                                <input type="text" name="ProgramName" class="form-control" placeholder="Fat shredder"/>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-0 p-2">
                                                <label for="Day" class="form-label">Day of the week</label>
                                                <Select name="Day" type="text"  class="form-select" id="Day " aria-describedby="Day " required>
                                                    <option value=""> Choose day</option>
                                                    <option value="Monday">Monday</option>
                                                    <option value="Tuesday">Tuesday</option>
                                                    <option value="Wednesday">Wednesday</option>
                                                    <option value="Thursday">Thursday</option>
                                                    <option value="Friday">Friday</option>
                                                    <option value="Saturday">Saturday</option>
                                                </Select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-0 p-2">
                                                <label for="Duration" class="form-label">Duration</label>
                                                <input type="Duration" name="Duration" class="form-control" placeholder="45 min"/>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-0 p-2">
                                                <label for="Price" class="form-label">Price</label>
                                                <input type="number" name="Price" class="form-control" placeholder="Kshs 6500"/>
                                            </div>
                                        </div>

                                        <input id="invisible_id" name="TrainerId" type="hidden" value="{{ $get_trainer_id->id }}">


                                        <div class="d-grid gap-2 ">
                                            <button type="submit" class="btn btn-success text-white" style="width:20%;">
                                                <i class="bi bi-cloud-upload"></i> Submit
                                            </button>
                                        </div>
                                    </div>
                                </fieldset>
                              </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-fluid">
                <div class="mt-1 row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title"><i  class="m-r-5 font-18 mdi mdi-numeric-2-box-multiple-outline"></i>Registered Programs</h4>
                                <h6 class="card-subtitle"><code>Top Gym's</code> Programs aligned with their respective Days of the week.</h6>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Program</th>
                                            <th scope="col">Day</th>
                                            <th scope="col">Duration</th>
                                            <th scope="col">Price</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($programs as $program)
                                            <tr>
                                                <th scope="row">{{ $loop->iteration }}</th>
                                                <td>{{ $program->program }}</td>
                                                <td>{{ $program->Day }}</td>
                                                <td>{{ $program->Duration }} min</td>
                                                <td>Kshs {{ $program->Price }}</td>
                                                <td>
                                                    <form method="POST" action="{{ route('delete.program',$program->id) }}">
                                                        @csrf
                                                        @method('delete')
                                                    <a href="{{ route('show.program',$program->id)}}" class="btn btn-success"><i class="bi bi-eye"></i></a> &nbsp; 

                                                        <button type="submit" class="btn btn-danger"><i class="bi bi-trash"></i></button>
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

<script>
    $('#add').click(function(){
        $("#addprogram").toggle();
    });

</script>

@include('Trainer/Layouts.footer')
