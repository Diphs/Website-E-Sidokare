<!DOCTYPE html>
    <html lang="en">
    <head>
    <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Tambah Akun</title>
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/styledashboard.css') }}">
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/berita1.css') }}">   
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
                <div class="">
                    <!-- <input type="text" placeholder="Cari Pengajuan">
                    <button> <i class="ri-search-2-line"></i></button> -->
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
                             <span class="icon icon-4"> <i class="ri-login-box-line"></i></span>{{ __('Log Out') }}
                            </x-responsive-nav-link>
                        </form>
                    </li> 
                </ul>
    
            </div>
            
            <div class="main--content">
                <div class="overview">
                <div class="title">
                   <!-- <h2 title="section--title">Formulir Pengajuan </h2> -->
                   <div class="container">
                    <header>Tambah Akun</header>
               
            
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
            
                    <form action="{{ route('akun.store') }}" method="POST">
        @csrf
                        <form>
                         <div class="row">
                             <div class="column">
                             <label for="email">Email</label>
            <input type="email" name="email" class="form-control" required placeholder="a@gmail.com">
                             </div>
                             <div class="column">
                             <label for="password">Password</label>
            <input type="password" name="password" class="form-control" required>
                             </div>
                         </div>
                         <div class="row">
                             <div class="column">
                             <label for="nik">NIK</label>
            <input type="text" name="nik" class="form-control" required>
                                 
                             </div>
                             <div class="column">
                             <label for="nomor_telepon">Nomor Telepon</label>
            <input type="text" name="nomor_telepon" class="form-control" >
                             </div>
                         </div>
                         <div class="row">
                             <div class="column">
                             <label for="nama">Nama</label>
            <input type="text" name="nama" class="form-control" required>
                         </div>
                        </div>
                         <div class="row">
                             <div class="column">
                             <label for="role">User</label>
                             <select class="form-control" id="role" name="role" required>
                                <option value="User">User</option>
                            </select>
                         </div>
                         </div>
                         <div class="row">
                             <div class="column">
                             <input type="hidden" name="status_verif" value="1">
        <input type="hidden" name="status_verif" value="{{ rand(10000, 99999) }}">
        <button type="submit" id="btnSimpan" class="btn btn-primary">Simpan</button>
                        </div>
                      
                         </div>
                     </form>
            <!-- <div class="main--content">
                <div class="overview">
                <div class="title">
                   <h2 title="section--title">Tambah Akun Baru </h2> -->
<!-- 
    <h1>Tambah Akun Baru</h1> -->

    <!-- <form action="{{ route('akun.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="nik">Nik</label>
            <input type="text" name="nik" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="role">role</label>
            <select class="form-control" id="role" name="role" required>
                <option value="User">User</option>
              
               
            </select>
        </div>

        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" name="nama" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="nomor_telepon">Nomor Telepon</label>
            <input type="text" name="nomor_telepon" class="form-control" required>
        </div>
        <input type="hidden" name="status_verif" value="1">
        <input type="hidden" name="status_verif" value="{{ rand(10000, 99999) }}">  Generate random OTP (5 digit) -->

      
    </form>

</div>

</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.35.3/apexcharts.min.js"></script>
<script src="{{ asset('frontend/assets/js/formulir.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.getElementById('btnSimpan').addEventListener('click', function() {
        // Lakukan proses penyimpanan data ke database di sini
        // Setelah proses berhasil, tampilkan notifikasi menggunakan SweetAlert

        // Contoh notifikasi menggunakan SweetAlert
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: 'Data berhasil disimpan',
            showConfirmButton: false,
            timer: 1500
        });
    });
</script>
<script src="{{ asset('frontend/assets/js/dashboard.js') }}"></script>
</body>
</html>