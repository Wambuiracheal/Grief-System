@include('layouts.header')
@include('layouts.sidebar')

<div class="page-wrapper">
  <div class="page-breadcrumb">
    <div class="row align-items-center">
      <div class="col-6">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb mb-0 d-flex align-items-center">
            <li class="breadcrumb-item"><a href="/index" class="link"><i class="mdi mdi-home-outline fs-4"></i></a></li>
            <li class="breadcrumb-item active" aria-current="page">Book Session</li>
          </ol>
        </nav>
        <h1 class="mb-0 fw-bold">Book Session</h1>
      </div>
    </div>
  </div>

  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <form action="{{ route('create-session') }}" method="POST">
              @csrf
              <div class="row p-2 mb-4">
                <div class="col-md-4">
                  <div class="mb-0 p-2">
                    <label for="Program" class="form-label">Session</label>
                    <Select name="Program" type="text" class="form-select" id="Program" aria-describedby="Program" required>
                      <option value=""> Choose Program</option>
                      @foreach ($programs as $program)
                        <option value="{{ $program->id }}">{{ $program->program }}</option>
                      @endforeach
                    </Select>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="mb-0 p-2">
                    <label for="Counselor" class="form-label">Counselor</label>
                    <Select name="Counselor" type="text" class="form-select" id="Counselor" aria-describedby="Counselor" required>
                      <option value=""> Choose Counselor</option>
                      @foreach ($counselors as $counselor)
                        <option value="{{ $counselor->id }}">{{ $counselor->Name }}</option>
                      @endforeach
                    </Select>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="mb-0 p-2">
                    <label for="Date" class="form-label">Date</label>
                    <input name="Date" type="date" class="form-control">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="mb-0 p-2">
                    <label for="Duration" class="form-label">Duration</label>
                    <Select name="Duration" type="text" class="form-select" id="Duration" aria-describedby="Duration" required>
                      <option value=""> Select duration</option>
                      @foreach ($programs as $program)
                        <option value="{{ $program->Duration }}">{{ $program->Duration }}</option>
                      @endforeach
                    </Select>
                  </div>
                </div>

                <input id="invisible_id" name="ClientId" type="hidden" value="{{ $get_client_id->id }}">

                <div class="d-grid gap-2 ">
                  <button type="submit" class="btn btn-success text-white" style="width:20%;">
                    <i class="bi bi-cloud-upload"></i> Submit
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>

@include('layouts.footer')
