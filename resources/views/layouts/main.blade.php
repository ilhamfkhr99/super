<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{ asset('light/assets/images/logo-yarsis.png') }}">
    <title>Super - RSI Surabaya A Yani</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Simple bar CSS -->
    <link rel="stylesheet" href="{{ asset('light/css/simplebar.css') }}">
    <!-- Fonts CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!-- Icons CSS -->
    <link rel="stylesheet" href="{{ asset('light/css/feather.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('light/css/select2.css') }}">
    <link rel="stylesheet" href="{{ asset('light/css/dropzone.css') }}">
    <link rel="stylesheet" href="{{ asset('light/css/uppy.min.css') }}">
    <link rel="stylesheet" href="{{ asset('light/css/jquery.steps.css') }}">
    <link rel="stylesheet" href="{{ asset('light/css/jquery.timepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('light/css/quill.snow.css') }}">
    <link rel="stylesheet" href="{{ asset('light/css/apexcharts.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('light/dist/apexcharts.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('light/css/dataTables.bootstrap4.css') }}">
    <!-- Date Range Picker CSS -->
    <link rel="stylesheet" href="{{ asset('light/css/daterangepicker.css') }}">
    <!-- Date Time Picker CSS -->
    <link rel="stylesheet" href="{{ asset('light/datetimepicker3/build/css/bootstrap-datetimepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('light/datetimepicker3/build/css/bootstrap-datetimepicker.css') }}">
    <!-- App CSS -->
    <link rel="stylesheet" href="{{ asset('light/css/app-light.css') }}" id="lightTheme">
    <link rel="stylesheet" href="{{ asset('light/css/app-dark.css') }}" id="darkTheme" disabled>
  </head>
  <body class="vertical light">
    <div class="wrapper">
      @include('layouts.header')
      @include('layouts.sidebar')
      {{-- @yield('content') --}}
       <!-- main -->
    </div> <!-- .wrapper -->
    <script src="{{ asset('light/js/jquery.min.js') }}"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> --}}
    {{-- <script src="{{ asset('/js/app.js') }}"></script> --}}
    <script src="{{ asset('light/js/popper.min.js') }}"></script>
    <script src="{{ asset('light/js/moment.min.js') }}"></script>
    <script src="{{ asset('light/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('light/js/simplebar.min.js') }}"></script>
    <script src='{{ asset('light/js/daterangepicker.js') }}'></script>

    <script src="{{ asset('light/datetimepicker3/build/js/bootstrap-datetimepicker.min.js') }}"></script>

    <script src='{{ asset('light/js/jquery.stickOnScroll.js') }}'></script>
    <script src="{{ asset('light/js/tinycolor-min.js') }}"></script>
    <script src="{{ asset('light/js/config.js') }}"></script>
    <script src="{{ asset('light/js/d3.min.js') }}"></script>
    <script src="{{ asset('light/js/topojson.min.js') }}"></script>
    <script src="{{ asset('light/js/datamaps.all.min.js') }}"></script>
    <script src="{{ asset('light/js/datamaps-zoomto.js') }}"></script>
    <script src="{{ asset('light/js/datamaps.custom.js') }}"></script>
    <script src="{{ asset('light/js/Chart.min.js') }}"></script>

    <script src='{{ asset('light/js/jquery.mask.min.js') }}'></script>
    {{-- <script src='{{ asset('light/select2/js/select2.full.min.js') }}'></script> --}}
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
    <script src='{{ asset('light/js/select2.min.js') }}'></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script> --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script> --}}
    <script src='{{ asset('light/js/jquery.steps.min.js') }}'></script>
    <script src='{{ asset('light/js/jquery.validate.min.js') }}'></script>
    <script src='{{ asset('light/js/jquery.timepicker.js') }}'></script>
    <script src='{{ asset('light/js/dropzone.min.js') }}'></script>
    <script src='{{ asset('light/js/uppy.min.js') }}'></script>
    <script src='{{ asset('light/js/quill.min.js') }}'></script>
    <script>
      /* defind global options */
      Chart.defaults.global.defaultFontFamily = base.defaultFontFamily;
      Chart.defaults.global.defaultFontColor = colors.mutedColor;


    </script>
    <script src="{{ asset('light/js/gauge.min.js') }}"></script>
    <script src="{{ asset('light/js/jquery.sparkline.min.js') }}"></script>
    <script src="{{ asset('light/js/apexcharts.min.js') }}"></script>
    <script src="{{ asset('light/js/apexcharts.custom.js') }}"></script>
    <script src="{{ asset('light/js/apps.js') }}"></script>
    {{-- <script type="text/javascript">
        var options = {
            chart: {
                type: 'line'
            },
            series: [{
                name: 'sales',
                data: [30,40,35,50,49,60,70,91,125]
            }],
            xaxis: {
                categories: [1991,1992,1993,1994,1995,1996,1997, 1998,1999]
            }
        }

        var chart = new ApexCharts(document.querySelector("#chart"), options);

        chart.render();
    </script> --}}
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-56159088-1"></script>

    {{-- <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.css"> --}}

    <link type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/south-street/jquery-ui.css" rel="stylesheet">

    <script type="text/javascript"src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script type="text/javascript" src="http://keith-wood.name/js/jquery.signature.js"></script>
    @yield('content')
    <div class="container-fluid">
        <footer class="row justify-content-center">
            <div class="col-12">
                <div class="card shadow">
                    <div class="card-footer">
                        <div class="toolbar row mb-3 ml-5">
                            <!-- To the right -->
                            <div class="float-center d-none d-sm-inline ml-5">
                                Anything you want
                            </div>
                            <!-- Default to the left -->
                            <div class="ml-5">
                                <strong>Powered by Ilham&copy; 2023 <a href="https://rsisurabaya.com/">SIM RSI A Yani</a>.</strong>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>


    <link rel="stylesheet" type="text/css" href="http://keith-wood.name/css/jquery.signature.css">
    <style>
        .kbw-signature { width: 100%; height: 200px;}
        /* #sig canvas{
            width: 100% !important;
            height: auto;
        } */
    </style>
    <script>
      window.dataLayer = window.dataLayer || [];

      function gtag()
      {
        dataLayer.push(arguments);
      }
      gtag('js', new Date());
      gtag('config', 'UA-56159088-1');

      // editor
      var editor = document.getElementById('editor');
      if (editor)
      {
        var toolbarOptions = [
          [
          {
            'font': []
          }],
          [
          {
            'header': [1, 2, 3, 4, 5, 6, false]
          }],
          ['bold', 'italic', 'underline', 'strike'],
          ['blockquote', 'code-block'],
          [
          {
            'header': 1
          },
          {
            'header': 2
          }],
          [
          {
            'list': 'ordered'
          },
          {
            'list': 'bullet'
          }],
          [
          {
            'script': 'sub'
          },
          {
            'script': 'super'
          }],
          [
          {
            'indent': '-1'
          },
          {
            'indent': '+1'
          }], // outdent/indent
          [
          {
            'direction': 'rtl'
          }], // text direction
          [
          {
            'color': []
          },
          {
            'background': []
          }], // dropdown with defaults from theme
          [
          {
            'align': []
          }],
          ['clean'] // remove formatting button
        ];
        var quill = new Quill(editor,
        {
          modules:
          {
            toolbar: toolbarOptions
          },
          theme: 'snow'
        });
      }
    </script>
    <script>
        // SEARCH FUNCTION
        var btsearch = {
            init: function(search, searchable_elements, searchable_text_class) {
                $(search).keyup(function(e){
                    e.preventDefault();
                    var query = $(this).val().toLowerCase();
                    if(query){
                        // loop through all elements to find match
                        $.each($(searchable_elements), function(){
                            var title = $(this).find(searchable_text_class).text().toLowerCase();
                            if(title.indexOf(query) == -1){
                                $(this).hide();
                            } else {
                                $(this).show();
                            }
                        });
                    } else {
                        // empty query so show everything
                        $(searchable_elements).show();
                    }
                });
            }
}

// INIT
$(function(){
  // USAGE: btsearch.init(('search field element', 'searchable children elements', 'searchable text class');
  btsearch.init('#search', '#demonames tbody', '.demoname');
});
    </script>
    <script type="text/javascript">
        // macam_pilih();

        $('#macam').on('change', function () {
            var macam        =   $("#macam").val();
            console.log(macam);
            if(macam){
                    $.ajax({
                        type:"GET",
                        url:"{{ url('super/surat-masuk') }}",
                        data    : {
                                    "id":id_bidang,
                                },
                        success : function(msg){
                            console.log(msg);
                            $('#macam').html(msg);
                        },
                    })
                }
        });
    </script>
    <script type="text/javascript">
        var sig = $('.sig').signature({syncField: '.signature64', syncFormat: 'PNG'});
        $('.clear').click(function(e) {
            e.preventDefault();
            sig.signature('clear');
            $(".signature64").val('');
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#id_level').select2(
            // $('.level-add').select2(
            {
                theme: 'bootstrap4',
            });
            $('#id_unit').select2(
            // $('.unit-add').select2(
            {
                theme: 'bootstrap4',
                multiple: true,
            });

            $('#id_bidang').select2(
            {
                theme: 'bootstrap4',
            });
            $('#id_merk').select2(
            {
                theme: 'bootstrap4',
            });
            $('#id_tipe').select2(
            {
                theme: 'bootstrap4',
            });
            $('#id_parent').select2(
            {
                theme: 'bootstrap4',
            });
            $('#id_macam').select2(
            {
                theme: 'bootstrap4',
            });
            $('#id_kondisi').select2(
            {
                theme: 'bootstrap4',
            });

            $('#id_parent-edit').select2({
                theme: 'bootstrap4',
            });
            $('#id_bidang-edit').select2({
                theme: 'bootstrap4',
            });

                $('#id_unit-edit').select2({
                    theme: 'bootstrap4',
                    multiple: true,
                });
                    $('#id_level-edit').select2(
                    {
                        theme: 'bootstrap4',
                    });
                    $('#id_bidang-edit').select2(
                    {
                        theme: 'bootstrap4',
                    });
                    $('#id_macam-edit').select2(
                    {
                        theme: 'bootstrap4',
                    });
                    $('#id_kondisi-edit').select2(
                    {
                        theme: 'bootstrap4',
                    });
        });
    </script>
    <script type="text/javascript">
        $(function () {
            $('#waktu').datetimepicker({
                format: 'DD-MM-YYYY HH:mm:ss',
                icons: {
                    time: "fe fe-16 fe-clock",
                    date: "fe fe-16 fe-calendar",
                    up: "fe fe-16 fe-chevron-up",
                    down: "fe fe-16 fe-chevron-down",
                    previous: "fe fe-16 fe-chevron-left",
                    next: "fe fe-16 fe-chevron-right",
                    }
                // dateFormat: "dd-mm-yy",
                // timeFormat: "HH:mm:ss"
            });

                $('#waktu-edit').datetimepicker({
                    format: 'YYYY-MM-DD HH:mm:ss',
                    // format: 'DD-MM-YYYY HH:mm:ss',
                    icons: {
                        time: "fe fe-16 fe-clock",
                        date: "fe fe-16 fe-calendar",
                        up: "fe fe-16 fe-chevron-up",
                        down: "fe fe-16 fe-chevron-down",
                        previous: "fe fe-16 fe-chevron-left",
                        next: "fe fe-16 fe-chevron-right",
                        }
                });
        });
     </script>
    <script>
        $(function() {
            $.ajaxSetup({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
            });
            $('#id_bidang').on('change', function () {
                var id_bidang = $('#id_bidang').val();
                console.log(id_bidang);

                if(id_bidang){
                    $.ajax({
                        type:"GET",
                        url:"{{ url('/getbidang') }}",
                        data    : {
                                    "id":id_bidang,
                                },
                        success : function(msg){
                            console.log(msg);
                            $('#id_unit').html(msg);
                        },
                    })
                }

            });
        })
    </script>
    {{-- <script type="text/javascript">
    var labels =  {{ Js::from($labels) }};
    var users =  {{ Js::from($data) }};

        var options = {
            chart: {
                type: 'line'
            },
            series: [{
                name: 'sales',
                // data: [30,40,35,50,49,60,70,91,125]
                data: labels
            }],
            xaxis: {
                // categories: [1991,1992,1993,1994,1995,1996,1997, 1998,1999]
                categories: users
            }
        }

    var chart = new ApexCharts(document.querySelector("#chart"), options);

    chart.render();
    </script> --}}
  </body>
</html>
