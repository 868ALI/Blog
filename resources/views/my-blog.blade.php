@extends('layouts.standard')

@section('title-block')
    Написать блог
@endsection

@section('content')
    <h1>Мой блог</h1>
    <a class="me-3 py-2 link-body-emphasis text-decoration-none" href="{{ route('my-blog', ['sort' => 'desc']) }}"
       style="margin-left: 10%; width: 500px;"><button class="btn btn-info" style="margin-bottom: 7px;">Сначала новые</button></a>
    <a class="me-3 py-2 link-body-emphasis text-decoration-none" href="{{ route('my-blog', ['sort' => 'asc']) }}"
       style="margin-left: 10%; width: 500px;"><button class="btn btn-secondary" style="margin-bottom: 7px;">Сначала старые</button></a>
    @foreach($data as $el)
        <div class="alert alert-info" style="margin-left: 10%; width: 500px;">
            <h3>{{ $el->massage }}</h3>
            <p>{{ $el->email }}</p>
            <p><small>{{ $el->created_at }}</small></p>
            <a href="{{ route('one-blog', $el->id) }}"><button class="btn btn-warning">Детально</button></a>
        </div>
    @endforeach

@endsection


