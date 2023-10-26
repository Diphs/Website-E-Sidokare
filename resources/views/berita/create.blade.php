<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Berita</title>
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/styledashboard.css') }}">
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/berita.css') }}">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
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
                            <a href="/berita"id="active--link">
                                <span class="icon icon-3"><i class="ri-customer-service-line"></i></span>
                                <span class="sidebar--item" style="white-space: nowrap;">Upload Berita</span>
                            </a>
                        </li>
            
                        <li>
                            <a href="/akun">
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
                                   <span class="icon icon-4"> <i class="ri-login-box-line"></i></span>    {{ __('Log Out') }}
                                </x-responsive-nav-link>
                            </form>
                        </li> 
                    </ul>
        
                </div>
        
                
       
<!-- Tab;e -->
            <div class="main--content">
                <div class="overview">
                <div class="title">
                   <!-- <h2 title="section--title">Formulir Pengajuan </h2> -->
                   <div class="container">
                    <header>Formulir Pembuatan Berita Desa Sidokare</header>
               
            
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
            
                    <form action="{{ route('berita.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <form>
                         <div class="row">
                             <div class="column">
                                 <label for="judul">Judul Berita</label>
                                 <input type="text" id="Judul Berita" class="form-control" placeholder="Judul Berita"  name="judul_berita" value="{{ old('judul_berita') }}" required>
                             </div>
                             <div class="column">
                                 <label for="tanggal_publikasi">Tanggal Terbit</label>
                                 <input type="datetime-local" class="form-control" id="tanggal_publikasi" placeholder="Tanggal Terbit"name="tanggal_publikasi" value="{{ old('tanggal_publikasi') }}" required>
                             </div>
                         </div>
                         <div class="row">
                             <div class="column">
                                 <label for="id_kategori">Kategori Berita</label>
                                 <!-- <input type="text" id="Kategori Berita" placeholder="Kategori Berita"> -->
                                 <select class="form-control" id="id_kategori" name="id_kategori" required>
                                <option value="ktg_berita01">BUM Desa</option>
                                <option value="ktg_berita02">PKK</option>
                                <option value="ktg_berita03">Pemerintah Desa</option>
                                <option value="ktg_berita04">Potensi Desa</option>
                                <option value="ktg_berita05">Pembangunan Masyarakat</option>
                                <option value="ktg_berita06">Pemberdayaan Masyarakat</option>
                                <option value="ktg_berita07">Pembinaan Masyarakat</option>
                            </select>
                                 
                             </div>
                             <div class="column">
                                 <label for="foto">Foto</label>
                                 <input type="file" class="form-control-file" id="foto" name="foto">
                             </div>
                         </div>
                         <div class="row">
                             <div class="column">
                                 <label for="isi_berita">Isi Berita</label>
                                 <textarea class="form-control" id="isi_berita" name="isi_berita" required>{{ old('isi_berita') }}</textarea>
                             </div>
                         </div>
                         <button type="submit" id="btnSimpan" class="btn btn-primary">Simpan</button>


                     </form>
                        <!-- <div class="form-group">
                            <label for="judul_berita">Judul Berita</label>
                            <input type="text" class="form-control" id="judul_berita" name="judul_berita" value="{{ old('judul_berita') }}" required>
                        </div>
            
                        <div class="form-group">
                            <label for="tanggal_publikasi">Tanggal dan Jam Publikasi</label>
                            <input type="datetime-local" class="form-control" id="tanggal_publikasi" name="tanggal_publikasi" value="{{ old('tanggal_publikasi') }}" required>
                        </div>
                        
            
                        <div class="form-group">
                            <label for="id_kategori">Kategori</label>
                            <select class="form-control" id="id_kategori" name="id_kategori" required>
                                <option value="ktg_berita01">BUM Desa</option>
                                <option value="ktg_berita02">PKK</option>
                                <option value="ktg_berita03">Pemerintah Desa</option>
                                <option value="ktg_berita04">Potensi Desa</option>
                                <option value="ktg_berita05">Pembangunan Masyarakat</option>
                                <option value="ktg_berita06">Pemberdayaan Masyarakat</option>
                                <option value="ktg_berita07">Pembinaan Masyarakat</option>
                            </select>
                        </div>
            
                        <div class="form-group">
                            <label for="isi_berita">Isi Berita</label>
                            <textarea class="form-control" id="isi_berita" name="isi_berita" required>{{ old('isi_berita') }}</textarea>
                        </div>
            
                        <div class="form-group">
                            <label for="foto">Foto</label>
                            <input type="file" class="form-control-file" id="foto" name="foto">
                        </div> -->
            
                        {{-- <div class="form-group">
                            <label for="unggah_file_lain">Unggah File Lain</label>
                            <input type="file" class="form-control-file" id="unggah_file_lain" name="unggah_file_lain">
                        </div> --}}
            
                        <!-- <button type="submit" class="btn btn-primary">Simpan</button> -->
                    </form>
                </div>
            </div>
            
<script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.35.3/apexcharts.min.js"></script>
<script src="{{ asset('frontend/assets/js/formulir.js') }}"></script>
<script src="{{ asset('frontend/assets/js/dashboard.js') }}"></script>
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

</body>
</html>