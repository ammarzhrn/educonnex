@extends('layouts.app-admin')

@section('title', 'Detail Article')

@push('style')
<!-- CSS Libraries -->
@endpush

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Detail Article</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="{{ route('article.index') }}">Article Management</a></div>
                <div class="breadcrumb-item">Detail Article</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Article Detail</h2>
            <p class="section-lead">This page is the detailed version of the selected Article.</p>
            <div class="card">
                <div class="card-header">
                    <h2 class="text-primary mt-2">{{ $article->title }}</h2>
                </div>
                <div class="card-body">
                    <h6>Thumbnail</h6>
                    <div class="gallery gallery-fw" data-item-height="200">
                        <div class="gallery-item" data-image="{{ $article->thumbnail && file_exists(public_path('storage/' . $article->thumbnail))
                                           ? asset('storage/' . $article->thumbnail)
                                           : asset('images/thumbnail.png') }}" data-title="Thumbnail">
                        </div>
                    </div>

                    <h6>Description</h6>
                    <p>{{ $article->description }}</p>
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
