@extends('layouts.app-admin')

@section('title', 'Detail News')

@push('style')
<!-- CSS Libraries -->
@endpush

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Detail News</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="{{ route('news.index') }}">News Management</a></div>
                <div class="breadcrumb-item">Detail News</div>
            </div>
        </div>

        <div class="section-body">
            @include('layouts.alert')
            <!-- Flash message section -->

            <h2 class="section-title">News Detail</h2>
            <p class="section-lead">This page is the detailed version of the selected Article.</p>

            <div class="card">
                <div class="card-header">
                    <h2 class="text-primary mt-2">{{ $news->title }}</h2>
                </div>

                <div class="card-body">
                    <h6>Thumbnail</h6>
                    <div class="gallery gallery-fw" data-item-height="340">
                        <div class="gallery-item" data-image="{{ $news->thumbnail ? asset('storage/images/thumbnails/' . $news->thumbnail) : asset('images/thumbnail.png') }}" data-title="Thumbnail">
                        </div>
                    </div>

                    <h6>Article Content</h6>
                    <p>{!! $news->article !!}</p>

                    <h6>Categories</h6>
                    <div>
                        @foreach($news->category as $tag)
                        <span class="badge badge-primary">{{ $tag }}</span>
                        @endforeach
                    </div>
                    <p></p>

                    <h6>Status</h6>
                    <div>
                        @if ($news->status == 'reject')
                        <span class="badge badge-danger">{{ $news->status }}</span>
                        @elseif ($news->status == 'pending')
                        <span class="badge badge-warning">{{ $news->status }}</span>
                        @elseif ($news->status == 'published')
                        <span class="badge badge-success">{{ $news->status }}</span>
                        @endif
                    </div>
                </div>

                <!-- Action Buttons Section (only for superAdmin and pending status) -->
                @if (auth()->user()->role === 'superAdmin' && $news->status === 'pending')
                <div class="card-footer">
                    <div class="row">
                        <div class="col-6">
                            <!-- Reject Button -->
                            <form action="{{ route('news.updateStatus', ['id' => $news->id, 'status' => 'reject']) }}"
                                method="POST"
                                onsubmit="return confirm('Are you sure you want to reject this article?');">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn btn-danger btn-block">Reject</button>
                            </form>
                        </div>
                        <div class="col-6">
                            <!-- Publish Button -->
                            <form
                                action="{{ route('news.updateStatus', ['id' => $news->id, 'status' => 'published']) }}"
                                method="POST"
                                onsubmit="return confirm('Are you sure you want to publish this article?');">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn btn-success btn-block">Publish</button>
                            </form>
                        </div>
                    </div>
                </div>
                @endif
                <!-- End of Action Buttons Section -->

            </div>
        </div>
    </section>
</div>
@endsection

@push('scripts')
<!-- JS Libraies -->

<!-- Page Specific JS File -->
@endpush
