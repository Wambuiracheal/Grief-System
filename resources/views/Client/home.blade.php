@include('layouts.app')
@include('layouts.header')
@include('layouts.sidebar')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <script src="https://kit.fontawesome.com/0538fc5c28.js" crossorigin="anonymous"></script>
  <title>Dashboard</title>
  <style>
    /* Basic styles */
body {
  margin: 0;
  padding: 0;
  font-family: sans-serif; /* Change to your desired font family */
}

.page-wrapper {
  padding: 20px;
}

/* Breadcrumb navigation */
.breadcrumb {
  background-color: transparent;
  padding: 0;
  margin-bottom: 0;
}

.breadcrumb-item a {
  color: #333; /* Adjust text color */
  text-decoration: none;
}

.breadcrumb-item.active {
  font-weight: bold;
  color: #007bff; /* Adjust active text color */
}

/* Page title */
h1 {
  margin-top: 0;
  margin-bottom: 15px;
}

/* Button */
.upgrade-btn a {
  color: #fff; /* Adjust button text color */
  background-color: #007bff; /* Adjust button background color */
  border-color: #007bff; /* Adjust button border color */
  padding: 5px 10px;
  border-radius: 5px;
}

/* Card */
.card {
  border: 1px solid #eee;
  border-radius: 5px;
  padding: 15px;
  margin-bottom: 20px;
}

.card-title {
  margin-top: 0;
  margin-bottom: 10px;
}

/* Table */
table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  padding: 8px;
  border: 1px solid #eee;
  text-align: left;
}

th {
  background-color: #f2f2f2;
}

.table-hover tbody tr:hover {
  background-color: #f5f5f5;
}

/* Upcoming Sessions list */
.comment-widgets {
  max-height: 300px; /* Adjust maximum height as needed */
  overflow-y: auto; /* Enable scrolling for long lists */
}

.comment-row {
  margin-bottom: 10px;
  padding: 10px;
  border-radius: 5px;
  background-color: #f8f9fa; /* Adjust background color */
}

.comment-text {
  margin-left: 10px;
}

.comment-footer {
  font-size: 12px;
  color: #888;
}

.badge {
  padding: 5px 10px;
  font-size: 12px;
  border-radius: 5px;
}

  </style>
</head>
<body>
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
                @if (!empty($clients))
                <tbody>
                  @foreach ($clients as $client)
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
                @endif
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
              @if (!empty($upcomingSessions))
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
              @endif
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>

@endsection
