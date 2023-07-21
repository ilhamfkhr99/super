@extends('layouts.main')
@section('title', 'Data Bidang')
@section('content')
<main role="main" class="main-content">
    <div class="container-fluid">
        <div class="row justify-content-center">
          <div class="col-12">
            <div class="row align-items-center my-4">
              <div class="col">
                <h2 class="h3 mb-0 page-title">Data Surat Perbaikan</h2>
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
                                <button class="btn btn-success float-right ml-3" type="button" data-toggle="modal" data-target="#tambah"><span class="fe fe-plus fe-16 mr-1"></span>Ajukan</button>
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
                            <th>Jenis Pemeliharaan</th>
                            <th>Macam Perbaikan</th>
                            <th>Kerusakan</th>
                            <th>Tanggal</th>
                            <th>Kondisi Barang</th>
                            <th>Tindakan</th>
                            <th>Status</th>
                            <th>Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                          @php
                                $no = 1;
                          @endphp
                          @foreach ($surat as $row)
                          <tr>
                              <td>{{ $no++ }}</td>
                              <td>{{ $row->jenis_pemeliharaan }}</td>
                              <td>{{ $row->macam }}</td>
                              <td>{{ $row->kerusakan }}</td>
                              <td>{{ $row->waktu }}</td>
                              <td>{{ $row->kondisi }}</td>
                              <td>{{ $row->tindakan }}</td>
                              @if($row->status == 'Menunggu')
                              <td><span class="badge badge-pill badge-primary">{{ $row->status }}</span></td>
                              @elseif ($row->status == 'Proses')
                              <td><span class="badge badge-pill badge-warning">{{ $row->status }}</span></td>
                              @endif
                            <td>
                                <button type="button" class="btn mb-2 btn-outline-info" data-toggle="modal" data-target="#edit" data-id="{{ $row->id_surat }}"><span class="fe fe-edit fe-16 mr-1"></span>Edit</button>
                                <button type="button" class="btn mb-2 btn-outline-danger" data-toggle="modal" data-target="#hapus-{{ $row->id_surat }}"><span class="fe fe-trash fe-16 mr-1"></span>Hapus</button>
                                <a href="{{ url('exportlaporan/'.$row->id_surat) }}" class="btn mb-2 btn-outline-warning"><span class="fe fe-file fe-16 mr-1"></span>Eksport</a>
                                <button type="button" class="btn mb-2 btn-outline-primary" data-toggle="modal" data-target="#ttd" data-id="{{ $row->id_surat }}"><span class="fe fe-edit fe-16 mr-1"></span>Tanda Tangan</button>
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

<div class="modal fade bd-example-modal-xl" id="tambah" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="varyModalLabel">Ajukan Surat Perbaikan</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form class="form-horizontal" action="{{ route('ajukan-surat') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    @php
                        $bidang   = App\Models\Organisasi::select('id', 'nama')->where('id', Auth::user()->id_organisasi)->first();
                    @endphp
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="lokasi" class="form-label"><strong>Lokasi</strong></label>
                            <input type="text" class="form-control" name="lokasi" id="lokasi" value="{{ $bidang->nama }}">
                            <input type="hidden" class="form-control" name="id_user" id="id_user" value="{{ Auth::user()->id }}">
                            <input type="hidden" class="form-control" name="id_organisasi" id="id_organisasi" value="{{ Auth::user()->id_organisasi }}">
                            {{-- <input type="hidden" class="form-control" name="id_surat" id="id_surat" value="{{ $row->id }}"> --}}
                        </div>
                    </div>
                    @php
                        $mytime = date('d-m-Y H:i:s');
                    @endphp
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="unit" class="form-label"><strong>Tgl Permintaan</strong></label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="waktu" id="waktu" value="{{ $mytime }}">
                                <div class="input-group-append">
                                    <div class="input-group-text" id="button-addon-date"><span class="fe fe-calendar fe-16"></span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="unit" class="form-label"><strong>Macam Perbaikan</strong></label>
                            <select name="id_macam" id="id_macam" class="form-control">
                                @foreach ($macam as $val)
                                    <option value="{{ $val->id }}">{{ $val->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="unit" class="form-label"><strong>Kondisi Barang</strong></label>
                            <select name="id_kondisi" id="id_kondisi" class="form-control">
                                @foreach ($kondisi as $val)
                                    <option value="{{ $val->id }}">{{ $val->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="bukti" class="form-label"><strong>Lampiran</strong></label>
                            <input type="file" class="form-control" name="file" id="file">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="unit" class="form-label"><strong>Jenis Pemeliharaan</strong></label>
                            <textarea name="jenis_pemeliharaan" id="jenis_pemeliharaan" class="form-control" rows="5"></textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="unit" class="form-label"><strong>Kerusakan</strong></label>
                            <textarea name="kerusakan" id="kerusakan" class="form-control" rows="5"></textarea>
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

@foreach ($surat as $row)
{{-- <div class="modal fade " id="ttd{{ $row->id_surat }}" tabindex="-1" role="dialog" aria-labelledby="varyModalLabel" aria-hidden="true"> --}}
<div class="modal fade " id="ttd" tabindex="-1" role="dialog" aria-labelledby="varyModalLabel" aria-hidden="true" data-id="{{ $row->id_surat }}">
{{-- <div class="modal fade ttd{{ $row->id_surat }}" id="ttd" tabindex="-1" role="dialog" aria-labelledby="varyModalLabel" aria-hidden="true"> --}}
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="varyModalLabel">Tanda Tangan</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form method="POST" action="{{ url('super/ttd/'.$row->id_surat) }}">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="form-label" for="tanda_tangan{{ $row->id_surat }}">Silahkan membuat tandatangan sesuai</label>
                            <input type="hidden" class="form-control" name="id_surat" value="{{ $row->id_surat }}">
                            <input type="hidden" class="form-control" name="id_user" value="{{ Auth::user()->id }}">
                             <div id="sig" class="sig">{{ $row->tanda_tangan }}</div>
                             <textarea id="signature64" name="tanda_tangan" style="display:none" class="signature64"></textarea>
                         </div>
                         <br/>
                         <button id="clear" class="btn btn-danger clear">Clear</button>
                         <button type="submit" class="btn btn-success">Simpan</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
      </div>
    </div>
</div>
@endforeach

@foreach ($surat as $row)
<div class="modal fade bd-example-modal-xl" id="edit" data-id="{{ $row->id_surat }}" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
{{-- <div class="modal fade bd-example-modal-xl" id="edit-{{ $row->id_surat }}" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true"> --}}
    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="varyModalLabel">Edit Pengajuan Surat</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form class="form-horizontal" action="{{ route('edit-surat') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    @php
                        $bidang   = App\Models\Organisasi::select('id', 'nama')->where('id', Auth::user()->id_organisasi)->first();
                    @endphp
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="lokasi" class="form-label"><strong>Lokasi</strong></label>
                            <input type="text" class="form-control" name="lokasi" id="lokasi" value="{{ $row->lokasi }}">
                            <input type="hidden" class="form-control" name="id" id="id" value="{{ $row->id_surat }}">
                            <input type="hidden" class="form-control" name="id_user" id="id_user" value="{{ Auth::user()->id }}">
                            <input type="hidden" class="form-control" name="id_organisasi" id="id_organisasi" value="{{ Auth::user()->id_organisasi }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="unit" class="form-label"><strong>Tgl Permintaan</strong></label>
                            <div class="input-group">
                                <input type="text" class="form-control waktu-edit" name="waktu" id="waktu-edit" value="{{ $row->waktu }}">
                                <div class="input-group-append">
                                    <div class="input-group-text" id="button-addon-date"><span class="fe fe-calendar fe-16"></span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="unit" class="form-label"><strong>Macam Perbaikan</strong></label>
                            <select name="id_macam" id="id_macam" class="form-control">
                                @foreach ($macam as $val)
                                    <option value="{{ $val->id }}" {{ ($val->id == $row->id_macam) ? 'selected' : '' }}>{{ $val->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="unit" class="form-label"><strong>Kondisi Barang</strong></label>
                            <select name="id_kondisi" id="id_kondisi" class="form-control">
                                @foreach ($kondisi as $val)
                                    <option value="{{ $val->id }}" {{ ($val->id == $row->id_kondisi) ? 'selected' : '' }}>{{ $val->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="bukti" class="form-label"><strong>Lampiran</strong></label>
                            <input type="file" class="form-control" name="file" id="file">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="unit" class="form-label"><strong>Jenis Pemeliharaan</strong></label>
                            <textarea name="jenis_pemeliharaan" id="jenis_pemeliharaan" class="form-control" rows="5">{{ $row->jenis_pemeliharaan }}</textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="unit" class="form-label"><strong>Kerusakan</strong></label>
                            <textarea name="kerusakan" id="kerusakan" class="form-control" rows="5">{{ $row->kerusakan }}</textarea>
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

@foreach ($surat as $row)
<div class="modal fade" id="hapus-{{ $row->id_surat }}" tabindex="-1" role="dialog" aria-labelledby="varyModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="varyModalLabel">Hapus Surat Perbaikan</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form class="form-horizontal" action="{{ url('user/hapus-surat/'.$row->id_surat) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('delete')
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <input type="hidden" class="form-control" name="id" id="id" value="{{ $row->id }}">
                            <h3>Apakah Yakin dihapus ?</h3>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn mb-2 btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn mb-2 btn-primary">Ya</button>
                </div>
            </form>
        </div>
      </div>
    </div>
</div>
@endforeach
