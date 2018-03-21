@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center" style="margin-top: 20px;">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">文章列表</div>

                <div class="card-body">
                    @foreach($blogs as $blog)
                        <div class="blog-item" style="margin-bottom: 20px;">
                            <a href="/blogs/view/{{ $blog->id }}">{{ $blog->title }} {{ $blog->author->name }}</a>
                            <div>{{ str_limit($blog->content, 220) }}</div>
                            <div>{{ $blog->created_at }}</div>
                        </div>
                    @endforeach
                    {{ $blogs->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
