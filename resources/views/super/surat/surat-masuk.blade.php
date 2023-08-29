{{-- <link rel="icon" href="{{ asset('light/assets/images/logo-yarsis.png') }}">
<title>Surat Masuk</title> --}}
@extends('layouts.main')
@section('title', 'Surat Masuk')
@section('content')
<main role="main" class="main-content">
    <div class="container-fluid">
        <div class="row justify-content-center">
          <div class="col-12">
            <div class="row align-items-center my-4">
              <div class="col">
                <h2 class="h3 mb-0 page-title">Data Surat Masuk</h2>
                {{-- <h2 class="h3 mb-0 page-title">History Surat</h2> --}}
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
                                    <input type="text" class="form-control search" id="search" value="" placeholder="Search">
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
                              @foreach ($surat as $key => $row)
                              @php
                                  $ttd = App\Models\Ttd::where('id_surat', $row->id_surat)->first();
                              @endphp
                              <tr>
                                  <td>{{ $surat->firstItem() + $key }}</td>
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
                                <td>
                                    @if(empty($row->ttd1))
                                        @if(Auth::user()->id_organisasi == 19 or Auth::user()->id_level == 9)
                                            <button type="button" class="btn mb-2 btn-outline-primary" data-toggle="modal" data-target="#konfirmasi{{ $row->id_surat }}"><span class="fe fe-edit fe-16 mr-1"></span>Konfirmasi Terima</button>
                                            <a href="{{ url('exportlaporan/'.$row->id_surat) }}" class="btn mb-2 btn-outline-warning"><span class="fe fe-file fe-16 mr-1"></span>Eksport</a>
                                        @else
                                            <a href="{{ url('exportlaporan/'.$row->id_surat) }}" class="btn mb-2 btn-outline-warning"><span class="fe fe-file fe-16 mr-1"></span>Eksport</a>
                                        @endif
                                    @elseif(empty($row->ttd2))

                                        {{-- Level Admin SIM --}}
                                        @if(Auth::user()->id_organisasi == 19 && Auth::user()->id_level == 9)
                                            <a href="{{ url('exportlaporan/'.$row->id_surat) }}" class="btn mb-2 btn-outline-warning"><span class="fe fe-file fe-16 mr-1"></span>Eksport</a>

                                        {{-- Level Karyawan Biasa --}}
                                        @elseif((Auth::user()->id_organisasi == 18 or Auth::user()->id_organisasi == 19 or Auth::user()->id_organisasi == 20) && Auth::user()->id_level == 10)
                                            @if(empty($row->tindakan))
                                                <button type="button" class="btn mb-2 btn-outline-info" data-toggle="modal" data-target="#edit-{{ $row->id_surat }}"><span class="fe fe-chevron-right fe-16 mr-1"></span>Tindak Lanjut</button>
                                                <a href="{{ url('user/catatan-surat/'.$row->id_surat) }}" class="btn mb-2 btn-outline-success"><span class="fe fe-activity fe-16 mr-1"></span>Progres</a>
                                                <a href="{{ url('exportlaporan/'.$row->id_surat) }}" class="btn mb-2 btn-outline-warning"><span class="fe fe-file fe-16 mr-1"></span>Eksport</a>
                                            @else
                                                <button type="button" class="btn mb-2 btn-outline-primary" data-toggle="modal" data-target="#ttd-{{ $row->id_surat }}" data-id="{{ $row->id_surat }}"><span class="fe fe-edit fe-16 mr-1"></span>Tanda Tangan</button>
                                                <a href="{{ url('exportlaporan/'.$row->id_surat) }}" class="btn mb-2 btn-outline-warning"><span class="fe fe-file fe-16 mr-1"></span>Eksport</a>
                                            @endif

                                        {{-- Level Kasi SIM --}}
                                        @elseif((Auth::user()->id_organisasi == 18 or Auth::user()->id_organisasi == 19 or Auth::user()->id_organisasi == 20) && Auth::user()->id_level == 6)
                                            @if(empty($row->tindakan))
                                                <button type="button" class="btn mb-2 btn-outline-info" data-toggle="modal" data-target="#edit-{{ $row->id_surat }}"><span class="fe fe-chevron-right fe-16 mr-1"></span>Tindak Lanjut</button>
                                                <a href="{{ url('user/catatan-surat/'.$row->id_surat) }}" class="btn mb-2 btn-outline-success"><span class="fe fe-activity fe-16 mr-1"></span>Progres</a>
                                                <a href="{{ url('exportlaporan/'.$row->id_surat) }}" class="btn mb-2 btn-outline-warning"><span class="fe fe-file fe-16 mr-1"></span>Eksport</a>
                                            @else
                                                <button type="button" class="btn mb-2 btn-outline-primary" data-toggle="modal" data-target="#ttd-{{ $row->id_surat }}" data-id="{{ $row->id_surat }}"><span class="fe fe-edit fe-16 mr-1"></span>Tanda Tangan</button>
                                                <a href="{{ url('exportlaporan/'.$row->id_surat) }}" class="btn mb-2 btn-outline-warning"><span class="fe fe-file fe-16 mr-1"></span>Eksport</a>
                                            @endif
                                        @endif

                                    @elseif(empty($row->ttd3))
                                        @if((Auth::user()->id_organisasi == 18 or Auth::user()->id_organisasi == 19 or Auth::user()->id_organisasi == 20) && Auth::user()->id_level == 6)
                                            <button type="button" class="btn mb-2 btn-outline-primary" data-toggle="modal" data-target="#ttd-{{ $row->id_surat }}" data-id="{{ $row->id_surat }}"><span class="fe fe-edit fe-16 mr-1"></span>Tanda Tangan</button>
                                            <a href="{{ url('exportlaporan/'.$row->id_surat) }}" class="btn mb-2 btn-outline-warning"><span class="fe fe-file fe-16 mr-1"></span>Eksport</a>
                                        @else
                                            <button type="button" class="btn mb-2 btn-outline-primary" data-toggle="modal" disabled><span class="fe fe-edit fe-16 mr-1"></span>Tanda Tangan</button>
                                            <a href="{{ url('exportlaporan/'.$row->id_surat) }}" class="btn mb-2 btn-outline-warning"><span class="fe fe-file fe-16 mr-1"></span>Eksport</a>
                                        @endif

                                    @else
                                        <button type="button" class="btn mb-2 btn-outline-primary" data-toggle="modal" disabled><span class="fe fe-edit fe-16 mr-1"></span>Tanda Tangan</button>
                                        <a href="{{ url('exportlaporan/'.$row->id_surat) }}" class="btn mb-2 btn-outline-warning"><span class="fe fe-file fe-16 mr-1"></span>Eksport</a>
                                    @endif
                                </td>
                              </tr>
                                @php
                                    $tabel = 'organisasi';
                                    $organisasi = $row->id_organisasi;
                                    $software = App\Models\Surat::join('macam', 'macam.id', '=', 'surat.id_macam')
                                        ->join('organisasi', 'organisasi.id', '=', 'surat.id_organisasi')
                                        ->select('surat.*', 'surat.id as id_surat','macam.*', 'macam.nama as macam')
                                        ->where('macam.nama', 'Software')
                                        ->where('organisasi.id', $row->id_organisasi)
                                        ->orwhere('organisasi.id_parent', $row->id_organisasi)
                                        ->orWhereIn('organisasi.id_parent', function($query) use ($tabel, $organisasi){
                                            $query->select('organisasi.id')
                                                ->from($tabel)
                                                ->where('macam.nama', 'Software')
                                                ->orwhere('organisasi.id_parent', $organisasi);
                                            })
                                        ->count();

                                    $hardware = App\Models\Surat::join('macam', 'macam.id', '=', 'surat.id_macam')
                                        ->join('organisasi', 'organisasi.id', '=', 'surat.id_organisasi')
                                        ->select('surat.*', 'surat.id as id_surat', 'macam.*', 'macam.nama as macam')
                                        ->where('macam.nama', 'Hardware')
                                        ->where('organisasi.id', $row->id_organisasi)
                                        ->orwhere('organisasi.id_parent', $row->id_organisasi)
                                        ->orWhereIn('organisasi.id_parent', function($query) use ($tabel, $organisasi){
                                            $query->select('organisasi.id')
                                                ->from($tabel)
                                                ->where('macam.nama', 'Hardware')
                                                ->orwhere('organisasi.id_parent', $organisasi);
                                            })
                                        ->count();

                                    $jaringan = App\Models\Surat::join('macam', 'macam.id', '=', 'surat.id_macam')
                                        ->join('organisasi', 'organisasi.id', '=', 'surat.id_organisasi')
                                        ->select('surat.*', 'surat.id as id_surat', 'macam.*', 'macam.nama as macam')
                                        ->where('macam.nama', 'Jaringan')
                                        ->where('organisasi.id', $row->id_organisasi)
                                        ->orwhere('organisasi.id_parent', $row->id_organisasi)
                                        ->orWhereIn('organisasi.id_parent', function($query) use ($tabel, $organisasi){
                                            $query->select('organisasi.id')
                                                ->from($tabel)
                                                ->where('macam.nama', 'Jaringan')
                                                ->orwhere('organisasi.id_parent', $organisasi);
                                            })
                                        ->count();
                                @endphp
                              @endforeach
                            </tbody>
                          </table>
                          {{-- <div class="col">
                            <span class="mr-3"> Software : {{ $software }}</span>
                            <span class="mr-3"> Hardware : {{ $hardware }}</span>
                            <span class="mr-3"> Jaringan : {{ $jaringan }} </span>
                          </div> --}}
                    </div>
                    {{ $surat->links('vendor.pagination.bootstrap-4') }}
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

@foreach ($surat as $row)
<div class="modal fade" id="konfirmasi{{ $row->id_surat }}" tabindex="-1" role="dialog" aria-labelledby="varyModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="varyModalLabel">Konfirmasi Surat</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form class="form-horizontal" action="{{ url('konfirmasi-surat') }}" method="post" enctype="multipart/form-data">
                @csrf
                {{-- @method('delete') --}}
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <input type="hidden" class="form-control" name="id_surat" id="id" value="{{ $row->id_surat }}">
                            <input type="hidden" class="form-control" name="ttd1" id="ttd1" value="{{ Auth::user()->id }}">
                            <h3>Apakah Anda Yakin Konfirmasi Surat ?</h3>
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

@foreach ($surat as $row)
<div class="modal fade" id="ttd-{{ $row->id_surat }}" tabindex="-1" role="dialog" aria-labelledby="varyModalLabel" aria-hidden="true" data-id="{{ $row->id_surat }}">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="varyModalLabel">Tanda Tangan Pelaksanaan Surat</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form class="form-horizontal" action="{{ url('ttd-surat') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <input type="hidden" class="form-control" name="id_surat" id="id" value="{{ $row->id_surat }}">
                            {{-- <input type="hidden" class="form-control" name="ttd2" id="ttd2" value="{{ Auth::user()->id }}"> --}}
                            <h3>Apakah Anda Yakin Surat Sudah Ditindaklanjuti ?</h3>
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

{{-- @foreach ($surat as $row) --}}
{{-- <div class="modal fade " id="ttd" tabindex="-1" role="dialog" aria-labelledby="varyModalLabel" aria-hidden="true" data-id="{{ $row->id_surat }}" value="{{ $row->id_surat }}"> --}}
{{-- <div class="modal fade" id="ttd{{ $row->id_surat }}" tabindex="-1" role="dialog" aria-labelledby="varyModalLabel" aria-hidden="true" data-id="{{ $row->id_surat }}">
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
</div> --}}
{{-- @endforeach --}}

@foreach ($surat as $row)
<div class="modal fade bd-example-modal-lg" id="edit-{{ $row->id_surat }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="myLargeModalLabel">Tindak lanjut Surat</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form class="form-horizontal" action="{{ url('super/tindaklanjut-surat') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="unit" class="form-label"><strong>Nomer Surat</strong></label>
                            <input type="hidden" class="form-control" name="id" id="id" value="{{ $row->id_surat }}">
                            <input type="text" class="form-control" name="nomer" id="nomer" value="{{ $row->nomer }}">
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="tindakan" class="form-label"><strong>Tindakan</strong></label>
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

@foreach ($surat as $row)
<div class="modal fade bd-example-modal-lg" id="progres-{{ $row->id_surat }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
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
