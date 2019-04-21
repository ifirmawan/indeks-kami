<?php

use Illuminate\Database\Seeder;

class ParameterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('parameters')->truncate();
    	DB::table('parameters')->insert([
    		[
    		'bagian'=>  'I','kategori_kontrol'=>NULL,
    		'parameter'          => 'Nilai investasi sistem elektronik yang terpasang<br/>
    		[A] Lebih dari Rp.30 Miliar<br/>
    		[B] Lebih dari Rp.3 Miliar s/d Rp.30 Miliar<br/>
    		[C] Kurang dari Rp.3 Miliar<br/>'
    		],
    		[
    		'bagian'=>  'I','kategori_kontrol'=>NULL,
    		'parameter'          => 'Total anggaran operasional tahunan yang dialokasikan untuk pengelolaan Sistem Elektronik<br/>
    		[A] Lebih dari Rp.10 Miliar<br/>
    		[B] Lebih dari Rp.1 Miliar s/d Rp.10 Miliar<br/> 
    		[C] Kurang dari Rp.1 Miliar<br/>'
    		],
    		[
    		'bagian'=>  'I','kategori_kontrol'=>NULL,
    		'parameter'          => 'Memiliki kewajiban kepatuhan terhadap Peraturan atau Standar tertentu<br/>
    		[A] Peraturan atau Standar nasional dan internasional <br/>
    		[B] Peraturan atau Standar nasional<br/> 
    		[C] Tidak ada Peraturan khusus<br/>'
    		],
    		[
    		'bagian'=>  'I','kategori_kontrol'=>NULL,
    		'parameter'          => 'Menggunakan algoritma khusus untuk keamanan informasi dalam Sistem Elektronik<br/>
    		[A] Algoritma khusus yang digunakan Negara<br/>  
    		[B] Algoritma standar publik <br/>
    		[C] Tidak ada algoritma khusus<br/> '
    		],
    		[
    		'bagian'=>  'I','kategori_kontrol'=>NULL,
    		'parameter'          => 'Jumlah pengguna Sistem Elektronik<br/>
    		[A] Lebih dari 5.000 pengguna<br/> 
    		[B] 1.000 sampai dengan 5.000 pengguna<br/> 
    		[C] Kurang dari 1.000 pengguna<br/>'
    		],
    		[
    		'bagian'=>  'I','kategori_kontrol'=>NULL,
    		'parameter'          => 'Data pribadi yang dikelola Sistem Elektronik<br/>
    		[A] Data pribadi yang memiliki hubungan dengan Data Pribadi lainnya<br/> 
    		[B] Data pribadi yang bersifat individu dan/atau data pribadi yang terkait dengan kepemilikan badan usaha<br/>
    		[C] Tidak ada data pribadi<br/>'
    		],
    		[
    		'bagian'=>  'I','kategori_kontrol'=>NULL,
    		'parameter'          => 'Tingkat klasifikasi/kekritisan Data yang ada dalam Sistem Elektronik, relatif terhadap ancaman upaya penyerangan atau penerobosan keamanan informasi<br/>
    		[A] Sangat Rahasia<br/>
    		[B] Rahasia dan/ atau Terbatas <br/>
    		[C] Biasa<br/>'
    		]
    		,
    		[
    		'bagian'=>  'I','kategori_kontrol'=>NULL,
    		'parameter'          => 'Tingkat kekritisan proses yang ada dalam Sistem Elektronik, relatif terhadap ancaman upaya penyerangan atau penerobosan keamanan informasi<br/>
            [A] Proses yang berisiko mengganggu hajat hidup orang  banyak dan memberi dampak langsung pada layanan publik <br/>
            [B] Proses yang berisiko mengganggu hajat hidup orang banyak dan memberi dampak tidak langsung<br/>
            [C] Proses yang tidak berdampak bagi kepentingan orang banyak<br/>'
            ],
            [
            'bagian'=>  'I','kategori_kontrol'=>NULL,
            'parameter'          => 'Dampak dari kegagalan Sistem Elektronik<br/>
            [A] Tidak tersedianya layanan publik berskala nasional atau membahayakan pertahanan keamanan negara<br/> 
            [B] Tidak tersedianya layanan publik atau proses penyelenggaraan negara dalam 1 provinsi atau lebih <br/>
            [C] Tidak tersedianya layanan publik atau proses penyelenggaraan negara dalam 1 kabupaten/kota atau lebih <br/>'
            ],
            [
            'bagian'=>  'I','kategori_kontrol'=>NULL,
            'parameter'          => 'Potensi kerugian atau dampak negatif dari insiden ditembusnya keamanan informasi Sistem Elektronik (sabotase, terorisme)<br/>
            [A] Menimbulkan korban jiwa <br/>
            [B] Terbatas pada kerugian finansial<br/> 
            [C] Mengakibatkan gangguan operasional sementara (tidak membahayakan dan merugikan finansial)<br/>'
            ],
            [
            'bagian'=>  'II','kategori_kontrol'=>'1',
            'parameter'=> 'Apakah pimpinan Instansi anda secara prinsip dan resmi bertanggungjawab terhadap pelaksanaan program keamanan informasi (misal yang tercantum dalam ITSP), termasuk penetapan kebijakan terkait? '
            ],
            [
            'bagian'=>  'II','kategori_kontrol'=>'1',
            'parameter'=> 'Apakah Instansi anda memiliki fungsi atau bagian yang secara spesifik mempunyai tugas dan tanggungjawab mengelola keamanan informasi dan menjaga kepatuhannya? '
            ],
            [
            'bagian'=>  'II','kategori_kontrol'=>'1',
            'parameter'=> 'Apakah pejabat/petugas pelaksana pengamanan informasi mempunyai wewenang yang sesuai untuk menerapkan dan menjamin kepatuhan program keamanan informasi? '
            ],
            [
            'bagian'=>  'II','kategori_kontrol'=>'1',
            'parameter'=> 'Apakah penanggungjawab pelaksanaan pengamanan informasi diberikan alokasi sumber daya yang sesuai untuk mengelola dan menjamin kepatuhan program keamanan informasi?'
            ],
            [
            'bagian'=>  'II','kategori_kontrol'=>'1',
            'parameter'=> 'Apakah peran pelaksana pengamanan informasi yang mencakup semua keperluan dipetakan dengan lengkap, termasuk kebutuhan audit internal dan persyaratan segregasi kewenangan?'
            ],
            [
            'bagian'=>  'II','kategori_kontrol'=>'1',
            'parameter'=> 'Apakah Instansi anda sudah mendefinisikan persyaratan/standar kompetensi dan keahlian pelaksana pengelolaan keamanan informasi?'
            ],
            [
            'bagian'=>  'II','kategori_kontrol'=>'1',//11
            'parameter'=> 'Apakah semua pelaksana pengamanan informasi di Instansi anda memiliki kompetensi dan keahlian yang memadai sesuai persyaratan/standar yang berlaku? '
            ],
            [
            'bagian'=>  'II','kategori_kontrol'=>'1',//12
            'parameter'=> 'Apakah instansi anda sudah menerapkan program sosialisasi dan peningkatan pemahaman untuk keamanan informasi, termasuk kepentingan kepatuhannya bagi semua pihak yang terkait?'
            ],
            [
            'bagian'=>  'II','kategori_kontrol'=>'2',//13
            'parameter'=> 'Apakah Instansi anda menerapkan program peningkatan kompetensi dan keahlian untuk pejabat dan petugas pelaksana pengelolaan keamanan informasi? '
            ],            
            [
            'bagian'=>  'II','kategori_kontrol'=>'2',//14
            'parameter'=> 'Apakah instansi anda sudah mengintegrasikan keperluan/persyaratan keamanan informasi dalam proses kerja yang ada?'
            ],
            [
            'bagian'=>  'II','kategori_kontrol'=>'2',//15
            'parameter'=> 'Apakah instansi anda sudah mengidentifikasikan data pribadi yang digunakan dalam proses kerja dan menerapkan pengamanan sesuai dengan peraturan perundangan yang berlaku?'
            ],
            [
            'bagian'=>  'II','kategori_kontrol'=>'2',//16
            'parameter'=> 'Apakah tanggungjawab pengelolaan keamanan informasi mencakup koordinasi dengan pihak pengelola/pengguna aset informasi internal dan eksternal maupun pihak lain yang berkepentingan, untuk mengidentifikasikan persyaratan/kebutuhan pengamanan (misal: pertukaran informasi atau kerjasama yang melibatkan informasi penting) dan menyelesaikan permasalahan yang ada? '
            ],
            [
            'bagian'=>  'II','kategori_kontrol'=>'2',//17
            'parameter'=> 'Apakah pengelola keamanan informasi secara proaktif berkoordinasi dengan satker terkait (SDM, Legal/Hukum, Umum, Keuangan dll) dan pihak eksternal yang berkepentingan (misal: regulator, aparat keamanan) untuk menerapkan dan menjamin kepatuhan pengamanan informasi terkait proses kerja yang melibatkan berbagai pihak?'
            ],
            [
            'bagian'=>  'II','kategori_kontrol'=>'2',//18
            'parameter'=> 'Apakah tanggungjawab untuk memutuskan, merancang, melaksanakan dan mengelola langkah kelangsungan layanan TIK (business continuity dan disaster recovery plans) sudah didefinisikan dan dialokasikan? '
            ],
            [
            'bagian'=>  'II','kategori_kontrol'=>'2',//19
            'parameter'=> 'Apakah penanggungjawab pengelolaan keamanan informasi melaporkan kondisi, kinerja/efektifitas dan kepatuhan program keamanan informasi kepada pimpinan Instansi secara rutin dan resmi?'
            ],
            [
            'bagian'=>  'II','kategori_kontrol'=>'2',//20
            'parameter'=> 'Apakah kondisi dan permasalahan keamanan informasi di Instansi anda menjadi konsideran atau bagian dari proses pengambilan keputusan strategis di Instansi anda?'
            ],
            [
            'bagian'=>  'II','kategori_kontrol'=>'3',//21
            'parameter'=> 'Apakah pimpinan satuan kerja di Instansi anda menerapkan program khusus untuk mematuhi tujuan dan sasaran kepatuhan pengamanan informasi, khususnya yang mencakup aset informasi yang menjadi tanggungjawabnya?'
            ],
            [
            'bagian'=>  'II','kategori_kontrol'=>'3',//22
            'parameter'=> 'Apakah Instansi anda sudah mendefinisikan metrik, paramater dan proses pengukuran kinerja pengelolaan keamanan informasi yang mencakup mekanisme, waktu pengukuran, pelaksananya, pemantauannya dan eskalasi pelaporannya?'
            ],
            [
            'bagian'=>  'II','kategori_kontrol'=>'3',//23
            'parameter'=> 'Apakah Instansi anda sudah menerapkan program penilaian kinerja pengelolaan keamanan informasi bagi individu (pejabat & petugas) pelaksananya?'
            ],
            [
            'bagian'=>  'II','kategori_kontrol'=>'3',
            'parameter'=> 'Apakah Instansi anda sudah menerapkan target dan sasaran pengelolaan keamanan informasi untuk berbagai area yang relevan, mengevaluasi pencapaiannya secara rutin, menerapkan langkah perbaikan untuk mencapai sasaran yang ada, termasuk pelaporan statusnya kepada pimpinan Instansi?'
            ],
            [
            'bagian'=>  'II','kategori_kontrol'=>'3',//25
            'parameter'=> 'Apakah Instansi anda sudah mengidentifikasi legislasi, perangkat hukum dan standar lainnya terkait keamanan informasi yang harus dipatuhi dan menganalisa tingkat kepatuhannya?
            '
            ],
            [
            'bagian'=>  'II','kategori_kontrol'=>'3',
            'parameter'=> 'Apakah Instansi anda sudah mendefinisikan kebijakan dan langkah penanggulangan insiden keamanan informasi yang menyangkut pelanggaran hukum (pidana dan perdata)?'
            ],
            [
            'bagian'=>  'III','kategori_kontrol'=>'1',
            'parameter'=> 'Apakah Instansi anda mempunyai program kerja pengelolaan risiko keamanan informasi yang terdokumentasi dan secara resmi digunakan? '
            ],
            [
            'bagian'=>  'III','kategori_kontrol'=>'1',
            'parameter'=> 'Apakah Instansi anda sudah menetapkan penanggung jawab manajemen risiko dan eskalasi pelaporan status pengelolaan risiko keamanan informasi sampai ke tingkat pimpinan?'
            ],
            [
            'bagian'=>  'III','kategori_kontrol'=>'1',
            'parameter'=> 'Apakah Instansi anda mempunyai kerangka kerja pengelolaan risiko keamanan informasi yang terdokumentasi dan secara resmi digunakan?'
            ],
            [
            'bagian'=>  'III','kategori_kontrol'=>'1',
            'parameter'=> 'Apakah kerangka kerja pengelolaan risiko ini mencakup definisi dan hubungan tingkat klasifikasi aset informasi, tingkat ancaman, kemungkinan terjadinya ancaman tersebut dan dampak kerugian terhadap Instansi anda?'
            ],
            [
            'bagian'=>  'III','kategori_kontrol'=>'1',
            'parameter'=> 'Apakah Instansi anda sudah menetapkan ambang batas tingkat risiko yang dapat diterima?'
            ],
            [
            'bagian'=>  'III','kategori_kontrol'=>'1',
            'parameter'=> 'Apakah Instansi anda sudah mendefinisikan kepemilikan dan pihak pengelola (custodian) aset informasi yang ada, termasuk aset utama/penting dan proses kerja utama yang menggunakan aset tersebut?'
            ],
            [
            'bagian'=>  'III','kategori_kontrol'=>'1',
            'parameter'=> 'Apakah ancaman dan kelemahan yang terkait dengan aset informasi, terutama untuk setiap aset utama sudah teridentifikasi? '
            ],
            [
            'bagian'=>  'III','kategori_kontrol'=>'1',
            'parameter'=> 'Apakah dampak kerugian yang terkait dengan hilangnya/terganggunya fungsi aset utama sudah ditetapkan sesuai dengan definisi yang ada?  '
            ],
            [
            'bagian'=>  'III','kategori_kontrol'=>'1',
            'parameter'=> 'Apakah Instansi anda sudah menjalankan inisiatif analisa/kajian risiko keamanan informasi secara terstruktur terhadap aset informasi yang ada (untuk nantinya digunakan dalam mengidentifikasi langkah mitigasi atau penanggulangan yang menjadi bagian dari program pengelolaan keamanan informasi)? '
            ],
            [
            'bagian'=>  'III','kategori_kontrol'=>'1',
            'parameter'=> 'Apakah Instansi anda sudah menyusun langkah mitigasi dan penanggulangan risiko yang ada? '
            ],
            [
            'bagian'=>  'III','kategori_kontrol'=>'2',
            'parameter'=> 'Apakah langkah mitigasi risiko disusun sesuai tingkat prioritas dengan target penyelesaiannya dan penanggungjawabnya, dengan memastikan efektifitas penggunaan sumber daya yang dapat menurunkan tingkat risiko ke ambang batas yang bisa diterima dengan meminimalisir dampak terhadap operasional layanan TIK? '
            ],
            [
            'bagian'=>  'III','kategori_kontrol'=>'2',
            'parameter'=> 'Apakah status penyelesaian langkah mitigasi risiko dipantau secara berkala, untuk memastikan penyelesaian atau kemajuan kerjanya?'
            ],
            [
            'bagian'=>  'III','kategori_kontrol'=>'2',
            'parameter'=> 'Apakah penyelesaian langkah mitigasi yang sudah diterapkan dievaluasi, melalui proses yang obyektif/terukur untuk memastikan konsistensi dan efektifitasnya?'
            ],
            [
            'bagian'=>  'III','kategori_kontrol'=>'1',
            'parameter'=> 'Apakah profil risiko berikut bentuk mitigasinya secara berkala dikaji ulang untuk memastikan akurasi dan validitasnya, termasuk merevisi profil terebut apabila ada perubahan kondisi yang signifikan atau keperluan penerapan bentuk pengamanan baru?'
            ],
            [
            'bagian'=>  'III','kategori_kontrol'=>'3',
            'parameter'=> 'Apakah kerangka kerja pengelolaan risiko secara berkala dikaji untuk memastikan/meningkatkan efektifitasnya?'
            ],
            [
            'bagian'=>  'III','kategori_kontrol'=>'3',
            'parameter'=> 'Apakah pengelolaan risiko menjadi bagian dari kriteria proses penilaian obyektif kinerja efektifitas pengamanan?'
            ],
            [
            'bagian'=>  'IV','kategori_kontrol'=>'1',
            'parameter'=> 'Apakah kebijakan dan prosedur maupun dokumen lainnya yang diperlukan terkait keamanan informasi sudah disusun dan dituliskan dengan jelas, dengan mencantumkan peran dan tanggungjawab pihak-pihak yang diberikan wewenang untuk menerapkannya?'
            ],
            [
            'bagian'=>  'IV','kategori_kontrol'=>'1',
            'parameter'=> 'Apakah kebijakan keamanan informasi sudah ditetapkan secara formal, dipublikasikan kepada semua staf/karyawan termasuk pihak terkait dan dengan mudah diakses oleh pihak yang'
            ],
            [
            'bagian'=>  'IV','kategori_kontrol'=>'1',
            'parameter'=> 'Apakah tersedia mekanisme untuk mengelola dokumen kebijakan dan prosedur keamanan informasi, termasuk penggunaan daftar induk, distribusi, penarikan dari peredaran dan penyimpanannya?'
            ],
            [
            'bagian'=>  'IV','kategori_kontrol'=>'1',
            'parameter'=> 'Apakah tersedia proses (mencakup pelaksana, mekanisme, jadwal, materi, dan sasarannya) untuk mengkomunikasikan kebijakan keamanan informasi (dan perubahannya) kepada semua pihak terkait, termasuk pihak ketiga? '
            ],
            [
            'bagian'=>  'IV','kategori_kontrol'=>'1',
            'parameter'=> 'Apakah keseluruhan kebijakan dan prosedur keamanan informasi yang ada merefleksikan kebutuhan mitigasi dari hasil kajian risiko keamanan informasi, maupun sasaran/obyetif tertentu yang ditetapkan oleh pimpinan Instansi?'
            ],
            [
            'bagian'=>  'IV','kategori_kontrol'=>'1',
            'parameter'=> 'Apakah tersedia proses untuk mengidentifikasi kondisi yang membahayakan keamanan infomasi dan menetapkannya sebagai insiden keamanan informasi untuk ditindak lanjuti sesuai prosedur yang diberlakukan?'
            ],
            [
            'bagian'=>  'IV','kategori_kontrol'=>'1',
            'parameter'=> 'Apakah aspek keamanan informasi yang mencakup pelaporan insiden, menjaga kerahasiaan, HAKI, tata tertib penggunaan dan pengamanan aset maupun layanan TIK tercantum dalam kontrak dengan pihak ketiga? '
            ],
            [
            'bagian'=>  'IV','kategori_kontrol'=>'2',
            'parameter'=> 'Apakah konsekwensi dari pelanggaran kebijakan keamanan informasi sudah didefinisikan, dikomunikasikan dan ditegakkan?'
            ],
            [
            'bagian'=>  'IV','kategori_kontrol'=>'2',
            'parameter'=> 'Apakah tersedia prosedur resmi untuk mengelola suatu pengecualian terhadap penerapan keamanan informasi, termasuk proses untuk menindak-lanjuti konsekwensi dari kondisi ini? '
            ],
            [
            'bagian'=>  'IV','kategori_kontrol'=>'2',
            'parameter'=> 'Apakah organisasi anda sudah menerapkan kebijakan dan prosedur operasional untuk mengelola implementasi security patch, alokasi tanggungjawab untuk memonitor adanya rilis security patch baru, memastikan pemasangannya dan melaporkannya?'
            ],
            [
            'bagian'=>  'IV','kategori_kontrol'=>'2',
            'parameter'=> 'Apakah organisasi anda sudah membahas aspek keamanan informasi dalam manajemen proyek yang terkait dengan ruang lingkup?'
            ],
            [
            'bagian'=>  'IV','kategori_kontrol'=>'2',
            'parameter'=> 'Apakah organisasi anda sudah menerapkan proses untuk mengevaluasi risiko terkait rencana pembelian (atau implementasi) sistem baru dan menanggulangi permasalahan yang muncul?'
            ],
            [
            'bagian'=>  'IV','kategori_kontrol'=>'2',
            'parameter'=> 'Apakah organisasi anda sudah menerapkan proses pengembangan sistem yang aman (Secure SDLC) dengan menggunakan prinsip atau metode sesuai standar platform teknologi yang digunakan?'
            ],
            [
            'bagian'=>  'IV','kategori_kontrol'=>'2',
            'parameter'=> 'Apabila penerapan suatu sistem mengakibatkan timbulnya risiko baru atau terjadinya ketidakpatuhan terhadap kebijakan yang ada, apakah ada proses untuk menanggulangi hal ini, termasuk penerapan pengamanan baru (compensating control) dan jadwal penyelesaiannya?'
            ],
            [
            'bagian'=>  'IV','kategori_kontrol'=>'2',
            'parameter'=> 'Apakah tersedia kerangka kerja pengelolaan perencanaan kelangsungan layanan TIK (business continuity planning) yang mendefinisikan persyaratan/konsideran keamanan informasi, termasuk penjadwalan uji-cobanya?'
            ],
            [
            'bagian'=>  'IV','kategori_kontrol'=>'3',
            'parameter'=> 'Apakah perencanaan pemulihan bencana terhadap layanan TIK (disaster recovery plan) sudah mendefinisikan komposisi, peran, wewenang dan tanggungjawab tim yang ditunjuk?'
            ],
            [
            'bagian'=>  'IV','kategori_kontrol'=>'3',
            'parameter'=> 'Apakah uji-coba perencanaan pemulihan bencana terhadap layanan TIK (disaster recovery plan) sudah dilakukan sesuai jadwal?'
            ],
            [
            'bagian'=>  'IV','kategori_kontrol'=>'3',
            'parameter'=> 'Apakah hasil dari perencanaan pemulihan bencana terhadap layanan TIK (disaster recovery plan) dievaluasi untuk menerapkan langkah perbaikan atau pembenahan yang diperlukan (misal, apabila hasil uji-coba menunjukkan bahwa proses pemulihan tidak bisa (gagal) memenuhi persyaratan yang ada?'
                ],
                [
                'bagian'=>  'IV','kategori_kontrol'=>'3',
                'parameter'=> 'Apakah seluruh kebijakan dan prosedur keamanan informasi dievaluasi kelayakannya secara berkala?'
                ],
                [
                'bagian'=>  'IV','kategori_kontrol'=>'1',
                'parameter'=> 'Apakah organisasi anda mempunyai strategi penerapan keamanan informasi sesuai hasil analisa risiko yang penerapannya dilakukan sebagai bagian dari rencana kerja organisasi? '
                ],
                [
                'bagian'=>  'IV','kategori_kontrol'=>'1',
                'parameter'=> 'Apakah organisasi anda mempunyai strategi penggunaan teknologi keamanan informasi yang penerapan dan pemutakhirannya disesuaikan dengan kebutuhan dan perubahan profil risiko? '
                ],
                [
                'bagian'=>  'IV','kategori_kontrol'=>'1',
                'parameter'=> 'Apakah strategi penerapan keamanan informasi direalisasikan sebagai bagian dari pelaksanaan program kerja organisasi anda? '
                ],
                [
                'bagian'=>  'IV','kategori_kontrol'=>'1',
                'parameter'=> 'Apakah organisasi anda memiliki dan melaksanakan program audit internal yang dilakukan oleh pihak independen dengan cakupan keseluruhan aset informasi, kebijakan dan prosedur keamanan yang ada (atau sesuai dengan standar yang berlaku)?'
                ],
                [
                'bagian'=>  'IV','kategori_kontrol'=>'1',
                'parameter'=> 'Apakah audit internal tersebut mengevaluasi tingkat kepatuhan, konsistensi dan efektifitas penerapan keamanan informasi?'
                ],
                [
                'bagian'=>  'IV','kategori_kontrol'=>'2',
                'parameter'=> 'Apakah hasil audit internal tersebut dikaji/dievaluasi untuk mengidentifikasi langkah pembenahan dan pencegahan, ataupun inisiatif peningkatan kinerja keamanan informasi?'
                ],
                [
                'bagian'=>  'IV','kategori_kontrol'=>'2',
                'parameter'=> 'Apakah hasil audit internal dilaporkan kepada pimpinan organisasi untuk menetapkan langkah perbaikan atau program peningkatan kinerja keamanan informasi?'
                ],
                [
                'bagian'=>  'IV','kategori_kontrol'=>'3',
                'parameter'=> 'Apabila ada keperluan untuk merevisi kebijakan dan prosedur yang berlaku, apakah ada analisa untuk menilai  aspek finansial (dampak biaya dan keperluan anggaran) ataupun perubahan terhadap infrastruktur dan pengelolaan perubahannya, sebagai prasyarat untuk menerapkannya?'
                ],
                [
                'bagian'=>  'IV','kategori_kontrol'=>'3',
                'parameter'=> 'Apakah organisasi anda secara periodik menguji dan mengevaluasi tingkat/status kepatuhan program keamanan informasi yang ada (mencakup pengecualian atau kondisi ketidakpatuhan lainnya) untuk memastikan bahwa keseluruhan inisiatif tersebut, termasuk langkah pembenahan yang diperlukan, telah diterapkan secara efektif?'
                ],
                [
                'bagian'=>  'IV','kategori_kontrol'=>'3',
                'parameter'=> 'Apakah organisasi anda mempunyai rencana dan program peningkatan keamanan informasi untuk jangka menengah/panjang (1-3-5 tahun) yang direalisasikan secara konsisten?'
                ],
                [
                'bagian'=>  'V','kategori_kontrol'=>'1',
                'parameter'=> 'Apakah tersedia daftar inventaris aset informasi dan aset yang berhubungan dengan proses teknologi informasi secara lengkap, akurat dan terperlihara ? (termasuk kepemilikan aset )'
                ],
                [
                'bagian'=>  'V','kategori_kontrol'=>'1',
                'parameter'=> 'Apakah tersedia definisi klasifikasi aset informasi yang sesuai dengan peraturan perundangan yang berlaku?'
                ],
                [
                'bagian'=>  'V','kategori_kontrol'=>'1',
                'parameter'=> 'Apakah tersedia proses yang mengevaluasi dan mengklasifikasi aset informasi sesuai tingkat kepentingan aset bagi Instansi dan keperluan pengamanannya?'
                ],
                [
                'bagian'=>  'V','kategori_kontrol'=>'1',
                'parameter'=> 'Apakah tersedia definisi tingkatan akses yang berbeda dari setiap klasifikasi aset informasi dan matrix yang merekam alokasi akses tersebut'
                ],
                [
                'bagian'=>  'V','kategori_kontrol'=>'1',
                'parameter'=> 'Apakah tersedia proses pengelolaan perubahan terhadap sistem, proses bisnis dan proses teknologi informasi (termasuk perubahan konfigurasi) yang diterapkan secara konsisten?'
                ],
                [
                'bagian'=>  'V','kategori_kontrol'=>'1',
                'parameter'=> 'Apakah tersedia proses pengelolaan konfigurasi yang diterapkan secara konsisten?'
                ],
                [
                'bagian'=>  'V','kategori_kontrol'=>'1',
                'parameter'=> 'Apakah tersedia proses untuk merilis suatu aset baru ke dalam lingkungan operasional dan memutakhirkan inventaris aset informasi?'
                ],
                [
                'bagian'=>  'V','kategori_kontrol'=>'1',
                'parameter'=> 'Apakah Instansi anda memiliki dan menerapkan perangkat di bawah ini, sebagai kelanjutan dari proses penerapan mitigasi risiko?'
                ],
                [
                'bagian'=>  'V','kategori_kontrol'=>'1',
                'parameter'=> 'Definisi tanggungjawab pengamanan informasi secara individual untuk semua personil di Instansi anda'
                ],
                [
                'bagian'=>  'V','kategori_kontrol'=>'1',
                'parameter'=> 'Tata tertib penggunaan komputer, email, internet dan intranet '
                ],
                [
                'bagian'=>  'V','kategori_kontrol'=>'1',
                'parameter'=> 'Tata tertib pengamanan dan penggunaan aset Instansi terkait HAKI'
                ],
                [
                'bagian'=>  'V','kategori_kontrol'=>'1',
                'parameter'=> 'Peraturan terkait instalasi piranti lunak di aset TI milik instansi'
                ],
                [
                'bagian'=>  'V','kategori_kontrol'=>'1',
                'parameter'=> 'Peraturan penggunaan data pribadi yang mensyaratkan pemberian'
                ],
                [
                'bagian'=>  'V','kategori_kontrol'=>'1',
                'parameter'=> 'Pengelolaan identitas elektronik dan proses otentikasi (username & password) termasuk kebijakan terhadap pelanggarannya'
                ],
                [
                'bagian'=>  'V','kategori_kontrol'=>'1',
                'parameter'=> 'Persyaratan dan prosedur pengelolaan/pemberian akses, otentikasi dan otorisasi untuk menggunakan aset informasi'
                ],
                [
                'bagian'=>  'V','kategori_kontrol'=>'1',
                'parameter'=> 'Ketetapan terkait waktu penyimpanan untuk klasifikasi data yang ada dan syarat penghancuran data'
                ],
                [
                'bagian'=>  'V','kategori_kontrol'=>'1',
                'parameter'=> 'Ketetapan terkait pertukaran data dengan pihak eksternal dan pengamanannya'
                ],
                [
                'bagian'=>  'V','kategori_kontrol'=>'1',
                'parameter'=> 'Proses penyidikan/investigasi untuk menyelesaikan insiden terkait kegagalan keamanan informasi'
                ],
                [
                'bagian'=>  'V','kategori_kontrol'=>'1',
                'parameter'=> 'Prosedur back-up dan ujicoba pengembalian data (restore) secara berkala'
                ],
                [
                'bagian'=>  'V','kategori_kontrol'=>'2',
                'parameter'=> 'Ketentuan pengamanan fisik yang disesuaikan dengan definisi zona dan klasifikasi aset yang ada di dalamnya'
                ],
                [
                'bagian'=>  'V','kategori_kontrol'=>'2',
                'parameter'=> 'Proses pengecekan latar belakang SDM'
                ],
                [
                'bagian'=>  'V','kategori_kontrol'=>'2',
                'parameter'=> 'Proses pelaporan insiden keamanan informasi kepada pihak eksternal ataupun pihak yang berwajib.'
                ],
                [
                'bagian'=>  'V','kategori_kontrol'=>'2',
                'parameter'=> 'Prosedur penghancuran data/aset yang sudah tidak diperlukan'
                ],
                [
                'bagian'=>  'V','kategori_kontrol'=>'2',
                'parameter'=> 'Prosedur kajian penggunaan akses (user access review) dan hak aksesnya (user access rights) berikut langkah pembenahan apabila terjadi ketidak sesuaian (non-conformity) terhadap kebijakan yang berlaku'
                ],
                [
                'bagian'=>  'V','kategori_kontrol'=>'2',
                'parameter'=> 'Prosedur untuk user yang mutasi/keluar atau tenaga kontrak/outsource yang habis masa kerjanya.'
                ],
                [
                'bagian'=>  'V','kategori_kontrol'=>'3',
                'parameter'=> 'Apakah tersedia daftar data/informasi yang harus di-backup dan laporan analisa kepatuhan terhadap prosedur backup-nya?'
                ],
                [
                'bagian'=>  'V','kategori_kontrol'=>'3',
                'parameter'=> 'Apakah tersedia prosedur penggunaan perangkat pengolah informasi milik pihak ketiga (termasuk perangkat milik pribadi dan mitra kerja/vendor) dengan memastikan aspek HAKI dan pengamanan akses yang digunakan?'
                ],
                [
                'bagian'=>  'V','kategori_kontrol'=>'1',
                'parameter'=> 'Apakah sudah diterapkan pengamanan fasilitas fisik (lokasi kerja) yang sesuai dengan kepentingan/klasifikasi aset informasi, secara berlapis dan dapat mencegah upaya akses oleh pihak yang tidak berwenang?'
                ],
                [
                'bagian'=>  'V','kategori_kontrol'=>'1',
                'parameter'=> 'Apakah tersedia proses untuk mengelola alokasi kunci masuk (fisik dan elektronik) ke fasilitas fisik?'
                ],
                [
                'bagian'=>  'V','kategori_kontrol'=>'1',
                'parameter'=> 'Apakah infrastruktur komputasi terlindungi dari dampak lingkungan'
                ],
                [
                'bagian'=>  'V','kategori_kontrol'=>'1',
                'parameter'=> 'Apakah infrastruktur komputasi yang terpasang terlindungi dari gangguan pasokan listrik atau dampak dari petir?'
                ],
                [
                'bagian'=>  'V','kategori_kontrol'=>'1',
                'parameter'=> 'Apakah tersedia peraturan pengamanan perangkat komputasi milik Instansi anda apabila digunakan di luar lokasi kerja resmi (kantor)?'
                ],
                [
                'bagian'=>  'V','kategori_kontrol'=>'1',
                'parameter'=> 'Apakah tersedia proses untuk memindahkan aset TIK (piranti lunak, perangkat keras, data/informasi dll) dari lokasi yang sudah ditetapkan (dalam daftar inventaris)'
                ],
                [
                'bagian'=>  'V','kategori_kontrol'=>'2',
                'parameter'=> 'Apakah konstruksi ruang penyimpanan perangkat pengolah informasi penting menggunakan rancangan dan material yang dapat menanggulangi risiko kebakaran dan dilengkapi dengan fasilitas pendukung (deteksi kebakaran/asap, pemadam api, pengatur suhu dan kelembaban) yang sesuai?'
                ],
                [
                'bagian'=>  'V','kategori_kontrol'=>'2',
                'parameter'=> 'Apakah tersedia proses untuk memeriksa (inspeksi) dan merawat: perangkat komputer, fasilitas pendukungnya dan kelayakan keamanan lokasi kerja untuk menempatkan aset informasi penting?'
                ],
                [
                'bagian'=>  'V','kategori_kontrol'=>'2',
                'parameter'=> 'Apakah tersedia mekanisme pengamanan dalam pengiriman aset informasi (perangkat dan dokumen) yang melibatkan pihak ketiga?'
                ],
                [
                'bagian'=>  'V','kategori_kontrol'=>'2',
                'parameter'=> 'Apakah tersedia peraturan untuk mengamankan lokasi kerja penting (ruang server, ruang arsip) dari risiko perangkat atau bahan yang dapat membahayakan aset informasi (termasuk fasilitas pengolah informasi) yang ada di dalamnya? (misal larangan penggunaan telpon genggam di dalam ruang server, menggunakan kamera dll)'
                ],
                [
                'bagian'=>  'V','kategori_kontrol'=>'3',
                'parameter'=> 'Apakah tersedia proses untuk mengamankan lokasi kerja dari keberadaan/kehadiran pihak ketiga yang bekerja untuk kepentingan Instansi anda?'
                ],
                [
                'bagian'=>  'VI','kategori_kontrol'=>'1',
                'parameter'=> 'Apakah layanan TIK (sistem komputer) yang menggunakan internet sudah dilindungi dengan lebih dari 1 lapis pengamanan? '
                ],
                [
                'bagian'=>  'VI','kategori_kontrol'=>'1',
                'parameter'=> 'Apakah jaringan komunikasi disegmentasi sesuai dengan kepentingannya (pembagian Instansi, kebutuhan aplikasi, jalur akses khusus, dll)?'
                ],
                [
                'bagian'=>  'VI','kategori_kontrol'=>'1',
                'parameter'=> 'Apakah tersedia konfigurasi standar untuk keamanan sistem bagi keseluruhan aset jaringan, sistem dan aplikasi, yang dimutakhirkan sesuai perkembangan (standar industri yang berlaku) dan kebutuhan?'
                ],
                [
                'bagian'=>  'VI','kategori_kontrol'=>'1',
                'parameter'=> 'Apakah Instansi anda secara rutin menganalisa kepatuhan penerapan konfigurasi standar yang ada?'
                ],
                [
                'bagian'=>  'VI','kategori_kontrol'=>'1',
                'parameter'=> 'Apakah jaringan, sistem dan aplikasi yang digunakan secara rutin dipindai untuk mengidentifikasi kemungkinan adanya celah kelemahan atau perubahan/keutuhan konfigurasi? '
                ],
                [
                'bagian'=>  'VI','kategori_kontrol'=>'1',
                'parameter'=> 'Apakah keseluruhan infrastruktur jaringan, sistem dan aplikasi dirancang untuk memastikan ketersediaan (rancangan redundan) sesuai kebutuhan/persyaratan yang ada? '
                ],
                [
                'bagian'=>  'VI','kategori_kontrol'=>'1',
                'parameter'=> 'Apakah keseluruhan infrastruktur jaringan, sistem dan aplikasi dimonitor untuk memastikan ketersediaan kapasitas yang cukup untuk kebutuhan yang ada? '
                ],
                [
                'bagian'=>  'VI','kategori_kontrol'=>'1',
                'parameter'=> 'Apakah setiap perubahan dalam sistem informasi secara otomatis terekam di dalam log? '
                ],
                [
                'bagian'=>  'VI','kategori_kontrol'=>'1',
                'parameter'=> 'Apakah upaya akses oleh yang tidak berhak secara otomatis terekam di dalam log?'
                ],
                [
                'bagian'=>  'VI','kategori_kontrol'=>'1',
                'parameter'=> 'Apakah semua log dianalisa secara berkala untuk memastikan akurasi, validitas dan kelengkapan isinya (untuk kepentingan jejak audit dan forensik)?'
                ],
                [
                'bagian'=>  'VI','kategori_kontrol'=>'1',
                'parameter'=> 'Apakah Instansi anda menerapkan enkripsi untuk melindungi aset informasi penting sesuai kebijakan pengelolaan yang ada? '
                ],
                [
                'bagian'=>  'VI','kategori_kontrol'=>'2',
                'parameter'=> 'Apakah Instansi anda mempunyai standar dalam menggunakan enkripsi?'
                ],
                [
                'bagian'=>  'VI','kategori_kontrol'=>'2',
                'parameter'=> 'Apakah Instansi anda menerapkan pengamanan untuk mengelola kunci enkripsi (termasuk sertifikat elektronik) yang digunakan, termasuk siklus penggunaannya?'
                ],
                [
                'bagian'=>  'VI','kategori_kontrol'=>'2',
                'parameter'=> 'Apakah semua sistem dan aplikasi secara otomatis mendukung dan menerapkan penggantian password secara otomatis, termasuk menon-aktifkan password, mengatur kompleksitas/panjangnya dan penggunaan kembali password lama?'
                ],
                [
                'bagian'=>  'VI','kategori_kontrol'=>'2',
                'parameter'=> 'Apakah akses yang digunakan untuk mengelola sistem (administrasi sistem) menggunakan bentuk pengamanan khusus yang berlapis?'
                ],
                [
                'bagian'=>  'VI','kategori_kontrol'=>'2',
                'parameter'=> 'Apakah sistem dan aplikasi yang digunakan sudah menerapkan pembatasan waktu akses termasuk otomatisasi proses timeouts, lockout setelah kegagalan login,dan penarikan akses? '
                ],
                [
                'bagian'=>  'VI','kategori_kontrol'=>'2',
                'parameter'=> 'Apakah Instansi anda menerapkan pengamanan untuk mendeteksi dan mencegah penggunaan akses jaringan (termasuk jaringan nirkabel) yang tidak resmi?'
                ],
                [
                'bagian'=>  'VI','kategori_kontrol'=>'1',
                'parameter'=> 'Apakah Instansi anda menerapkan bentuk pengamanan khusus untuk melindungi akses dari luar Instansi?'
                ],
                [
                'bagian'=>  'VI','kategori_kontrol'=>'1',
                'parameter'=> 'Apakah sistem operasi untuk setiap perangkat desktop dan server dimutakhirkan dengan versi terkini? '
                ],
                [
                'bagian'=>  'VI','kategori_kontrol'=>'1',
                'parameter'=> 'Apakah setiap desktop dan server dilindungi dari penyerangan virus (malware)?'
                ],
                [
                'bagian'=>  'VI','kategori_kontrol'=>'2',
                'parameter'=> 'Apakah ada rekaman dan hasil analisa (jejak audit - audit trail) yang mengkonfirmasi bahwa antivirus/antimalware telah dimutakhirkan secara rutin dan sistematis?'
                ],
                [
                'bagian'=>  'VI','kategori_kontrol'=>'2',
                'parameter'=> 'Apakah adanya laporan penyerangan virus/malware yang gagal/sukses ditindaklanjuti dan diselesaikan?'
                ],
                [
                'bagian'=>  'VI','kategori_kontrol'=>'2',
                'parameter'=> 'Apakah keseluruhan jaringan, sistem dan aplikasi sudah menggunakan mekanisme sinkronisasi waktu yang akurat, sesuai dengan standar yang ada?'
                ],
                [
                'bagian'=>  'VI','kategori_kontrol'=>'2',
                'parameter'=> 'Apakah setiap aplikasi yang ada memiliki spesifikasi dan fungsi keamanan yang diverifikasi/validasi pada saat proses pengembangan dan uji-coba?'
                ],
                [
                'bagian'=>  'VI','kategori_kontrol'=>'3',
                'parameter'=> 'Apakah instansi ada menerapkan lingkungan pengembangan dan uji-coba yang sudah diamankan sesuai dengan standar platform teknologi yang ada dan digunakan untuk seluruh siklus hidup sistem yng dibangun?'
                ],
                [
                'bagian'=>  'VI','kategori_kontrol'=>'3',
                'parameter'=> 'Apakah Instansi anda melibatkan pihak independen untuk mengkaji kehandalan keamanan informasi secara rutin?'
                ]
                ]);
}
}
