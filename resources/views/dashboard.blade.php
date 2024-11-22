@extends('layouts.app-admin')

@section('title', 'Dashboard')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('admin/library/jqvmap/dist/jqvmap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/library/summernote/dist/summernote-bs4.min.css') }}">
@endpush

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Dashboard</h1>
        </div>

        <div class="row">
            @if (Auth::user()->role == 'admin')
                <!-- Admin-specific Stats -->
                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-warning">
                            <i class="far fa-file"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total Articles You Created</h4>
                            </div>
                            <div class="card-body">
                                {{ $articles->where('user_id', Auth::id())->count() }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-danger">
                            <i class="far fa-newspaper"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total News You Created</h4>
                            </div>
                            <div class="card-body">
                                {{ $news->where('user_id', Auth::id())->count() }}
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <!-- General Stats -->
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-primary">
                            <i class="far fa-user"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total Administrators</h4>
                            </div>
                            <div class="card-body">
                                {{ $users->count() }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-info">
                            <i class="fas fa-columns"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total Programs</h4>
                            </div>
                            <div class="card-body">
                                {{ $programs->count() }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-warning">
                            <i class="far fa-file"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total Articles</h4>
                            </div>
                            <div class="card-body">
                                {{ $articles->count() }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-danger">
                            <i class="far fa-newspaper"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total News</h4>
                            </div>
                            <div class="card-body">
                                {{ $news->count() }}
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>

        <!-- Article and News Statistics -->
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="card card-statistic-2">
                    <div class="card-stats">
                        <div class="card-stats-title">Article Statistics</div>
                        <div class="card-stats-items">
                            <div class="card-stats-item">
                                <div class="card-stats-item-count text-success">
                                    @if (Auth::user()->role == 'admin')
                                        {{ $articles->where('user_id', Auth::id())->where('status', 'published')->count() }}
                                    @else
                                        {{ $publishedArc }}
                                    @endif
                                </div>
                                <div class="card-stats-item-label text-success">Published</div>
                            </div>
                            <div class="card-stats-item">
                                <div class="card-stats-item-count text-warning">
                                    @if (Auth::user()->role == 'admin')
                                        {{ $articles->where('user_id', Auth::id())->where('status', 'pending')->count() }}
                                    @else
                                        {{ $pendingArc }}
                                    @endif
                                </div>
                                <div class="card-stats-item-label text-warning">Pending</div>
                            </div>
                            <div class="card-stats-item">
                                <div class="card-stats-item-count text-danger">
                                    @if (Auth::user()->role == 'admin')
                                        {{ $articles->where('user_id', Auth::id())->where('status', 'rejected')->count() }}
                                    @else
                                        {{ $rejectedArc }}
                                    @endif
                                </div>
                                <div class="card-stats-item-label text-danger">Rejected</div>
                            </div>
                        </div>
                    </div>
                    <div class="card-wrap">
                        <div class="text-white">tes</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="card card-statistic-2">
                    <div class="card-stats">
                        <div class="card-stats-title">News Statistics</div>
                        <div class="card-stats-items">
                            <div class="card-stats-item">
                                <div class="card-stats-item-count text-success">
                                    @if (Auth::user()->role == 'admin')
                                        {{ $news->where('user_id', Auth::id())->where('status', 'published')->count() }}
                                    @else
                                        {{ $publishedNew }}
                                    @endif
                                </div>
                                <div class="card-stats-item-label text-success">Published</div>
                            </div>
                            <div class="card-stats-item">
                                <div class="card-stats-item-count text-warning">
                                    @if (Auth::user()->role == 'admin')
                                        {{ $news->where('user_id', Auth::id())->where('status', 'pending')->count() }}
                                    @else
                                        {{ $pendingNew }}
                                    @endif
                                </div>
                                <div class="card-stats-item-label text-warning">Pending</div>
                            </div>
                            <div class="card-stats-item">
                                <div class="card-stats-item-count text-danger">
                                    @if (Auth::user()->role == 'admin')
                                        {{ $news->where('user_id', Auth::id())->where('status', 'rejected')->count() }}
                                    @else
                                        {{ $rejectedNew }}
                                    @endif
                                </div>
                                <div class="card-stats-item-label text-danger">Rejected</div>
                            </div>
                        </div>
                    </div>
                    <div class="card-wrap">
                        <div class="text-white">tes</div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Pending Articles and News -->
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        @if (Auth::user()->role == 'admin')
                        <h4>Your Pending Articles</h4>
                        @else
                        <h4>Pending Articles</h4>
                        @endif
                        <div class="card-header-action">
                            <a href="{{ route('article.index') }}" class="btn btn-danger">View More <i class="fas fa-chevron-right"></i></a>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive table-invoice">
                            <table class="table-striped table">
                                <tr>
                                    <th>Title</th>
                                    <th>Author</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                @foreach ($pendingArticles as $article)
                                    @if (Auth::user()->role == 'admin' && $article->user_id == Auth::id())
                                        <tr>
                                            <td class="font-weight-600 text-primary">{{ $article->title }}</td>
                                            <td class="font-weight-600">{{ $article->user->name ?? 'Unknown' }}</td>
                                            <td><div class="badge badge-warning">{{ ucfirst($article->status) }}</div></td>
                                            <td><a href="{{ route('article.show', $article->id) }}" class="btn btn-primary">Detail</a></td>
                                        </tr>
                                    @elseif (Auth::user()->role != 'admin')
                                        <tr>
                                            <td class="font-weight-600 text-primary">{{ $article->title }}</td>
                                            <td class="font-weight-600">{{ $article->user->name ?? 'Unknown' }}</td>
                                            <td><div class="badge badge-warning">{{ ucfirst($article->status) }}</div></td>
                                            <td><a href="{{ route('article.show', $article->id) }}" class="btn btn-primary">Detail</a></td>
                                        </tr>
                                    @endif
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        @if (Auth::user()->role == 'admin')
                        <h4>Your Pending News</h4>
                        @else
                        <h4>Pending News</h4>
                        @endif
                        <div class="card-header-action">
                            <a href="{{ route('news.index') }}" class="btn btn-danger">View More <i class="fas fa-chevron-right"></i></a>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive table-invoice">
                            <table class="table-striped table">
                                <tr>
                                    <th>Title</th>
                                    <th>Author</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                @foreach ($pendingNews as $news)
                                    @if (Auth::user()->role == 'admin' && $news->user_id == Auth::id())
                                        <tr>
                                            <td class="font-weight-600 text-primary">{{ $news->title }}</td>
                                            <td class="font-weight-600">{{ $news->user->name ?? 'Unknown' }}</td>
                                            <td><div class="badge badge-warning">{{ ucfirst($news->status) }}</div></td>
                                            <td><a href="{{ route('news.show', $news->id) }}" class="btn btn-primary">Detail</a></td>
                                        </tr>
                                    @elseif (Auth::user()->role != 'admin')
                                        <tr>
                                            <td class="font-weight-600 text-primary">{{ $news->title }}</td>
                                            <td class="font-weight-600">{{ $news->user->name ?? 'Unknown' }}</td>
                                            <td><div class="badge badge-warning">{{ ucfirst($news->status) }}</div></td>
                                            <td><a href="{{ route('news.show', $news->id) }}" class="btn btn-primary">Detail</a></td>
                                        </tr>
                                    @endif
                                @endforeach
                            </table>
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
<script src="{{ asset('admin/library/simpleweather/jquery.simpleWeather.min.js') }}"></script>
<script src="{{ asset('admin/library/chart.js/dist/Chart.min.js') }}"></script>
<script src="{{ asset('admin/library/jqvmap/dist/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('admin/library/jqvmap/dist/maps/jquery.vmap.world.js') }}"></script>
<script src="{{ asset('admin/library/summernote/dist/summernote-bs4.min.js') }}"></script>
<script src="{{ asset('admin/library/chocolat/dist/js/jquery.chocolat.min.js') }}"></script>

<!-- Page Specific JS File -->
<script src="{{ asset('admin/js/page/index-0.js') }}"></script>
@endpush
