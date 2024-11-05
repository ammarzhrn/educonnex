@extends('layouts.app-admin')

@section('title', 'Edit Program')

@push('style')
<!-- CSS Libraries -->
<link rel="stylesheet" href="{{ asset('admin/library/summernote/dist/summernote-bs4.css') }}">
<link rel="stylesheet" href="{{ asset('admin/library/selectric/public/selectric.css') }}">
<link rel="stylesheet" href="{{ asset('admin/library/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">
@endpush

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Edit Program</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="{{ route('programs.index') }}">Programs Management</a></div>
                <div class="breadcrumb-item">Edit Program</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Edit Selected Program</h2>
            <p class="section-lead">
                Edit Selected Program manually from Administration by filling the forms.
            </p>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Input Data</h4>
                        </div>
                        <form action="{{ route('programs.update', $program->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Title</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="title" value="{{ $program->title }}" class="form-control" required>
                                        @error('title')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label
                                        class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Description</label>
                                    <div class="col-sm-12 col-md-7">
                                        <textarea name="description" class="form-control" required>{{ old('description', $program->description) }}</textarea>
                                        @error('description')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Select
                                        Sector</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select name="id_sector" class="form-control selectric" required>
                                            @foreach($sectors as $sector)
                                            <option value="{{ $sector->id }}"
                                                {{ $sector->id == $program->id_sector ? 'selected' : '' }}>
                                                {{ $sector->name }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Proposal
                                        Link</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="proposal" value="{{ $program->proposal }}" class="form-control" required>
                                        @error('proposal')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Contact Link
                                        (Whatsapp Link)</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="contact" value="{{ $program->contact }}" class="form-control"
                                            required>
                                        @error('contact')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Thumbnail
                                        (jpeg,png,jpg,svg)</label>
                                    <div class="col-sm-12 col-md-2">
                                        <div id="image-preview" class="image-preview">
                                            <label for="image-upload" id="image-label">Choose File</label>
                                            <input type="file" name="thumbnail" value="{{ $program->thumbnail }}" id="image-upload" />
                                        </div>
                                        @error('thumbnail')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <div class="col-sm-12 col-md-7 offset-md-3">
                                        <button type="submit" class="btn btn-primary">Edit Program</button>
                                    </div>
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
<script src="{{ asset('admin/library/summernote/dist/summernote-bs4.js') }}"></script>
<script src="{{ asset('admin/library/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>
<script src="{{ asset('admin/library/selectric/public/jquery.selectric.min.js') }}"></script>
<script src="{{ asset('admin/library/upload-preview/upload-preview.js') }}"></script>

<!-- Page Specific JS File -->
<script src="{{ asset('admin/js/page/features-post-create.js') }}"></script>
@endpush
