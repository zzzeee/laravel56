@extends('layouts.app')

@section('content')
<div class="container">
    @include('layouts.error')
    <form method="POST" action="/posts">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="title">title</label>
            <input type="text" class="form-control" name="title" value="{{ old('title') }}" />
        </div>
        <div class="form-group">
            <label for="content">content</label>
            <input type="text" class="form-control" name="content" value="{{ old('content') }}" />
        </div>

        <button type="submit" class="btn btn-default">Submit</button>
    </form>
</div>
@endsection