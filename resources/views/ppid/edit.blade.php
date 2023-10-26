<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Edit PPID</title>
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/styledashboard.css') }}">
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/berita.css') }}">
     
        <link href="https://cdn.jsdelivr.net/npm/remixicon@3.0.0/fonts/remixicon.css" rel="stylesheet">
</head>
<style>
    .btn-primary {
        margin-top: 10px; /* Atur jarak atas */
        margin-right: 10px; /* Atur jarak kanan */
        margin-bottom: 20px; /* Atur jarak bawah */
        /* margin-left: auto;  */
        /* Atur jarak kiri */
    }
</style>
<body>
     <!--- header  -->

     <section class="header">
        <div class="logo">
            <i class="ri-menu-line icon icon-0 menu"></i>
            <h2>E- <span>Sidokare</span></h2>
        </div>
        <div class="search--notification--profile">
            <div class="">
                <!-- <input type="text" placeholder="">
                <button> <i class=""></i></button> -->
            </div>
            <div class="">
                <!-- <div class="picon bell">
                    <i class="ri-notification-2-line"></i> -->
                </div>
                <div class="picon profile">
                    <img src="{{ asset('frontend/assets/img/1.png') }}" alt="">
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
                        <a href="/formpengajuan"id="active--link">
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
                               <span class="icon icon-4"> <i class="ri-login-box-line"></i></span>    {{ __( 'Log Out') }}
                            </x-responsive-nav-link>
                        </form>
                    </li> 
                </ul>
    
            </div>

        <div class="main--content">
                <div class="overview">
                    <!-- <h1>Edit Berita</h1> -->
                    <div class="title">
                   <div class="container">
                    <header>Formulir Edit PPID Desa Sidokare</header>
            
                    <form action="{{ route('ppid.update', $ppid->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <form>
                         <div class="row">
                             <div class="column">
                                 <label for="judul">Nama Pelapor</label>
                                 <input type="text" class="form-control" id="nama_pelapor" name="nama_pelapor" value="{{ $ppid->nama }}" required>
                             </div>
                             <div class="column">
                                 <label for="judul">Judul PPID</label>
                                 <input type="text" class="form-control" id="judul_aspirasi" name="judul_laporan" value="{{ $ppid->judul_laporan }}" required>
                             </div>
                         </div>
                         <div class="row">
                         <div class="column">
                                 <label for="judul">Kategori PPID</label>
                                 <input type="text" class="form-control" id="judul_aspirasi" name="judul_laporan" value="{{ $ppid->kategori_ppid }}" required>
                         </div>
                         </div>
                         <div class="row">
                             <div class="column">
                                 <label for="tanggal_publikasi">Status</label>
                                 <select class="form-control" id="id_kategori" name="statusppid">
                                 <option value="" hidden>{{ $ppid->status }}</option>
                                    <option value="Diproses">Diproses</option>
                                    <option value="Diproses">Direview</option>
                                    <option value="Selesai">Selesai</option>
                                    <option value="Ditolak">Ditolak</option>
                                </select>
                             </div>
                         </div>
                        

                         <div class="row">
                            <div class="column">
                                <label for="isi_berita">Isi PPID</label>
                               <textarea class="form-control" id="isi_aspirasi" name="isi_laporan" required>{{ $ppid->isi_laporan }}</textarea>
                            </div>
                            <div class="form-outline mb-4">
                        <div class="form-foto">
                            <label for="foto" class="form-label">Foto</label>
                        
                                @if ($ppid->upload_file_pendukung)
                                    <img src="{{ url('storage/app/public/ppid/'.$ppid->upload_file_pendukung) }}" alt="{{ $ppid->upload_file_pendukung }}">
                                @endif
                                <input type="file" id="foto" name="foto" style="display: none;">
                        </div>
                        <input type="file" name="doc_fileppid">
                         <button type="submit" id="btnSimpan" class="btn btn-primary">Simpan</button>
                </div>
            </div>      
                               
                    </form>
                </div>
            
                </div>
            </section>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.35.3/apexcharts.min.js"></script>
            <script src="{{ asset('frontend/assets/js/formulir.js') }}"></script>
            <script src="{{ asset('frontend/assets/js/dashboard.js') }}"></script>
            <script src="{{ asset('frontend/assets/js/script.js') }}"></script>
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.getElementById('btnSimpan').addEventListener('click', function() {
        // Lakukan proses penyimpanan data ke database di sini
        // Setelah proses berhasil, tampilkan notifikasi menggunakan SweetAlert

        // Contoh notifikasi menggunakan SweetAlert
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: 'Data berhasil di edit',
            showConfirmButton: false,
            timer: 1500
        });
    });
</script>
       </body>
       </html>