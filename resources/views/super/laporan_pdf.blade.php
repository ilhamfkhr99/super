<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous"> --}}
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css"> --}}
        <link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.22.0/dist/bootstrap-table.min.css">
        <link rel="stylesheet" href="{{ asset('light/css/feather.css') }}">
        <link rel="stylesheet" href="{{ asset('light/css/simplebar.css') }}">
</head>


<body>
    <div class="row" >
        <div class="col-md-12">
            @foreach ($surat as $row)
                @php
                    $tahun = date('Y', strtotime($row->waktu));
                    $bulan = date('m', strtotime($row->waktu));
                    $tanggal = date('d', strtotime($row->waktu));
                @endphp
                {{-- @if (!empty($row->id_ttd)) --}}
                <table class="table table-bordered" style="border:solid">
                        <thead>
                            <tr>
                                <th colspan="3" style="font-family: Trebuchet MS;border:solid;text-align:center" valign="top" scope="col">No.<br>{{ $row->nomer }}</th>
                                <th colspan="3" style="font-family: Trebuchet MS;border:solid;text-align:center" scope="col">RUMAH SAKIT ISLAM SURABAYA<br><u>SISTEM INFORMASI MANAJEMEN</u><br>FORMULIR PERMINTAAN PERBAIKAN</th>
                                <th style="font-family: Trebuchet MS;border:solid;text-align:center" scope="col">Pemohon<br><font size="2">{{ $row->nama_user }}</font><br><font size="2">({{ $row->lokasi }})</font></th>
                            </tr>
                            <tr>
                                <th colspan="3" style="font-family: Trebuchet MS;border:solid;text-align:center">Tanggal Permintaan</th>
                                <th colspan="3"style="font-family: Trebuchet MS;border:solid;text-align:center">Macam Perbaikan</th>
                                <th style="font-family: Trebuchet MS;border:solid;text-align:center">Kep. Unit / Bagian</th>
                            </tr>
                            <tr>
                                <th style="font-family: Trebuchet MS;border:solid;text-align:center">Tgl</th>
                                <th style="font-family: Trebuchet MS;border:solid;text-align:center">Bln</th>
                                <th style="font-family: Trebuchet MS;border:solid;text-align:center">Thn</th>
                                @foreach ($macam as $val)
                                    @if($val->id == $row->id_macam)
                                        <th style="font-family: Trebuchet MS;text-align:center" class=""><font size="2"><span class="fe fe-18 fe-check-square"></span> {{ $val->nama }}</font></th>
                                    @else
                                        <th style="font-family: Trebuchet MS;text-align:center"><font size="2"><span class="fe fe-18 fe-square"></span> {{ $val->nama }}</font></th>
                                    @endif
                                @endforeach
                                <th rowspan="2" style="font-family: Trebuchet MS;border:solid;text-align:center"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="font-family: Trebuchet MS;border:solid;text-align:center">{{ $tanggal }}</td>
                                <td style="font-family: Trebuchet MS;border:solid;text-align:center">{{ $bulan }}</td>
                                <td style="font-family: Trebuchet MS;border:solid;text-align:center">{{ $tahun }}</td>
                                <td colspan="3" style="font-family: Trebuchet MS;text-align:center"></td>
                            </tr>
                        </tbody>
                </table>
                <table class="table table-bordered" style="border:solid" >
                        <thead>
                            <tr>
                                <th style="font-family: Trebuchet MS;border:solid" scope="col"><font size="2">Jenis Pemeliharaan & Pengembangan Sistem:</font></th>
                                <th style="font-family: Trebuchet MS;border:solid" scope="col"><font size="2">Lokasi:</font></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="font-family: Trebuchet MS;border:solid" scope="col"><font size="2"><textarea style="border: 0">{{ $row->jenis_pemeliharaan }}</textarea></font></td>
                                <td style="font-family: Trebuchet MS" scope="col"><font size="2">{{ $row->lokasi }}</font></td>
                            </tr>
                        </tbody>
                </table>
                <table class="table table-bordered" style="border:solid" >
                        <thead>
                            <tr>
                                <th style="font-family: Trebuchet MS;border:solid" scope="col"><font size="2">Penjelasan Kerusakan:</font></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="font-family: Trebuchet MS;border:solid" scope="col"><font size="2"><textarea style="border: 0">{{ $row->kerusakan }}</textarea></td></font>
                            </tr>
                        </tbody>
                </table>
                <table class="table table-bordered" style="border:solid">
                        <thead>
                            <tr>
                                <th style="font-family: Trebuchet MS;border:solid" scope="col" valign="top" width="180px"><font size="2">Dibuat Tiga Lembar:</font></th>
                                <th style="font-family: Trebuchet MS;border:solid" scope="col" valign="top" width="100px"><font size="2">Diterima Tgl Oleh:</font></th>
                                <th style="font-family: Trebuchet MS;border:solid" scope="col" valign="top"><font size="2">Dilaksanakan Oleh:</font></th>
                                <th style="font-family: Trebuchet MS;border:solid" scope="col" valign="top"><font size="2">Mengetahui Kepala Bagian:</font></th>
                                <th style="font-family: Trebuchet MS;border:solid" scope="col" valign="top"><font size="2">Penyerahan stl. perbaikan Diterima oleh:</font></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="font-family: Trebuchet MS;border:solid" scope="col">
                                    <font size="2">
                                    - Lembar putih untuk SIM
                                    <br>- Lembar merah untuk Logistik
                                    <br>- Lembar kuning untuk Arsip
                                    </font>
                                </td>
                                @php
                                    $organisasi = App\Models\Organisasi::whereIn('id', [18,19,20])->get();
                                    $kasi = App\Models\Organisasi::where('id', 12)->first();
                                    $id = App\Models\Organisasi::where('id', 10)->first();
                                    // $tangan = App\Models\Ttd::join('users', 'users.id', '=', 'ttd.id_user')
                                    //     ->select('ttd.*','users.*')
                                    //     ->where('ttd.id_surat', $row->id)
                                    //     ->first();
                                    // dd($tangan);
                                @endphp
                                @foreach ($tanda as $val)
                                    @if ($val->id_organisasi == 18 or $val->id_organisasi == 19 or $val->id_organisasi == 20)
                                        <td style="font-family: Trebuchet MS;border:solid;text-align:center;" scope="col"><font size="2"><img src="{{ asset('signatures/'.$val->tanda_tangan) }}" width="100px"><br>({{ $val->nama }})</font></td>
                                    @elseif ($val->id_organisasi == 18 or $val->id_organisasi == 19 or $val->id_organisasi == 20)
                                        <td style="font-family: Trebuchet MS;border:solid;text-align:center;" scope="col"><font size="2"><br>({{ $val->nama }})</font></td>
                                    @elseif($val->id_organisasi == 12)
                                        <td style="font-family: Trebuchet MS;border:solid;text-align:center;" scope="col"><font size="2"><img src="{{ asset('signatures/'.$val->tanda_tangan) }}" width="100px"><br>({{ $val->nama }})</font></td>
                                    @elseif ($val->id_organisasi != 18 && $val->id_organisasi != 19 && $val->id_organisasi != 20 && $val->id_organisasi != 12)
                                        <td style="font-family: Trebuchet MS;border:solid;text-align:center;" scope="col"><font size="2"><img src="{{ asset('signatures/'.$val->tanda_tangan) }}" width="100px"><br>({{ $val->nama }})</font></td>
                                    @endif
                                @endforeach
                            </tr>
                        </tbody>
                </table>
                <table class="table table-bordered" style="border:solid" >
                        <thead>
                            <tr>
                                <th style="font-family: Trebuchet MS;border:solid" scope="col" valign="top"><font size="2">Kondisi Barang / Perbaikan:</font></th>
                                <th style="font-family: Trebuchet MS;border:solid;text-align:center" scope="col" valign="top"><font size="2">Tanda tangan Kep. Ruangan</font></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="font-family: Trebuchet MS;border:solid" scope="col" class="">
                                    @foreach ($kondisi as $val)
                                    @if($val->id == $row->id_kondisi)
                                        <font size="2">
                                            <span class="fe fe-18 fe-check-square "></span> {{ $val->nama }}<br><br>
                                        </font>
                                    @else
                                        <font size="2">
                                            <span class="fe fe-18 fe-square "></span> {{ $val->nama }}<br><br>
                                        </font>
                                    @endif
                                    @endforeach
                                </td>
                                @foreach ($tangan as $val)
                                    {{-- @if ($val->id_organisasi != 18 && $val->id_organisasi != 19 && $val->id_organisasi && 20 && $val->id_organisasi != 12) --}}
                                        <td style="font-family: Trebuchet MS;border:solid;text-align:center" scope="col"><font size="2"><img src="{{ url('signatures/'.$val->tanda_tangan) }}" height="100px"><br>( {{ $val->nama }} )</font></td>
                                    {{-- @endif --}}
                                @endforeach
                            </tr>
                        </tbody>
                </table>
            @endforeach
        </div>
    </div>
</body>

</html>


