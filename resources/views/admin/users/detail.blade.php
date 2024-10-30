@extends('layouts.app-admin')

@section('title', 'User Detail')

@push('style')
<!-- CSS Libraries -->
<link rel="stylesheet" href="{{ asset('admin/library/bootstrap-daterangepicker/daterangepicker.css') }}">
<link rel="stylesheet" href="{{ asset('admin/library/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css') }}">
<link rel="stylesheet" href="{{ asset('admin/library/select2/dist/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('admin/library/selectric/public/selectric.css') }}">
<link rel="stylesheet" href="{{ asset('admin/library/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}">
<link rel="stylesheet" href="{{ asset('admin/library/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">
@endpush

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Detail User</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="{{ route('user.index') }}">Users Management</a></div>
                <div class="breadcrumb-item active">User Detail</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Detail of {{ $user->name }}</h2>
            <p class="section-lead">This is the detail of the user {{ $user->name }}.</p>

            <div class="card author-box card-primary">
                <div class="card-body d-flex flex-row align-items-center">
                    <div class="author-box-left mr-5">
                        <img alt="image"
                            src="{{ $user->image ? asset('storage/profile' . $user->image) : asset('images/default.png') }}"
                            class="rounded-circle" style="max-width: 150px;">
                        <div class="clearfix"></div>
                    </div>
                    <div class="author-box-details">
                        <div class="">
                            <div class="author-box-name">
                                <a href="#">{{ $user->name }}</a>
                            </div>
                            <div class="author-box-job">{{ $user->email }}</div>
                            <a href="#" class="btn btn-primary mt-3">{{ $user->role == 'admin' ? 'Administrator' : 'Super Administrator' }}</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
</div>
@endsection

@push('scripts')
<!-- JS Libraies -->
<script src="{{ asset('admin/library/cleave.js/dist/cleave.min.js') }}"></script>
<script src="{{ asset('admin/library/cleave.js/dist/addons/cleave-phone.us.js') }}"></script>
<script src="{{ asset('admin/library/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
<script src="{{ asset('admin/library/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js') }}"></script>
<script src="{{ asset('admin/library/bootstrap-timepicker/js/bootstrap-timepicker.min.js') }}"></script>
<script src="{{ asset('admin/library/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>
<script src="{{ asset('admin/library/select2/dist/js/select2.full.min.js') }}"></script>
<script src="{{ asset('admin/library/selectric/public/jquery.selectric.min.js') }}"></script>

<!-- Page Specific JS File -->
<script src="{{ asset('admin/js/page/forms-advanced-forms.js') }}"></script>
@endpush
