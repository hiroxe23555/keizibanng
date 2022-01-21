@extends('default')

@section('title', '削除画面')

@section('content')
    <h1>本当にこの記事を削除しますか？</h1>
    <dl>
        <dt>
            <p>name:{{ $user->name }}</p>
            <p>skype:{{ $user->skype }}</p>
        </dt>
        <dd>
            <ul>
                @foreach ( $tags as $tag )
                    <li>{{ $tag->tag }}</li>
                @endforeach
            </ul>
            <p>title: {{ $user->title }}</p>
            {!! nl2br(e($user->body)) !!}
        </dd>
     </dl>
    <form action="{{ url('/delete') }}" method="post">
        {{ csrf_field() }}
            <p>
                <input type="password" name="password" placeholder="enter password">
                <input type="hidden" name="id" value="{{ $user->id }}">
            </p>
            <p>
                @if (isset($error))
                <span class="error">{{ $error }}</span>
                @endif
            </p>
                <input type="submit" value="submit">
        </form>
@endsection