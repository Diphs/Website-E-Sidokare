<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Edit Berita</title>
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/styledashboard.css') }}">
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/berita.css') }}">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
        <link href="https://cdn.jsdelivr.net/npm/remixicon@3.0.0/fonts/remixicon.css" rel="stylesheet">
    </head>
    <style>
    .btn-primary {
        margin-top: 5px; /* Atur jarak atas */
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
                <div class=>
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
                               <span class="icon icon-4"> <i class="ri-login-box-line"></i></span>    {{ __('Log Out') }}
                            </x-responsive-nav-link>
                        </form>
                    </li> 
                </ul>
    
            </div>
    
    
      
        </div>
    
            </div>
            <div class="main--content">
                <div class="overview">
                    <!-- <h1>Edit Berita</h1> -->
                    <div class="title">
                   <div class="container">
                    <header>Formulir Edit Berita Desa Sidokare</header>
            
                    <form action="{{ route('berita.update', $berita->id_berita) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <form>
                         <div class="row">
                             <div class="column">
                                 <label for="judul">Judul Berita</label>
                                 <input type="text" class="form-control" id="judul_berita" name="judul_berita" value="{{ $berita->judul_berita }}" required>
                             </div>
                             <div class="column">
                                 <label for="tanggal_publikasi">Tanggal Terbit</label>
                                 <input type="datetime-local" class="form-control" id="tanggal_publikasi" name="tanggal_publikasi" value="{{ date('Y-m-d\TH:i', strtotime($berita->tanggal_publikasi)) }}" required>
                             </div>
                         </div>
                         <div class="row">
                             <div class="column">
                                 <label for="id_kategori">Kategori Berita</label>
                                 <select class="form-control" id="id_kategori" name="id_kategori" required>
                                 <option value="">Pilih Kategori</option>
                                @for ($i = 1; $i <= 7; $i++)
                                    @php
                                        $kategoriValue = 'ktg_berita' . str_pad($i, 2, '0', STR_PAD_LEFT);
                                        $kategoriText = '';
                                        if ($kategoriValue === 'ktg_berita01') {
                                            $kategoriText = 'BUM Desa';
                                        }
                                        if ($kategoriValue === 'ktg_berita02') {
                                            $kategoriText = 'PKK';
                                        }
                                        if ($kategoriValue === 'ktg_berita03') {
                                            $kategoriText = 'Pemerintah Desa';
                                        }
                                        if ($kategoriValue === 'ktg_berita04') {
                                            $kategoriText = 'Potensi Desa';
                                        }
                                        if ($kategoriValue === 'ktg_berita05') {
                                            $kategoriText = 'Pembangunan Masyarakat';
                                        }
                                        if ($kategoriValue === 'ktg_berita06') {
                                            $kategoriText = 'Pemberdayaan Masyarakat';
                                        }
                                        if ($kategoriValue === 'ktg_berita07') {
                                            $kategoriText = 'Pembinaan Masyarakat';
                                        }
                                    @endphp
                                    <option value="{{ $kategoriValue }}" @if ($berita->id_kategori === $kategoriValue) selected @endif>{{ $kategoriText }}</option>
                                @endfor
                            </select>
                                 
                             </div>
                         </div>
                         <div class="row">
                             <div class="column">
                             <label for="isi_berita">Isi Berita</label>
                            <textarea class="form-control" id="isi_berita" name="isi_berita" required>{{ $berita->isi_berita }}</textarea>
                             </div>
                             <div class="form-outline mb-4">
                             <div class="form-foto">
                            <label for="foto" class="form-label">Foto</label>
                        
                                @if ($berita->foto)
                                    <img src="{{ asset('storage/berita/'.$berita->foto) }}" alt="{{ $berita->foto }}">
                                @endif
                                <input type="file" id="foto" name="foto" style="display: none;">
                            </div>
                            <br>
                            <input type="text" name="foto" id="foto" disabled class="form-control mt-2" value="{{ $berita->foto }}">
                            <br>
                          
                            <input type="file" id="ganti-foto" name="ganti-foto" style="display: none;">
                          
                            <button class="btn btn-secondary" onclick="document.getElementById('ganti-foto').disabled = true; document.getElementById('ganti-foto').value = ''; document.getElementById('foto').disabled = false; document.getElementById('foto').click(); event.preventDefault();">Ganti File Foto</button>
                        </div>
                         </div>
                         <button type="submit" id="btnSimpan" class="btn btn-primary">Simpan</button>
                     </form>
            
                      
                        
                        {{-- <div class="form-group">
                            <label for="unggah_file_lain">Unggah File Lain</label>
                            @if ($berita->unggah_file_lain)
                                <p><a href="{{ asset('file/' . $berita->unggah_file_lain) }}">Unduh File</a></p>
                            @endif
                            <input type="file" class="form-control-file" id="unggah_file_lain" name="unggah_file_lain">
                        </div> --}}
                        
                    </form>
                </div>
            </div>
            
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