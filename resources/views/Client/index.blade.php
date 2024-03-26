@include('layouts.header')
@include('layouts.sidebar')

<div class="page-wrapper">
  <div class="page-breadcrumb">
    <div class="row align-items-center mb-3">
      <div class="col-6">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb mb-0 d-flex align-items-center">
            <li class="breadcrumb-item"><a href="index.html" class="link"><i class="mdi mdi-home-outline fs-4"></i></a></li>
            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
          </ol>
        </nav>
        <h1 class="mb-0 fw-bold">Dashboard</h1>
      </div>
      <div class="col-6">
        <div class="text-end upgrade-btn">
          <a href="{{ route('counsellors.index') }}" class="btn btn-primary text-white">Book Session</a>
        </div>
      </div>
    </div>
  </div>

  <div class="row justify-content-center mt-2">
    <div class="col-md-8">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Hello {{ Auth::user()->name }}</h4>
          <h5 class="text-center">Upcoming Grief Support Sessions</h5>

          <div class="comment-widgets scrollable">
            @foreach ($upcomingSessions as $session)
              <div class="d-flex flex-row comment-row m-t-0">
                <div class="p-2"><img src="../assets/images/users/counsellor.jpg" alt="Counsellor" width="50" class="rounded-circle"></div>
                <div class="comment-text w-100">
                  <h6 class="font-medium">{{ $session->title }}</h6>
                  <span class="m-b-15 d-block">{{ $session->description }}</span>
                  <div class="comment-footer">
                    <span class="text-muted float-end">
                      {{ $session->date }} - {{ $session->time }}
                    </span>
                    <span class="badge bg-primary">{{ $session->duration }} minutes</span>
                  </div>
                </div>
              </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row justify-content-center mt-4">
    <div class="col-md-8">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Available Counselors for Grief Support</h4>

          <table class="table table-bordered">
            <thead>
              <tr>
                <th>Counselor Name</th>
                <th>Specialization</th>
                <th>Availability</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($counselors as $counsellor)
                <tr>
                  <td>{{ $counselor->name }}</td>
                  <td>{{ $counselor->specialization }}</td>
                  <td>{{ $counselor->availability }}</td>
                  <td>
                    <a href="{{ route('counsellors.show', $counselor->id) }}" class="btn btn-primary btn-sm">View Profile</a>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  @include('layouts.footer')
</html>
