@extends('layouts.app')

@section("title") Sample @endsection

@section('content')
    <x-bread-crumb>
        <li class="breadcrumb-item active" aria-current="page">Article List</li>
    </x-bread-crumb>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="">
                            <h4 class="mb-0">
                                <i class="feather-list"></i>
                                Article List
                            </h4>
                        </div>
                        <div class="d-flex align-items-center">
                            <div class="">
                                <a href="{{ route('article.create') }}" class="btn btn-outline-primary mr-2"><i class="feather-plus-circle"></i> Create Article</a>
                            </div>
                            <div class="">
                                <form action="{{ route('article.index') }}" method="get">
                                    <div class="form-inline">
                                        <input type="text" name="search" placeholder="Search Article" class="form-control mr-2" value="{{ request()->search }}" required>
                                        <button class="btn btn-primary">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="">
                        @isset(request()->search)
                            <span>Search By : <b>" {{ request()->search }} "</b> </span>
                        @endisset

                        @if(session('message'))
                            <p class="alert alert-warning font-weight-bold w-100">{{ session('message') }}</p>
                        @endif
                    </div>
                    <table class="table table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Article</th>
                                <th>Category</th>
                                <th>Owner</th>
                                <th>Contorl</th>
                                <th>Created</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($articles as $article)
                                <tr>
                                    <td>{{ $article->id }}</td>
                                    <td>
                                        <span class="font-weight-bold">{{ Str::words($article->title,7) }}</span>
                                        <br>
                                        <small class="text-black-50">{{ Str::words($article->description,12) }}</small>
                                    </td>
                                    <td>{{ $article->category->title }}</td>
                                    <td>{{ $article->user->name }}</td>
                                    <td class="text-nowrap">
                                        <a href="{{ route('article.show',$article->id) }}" class="btn btn-outline-success">Show</a>
                                        <a href="{{ route('article.edit',$article->id) }}" class="btn btn-outline-primary">Edit</a>
                                        <form action="{{ route('article.destroy',[$article->id,'page'=>request()->page]) }}" class="d-inline-block" method="post">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-outline-danger" onclick="return confirm('Are You Sure to Delete This Article?')">Delete</button>
                                        </form>
                                    </td>
                                    <td>
                                        <span class="small text-nowrap">
                                            <i class="feather-calendar"></i>
                                            {{ $article->created_at->format('d-m-Y') }}
                                        </span>
                                        <br>
                                        <span class="small">
                                            <i class="feather-clock"></i>
                                            {{ $article->created_at->format('j:i A') }}
                                        </span>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center">There is no article</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-between">
                        {{ $articles->appends(request()->all())->links() }}
                        <p class="font-weight-bold mb-0">Total : {{ $articles->total() }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
