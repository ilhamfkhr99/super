@extends('layouts.main')
@section('title', 'beranda')
@section('content')
<main role="main" class="main-content">
    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-12">
            <h2 class="h5 page-title">Dashboard</h2><br>
          <div class="row">
            @foreach ($bidang as $row)
                <div class="col-lg-3 col-6 mb-4">
                    <div class="card shadow border-0">
                    <div class="card-body">
                        <div class="row align-items-center my-3">
                            <div class="col-3 text-center">
                                <i class="fe fe-32 fe-mail text-primary mb-0"></i>
                            </div>
                            <div class="col pr-0">
                                <span class="h5 mb-0">{{ $row->nama }}</span>
                            </div>
                        </div>
                    </div>
                    @php
                        $parent = App\Models\Organisasi::where('id', Auth::user()->id_organisasi)->first();
                    @endphp
                    @if(session('id') == $row->id)
                        <a href="{{ url('super/beranda/'.$row->id.'/'.$row->nama) }}" class="btn mb-2 btn-primary" ><span class="fe fe-arrow-right-circle fe-16 mr-2"></span>Pilih</a>
                    @else
                        <a href="{{ url('super/beranda/'.$row->id.'/'.$row->nama) }}" class="btn mb-2 btn-outline-primary" ><span class="fe fe-arrow-right-circle fe-16 mr-2"></span>Pilih</a>
                    @endif
                    </div>
                </div>
            @endforeach
          </div>
          <!-- end section -->
          <div class="row">
            {{-- <canvas id="myChart" height="100px"></canvas> --}}
            <canvas id="chart" height="100px"></canvas>
            {{-- <canvas id="lineChartjs" width="400" height="300"></canvas> --}}
          </div>
        </div>
      </div> <!-- .row -->
    </div> <!-- .container-fluid -->
    <div class="modal fade modal-notif modal-slide" tabindex="-1" role="dialog" aria-labelledby="defaultModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="defaultModalLabel">Notifications</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="list-group list-group-flush my-n3">
              <div class="list-group-item bg-transparent">
                <div class="row align-items-center">
                  <div class="col-auto">
                    <span class="fe fe-box fe-24"></span>
                  </div>
                  <div class="col">
                    <small><strong>Package has uploaded successfull</strong></small>
                    <div class="my-0 text-muted small">Package is zipped and uploaded</div>
                    <small class="badge badge-pill badge-light text-muted">1m ago</small>
                  </div>
                </div>
              </div>
              <div class="list-group-item bg-transparent">
                <div class="row align-items-center">
                  <div class="col-auto">
                    <span class="fe fe-download fe-24"></span>
                  </div>
                  <div class="col">
                    <small><strong>Widgets are updated successfull</strong></small>
                    <div class="my-0 text-muted small">Just create new layout Index, form, table</div>
                    <small class="badge badge-pill badge-light text-muted">2m ago</small>
                  </div>
                </div>
              </div>
              <div class="list-group-item bg-transparent">
                <div class="row align-items-center">
                  <div class="col-auto">
                    <span class="fe fe-inbox fe-24"></span>
                  </div>
                  <div class="col">
                    <small><strong>Notifications have been sent</strong></small>
                    <div class="my-0 text-muted small">Fusce dapibus, tellus ac cursus commodo</div>
                    <small class="badge badge-pill badge-light text-muted">30m ago</small>
                  </div>
                </div> <!-- / .row -->
              </div>
              <div class="list-group-item bg-transparent">
                <div class="row align-items-center">
                  <div class="col-auto">
                    <span class="fe fe-link fe-24"></span>
                  </div>
                  <div class="col">
                    <small><strong>Link was attached to menu</strong></small>
                    <div class="my-0 text-muted small">New layout has been attached to the menu</div>
                    <small class="badge badge-pill badge-light text-muted">1h ago</small>
                  </div>
                </div>
              </div> <!-- / .row -->
            </div> <!-- / .list-group -->
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary btn-block" data-dismiss="modal">Clear All</button>
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade modal-shortcut modal-slide" tabindex="-1" role="dialog" aria-labelledby="defaultModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="defaultModalLabel">Shortcuts</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body px-5">
            <div class="row align-items-center">
              <div class="col-6 text-center">
                <div class="squircle bg-success justify-content-center">
                  <i class="fe fe-cpu fe-32 align-self-center text-white"></i>
                </div>
                <p>Control area</p>
              </div>
              <div class="col-6 text-center">
                <div class="squircle bg-primary justify-content-center">
                  <i class="fe fe-activity fe-32 align-self-center text-white"></i>
                </div>
                <p>Activity</p>
              </div>
            </div>
            <div class="row align-items-center">
              <div class="col-6 text-center">
                <div class="squircle bg-primary justify-content-center">
                  <i class="fe fe-droplet fe-32 align-self-center text-white"></i>
                </div>
                <p>Droplet</p>
              </div>
              <div class="col-6 text-center">
                <div class="squircle bg-primary justify-content-center">
                  <i class="fe fe-upload-cloud fe-32 align-self-center text-white"></i>
                </div>
                <p>Upload</p>
              </div>
            </div>
            <div class="row align-items-center">
              <div class="col-6 text-center">
                <div class="squircle bg-primary justify-content-center">
                  <i class="fe fe-users fe-32 align-self-center text-white"></i>
                </div>
                <p>Users</p>
              </div>
              <div class="col-6 text-center">
                <div class="squircle bg-primary justify-content-center">
                  <i class="fe fe-settings fe-32 align-self-center text-white"></i>
                </div>
                <p>Settings</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      @include('sweetalert::alert')
    </div>
</main> <!-- main -->
<script type="text/javascript">
    var labels =  {{ Js::from($labels) }};
    var users =  {{ Js::from($data) }};
    var options = {
        chart: {
            type: 'line'
        },
        series: [{
            name: 'sales',
            // data: [30,40,35,50,49,60,70,91,125]
            data: users
        }],
        xaxis: {
            // categories: [1991,1992,1993,1994,1995,1996,1997, 1998,1999]
            categories: labels
        }
    }

var chart = new ApexCharts(document.querySelector("#chart"), options);

chart.render();
</script>
@endsection
{{-- <script type="text/javascript">

    var labels =  {{ Js::from($labels) }};
    var users =  {{ Js::from($data) }};

    const data = {
        labels: labels,
        datasets: [{
            label: 'My First dataset',
            backgroundColor: 'rgb(255, 99, 132)',
            borderColor: 'rgb(255, 99, 132)',
            data: users,
        }]
    };

    const config = {
        type: 'line',
        data: data,
        options: {}
    };

    const myChart = new Chart(
        document.getElementById('#myChart'),
        config
    );

</script> --}}
