@extends('layouts.dashboard-kami')

@section('content')

<!-- ============================================================== -->
<!-- pageheader  -->
<!-- ============================================================== -->
<div class="row">
	<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
		<div class="page-header">
			<h3 class="mb-2">Identitas Responden</h3>
			<p class="pageheader-text">Identitas Responden di isi dengan data yang valid.</p>
			<div class="clearfix">
				<div class="page-breadcrumb float-left">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb ">
							<li class="breadcrumb-item"><a href="{{ url('/home') }}" class="breadcrumb-link">Dashboard</a>
							</li>
							<li class="breadcrumb-item active" aria-current="page">Identitas Responden</li>
						</ol>
					</nav>
				</div>
				@if($responden->id ?? false)
				<a href="{{ route('responden.edit',$responden->id) }}" class="float-right btn btn-primary">Edit Responden</a>
				@else
				<a href="{{ route('responden.create') }}" class="float-right btn btn-primary">Buat Responden</a>
				@endif
			</div>
		</div>
	</div>
</div>
<!-- ============================================================== -->
<!-- end pageheader  -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- content  -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- influencer profile  -->
<!-- ============================================================== -->
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
						<div class="user-avatar-info">
							<div class="m-b-20">
								<div class="user-avatar-name">
									<h2 class="mb-1">{{ ucwords($user->name) }}</h2>
								</div>

							</div>
							<div style="clear:both;"></div>
							<!--  <div class="float-right"><a href="#" class="user-avatar-email text-secondary">www.henrybarbara.com</a></div> -->
							<div class="user-avatar-address">
								<p class="border-bottom pb-3">
									<span class="d-xl-inline-block d-block mb-2">
										NIK
										<i class="fa fa-id-badge mr-2 text-primary "></i>
										{{ (isset($responden->nik))? $responden->nik : '' }}
									</span>
									<span class="mb-2 ml-xl-4 d-xl-inline-block d-block">
										NIP
										<i class="fa fa-id-badge mr-2 text-primary "></i>
										{{ (isset($responden->nip))? $responden->nip : '' }}
									</span>
								</p>
								<div class="mt-3">
									<p>
										<i class="fas fa-map-marker-alt"></i>
										{{ (isset($responden->alamat))? $responden->alamat : '' }}
									</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="border-top user-social-box">
				<div class="user-social-media d-xl-inline-block">
					<span class="mr-2 twitter-color">
						<i class="fas fa-envelope"></i>
					</span>
					<span>{{ (isset($responden->email))? $responden->email : '' }}</span>
				</div>
				<div class="user-social-media d-xl-inline-block">
					<span class="mr-2 twitter-color">
						<i class="fas fa-phone"></i>
					</span>
					<span>{{ (isset($responden->nomor_hp))? $responden->nomor_hp : '' }}</span>
				</div>
			</div>
		</div>
	</div>
</div>


@endsection