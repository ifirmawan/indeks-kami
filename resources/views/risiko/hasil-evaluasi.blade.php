<div class="row">
    <div class="col">
        <ul class="country-sales list-group list-group-flush">
            <li class=" list-group-item">Batas Skor Min untuk Skor Tahap Penerapan  3
                <strong
                class="float-right">{{ config('skor.kematangan.risiko.batas') }}</strong>
            </li>
            <li class=" list-group-item">Total Skor Tahap Penerapan  1 & 2
                <strong class="float-right">
                    {{ $hasil_evaluasi['n_batas'] }}
                </strong>
            </li>
            <li class=" list-group-item">Status Peniliaian Tahap Penerapan  3
                <strong class="float-right">
                    {{ $hasil_evaluasi['status_batas'] }}
                </strong>
            </li>
        </ul>
    </div>
</div>
<hr />
<div class="row">
    <div class="col">
        <ul class="country-sales list-group list-group-flush">
            <li class=" list-group-item">Skor Tingkat Kematangan II
                <strong class="float-right">
                    {{ $hasil_evaluasi['n_ii'] }}
                </strong>
            </li>
            <li class=" list-group-item">Skor Minimum Tingkat Kematangan II
                <strong
                class="float-right">{{ config('skor.kematangan.risiko.ii.min') }}</strong>
            </li>
            <li class=" list-group-item">Skor Pencapaian Tingkat Kematangan II
                <strong
                class="float-right">{{ config('skor.kematangan.risiko.ii.target') }}</strong>
            </li>
            <li class=" list-group-item">Status
                <strong class="float-right">
                    {{ $hasil_evaluasi['status_ii'] }}
                </strong>
            </li>
        </ul>
    </div>
    <div class="col">
        <ul class="country-sales list-group list-group-flush">
            <li class=" list-group-item">Skor Tingkat Kematangan III
                <strong class="float-right">
                    {{ $hasil_evaluasi['n_iii'] }}
                </strong>
            </li>
            <li class=" list-group-item">Skor Minimum Tingkat Kematangan III
                <strong
                class="float-right">{{ config('skor.kematangan.risiko.iii.min') }}</strong>
            </li>
            <li class=" list-group-item">Skor Pencapaian Tingkat Kematangan III
                <strong
                class="float-right">{{ config('skor.kematangan.risiko.ii.target') }}</strong>
            </li>
            <li class=" list-group-item">Status
                <strong class="float-right">
                    {{ $hasil_evaluasi['n_iii'] }}
                </strong>
            </li>
        </ul>
    </div>
</div>
<hr />
<div class="row">
    <div class="col">
        <ul class="country-sales list-group list-group-flush">
            <li class=" list-group-item">Skor Tingkat Kematangan IV
                <strong class="float-right">
                    {{ $hasil_evaluasi['n_iv'] }}
                </strong>
            </li>
            <li class=" list-group-item">Skor Minimum Tingkat Kematangan IV
                <strong
                class="float-right">{{ config('skor.kematangan.risiko.iv.min') }}</strong>
            </li>
            <li class=" list-group-item">Skor Pencapaian Tingkat Kematangan IV
                <strong
                class="float-right">{{ config('skor.kematangan.risiko.iv.target') }}</strong>
            </li>
            <li class=" list-group-item">Status
                <strong class="float-right">
                    {{ $hasil_evaluasi['status_iv'] }}
                </strong>
            </li>
        </ul>
    </div>
    <div class="col">
        <ul class="country-sales list-group list-group-flush">
            <li class=" list-group-item">Skor Tingkat Kematangan V
                <strong class="float-right">
                    {{ $hasil_evaluasi['n_v'] }}
                </strong>
            </li>
            <li class=" list-group-item">Skor Minimum Tingkat Kematangan V
                <strong
                class="float-right">{{ config('skor.kematangan.risiko.v.min') }}</strong>
            </li>
            <li class=" list-group-item">Skor Pencapaian Tingkat Kematangan V
                <strong
                class="float-right">{{ config('skor.kematangan.risiko.v.target') }}</strong>
            </li>
            <li class=" list-group-item">Status
                <strong class="float-right">
                    {{ $hasil_evaluasi['status_v'] }}
                </strong>
            </li>
        </ul>
    </div>
</div>