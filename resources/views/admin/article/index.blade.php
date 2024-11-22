@extends('layouts.app-admin')

@section('title', 'Articles Management')

@push('style')
<!-- CSS Libraries -->
<link rel="stylesheet" href="{{ asset('admin/library/selectric/public/selectric.css') }}">
@endpush

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Articles</h1>
            <div class="section-header-button">
                <a href="{{route('article.create')}}" class="btn btn-primary">
                    @if (Auth::user()->role == 'admin')
                    Request New
                    @else
                    Add New
                    @endif
                </a>
            </div>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
                <div class="breadcrumb-item">Articles Management</div>
            </div>
        </div>
        <div class="section-body">
            @include('layouts.alert')
            <h2 class="section-title">Articles Management</h2>
            <p class="section-lead">
                @if (Auth::user()->role == 'admin')
                Request for Articles and manage your Articles.
                @else
                Manage All Articles, add, edit or delete.
                @endif
            </p>
            <div class="row mt-4">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            @if (Auth::user()->role == 'admin')
                            <h4>Your Articles</h4>
                            @else
                            <h4>All Articles</h4>
                            @endif
                        </div>
                        <div class="card-body">
                            <div class="float-left">
                                <form method="GET" action="{{ route('article.index') }}" class="mb-4">
                                    <select name="sort_role" onchange="this.form.submit()" class="form-control mt-2">
                                        <option value="">Select Status</option>
                                        <option value="pending"
                                            {{ request('sort_role') == 'pending' ? 'selected' : '' }}>Pending</option>
                                        <option value="published"
                                            {{ request('sort_role') == 'published' ? 'selected' : '' }}>Published
                                        </option>
                                        <option value="reject" {{ request('sort_role') == 'reject' ? 'selected' : '' }}>
                                            Rejected</option>
                                    </select>
                                </form>

                            </div>
                            <div class="float-right">
                                <form method="GET" action="{{ route('article.index') }}">
                                    <div class="input-group mb-4">
                                        <input type="text" class="form-control" name="search" placeholder="Search"
                                            value="{{ request('search') }}">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="submit"><i
                                                    class="fas fa-search"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <div class="clearfix mb-3"></div>

                            <div class="table-responsive">
                                <table class="table-striped table">
                                    <tr>
                                        <th>Judul Artikel</th>
                                        <th>Author</th>
                                        <th>Categories</th>
                                        <th>Status</th>
                                    </tr>
                                    @foreach ($articles as $arc)
                                    <tr>
                                        <td>{{ $arc->title }}
                                            <div class="table-links">
                                                <div class="bullet"></div>
                                                <a href="{{ route('article.show', $arc->id) }}">Detail</a>
                                                @if (
                                                (auth()->user()->role === 'superAdmin' && ($arc->status !== 'pending' ||
                                                $arc->id_user === auth()->id())) ||
                                                (auth()->user()->role === 'admin' && $arc->status === 'pending' &&
                                                $arc->id_user === auth()->id())
                                                )
                                                <div class="bullet"></div>
                                                <a href="{{ route('article.edit', $arc->id) }}">Edit</a>
                                                <div class="bullet"></div>
                                                <a href="#" class="text-danger"
                                                    onclick="event.preventDefault(); document.getElementById('delete-form-{{ $arc->id }}').submit();">
                                                    Trash
                                                </a>
                                                <form id="delete-form-{{ $arc->id }}"
                                                    action="{{ route('article.destroy', $arc->id) }}" method="POST"
                                                    style="display: none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                                @endif
                                            </div>
                                        </td>
                                        <td>
                                            {{ $arc->user->name ?? 'Unknown User' }}
                                        </td>
                                        <td>
                                            @if (is_array($arc->category))
                                            @foreach ($arc->category as $cat)
                                            <span class="badge badge-primary">{{ $cat }}</span>
                                            @endforeach
                                            @else
                                            <span class="badge badge-danger">No Categories</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($arc->status == 'reject')
                                            <span class="badge badge-danger">Rejected</span>
                                            @elseif($arc->status == 'pending')
                                            <span class="badge badge-warning">Pending</span>
                                            @elseif($arc->status == 'published')
                                            <span class="badge badge-success">Published</span>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </table>
                            </div>
                            <div class="float-right">
                                <nav>
                                    {{ $articles->links() }}
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
