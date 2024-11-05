@extends('layouts.app-admin')

@section('title', 'Edit User')

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
            <h1>Edit Users</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="{{ route('user.index') }}">Users Management</a></div>
                <div class="breadcrumb-item active">Edit Users</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Edit the Selected Users</h2>
            <p class="section-lead">Edit the Selected Users Data.</p>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Data Inputs</h4>
                        </div>
                        <form action="{{ route('user.update', $user->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" name="name" value="{{ $user->name }}" class="form-control">
                                    @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" name="email" value="{{ $user->email }}" class="form-control">
                                    @error('email')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fas fa-lock"></i>
                                            </div>
                                        </div>
                                        <input type="password" name="password" class="form-control pwstrength">
                                    </div>
                                    @error('password')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="section-title">Select User Role</div>
                                <div class="selectgroup w-100">
                                    <label class="selectgroup-item">
                                        <input type="radio" name="role" value="admin" class="selectgroup-input" @if
                                            ($user->role == 'admin')
                                        checked
                                        @endif>
                                        <span class="selectgroup-button">Admin</span>
                                    </label>
                                    <label class="selectgroup-item">
                                        <input type="radio" name="role" value="superAdmin" class="selectgroup-input" @if
                                            ($user->role == 'superAdmin')
                                        checked
                                        @endif">
                                        <span class="selectgroup-button">Super Administrator</span>
                                    </label>
                                </div>
                                @error('role')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                                <div class="form-group text-right mt-2">
                                    <button type="submit" class="btn btn-primary btn-lg px-5">Submit</button>
                                </div>
                            </div>
                        </form>
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