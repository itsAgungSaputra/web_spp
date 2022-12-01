@include('includes.header')

<body>

    @include('includes.navbar')

    <header class="mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-7 my-auto">
                     
                    <span class="fs-1 fw-bold" data-aos="fade-up" data-aos-duration="1100">SELAMAT DATANG  DI SI<span class="fs-1 fw-bold " data-aos="fade-up" data-aos-duration="1100" style="color:#66CC66">MAP</span>ES</span>
                    
                    <p class="label-top text-primary" data-aos="fade-up" data-aos-duration="900">  </p>
                    <p data-aos="fade-up" data-aos-duration="1300" class="w-75 p-3">
                        Simapes adalah aplikasi pembayaran spp online berbasis web untuk sekolah dasar laboratorium yang dapat mempermudah
                        anda dalam melakukan pembayaran spp dimanapun dan kapanpun, Klik cara bayar untuk mengetahui langkah-langkah pembayaran atau 
                        klik mulai sekarang untuk mulai melakukan login pembayaran.
                    </p>
                    <a data-aos="fade-up" data-aos-duration="1500" href="{{url('/auth')}}"
                        class="btn btn-primary rounded-pill px-5 py-2 mb-2 mb-md-0">Mulai sekarang &nbsp; →
                    </a>
                    <span class="fs-2 p-3 fw-bold" >&</span>
                    <a data-aos="fade-up" data-aos-duration="1700" href="#cara-lapor"
                        class="btn rounded-pill btn-outline-primary px-5 py-2">Cara bayar
                    </a>
                </div>
                <div class="col-md-5" data-aos="fade-up" data-aos-duration="1700">
                    <img style="width: 80%" src="{{url('main-assets/images/landingpage.png')}}" alt=""
                        class="img-fluid d-none d-lg-block d-print-block float-md-end" srcset="" />
                </div>
            </div>
        </div>
    </header>

    <section class="about-section mt-100">
        <div class="container">
            <div class="row">
                <div class="col-md-10 mx-auto text-center">
                    <p data-aos="fade-up" data-aos-duration="1000" class="text-primary label-top">TENTANG SIMAPES</p>
                    <h1 data-aos="fade-up" data-aos-duration="1200">APA ITU SI<span class="fs-1 fw-bold " data-aos="fade-up" data-aos-duration="1100" style="color:#66CC66">MAP</span>ES</span></h1>
                    <hr data-aos="fade-up" data-aos-duration="1400" width="50%" class="mx-auto" />
                    <p data-aos="fade-up" data-aos-duration="1600">
                        SIMAPES adalah sebuah website yang menyediakan sistem pembayaran SPP online untuk mempermudah
                        pembayaran SPP anda agar dapat dilakukan dimanapun, kapanpun
                    </p>
                    <a href="{{url('/faq')}}" data-aos="fade-up" data-aos-duration="1800"
                        class="btn btn-outline-primary px-4 py-2">Baca lebih lanjut</a>
                </div>
            </div>
        </div>
    </section>

    <section class="about-section-2 mt-100">
        <div class="container">
            <div class="row">
                <div class="col-md-5" data-aos="fade-up" data-aos-duration="1600">
                    <img src="{{url('main-assets/images/body-image-1.webp')}}" class="img-fluid" alt="" srcset="" />
                </div>
                <div class="col-md-7 my-auto">
                    <p data-aos="fade-up" data-aos-duration="1000" class="text-primary label-top">KEMUDAHAN MENGGUNAKAN
                        SIMAPES</p>
                    <h1 data-aos="fade-up" data-aos-duration="1200">Pembayaran SPP tak pernah semudah ini</h1>
                    <p data-aos="fade-up" data-aos-duration="1400">
                        Dengan adanya SIMAPES, kemudahan pembayaran SPP dapat dilakukan oleh petugas juga siswa dan juga
                        orang tua siswa dapat melihat log history pembayaran nya dimanapun, kapanpun.
                    </p>
                    <a id="cara-lapor" href="{{url('/auth')}}">
                        <p data-aos="fade-up" data-aos-duration="1600" class="text-primary"
                            style="text-decoration: none"> Masuk sekarang →</p>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="instruction-section mt-100">
        <div class="container">
            <div class="row">
                <div class="header-instruction text-center">
                    <div class="col-md-7 mx-auto">
                        <p class="text-primary label-top" data-aos="fade-up" data-aos-duration="1000">BAGAIMANA
                            SIMAPES
                            BEKERJA</p>
                        <h1 data-aos="fade-up" data-aos-duration="1200">CARA LOGIN & PENGGUNAAN BAGI SISWA</h1>
                        <p data-aos="fade-up" data-aos-duration="1400">
                            {{-- Untuk anda yang masih baru kenal dengan kami, kami berikan
                            caranya kok dibawah bagaimana caranya untuk menggunakan aplikasi
                            ini --}}
                            Cara masuk dan penggunaan pada aplikasi SIMAPES, akan kami jelaskan secara rinci dibawah
                            ini.
                        </p>
                    </div>
                </div>
            </div>
            <div class="row flex-column-reverse flex-md-row">
                <div class="col-md-8 my-auto">
                    <p data-aos="fade-up" data-aos-duration="1000" class="mb-3"><i
                            class="lni lni-camera icon-top bg-primary px-3 py-2 text-center"></i></p>
                    <p data-aos="fade-up" data-aos-duration="1200" class="text-primary label-top">LANGKAH PERTAMA</p>
                    <h1 data-aos="fade-up" data-aos-duration="1400" class="mt-2">Login ke aplikasi SIMAPES Menggunakan
                        Username & Password yang telah diberikan</h1>
                    <p data-aos="fade-up" data-aos-duration="1600">
                        Segera login dengan username & password yang telah diberikan, setelah itu anda dapat langsung
                        masuk ke aplikasi kami
                    </p>
                    <a href="{{url('/faq')}}">
                        <p class="text-primary" style="text-decoration: none" data-aos="fade-up"
                            data-aos-duration="1800"> Selengkapnya →</p>
                    </a>
                </div>
                <div class="col-md-4" data-aos="fade-up" data-aos-duration="1800">
                    <img src="{{url('main-assets/images/section-2.png')}}" class="img-fluid" alt="" />
                </div>
            </div>
            <div class="row">
                <div class="col-md-4" data-aos="fade-up" data-aos-duration="1800">
                    <img src="{{url('main-assets/images/section-4.png')}}" class="img-fluid" alt="" />
                </div>
                <div class="col-md-8 my-auto">
                    <p class="mb-3" data-aos="fade-up" data-aos-duration="1000"><i
                            class="lni lni-lock icon-top bg-primary px-3 py-2 text-center"></i></p>
                    <p data-aos="fade-up" data-aos-duration="1200" class="text-primary label-top">LANGKAH KEDUA</p>
                    <h1 data-aos="fade-up" data-aos-duration="1400" class="mt-2">
                        Segera pilih menu "Pembayaran Online" di sidebar kiri anda, lalu anda dapat membayar spp kapan dan dimana saja
                    </h1>
                    <p data-aos="fade-up" data-aos-duration="1600">
                        Setelah itu anda dapat melihat riwayat pembayaran anda dimana saja dan kapan saja!
                    </p>
                    <a href="{{url('/faq')}}">
                        <p class="text-primary" style="text-decoration: none" data-aos="fade-up"
                            data-aos-duration="1800"> Selengkapnya →</p>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="bonus-section mt-100">
        <div class="container">
            <div class="bg-primary text-white p-5 rounded" data-aos="fade-up" data-aos-duration="1600" style="box-shadow:
            0 1.7px 1.7px rgba(0, 0, 0, 0.011),
            0 3.9px 3.9px rgba(0, 0, 0, 0.016),
            0 6.7px 6.7px rgba(0, 0, 0, 0.02),
            0 10.3px 10.3px rgba(0, 0, 0, 0.023),
            0 15.2px 15.2px rgba(0, 0, 0, 0.027),
            0 22.3px 22.3px rgba(0, 0, 0, 0.03),
            0 33.5px 33.5px rgba(0, 0, 0, 0.034),
            0 53.4px 53.4px rgba(0, 0, 0, 0.039),
            0 100px 100px rgba(0, 0, 0, 0.05);">
                <h1 class="fw-bold">Lakukan lebih dengan SIMAPES</h1>
                <p class="lead">Tunggu apa lagi? segera coba aplikasi SIMAPES agar anda dapat melihat history pembayaran
                    anda dimana saja kapan saja</p>
                <a class="text-white" href="{{url('/auth')}}">Masuk
                    &raquo;</a>
            </div>
        </div>
    </section>

    @include('includes.footer')
    @include('includes.script')

</body>

</html>