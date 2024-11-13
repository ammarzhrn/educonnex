@if (Auth::user()->role == 'superAdmin')
@extends('layouts.app-admin')

@section('title', 'Users Management')

@push('style')
<!-- CSS Libraries -->
<link rel="stylesheet" href="{{ asset('admin/library/selectric/public/selectric.css') }}">
@endpush

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Users</h1>
            <div class="section-header-button">
                <a href="{{route('user.create')}}" class="btn btn-primary">Add New</a>
            </div>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
                <div class="breadcrumb-item">Users Management</div>
            </div>
        </div>
        <div class="section-body">
            @include('layouts.alert')
            <h2 class="section-title">User Management</h2>
            <p class="section-lead">
                Manage all users, add, edit or delete.
            </p>
            <div class="row mt-4">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>All Users</h4>
                        </div>
                        <div class="card-body">
                            <div class="float-left">
                                <form method="GET" action="{{ route('user.index') }}">
                                    <select name="sort_role" onchange="this.form.submit()" class="form-control">
                                        <option value="">Select Role</option>
                                        <option value="admin">Admin</option>
                                        <option value="superAdmin">Super Admin</option>
                                    </select>
                                </form>

                            </div>
                            <div class="float-right">
                                <form>
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="name" placeholder="Search">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <div class="clearfix mb-3"></div>

                            <div class="table-responsive">
                                <table class="table-striped table">
                                    <tr>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                    </tr>
                                    @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user->name }}
                                            <div class="table-links">
                                                <div class="bullet"></div>
                                                <a href="{{ route('user.show', $user->id) }}">Detail</a>
                                                <div class="bullet"></div>
                                                <a href="{{ route('user.edit', $user->id) }}">Edit</a>
                                                <div class="bullet"></div>
                                                <a href="#" class="text-danger"
                                                    onclick="event.preventDefault(); document.getElementById('delete-form-{{ $user->id }}').submit();">
                                                    Trash
                                                </a>
                                                <form id="delete-form-{{ $user->id }}"
                                                    action="{{ route('user.destroy', $user->id) }}" method="POST"
                                                    style="display: none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            </div>
                                        </td>
                                        <td>
                                            {{ $user->email }}
                                        </td>
                                        <td>
                                            @if ($user->role === 'superAdmin')
                                            <span class="badge badge-success">SuperAdmin</span>
                                            @elseif ($user->role === 'admin')
                                            <span class="badge badge-warning">Admin</span>
                                            @endif

                                        </td>
                                    </tr>
                                    @endforeach
                                </table>
                            </div>
                            <div class="float-right">
                                <nav>
                                    {{ $users->links() }}
                                </nav>
                            </div>
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
<script src="{{ asset('admin/library/selectric/public/jquery.selectric.min.js') }}"></script>

<!-- Page Specific JS File -->
<script src="{{ asset('admin/js/page/features-posts.js') }}"></script>
@endpush
@else
@php
abort(403, 'Unauthorized action.');
@endphp
@endif
