{{--@if(auth()->user()->email === $data->email)--}}

    @extends('layouts.standard')

    @section('title-block')
        Обнавить блог
    @endsection

    @section('content')
        <h1>Обнавить блог</h1>
        @if ($errors->any())
            <div class="alert alert-danger" style="margin-left: 10%; width: 500px;">
                <ul>
                    @foreach($errors->all() as $errors)
                        <li>{{ $errors }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('one-blog-update-post', $blog->id) }}" method="post">
            @csrf
            <div class="form-group" style="margin-left: 10%; width: 500px;">
                <textarea name="message" id="message" class="form-control" placeholder="Enter your message">{{ $blog->message }}</textarea>
            </div>
            <br>
            <button type="submit" class="btn btn-success" style="margin-left: 10%">Обнавить</button>
        </form>
    @endsection
{{--@endif--}}

