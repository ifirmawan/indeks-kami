@extends('layouts.dashboard-kami')

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
                    <h3>Tentang Kami</h3>
                </div>
                <div class="card-body">
                    <div class="text-center">
                        <img src="{{ asset('images/kami/image004.png') }}" alt="indeks kami" />
                    </div>

                    <div class="country-sales list-group list-group-flush">
                        <div class="country-sales-content list-group-item">
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
                        <div class="country-sales-content list-group-item">
                            <h3>Petunjuk Penggunaan Alat Evaluasi Indeks Keamanan Informasi (Indeks KAMI)</h3>
                            <p style="text-align:justify;">Indeks KAMI adalah alat evaluasi untuk menganalisa tingkat
                                kesiapan pengamanan informasi
                                di Instansi pemerintah. Alat evaluasi ini tidak ditujukan untuk menganalisa kelayakan
                                atau efektifitas bentuk pengamanan yang ada, melainkan sebagai perangkat untuk
                                memberikan gambaran kondisi kesiapan (kelengkapan dan kematangan) kerangka kerja
                                keamanan informasi kepada pimpinan Instansi. Evaluasi dilakukan terhadap berbagai area
                                yang menjadi target penerapan keamanan informasi dengan ruang lingkup pembahasan yang
                                juga memenuhi semua aspek keamanan yang didefinisikan oleh standar ISO/IEC 27001:2013.
                                Bentuk evaluasi yang diterapkan dalam indeks KAMI dirancang untuk dapat digunakan oleh
                                Instansi pemerintah dari berbagai tingkatan, ukuran, maupun tingkat kepentingan
                                penggunaan TIK dalam mendukung terlaksananya Tugas Pokok dan Fungsi yang ada. Data yang
                                digunakan dalam evaluasi ini nantinya akan memberikan snapshot indeks kesiapan - dari
                                aspek kelengkapan maupun kematangan - kerangka kerja keamanan informasi yang diterapkan
                                dan dapat digunakan sebagai pembanding dalam rangka menyusun langkah perbaikan dan
                                penetapan prioritasnya.
                                Alat evaluasi ini kemudian bisa digunakan secara berkala untuk mendapatkan gambaran
                                perubahan kondisi keamanan informasi sebagai hasil dari program kerja yang dijalankan,
                                sekaligus sebagai sarana untuk menyampaikan peningkatan kesiapan kepada pihak yang
                                terkait (stakeholders).
                                Penggunaan dan publikasi hasil evaluasi Indeks KAMI merupakan bentuk tanggungjawab
                                penggunaan dana publik sekaligus menjadi sarana untuk meningkatkan kesadaran mengenai
                                kebutuhan keamanan informasi di Instansi pemerintah. Pertukaran informasi dan diskusi
                                dengan Instansi pemerintah lainnya sebagai bagian dari penggunaan alat evaluasi Indeks
                                KAMI ini juga menciptakan alur komunikasi antar pengelola keamanan informasi di sektor
                                pemerintah sehingga semua pihak dapat mengambil manfaat dari lesson learned yang sudah
                                dilalui.

                                Petunjuk Penggunaan Alat Evaluasi Indeks Keamanan Informasi (Indeks KAMI)
                                Alat evaluasi Indeks KAMI ini secara umum ditujukan untuk digunakan oleh Instansi
                                pemerintah di tingkat pusat. Akan tetapi satuan kerja yang ada di tingkatan Direktorat
                                Jenderal, Badan, Pusat atau Direktorat juga dapat menggunakan elat evaluasi ini untuk
                                mendapatkan gambaran mengenai kematangan program kerja keamanan informasi yang
                                dijalankannya. Evaluasi ini dianjurkan untuk dilakukan oleh pejabat yang secara langsung
                                bertanggungjawab dan berwenang untuk mengelola keamanan informasi di seluruh cakupan
                                instansinya. Proses evaluasi dilakukan melalui sejumlah pertanyaan di masing-masing area
                                di bawah ini:
                                <ul>
                                    <li>Kategori Sistem Elektronik yang digunakan Instansi</li>
                                    <li>Tata Kelola</li>
                                    <li>Keamanan Informasi</li>
                                    <li>Pengelolaan Risiko Keamanan Informasi</li>
                                    <li>Kerangka Kerja Keamanan Informasi</li>
                                    <li>Pengelolaan Aset Informasi dan</li>
                                    <li>Teknologi dan Keamanan Informasi</li>
                                </ul>
                            </p>
                            <p style="text-align:justify;">
                                    Pertanyaan yang ada belum tentu dapat dijawab semuanya, akan tetapi yang harus
                                    diperhatikan adalah jawaban yang diberikan harus merefleksikan kondisi penerapan
                                    keamanan informasi SESUNGGUHNYA. Alat evaluasi ini hanya akan memberikan nilai tambah
                                    bagi semua pihak apabila pengisiannya menggunakan azas keterbukaan dan kejujuran.
                                    Sebelum mulai menjawab pertanyaan terkait kesiapan pengamanan informasi, responden
                                    diminta untuk mendefinisikan Kategori Sistem Elektronik di Instansinya. Definisi ini
                                    bisa dijabarkan untuk tingkat Satuan Kerja baik di tingkat Kementerian/Lembaga, ataupun
                                    untuk satuan kerja yang lebih kecil, sampai ke Unit Eselon III. Responden juga diminta
                                    untuk mendeskripsikan infrastruktur TIK yang ada dalam satuan kerjanya secara singkat.
                                    Tujuan dari proses ini adalah untuk mengelompokkan Sistem Elektronik yang digunakan
                                    instansi ke "tingkat" tertentu: Rendah, Tinggi dan Strategis. Dengan pengelompokan ini
                                    nantinya bisa dilakukan pemetaan terhadap instansi yang mempunyai karakteristik Sistem
                                    Elektornik yang sama. Pertanyaan dikelompokkan untuk 2 keperluan. Pertama, pertanyaan
                                    dikategorikan berdasarkan tingkat kesiapan penerapan pengamanan sesuai dengan
                                    kelengkapan kontrol yang diminta oleh standar ISO/IEC 27001:2013. Dalam pengelompokan
                                    ini responden diminta untuk memberi tanggapan mulai dari area yang terkait dengan bentuk
                                    kerangka kerja dasar keamanan informasi (pertanyaan diberi label "1"), efektifitas dan
                                    konsistensi penerapannya (label "2"), sampai dengan kemampuan untuk selalu meningkatkan
                                    kinerja keamanan informasi (label "3"). Tingkat terakhir ini sesuai dengan kesiapan
                                    minimum yang diprasyaratkan oleh proses sertifikasi standar ISO/IEC 27001:2013. <br>
                                    Setiap jawaban diberikan skor yang nantinya dikonsolidasi untuk menghasilkan angka
                                    indeks
                                    sekaligus digunakan untuk menampilkan hasil evaluasi dalam dashboard di akhir proses
                                    ini.Skor yang diberikan untuk jawaban pertanyaan sesuai tingkat kematangannya mengacu
                                    kepada:
                            </p>
                            <div class="text-center">
                                <img src="{{ asset('images/kami/image006.png') }}" alt="tabel indeks kami" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection