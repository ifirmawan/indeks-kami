@extends('layouts.dashboard-kami')

@push('css')
<style>
    article {
        margin-top: 15px;
    }
</style>
@endpush

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="page-header">
            <h2 class="pageheader-title">Indeks Keamanan Informasi </h2>
            <div class="section-block" id="basicform" tabindex="-1">
                <p>
                    Versi 3.1, 15 April 2015
                </p>

            </div>
        </div>
    </div>
</div>
<div class="ecommerce-widget">

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex">
                    <h3>Tentang Indeks KAMI</h3>
                </div>
                <div class="card-body">
                    <div class="text-center">
                        <img src="{{ asset('images/kami/image004.png') }}" alt="indeks kami" />
                    </div>

                    <div class="country-sales list-group list-group-flush">
                        <div class=" list-group-item">
                            <h3>Mengenai Indeks KAMI</h3>
                            <p style="text-align:justify;">Indeks KAMI adalah alat evaluasi untuk menganalisa tingkat
                                kesiapan
                                pengamanan informasi di
                                Instansi pemerintah. Alat evaluasi ini tidak ditujukan untuk menganalisa kelayakan atau
                                efektifitas bentuk pengamanan yang ada, melainkan sebagai perangkat untuk memberikan
                                gambaran
                                kondisi kesiapan (kelengkapan dan kematangan) kerangka kerja keamanan informasi kepada
                                pimpinan
                                Instansi. Evaluasi dilakukan terhadap berbagai area yang menjadi target penerapan
                                keamanan
                                informasi dengan ruang lingkup pembahasan yang juga memenuhi semua aspek keamanan yang
                                didefinisikan oleh standar ISO/IEC 27001:2013.
                                Bentuk evaluasi yang diterapkan dalam indeks KAMI dirancang untuk dapat digunakan oleh
                                Instansi
                                pemerintah dari berbagai tingkatan, ukuran, maupun tingkat kepentingan penggunaan TIK
                                dalam
                                mendukung terlaksananya Tugas Pokok dan Fungsi yang ada. Data yang digunakan dalam
                                evaluasi ini
                                nantinya akan memberikan snapshot indeks kesiapan - dari aspek kelengkapan maupun
                                kematangan -
                                kerangka kerja keamanan informasi yang diterapkan dan dapat digunakan sebagai pembanding
                                dalam
                                rangka menyusun langkah perbaikan dan penetapan prioritasnya.
                                Alat evaluasi ini kemudian bisa digunakan secara berkala untuk mendapatkan gambaran
                                perubahan
                                kondisi keamanan informasi sebagai hasil dari program kerja yang dijalankan, sekaligus
                                sebagai
                                sarana untuk menyampaikan peningkatan kesiapan kepada pihak yang terkait (stakeholders).
                                Penggunaan dan publikasi hasil evaluasi Indeks KAMI merupakan bentuk tanggungjawab
                                penggunaan
                                dana publik sekaligus menjadi sarana untuk meningkatkan kesadaran mengenai kebutuhan
                                keamanan
                                informasi di Instansi pemerintah. Pertukaran informasi dan diskusi dengan Instansi
                                pemerintah
                                lainnya sebagai bagian dari penggunaan alat evaluasi Indeks KAMI ini juga menciptakan
                                alur
                                komunikasi antar pengelola keamanan informasi di sektor pemerintah sehingga semua pihak
                                dapat
                                mengambil manfaat dari lesson learned yang sudah dilalui.
                            </p>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection