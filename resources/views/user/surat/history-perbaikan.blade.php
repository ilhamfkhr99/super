@extends('layouts.main')
@section('title', 'Data History Surat')
@section('content')
<main role="main" class="main-content">
    <div class="container-fluid">
        <div class="row justify-content-center">
          <div class="col-12">
            <div class="row align-items-center my-4">
              <div class="col">
                <h2 class="h3 mb-0 page-title">History Surat Perbaikan</h2>
              </div>
            </div>
            <div class="row">
              <!-- Bordered table -->
              <div class="col-md-12 my-4">
                  <div class="card shadow">
                    <div class="card-body">
                        <div class="toolbar row mb-3">
                            <div class="col">
                              <form class="form-inline">
                                <div class="form-row">
                                  <div class="form-group col-auto">
                                    <label for="search" class="sr-only">Search</label>
                                    <input type="text" class="form-control" id="search" value="" placeholder="Search">
                                  </div>
                                  <div class="form-group col-auto ml-3">
                                    <select class="custom-select my-1 mr-sm-2" id="macam">
                                      <option>-Pilih-</option>
                                      @foreach ($macam as $val)
                                        <option value="{{ $val->id }}">{{ $val->nama }}</option>
                                      @endforeach
                                    </select>
                                  </div>
                                </div>
                              </form>
                            </div>
                          </div>
                          <table class="table table-hover" id="macam-surat">
                            <thead class="thead-light">
                              <tr>
                                <th>No</th>
                                <th>Pemohon</th>
                                <th>Nomer Surat</th>
                                <th>Macam Perbaikan</th>
                                <th>Jenis Pemeliharaan</th>
                                {{-- <th>Kerusakan</th> --}}
                                {{-- <th>Tindakan</th> --}}
                                <th>Tanggal</th>
                                <th>Status</th>
                                <th>Lokasi</th>
                                {{-- <th>Kondisi Barang</th> --}}
                                <th>Aksi</th>
                              </tr>
                            </thead>
                            <tbody>
                              @php
                                    $no = 1;
                              @endphp
                              @foreach ($surat as $row)
                              @php
                                  $ttd = App\Models\Ttd::where('id_surat', $row->id_surat)->first();
                              @endphp
                              <tr>
                                  <td>{{ $no++ }}</td>
                                  <td>{{ $row->nama_user }}</td>
                                  <td>{{ $row->nomer }}</td>
                                  <td>{{ $row->macam }}</td>
                                  <td>{{ $row->jenis_pemeliharaan }}</td>
                                  {{-- <td>{{ $row->kerusakan }}</td> --}}
                                  {{-- <td>{{ $row->tindakan }}</td> --}}
                                  <td>{{ $row->waktu }}</td>
                                  @if($row->status == 'Belum dikonfirmasi')
                                  <td><span class="badge badge-pill badge-danger">{{ $row->status }}</span></td>
                                  @elseif ($row->status == 'Telah dikonfirmasi')
                                  <td><span class="badge badge-pill badge-primary">{{ $row->status }}</span></td>
                                  @elseif ($row->status == 'Proses')
                                  <td><span class="badge badge-pill badge-warning">{{ $row->status }}</span></td>
                                  @else
                                  <td><span class="badge badge-pill badge-success">{{ $row->status }}</span></td>
                                  @endif
                                  <td>{{ $row->lokasi }}</td>
                                  {{-- <td>{{ $row->kondisi }}</td> --}}
                                <td><a href="{{ url('exportlaporan/'.$row->id_surat) }}" class="btn mb-2 btn-outline-warning"><span class="fe fe-file fe-16 mr-1"></span>Eksport</a></td>
                              </tr>
                              @endforeach
                            </tbody>
                          </table>
                    </div>
                    <nav aria-label="Table Paging" class="my-3">
                      <ul class="pagination justify-content-end mb-0">
                        <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">Next</a></li>
                      </ul>
                    </nav>
                  </div>
                </div> <!-- Bordered table -->
            </div> <!-- .row -->
          </div> <!-- .col-12 -->
        </div> <!-- .row -->
        @include('sweetalert::alert')
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
      </div>
</main>

@endsection


