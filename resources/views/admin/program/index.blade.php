@extends('layouts.app-admin')

@section('title', 'Program Management')

@push('style')
<!-- CSS Libraries -->
<link rel="stylesheet" href="{{ asset('admin/library/selectric/public/selectric.css') }}">
@endpush

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Programs</h1>
            <div class="section-header-button">
                <a href="{{route('programs.create')}}" class="btn btn-primary">Add New</a>
            </div>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
                <div class="breadcrumb-item">Programs Management</div>
            </div>
        </div>
        <div class="section-body">
            @include('layouts.alert')
            <h2 class="section-title">Programs Management</h2>
            <p class="section-lead">
                Manage all program, add, edit or delete.
            </p>
            <div class="row mt-4">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>All Programs</h4>
                        </div>
                        <div class="card-body">
                            <div class="float-left">
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
                                        <th>Judul Program</th>
                                        <th>Link Proposal</th>
                                        <th>Link Contact</th>
                                        <th>Thumbnail</th>
                                    </tr>
                                    @foreach ($programs as $pro)
                                    <tr>
                                        <td>{{ $pro->title }}
                                            <div class="table-links">
                                                <div class="bullet"></div>
                                                <a href="{{ route('programs.show', $pro->id) }}">Detail</a>
                                                <div class="bullet"></div>
                                                <a href="{{ route('programs.edit', $pro->id) }}">Edit</a>
                                                <div class="bullet"></div>
                                                <a href="#" class="text-danger"
                                                    onclick="event.preventDefault(); document.getElementById('delete-form-{{ $pro->id }}').submit();">
                                                    Trash
                                                </a>
                                                <form id="delete-form-{{ $pro->id }}"
                                                    action="{{ route('programs.destroy', $pro->id) }}" method="POST"
                                                    style="display: none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            </div>
                                        </td>
                                        <td>
                                            {{ $pro->proposal }}
                                        </td>
                                        <td>
                                            {{ $pro->contact }}
                                        </td>
                                        <td>
                                            <img src="{{ asset('storage/images/thumbnails/' . $pro->thumbnail) }}" alt="Thumbnail"
                                                style="width: 150px; height: 50px; object-fit: cover; border-radius: 5px;"
                                                onerror="this.onerror=null; this.src='{{ asset('images/thumbnail.png') }}';">
                                        </td>
                                    </tr>
                                    @endforeach
                                </table>
                            </div>
                            <div class="float-right">
                                <nav>
                                    {{ $programs->links() }}
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
