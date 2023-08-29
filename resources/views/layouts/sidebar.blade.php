<aside class="sidebar-left border-right bg-white shadow" id="leftSidebar" data-simplebar>
    <a href="#" class="btn collapseSidebar toggle-btn d-lg-none text-muted ml-2 mt-3" data-toggle="toggle">
      <i class="fe fe-x"><span class="sr-only"></span></i>
    </a>
    <nav class="vertnav navbar navbar-light">
      <!-- nav bar -->
      <div class="w-100 mb-4 d-flex">
        <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="./index.html">
          <img src="{{ asset('light/assets/images/rsi.png') }}" alt="" width="150" height="">
        </a>
      </div>
      <ul class="navbar-nav flex-fill w-100 mb-2">
        {{-- @if (Auth::check())
            @if (Auth::user()->id_level == 8) --}}
            <li class="nav-item w-100">
                <a class="nav-link" href="{{ url('/beranda') }}">
                <i class="fe fe-home fe-16"></i>
                <span class="ml-3 item-text">Dashboard</span>
                {{-- <span class="badge badge-pill badge-primary">New</span> --}}
                </a>
            </li>
            {{-- @endif
            @endif --}}
        @if (Auth::check())
            @if (Auth::user()->id_level == 8)
            <li class="nav-item dropdown">
                <a href="#dashboard" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                    <i class="fe fe-clipboard fe-16"></i>
                    <span class="ml-3 item-text">Master Data</span><span class="sr-only">(current)</span>
                </a>
                <ul class="collapse list-unstyled pl-4 w-100" id="dashboard">
                    <li class="nav-item active">
                    <a class="nav-link pl-3" href="{{ url('super/users') }}"><span class="ml-1 item-text">Data Users</span></a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link pl-3" href="{{ url('super/macam') }}"><span class="ml-1 item-text">Macam Perbaikan</span></a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link pl-3" href="{{ url('super/kondisi') }}"><span class="ml-1 item-text">Kondisi Barang</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="{{ url('super/level') }}"><span class="ml-1 item-text">Level</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="{{ url('super/bidang') }}"><span class="ml-1 item-text">Bidang</span></a>
                    </li>
                </ul>
            </li>
            @endif
        @endif
        @if (Auth::check())
            <li class="nav-item dropdown">
                <a href="#surat" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                    <i class="fe fe-clipboard fe-16"></i>
                    <span class="ml-3 item-text">Surat</span><span class="sr-only">(current)</span>
                </a>
                <ul class="collapse list-unstyled pl-4 w-100" id="surat">
                    @if (Auth::user()->id_level == 8)
                    <li class="nav-item active">
                        <a class="nav-link pl-3" href="{{ url('super/surat-masuk') }}"><span class="ml-1 item-text">Surat Masuk</span></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link pl-3" href="{{ url('surat/history') }}"><span class="ml-1 item-text">History Surat</span></a>
                    </li>
                    @elseif (Auth::user()->id_level == 6)
                        @if(Auth::user()->id_organisasi == 12 or Auth::user()->id_organisasi == 18 or Auth::user()->id_organisasi == 19 or Auth::user()->id_organisasi == 20)
                        <li class="nav-item active">
                            <a class="nav-link pl-3" href="{{ url('super/surat-masuk') }}"><span class="ml-1 item-text">Surat Masuk</span></a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link pl-3" href="{{ url('surat/history') }}"><span class="ml-1 item-text">History Surat</span></a>
                        </li>
                        @else
                        <li class="nav-item active">
                            <a class="nav-link pl-3" href="{{ url('user/surat-perbaikan') }}"><span class="ml-1 item-text">Surat Perbaikan</span></a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link pl-3" href="{{ url('surat/history') }}"><span class="ml-1 item-text">History Surat</span></a>
                        </li>
                        @endif
                    @elseif (Auth::user()->id_level == 10 or Auth::user()->id_level == 9)
                        @if(Auth::user()->id_organisasi == 12 or Auth::user()->id_organisasi == 18 or Auth::user()->id_organisasi == 19 or Auth::user()->id_organisasi == 20)
                        <li class="nav-item active">
                            <a class="nav-link pl-3" href="{{ url('super/surat-masuk') }}"><span class="ml-1 item-text">Surat Masuk</span></a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link pl-3" href="{{ url('surat/history') }}"><span class="ml-1 item-text">History Surat</span></a>
                        </li>
                        @else
                        <li class="nav-item active">
                            <a class="nav-link pl-3" href="{{ url('user/surat-perbaikan') }}"><span class="ml-1 item-text">Surat Perbaikan</span></a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link pl-3" href="{{ url('surat/history') }}"><span class="ml-1 item-text">History Surat</span></a>
                        </li>
                        @endif
                    @elseif(Auth::user()->id_level == 10)
                    <li class="nav-item active">
                        <a class="nav-link pl-3" href="{{ url('user/surat-perbaikan') }}"><span class="ml-1 item-text">Surat Perbaikan</span></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link pl-3" href="{{ url('surat/history') }}"><span class="ml-1 item-text">History Surat</span></a>
                    </li>
                    @else
                    <li class="nav-item active">
                        <a class="nav-link pl-3" href="{{ url('user/surat-perbaikan') }}"><span class="ml-1 item-text">Surat Perbaikan</span></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link pl-3" href="{{ url('surat/history-perbaikan') }}"><span class="ml-1 item-text">History Surat Perbaikan</span></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link pl-3" href="{{ url('user/surat-masuk') }}"><span class="ml-1 item-text">Surat Masuk</span></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link pl-3" href="{{ url('surat/history') }}"><span class="ml-1 item-text">History Surat Masuk</span></a>
                    </li>
                    @endif
                </ul>
            </li>
        @endif
            <li class="nav-item w-100">
                <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fe fe-lock fe-16"></i>
                <span class="ml-3 item-text">Logout</span>
                </a>
            </li>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
      </ul>
      <div class="btn-box w-100 mt-4 mb-1">
        {{-- <a href="https://themeforest.net/item/tinydash-bootstrap-html-admin-dashboard-template/27511269" target="_blank" class="btn mb-2 btn-primary btn-lg btn-block">
          <i class="fe fe-shopping-cart fe-12 mx-2"></i><span class="small">Buy now</span>
        </a> --}}
      </div>
    </nav>
  </aside>
