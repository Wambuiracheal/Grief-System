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
                            <li class="breadcrumb-item active" aria-current="page">Equipments</li>
                        </ol>
                    </nav>
                </div>
            </div>

            <div class="row mb-2">
                <div class="d-grid gap-2 d-md-block">
                    <button class="btn btn-info text-white" type="button" id="add">Add equipment</button>
                </div>
            </div>

            <div class="row" style="display:none;" id="addequipment">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action= "{{ route('create.equipment') }}" method="POST">
                                @csrf
                                <fieldset>
                                    <legend>Equipment details:</legend>
                                    <div class="row p-2 mb-4">
                                        <div class="col-md-3">
                                            <div class="mb-0 p-2">
                                                <label for="Equipment" class="form-label"> Name</label>
                                                <input type="text" name="Equipment" class="form-control" placeholder="Dumbbell"/>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-0 p-2">
                                                <label for="Use" class="form-label">Use</label>
                                                <input type="text" name="Use" class="form-control" placeholder="Weight lifting"/>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="mb-0 p-2">
                                                <label for="Weight" class="form-label">Weight (kg)</label>
                                                <input type="number" name="Weight" class="form-control" placeholder="45 kg"/>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="mb-0 p-2">
                                                <label for="Price" class="form-label">Price (kshs)</label>
                                                <input type="number" name="Price" class="form-control" placeholder="6500"/>
                                            </div>
                                        </div>

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
                                <u><h4 class="card-title text-center"><i  class="m-r-5 font-18 mdi mdi-numeric-1-box-multiple-outline"></i>Equipments</h4></u>
                                {{-- <h6 class="card-subtitle"><code>Top Gym's</code> Programs aligned with their respective Days of the week.</h6> --}}
                            </div>
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Equipment</th>
                                            <th scope="col">Use</th>
                                            <th scope="col">Weight</th>
                                            <th scope="col">Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($equipments as $equipment)
                                            <tr>
                                                <th scope="row">{{ $loop->iteration }}</th>
                                                <td>{{ $equipment->Name }}</td>
                                                <td>{{ $equipment->Use }}</td>
                                                <td>{{ $equipment->Weight }} kg</td>
                                                <td>Kshs {{ $equipment->Price }}</td>
                                                <td>
                                                    <form method="POST" action="{{ route('delete.equipment',$equipment->id) }}">
                                                        @csrf
                                                        @method('delete')
                                                    {{-- <a href="{{ route('show.program',$program->id)}}" class="btn btn-success"><i class="bi bi-eye"></i></a> &nbsp;  --}}

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
            $("#addequipment").toggle();
        });

    </script>
@include('Trainer/Layouts.footer')
