@extends('layouts.main')
@section('title', 'Data Bidang')
@section('content')
<main role="main" class="main-content">
    <div class="container-fluid">
        <div class="row justify-content-center">
          <div class="col-12">
            <div class="row align-items-center my-2">
              <div class="col">
                <h2 class="h3 mb-0 page-title">Catatan</h2>
                <ol class="breadcrumb -left">
                    <li class="breadcrumb-item"><a href="{{ url('user/surat-masuk') }}">Surat Masuk</a></li>
                    <li class="breadcrumb-item active">Catatan</li>
                </ol>
              </div>
            </div>
            <div class="row">
              <!-- Bordered table -->
              <div class="col-md-12 my-1">
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
                                    <label class="my-1 mr-2 sr-only" for="inlineFormCustomSelectPref">Status</label>
                                    <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                                      <option selected>Choose...</option>
                                      <option value="1">Processing</option>
                                      <option value="2">Success</option>
                                      <option value="3">Pending</option>
                                      <option value="3">Hold</option>
                                    </select>
                                  </div>
                                </div>
                              </form>
                            </div>
                            <div class="col ml-auto">
                              <div class="dropdown float-right">
                                <button class="btn btn-success float-right ml-3" type="button" data-toggle="modal" data-target="#tambah"><span class="fe fe-plus fe-16 mr-1"></span>Tambah</button>
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="actionMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Action </button>
                                <div class="dropdown-menu" aria-labelledby="actionMenuButton">
                                  <a class="dropdown-item" href="#">Export</a>
                                  <a class="dropdown-item" href="#">Delete</a>
                                  <a class="dropdown-item" href="#">Something else here</a>
                                </div>
                              </div>
                            </div>
                          </div>
                          <table class="table table-hover">
                            <thead class="thead-light">
                              <tr>
                                <th>No</th>
                                <th>Catatan</th>
                                <th>Aksi</th>
                              </tr>
                            </thead>
                            <tbody>
                              @php
                                    $no = 1;
                              @endphp
                              @foreach ($catatan as $row)
                              <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $row->catatan }}</td>
                                <td>
                                    <button type="button" class="btn mb-2 btn-outline-primary" data-toggle="modal" data-target="#edit-{{ $row->id }}"><span class="fe fe-edit fe-16 mr-1"></span>Edit</button>
                                    <button type="button" class="btn mb-2 btn-outline-danger" data-toggle="modal" data-target="#hapus-{{ $row->id }}"><span class="fe fe-trash fe-16 mr-1"></span>Hapus</button>
                                </td>
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

<div class="modal fade bd-example-modal-lg" id="tambah" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="myLargeModalLabel">Tambah Catatan</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form class="form-horizontal" action="{{ url('user/tambah-catatan/'.$id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        @php
                            $mytime = date('d-m-Y H:i:s');
                        @endphp
                        <div class="form-group">
                            <label for="tindakan" class="form-label"><strong>Catatan</strong></label>
                            <input type="hidden" class="form-control" name="id_user" id="id_user" value="{{ Auth::user()->id }}">
                            <input type="hidden" class="form-control" name="id_surat" id="id_surat" value="{{ $id }}">
                            {{-- <input type="hidden" class="form-control" name="waktu" id="waktu-progres" value="{{ $mytime }}"> --}}
                            <input type="hidden" class="form-control" name="waktu" id="waktu-progres">
                            <textarea name="catatan" id="catatan" class="form-control" rows="5"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn mb-2 btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn mb-2 btn-primary">Save</button>
                </div>
            </form>
        </div>
      </div>
    </div>
</div>

@foreach ($catatan as $row)
<div class="modal fade bd-example-modal-lg" id="edit-{{ $row->id }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="myLargeModalLabel">Edit Catatan</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form class="form-horizontal" action="{{ url('user/edit-catatan/'.$id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        @php
                            $mytime = date('d-m-Y H:i:s');
                        @endphp
                        <div class="form-group">
                            <label for="tindakan" class="form-label"><strong>Catatan</strong></label>
                            <input type="hidden" class="form-control" name="id" id="id" value="{{ $row->id }}">
                            <input type="hidden" class="form-control" name="id_user" id="id_user" value="{{ Auth::user()->id }}">
                            <input type="hidden" class="form-control" name="id_surat" id="id_surat" value="{{ $id }}">
                            {{-- <input type="hidden" class="form-control" name="waktu" id="waktu-progres" value="{{ $mytime }}"> --}}
                            <input type="hidden" class="form-control" name="waktu" id="waktu-progres" value="{{ $row->waktu }}">
                            <textarea name="catatan" id="catatan" class="form-control" rows="5">{{ $row->catatan }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn mb-2 btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn mb-2 btn-primary">Save</button>
                </div>
            </form>
        </div>
      </div>
    </div>
</div>
@endforeach


@foreach ($catatan as $row)
<div class="modal fade bd-example-modal-lg" id="progres-{{ $row->id }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="myLargeModalLabel">Catatan Surat Perbaikan</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form class="form-horizontal" action="{{ url('super/progres-surat') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        @php
                            $mytime = date('d-m-Y H:i:s');
                        @endphp
                        <div class="form-group">
                            <label for="tindakan" class="form-label"><strong>Catatan</strong></label>
                            <input type="hidden" class="form-control" name="id_user" id="id_user" value="{{ $row->id_user }}">
                            <input type="hidden" class="form-control" name="id_surat" id="id_surat" value="{{ $row->id_surat }}">
                            <input type="text" class="form-control" name="waktu" id="waktu-progres" value="{{ $mytime }}">
                            <textarea name="tindakan" id="tindakan" class="form-control" rows="5">{{ $row->tindakan }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn mb-2 btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn mb-2 btn-primary">Save</button>
                </div>
            </form>
        </div>
      </div>
    </div>
</div>
@endforeach
