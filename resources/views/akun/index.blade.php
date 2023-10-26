<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Daftar Akun</title>
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/styledashboard.css') }}">
        <link href="https://cdn.jsdelivr.net/npm/remixicon@3.0.0/fonts/remixicon.css" rel="stylesheet">
    </head>
    <body>
         <!--- header  -->
         <section class="header">
            <div class="logo">
                <i class="ri-menu-line icon icon-0 menu"></i>
                <h2>E- <span>Sidokare</span></h2>
            </div>
            <div class="search--notification--profile">
                <div class="search">
                    <form action="{{ route('akun.index') }}" method="GET">
                        
                     
                        <input type="text" name="query" placeholder="Cari Pengguna" value="{{ $query }}" class="search-input" type="submit" class="search-button"input>
                    </form>
                </div>
                <div class="notification--profile">
                    <!-- <div class="picon bell">
                        <i class="ri-notification-2-line"></i> -->
                    </div>
                    <div class="picon profile">
                        <img src="{{ asset('img/1.png') }}" alt="">
                    </div>
                </div>
            </div>
    
        </section>
        <section class="main">
            <div class="sidebar">
                <ul class="sidebar--items">  
                <li>
                        <a href="/dashboard" >
                            <span class="icon icon-1"><i class="ri-layout-grid-line"></i></span>
                            <span class="sidebar--item">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="/formpengajuan">
                            <span class="icon icon-2"><i class="ri-bar-chart-grouped-line"></i></span>
                            <span class="sidebar--item">Pengajuan PPID</span>
                        </a>
                    </li>
                    <li>
                        <a href="/aspirasi">
                            <span class="icon icon-2"><i class="ri-bar-chart-box-line"></i></span>
                            <span class="sidebar--item">Pengajuan Aspirasi</span>
                        </a>
                    </li>
                    <li>
                        <a href="/keluhan">
                            <span class="icon icon-2"><i class="ri-file-chart-line"></i></span>
                            <span class="sidebar--item">Pengajuan Keluhan</span>
                        </a>
                    </li>
                    <li>
                        <a href="/berita">
                            <span class="icon icon-3"><i class="ri-customer-service-line"></i></span>
                            <span class="sidebar--item" style="white-space: nowrap;">Upload Berita</span>
                        </a>
                    </li>
                    <!-- <li>
                        <a href="/profile">
                            <span class="icon icon-4"><i class="ri-user-2-line"></i></span>
                            <span class="sidebar--item" style="white-space: nowrap;">Profil Pengguna</span>
                        </a>
                    </li>  -->
        
                    <li>
                        <a href="/akun"id="active--link">
                            <span class="icon icon-5"><i class="ri-folder-user-line"></i></span>
                            <span class="sidebar--item" style="white-space: nowrap;">Daftar Akun</span>
                        </a>
                    </li> 
        
                    @guest
                        <!-- Pengguna adalah role pegawai -->
                    @else
                        <!-- Pengguna adalah role admin -->
                        @if(auth()->user()->role === 'Admin')
                            <li>
                                <a href="/users">
                                    <span class="icon icon-4"><i class="ri-database-line"></i></span>
                                    <span class="sidebar--item" style="white-space: nowrap;">Daftar Pegawai</span>
                                </a>
                            </li>
                        @endif
                    @endguest
        
                </ul>
                <ul class="sidebar--bottom-items">
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
        
                            <x-responsive-nav-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                                <span class="icon icon-4"> <i class="ri-login-box-line"></i></span>   
                                {{ __('Log Out') }}
                            </x-responsive-nav-link>
                        </form>
                    </li> 
                </ul>
    
            </div>
       

            <div class="main--content">
                <div class="overview">
                <div class="title">
                   <h2 title="section--title">Daftar Akun</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <a href="{{ route('akun.create') }}" class="button1">Tambah Akun</a>
                </div>
  
<!-- 
    <a href="{{ route('akun.create') }}" class="btn btn-primary mb-3">Tambah Akun</a> -->

    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Email</th>
                <th>Role</th>
                <th>Nama</th>
                <th>Nomor Telepon</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($akun as $index => $data)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $data->email }}</td>
                    <td>{{ $data->role }}</td>
                    <td>{{ $data->nama }}</td>
                    <td>{{ $data->nomor_telepon }}</td>
                    <td>
                    <div class="button-container">
                    <a href="{{ route('akun.edit', $data->id_akun) }}" class="ri-edit-line edit"></a>
                        <form action="{{ route('akun.destroy', $data->id_akun) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="ri-delete-bin-line delete" onclick="return confirm('Apakah Anda yakin ingin menghapus akun ini?')"></button>
                        </form> 
    </div>
                        <!-- <a href="{{ route('akun.edit', $data->id_akun) }}" class="ri-edit-line edit"></a>
                        <form action="{{ route('akun.destroy', $data->id_akun) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="ri-delete-bin-line delete" onclick="return confirm('Apakah Anda yakin ingin menghapus akun ini?')"></button>
                        </form> -->
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.35.3/apexcharts.min.js"></script>
<script src="{{ asset('frontend/assets/js/formulir.js') }}"></script>
<script src="{{ asset('frontend/assets/js/dashboard.js') }}"></script>
</body>
</html>

