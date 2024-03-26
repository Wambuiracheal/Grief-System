@include('layouts.header')
@include('layouts.sidebar')

<div class="page-wrapper">
  <div class="page-breadcrumb">
    <div class="row align-items-center">
      <div class="col-6">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb mb-1 d-flex align-items-center">
            <li class="breadcrumb-item"><a href="/index" class="link"><i class="mdi mdi-home-outline fs-4"></i></a></li>
            <li class="breadcrumb-item active" aria-current="page">Grief Support</li>
          </ol>
        </nav>
      </div>
    </div>
  </div>

  <div class="container-fluid">
    <div class="row">
      <div class="col-md-6">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Book a Counselor Session</h4>
            <form method="POST" action="/book-counselor">
              @csrf {{-- Laravel token for form security --}}
              <div class="mb-3">
                <label for="clientName" class="form-label">Your Name</label>
                <input type="text" class="form-control" id="clientName" name="clientName" required>
              </div>
              <div class="mb-3">
                <label for="counselor" class="form-label">Select Counselor</label>
                <select class="form-select" id="counselor" name="counselor" required>
                  <option value="">Choose...</option>
                  @foreach ($counselors as $counselor)
                    <option value="{{ $counselor->id }}">{{ $counselor->name }} ({{ $counselor->specialties }})</option>
                  @endforeach
                </select>
              </div>
              <div class="mb-3">
                <label for="dateTime" class="form-label">Preferred Date & Time</label>
                <input type="datetime-local" class="form-control" id="dateTime" name="dateTime" required>
              </div>
              <button type="submit" class="btn btn-primary">Book Session</button>
            </form>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Upcoming Sessions</h4>
            <table class="table table-striped">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Counselor</th>
                  <th scope="col">Date & Time</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($upcomingSessions as $session)
                  <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $session->counselor->name }}</td>
                    <td>{{ $session->dateTime }}</td>
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
