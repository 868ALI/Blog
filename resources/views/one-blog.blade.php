@extends('layouts.standard')

@section('title-block'){{$blog->name}}@endsection

@section('content')
    <h1>Блог</h1>
    <div class="alert alert-info" style="margin-left: 10%; width: 500px;">
        <h3>{{ $blog->message }}</h3>
        <p>{{ $blog->email }} - {{ $blog->name }}</p>
        <p><small>{{ $blog->created_at }}</small></p>
        @if(auth()->user()->email === $blog->email)
            <a href="{{ route('blog-update', $blog->id) }}"><button class="btn btn-primary">Обновить</button></a>
            <a href="{{ route('blog-delete', $blog->id) }}"><button class="btn btn-danger">Удалить</button></a>
        @endif
    </div>


@endsection
