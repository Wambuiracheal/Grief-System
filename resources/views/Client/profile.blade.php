@include('layouts.header')
@include('layouts.sidebar')

<div class="page-wrapper">
  <div class="page-breadcrumb">
    <div class="row align-items-center">
      <div class="col-6">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb mb-0 d-flex align-items-center">
            <li class="breadcrumb-item"><a href="index.html" class="link"><i class="mdi mdi-home-outline fs-4"></i></a></li>
            <li class="breadcrumb-item active" aria-current="page">Book Counsellor</li>
          </ol>
        </nav>
        <h1 class="mb-0 fw-bold">Book a Counsellor</h1>
      </div>
    </div>
  </div>

  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
            <form class="form-horizontal form-material mx-2">
              <div class="form-group">
                <label for="counsellorSearch" class="col-md-12">Search Counsellor (By Name or Specialization)</label>
                <div class="col-md-12">
                  <input type="text" id="counsellorSearch" placeholder="Enter keyword" class="form-control form-control-line">
                </div>
              </div>
              <button type="submit" class="btn btn-primary text-white">Find Counsellor</button>
            </form>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Available Counsellors</h5>
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>Counsellor Name</th>
                  <th>Specialization</th>
                  <th>Availability</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Dr. Jane Doe</td>
                  <td>Grief & Loss</td>
                  <td>Tuesday, 2pm - 4pm</td>
                  <td>
                    <a href="counsellor-profile.html?id=1" class="btn btn-primary btn-sm">View Profile</a>
                    <a href="booking.html?counsellor_id=1" class="btn btn-success btn-sm">Book Now</a>
                  </td>
                </tr>
                </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@include('layouts.footer')
