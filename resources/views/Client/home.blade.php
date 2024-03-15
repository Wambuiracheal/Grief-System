@include('layouts.header')
@include('layouts.sidebar')

<div class="page-wrapper">
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
          <a href="/book-session" class="btn btn-primary text-white">Book Session</a>
        </div>
      </div>
    </div>
  </div>

  <div class="row justify-content-center mt-2">
    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Grieving Clients</h4>
          <h5 class="text-center">Recent Clients</h5>
          <div class="table-responsive">
            <table class="table mb-0 table-hover align-middle text-nowrap">
              <thead>
                <tr>
                  <th class="border-top-0">Name</th>
                  <th class="border-top-0">Loss</th>
                  <th class="border-top-0">Last Session</th>
                  <th class="border-top-0">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($grievingClients as $client)
                  <tr>
                    <td>{{ $client->name }}</td>
                    <td>{{ $client->loss }}</td> <td>
                      @if (isset($client->lastSession))  {{ $client->lastSession->Date }}
                      @else
                        -
                      @endif
                    </td>
                    <td>
                      <a href="/client-details/{{ $client->id }}" class="btn btn-sm btn-info">Details</a>
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

  <div class="row justify-content-center mt-2">
    <div class="col-md-8">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Hello {{ Auth::user()->name }}</h4>
          <h5 class="text-center">Upcoming Sessions</h5>
          <div class="comment-widgets scrollable">
            @foreach ($upcomingSessions as $session)
              <div class="d-flex flex-row comment-row m-t-0">
                <div class="p-2"><img src="../assets/images/users/counselor.jpg" alt="counselor" width="50" class="rounded-circle"></div>
                <div class="comment-text w-100">
                  <h6 class="font-medium">{{ $session->client->name }} Session</h6>  <span class="m-b-15 d-block">Session with <strong>{{ $session->counselor->name }}</strong></span>
                  <div class="comment-footer">
                    <span class="text-muted float-end">{{ $session->Date }}</span>
                    <span class="badge bg-primary">{{ $session->Duration }} minutes</span>
                  </div>
                </div>
              </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
