@extends('layouts.app')

@section("title") {{ $article->title }} @endsection
@section('head')
    <style>
        .description{
            white-space: pre-line !important;
        }
    </style>
@stop

@section('content')
    <x-bread-crumb>
        <li class="breadcrumb-item"><a href="{{ route('article.index') }}">Article List</a></li>
        <li class="breadcrumb-item active" aria-current="page">Article Detail</li>
    </x-bread-crumb>

    <div class="row">
        <div class="col-12 col-lg-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <h4 class="mb-0 mr-3">
                            {{ $article->title}} 
                        </h4>
                    </div>
                    <div class="">
                        <small class="text-success"><i class="feather-layers">{{ $article->category->title }}</i></small>
                    </div>
                    <div class="">
                        <span class="small text-nowrap text-primary">
                            <i class="feather-calendar"></i>
                            {{ $article->created_at->format('d-m-Y') }}
                        </span>
                        <span class="small text-primary">
                            <i class="feather-clock"></i>
                            {{ $article->created_at->format('h:i A') }}
                        </span>
                    </div>
                    <div class="">
                        <small class="font-weight-bold text-warning">{{ $article->user->name}} <span class="text-secondary">{{ $article->created_at->diffForHumans() }}</span> </small> 
                    </div>
                    <p class="text-black-50 description">{{ $article->description}}</p>
                    <hr>
                    <div class="text-right">
                        <a href="{{ route('article.index') }}" class="btn btn-outline-dark">All Articles</a>
                        <a href="{{ route('article.edit',$article->id) }}" class="btn btn-outline-primary">Edit</a>
                        <form action="{{ route('article.destroy',$article->id) }}" class="d-inline-block" method="post">
                            @csrf
                            @method('delete')
                            <button class="btn btn-outline-danger" onclick='return confirm("Are You Sure to Delete $article->title?")''>Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
