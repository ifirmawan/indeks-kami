@extends('layouts.dashboard-kami')

@section('content')
<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="page-header">
            <h3 class="mb-2">Buat Responden Baru</h3>
        </div>
    </div>
</div>
<form action="{{ route('responden.store') }}" method="post">
    {{ @csrf_field() }}
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card influencer-profile-data">
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-2 col-lg-4 col-md-4 col-sm-4 col-12">
                            <div class="text-center">
                                <img src="{{ asset('images/avatar-1.jpg') }}" alt="User Avatar"
                                    class="rounded-circle user-avatar-xxl">
                            </div>
                        </div>
                        <div class="col-xl-10 col-lg-8 col-md-8 col-sm-8 col-12">
                            <div class="row">
                                <div class="col-md-6">
                                    @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    @endif
                                    <div class="form-group">
                                        <label>Identitas Instansi Pemerintah</label>
                                        <select name="identitas_instansi_pemerintah" class="form-control">
                                        <option value="">Pilih salah satu</option>
                                        <option value="satuan kerja">Satuan Kerja</option>
                                        <option value="direktorat">Direktorat</option>
                                        <option value="departemen">Departemen</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Jabatan</label>
                                        <input type="text" name="jabatan" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <label>Alamat</label>
                                        <textarea name="alamat" rows="3" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>NIK </label>
                                        <input type="text" class="form-control" name="nik" />
                                    </div>
                                    <div class="form-group">
                                        <label>NIP </label>
                                        <input type="text" class="form-control" name="nip" />
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" class="form-control" name="email" />
                                    </div>
                                    <div class="form-group">
                                        <label>No. Handphone</label>
                                        <input type="text" class="form-control" name="nomor_hp" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="border-top user-social-box">
                    <div class="float-right">
                        <button type="submit" class="btn btn-primary">
                            Simpan
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection