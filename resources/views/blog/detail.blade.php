@extends('blog.master')
@section('content')
<div class="">
    <div class="py-3">

        <div class="small post-category">
            <a href="{{ route('baseOnCategory',$article->category->id) }}" class="text-decoration-none" rel="category tag">{{ $article->category->title }}</a> 
        </div>

        <h2 class="fw-bolder">{{ $article->title }} </h2>
        <div class="d-block d-md-flex justify-content-between align-items-center my-3">

            <div class="">
                    @if($article->user->photo)
                        <img alt="" src="{{ asset('storage/profile/'.$article->user->photo) }}" class="avatar avatar-30 photo rounded-circle" height="30" width="30" loading="lazy">
                    @else
                        <img alt="" src="{{ asset('dashboard/user/user-default-photo.png') }}" class="avatar avatar-30 photo rounded-circle" height="30" width="30" loading="lazy">
                    @endif
                        
                        <a href="{{ route('baseOnUser',$article->user->id) }}" title="Visit admin’s website"
                    rel="author external">{{ $article->user->name }}</a>
            </div>

            <a href="{{ route('baseOnDate',$article->created_at) }}" class="text-primary text-decoration-none">
                <i class="feather-calendar"></i>
                {{ $article->created_at->format('d-M-Y h:i a') }}
            </a>
        </div>

        <p class="text-black-50" style="white-space: pre-line;">{{ $article->description }}</p></blockquote>

        @php
            $previousArticle = \App\Article::where('id','<',$article->id)->latest('id')->first();
            $nextArticle = \App\Article::where('id','>',$article->id)->first();
        @endphp

        <div class="nav d-flex justify-content-between p-3">
            <a href="{{ isset($previousArticl) ? route('detail',$previousArticle->slug) : '#' }}" class="btn btn-outline-primary page-mover rounded-circle @empty($previousArticle) disabled @endempty">
                <i class="feather-chevron-left"></i>
            </a>

            <a class="btn btn-outline-primary px-3 rounded-pill" href="{{ route('index') }}">
                Read All
            </a>

            <a href="{{ isset($nextArticle) ? route('detail',$nextArticle->slug) : '#' }}" class="btn btn-outline-primary page-mover rounded-circle @empty($nextArticle) disabled @endempty">
                <i class="feather-chevron-right"></i>
            </a>
        </div>
    </div>
</div>
@endsection