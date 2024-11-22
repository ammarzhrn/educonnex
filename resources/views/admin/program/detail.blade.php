@extends('layouts.app-admin')

@section('title', 'Detail Program')

@push('style')
<!-- CSS Libraries -->
@endpush

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Detail Programs</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="{{ route('programs.index') }}">Programs Management</a></div>
                <div class="breadcrumb-item">Detail Programs</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Program Detail</h2>
            <p class="section-lead">This page is the detailed version of the selected Program.</p>
            <div class="card">
                <div class="card-header">
                    <h2 class="text-primary mt-2">{{ $program->title }}</h2>
                </div>
                <div class="card-body">
                    <h6>Thumbnail</h6>
                    <div class="gallery gallery-fw" data-item-height="340">
                        <div class="gallery-item" data-image="{{ $program->thumbnail ? asset('storage/images/thumbnails/' . $program->thumbnail) : asset('images/thumbnail.png') }}" data-title="Thumbnail">
                        </div>
                    </div>

                    <h6>Description</h6>
                    <p>{{ $program->description }}</p>
                    <h6>Proposal Link</h6>
                    <p>{{ $program->proposal }}</p>
                    <h6>Contacts</h6>
                    <p>{{ $program->contact }}</p>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@push('scripts')
<!-- JS Libraies -->

<!-- Page Specific JS File -->
@endpush
