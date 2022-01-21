@extends('default')

@section('title', '新規投稿')

@section('content')
    <form action="{{ url('/posts') }}" method="post">
    {{ csrf_field() }}
        <p>
            <input type="text" name="name" value="{{ old('name') }}" id="name" placeholder="enter name">
        </p>
        <p>
            <input type="password" name="password" placeholder="enter password">
        </p>
        @if ($errors->has('password'))
            <span class="error">{{ $errors->first('password') }}</span>
        @endif
        <p>
            <textarea name="body" rows="8" cols="40" value="{{ old('body') }}" placeholder="enter comment"></textarea>
        </p>
        @if ($errors->has('body'))
            <span class="error">{{ $errors->first('body') }}</span>
        @endif
        <p>
            <input type="submit" value="submit">
        </p>
    </form>
@endsection
