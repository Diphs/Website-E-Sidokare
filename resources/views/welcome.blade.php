<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desa Sidokare</title>
    <!--Main CSS-->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/font-awesome.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/style.css') }}">
</head>
<body>
     <!--Navbar mulai-->
     <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">
        <a class="navbar-brand" href="{{ url('#') }}">E-Sidokare</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
         <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link active"  data-scroll-nav="0" href="{{ url('#home') }}">Beranda</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-scroll-nav="1"  href="{{ url('#features') }}">Fitur</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-scroll-nav="2"  href="{{ url('#fun-facts') }}">Fun Facts</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-scroll-nav="3"  href="{{ url('#app-screenshots') }}">Tampilan</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-scroll-nav="4"  href="{{ url('#how-it-works') }}">Cara Kerja</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-scroll-nav="5"  href="{{ url('#contact') }}">Kontak</a>
              </li>
              <li class="nav-item">
                <a class="nav-link"  href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Masuk</a>
              </li>
          </ul>
        </div>
        </div>
      </nav>
      <!--Navbar Akhir-->

       <!--Home Awal-->
        <section class="home d-flex align-items-center" id="home" data-scroll-index="0">
            <div class="effect-wrap">
                <i class="fas fa-plus effect effect-1"></i>
                <i class="fas fa-plus effect effect-2"></i>
                <i class="fas fa-circle-notch effect effect-3"></i>

            </div>
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-7">
                        <div class="home-text">
                            <h1>E-Sidokare Aplikasi Real Time informasi</h1>
                            <p> Aplikasi mobile PPID terintegrasi dengan sistem informasi publik yang ada di instansi pemerintahan sehingga memudahkan pengelolaan dan akses informasi publik secara terpadu.</p>
                            <div class="home-btn">
                                <a href="{{ url('#') }}" class="btn btn-1"><i class="fab fa-google-play"></i> Download Sekarang</a>
                                <button type="button" class="btn btn-1 video-play-btn"><i class="fas fa-play"></i> Tutorial</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5 text-center">
                        <div class="home-img">
                            <div class="circle"></div>
                            <img src="{{ asset('frontend/assets/img/1.png') }}" alt="Sidokare">
                        </div>
                    </div>
                </div>
            </div>
        </section>
       <!--Home akhir-->
       <!-- Video Pop awal-->
       <div class="video-popup">
        <div class="video-popup-inner">
            <i class="fas fa-times video-popup-close"></i>
            <div class="iframe-box">
                <!-- <iframe id="player-1"  src="https://www.youtube.com/embed/hBelhQ6-3WU" title="YouTube video player" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe> -->
                <iframe id="player-1" src="" title="YouTube video player"  allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            </div>
        </div>
       </div> 
       <!--Video Pop Akhir-->
       <!---Fitur E Sidokare awal -->
       <section class="features section-padding" id="features" data-scroll-index="1">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-8">
              <div class="section-title">
                <h2>Fitur Aplikasi <span>E-Sidokare</span></h2>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="owl-carousel features-carousel">
              <div class="features-item">
                <div class="icon"><i class="fas fa-user"></i></div>
                <h3>Ramah Pengguna</h3>
                <p> Kami selalu memperhatikan pengalaman pengguna dalam menggunakan aplikasi kami, dan fitur cepat dalam penanganan keluhan dan informasi.</p>
              </div>
              <div class="features-item">
                <div class="icon"><i class="fas fa-edit"></i></div>
                <h3>Mudah Digunakan</h3>
                <p> Fitur aplikasi kami yang cepat juga mudah digunakan, sehingga pengguna dapat dengan mudah menyelesaikan keluhan dan memperoleh informasi tanpa kesulitan.</p>
              </div>
              <div class="features-item">
                <div class="icon"><i class="fas fa-check-double"></i></div>
                <h3>Terintergrasi</h3>
                <p> Aplikasi kami terintegrasi dengan sistem manajemen tiket, sehingga memungkinkan kami untuk mengelola dan menangani keluhan pengguna dengan lebih efektif.</p>
              </div>
            </div>
          </div>
        </div>
       </section>
        <!---Fitur E Sidokare akhir  -->
       <!---Funfact awal  -->
       <section class="fun-facts section-padding"  id="fun-facts" data-scroll-index="2">
        <div class="container">
          <div class="row">
            <div class="col-lg-6 col-md-5 d-flex align-items-center justify-content-center">
              <div class="fun-facts-img">
                <img src="{{ asset('frontend/assets/img/1.png') }}" alt="fun facts">
              </div>
            </div>
            <div class="col-lg-6 col-md-7">
              <div class="section-title">
                <h2>fun <span>facts</span></h2>
              </div>
              <div class="fun-facts-text">
                <p> E-Sidokare telah membantu dalam tata kelola pemerintah dan masyarakat sehingga E-Sidokare sudah digunakan :</p>
                <div class="row">
                  <div class="col-sm-6">
                    <div class="fun-fact-item style-kolom">
                      <h3>150</h3>
                      <span>Download</span>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="fun-fact-item style-kolom">
                      <h3>50</h3>
                      <span>Penyuka</span>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="fun-fact-item style-kolom">
                      <h3>40</h3>
                      <span>Rating Bintang 5</span>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="fun-fact-item style-kolom">
                      <h3>1</h3>
                      <span>Penghargaan</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
       </section>
        <!---Funfact akhir -->
         <!---gambar aplikasi awal  -->
         <section class="app-screenshots section-padding" id="app-screenshots" data-scroll-index="3">
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-lg-8">
                <div class="section-title">
                  <h2>Screen  <span>E-Sidokare</span></h2>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="owl-carousel screenshots-carousel">
                <div class="screenshot-item">
                  <img src="{{ asset('frontend/assets/img/3b.png') }}" alt="screenshot">
                </div>
                <div class="screenshot-item">
                  <img src="{{ asset('frontend/assets/img/1a.png') }}" alt="screenshot">
                </div>
                <div class="screenshot-item">
                  <img src="{{ asset('frontend/assets/img/2b.png') }}" alt="screenshot">
                </div>
                <div class="screenshot-item">
                  <img src="{{ asset('frontend/assets/img/4b.png') }}" alt="screenshot">
                </div>
              </div>
            </div>
          </div>

        
         </section>
          <!---gambar aplikasi akhir -->
        <!--- penggunaan awal  -->
        <section class="how-it-works section-padding" id="how-it-works" data-scroll-index="4">
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-lg-8">
                <div class="section-title">
                  <h2>Cara Pengajuan Laporan <span>E-Sidokare</span></h2>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-3 col-md-6">
                <div class="how-it-works-item line-right">
                  <div class="step">1</div>
                  <h3>Tulis Laporan</h3>
                  <p>Laporkan keluhan atau aspirasi anda dengan jelas dan lengkap</p>
                </div>
              </div>
              <div class="col-lg-3 col-md-6">
                <div class="how-it-works-item line-right">
                  <div class="step">2</div>
                  <h3>Proses Verifikasi</h3>
                  <p>Dalam 3 hari, laporan Anda akan diverifikasi dan diteruskan kepada instansi berwenang</p>
                </div>
              </div>
              <div class="col-lg-3 col-md-6">
                <div class="how-it-works-item line-right">
                  <div class="step">3</div>
                  <h3>Proses Tindak Lanjut</h3>
                  <p>Dalam 5 hari, instansi akan menindaklanjuti dan membalas laporan Anda</p>
                </div>
              </div>
              <div class="col-lg-3 col-md-6">
                <div class="how-it-works-item">
                  <div class="step">4</div>
                  <h3>Beri Tanggapan</h3>
                  <p>Anda dapat menanggapi kembali balasan yang diberikan oleh instansi dalam waktu 10 hari</p>
                </div>
              </div>

            </div>
          </div>
        </section>
        <!--- penggunaan akhir  -->
        <!--- FAQ awal  -->
        <section class="faq section-padding" id="faq" data-scroll-index="4">
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-lg-8">
                <div class="section-title">
                  <h2>Frequently <span>Ask and Question</span> </h2>
                </div>
              </div>
            </div>
            <div class="row justify-content-center">
              <div class="col-lg-10">
                <div id="accordion">
                  <div class="accordion-item">
                    <div class="accordion-header" data-toggle="collapse" data-target="#collapse-01">
                      <h3>Kemana saya harus mengirim berita yang ingin diposting dan apakah syarat-syaratnya?</h3>
                    </div>
                    <div class="collapse show" id="collapse-01" data-parent="#accordion">
                      <div class="accordion-body">
                        <p>: Berita dapat dikirimkan melalui salah satu E-Mail ini : desa.sidokari.go.id atau Bisa juga melalui Whatsapp di nomor 081904024849.</p>
                      </div>
                    </div>
                  </div>
                  <div class="accordion-item">
                    <div class="accordion-header collapsed" data-toggle="collapse" data-target="#collapse-02">
                      <h3>Apa saja jenis informasi yang dapat diajukan melalui aplikasi ini?</h3>
                    </div>
                    <div class="collapse" id="collapse-02" data-parent="#accordion">
                      <div class="accordion-body">
                        <p>Pengajuan PPID, Menyuarakan keluhan, dan memberikan aspirasi berupa saran dan kritik untuk se[putar desa Sidokare</p>
                      </div>
                    </div>
                  </div>
                  <div class="accordion-item">
                    <div class="accordion-header collapsed" data-toggle="collapse" data-target="#collapse-03">
                      <h3>Bagaimana cara memastikan informasi yang diajukan aman dan terlindungi?</h3>
                    </div>
                    <div class="collapse" id="collapse-03" data-parent="#accordion">
                      <div class="accordion-body">
                        <p>: Berita dapat dikirimkan melalui salah satu E-Mail ini : desa.sidokari.go.id atau Bisa juga melalui Whatsapp di nomor 081904024849.</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
         <!--- FAQ akhir  -->
          <!--- kontak awal  -->
          <section class="contact section-padding" id="contact" data-scroll-index="5">
            <div class="container">
              <div class="row justify-content-center">
                <div class="col-lg-8">
                  <div class="section-title">
                    <h2>Komentar <span>Kontak</span></h2>
                  </div>
                </div>
                  </div>
                  <div class="row justify-content-center">
                  <div class="content">
                    <div class="left-side">
                      <div class="address details">
                        <i class="fas fa-map-marker-alt"></i>
                        <div class="topic">Alamat</div>
                        <div class="text-one">Nganjuk</div>
                        <div class="text-two">Desa Sidokare</div>
                      </div>
                      <div class="phone details">
                        <i class="fas fa-phone-alt"></i>
                        <div class="topic">Nomor Telepon</div>
                        <div class="text-one">+0098 9893 5647</div>
                        <div class="text-two">+0096 3434 5678</div>
                      </div>
                      <div class="email details">
                        <i class="fas fa-envelope"></i>
                        <div class="topic">Email</div>
                        <div class="text-one">desasidokare.go.id</div>
                      </div>
                    </div>
                    <div class="right-side">  
                      <div class="topic-text">Kirim Pesan</div>
                      <p>Anda dapat mengirimi saya pesan dari sini. Ini kesenangan saya untuk membantu Anda.</p>
                      <form method="POST" action="/kirim-email">
                            @csrf
                            <div class="input-box">
                            <input type="email" name="email" id="email" placeholder="Masukkan Email" required>
                            </div>

                            <div class="input-box">
                            <input type="text" name="nama" id="nama" placeholder="Masukkan Namamu" required>
                            </div>

                            <div class="input-box message-box">
                            <textarea name="isi" id="isi" placeholder="Masukkan Komentarmu" required></textarea>
                            </div>

                            <div>
                            <button type="submit" class="button">Kirim Sekarang</button>
                            </div>
                    </form>
                  </div>
                </div>

      
              
             
              
          </section>
          <!--- kontak akhir  -->

          <!--- footer awal  -->
          <footer class="footer">
            <div class="container">
              <div class="row">
                <div class="col-lg-3 col-md-6">
                  <div class="footer-col">
                    <h3>Tentang Kami</h3>
                    <p>Aplikasi mobile PPID terintegrasi dengan sistem informasi publik yang ada di instansi pemerintahan</p>
                  </div>
                </div>
                <div class="col-lg-3 col-md-6">
                  <div class="footer-col">
                    <h3>Kantor </h3>
                    <ul>
                      <li><a href="{{ url('') }}">privacy policy</a></li>
                      <li><a href="{{ url('') }}">terms & condtion</a></li>
                      <li><a href="{{ url('') }}">lates blogs</a></li>
                      <li><a href="{{ url('') }}">app service</a></li>
                    </ul>
                  </div>
                </div>
                <div class="col-lg-3 col-md-6">
                  <div class="footer-col">
                    <h3>Link Alternatif</h3>
                    <ul>
                      <li><a href="{{ url('') }}">Home</a></li>
                      <li><a href="{{ url('') }}">Fitur</a></li>
                      <li><a href="{{ url('') }}">Tampilan</a></li>
                      <li><a href="{{ url('') }}">Testi</a></li>
                      <li><a href="{{ url('') }}">Kontak</a></li>
                    </ul>
                  </div>
                </div><div class="col-lg-3 col-md-6">
                  <div class="footer-col">
                    <h3>Media Sosial</h3>
                    <ul>
                      <li><a href="{{ url('') }}">facebook</a></li>
                      <li><a href="{{ url('') }}">twitter</a></li>
                      <li><a href="{{ url('') }}">instagram</a></li>
                      <li><a href="{{ url('') }}">linkedin</a></li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-12">
                  <p class="copyright-text">&copy2023 @SidokareProject</p>

                </div>
              </div>
            </div>

          </footer>
          <!--- footer akhir  -->
        
        


    <!--Main Js-->
    <script src="{{ asset('frontend/assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/scrollIt.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/main.js') }}"></script>

</body>
</html>