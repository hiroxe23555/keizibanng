@inject('message_service', 'App\Services\MessageService')
@inject('image_service', 'App\Services\ImageService')
@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-0">
        @include('layouts.flash-message')
        {{ $threads->links() }}
        </div>
    </div>
    <div class="row justify-content-center">
        @foreach ($threads as $thread)
            <div class="col-md-10 mb-5">
                <div class="card text">
                    <div class="card-header">
                        <h3 class="m-0">{{ $thread->name }}</h3>
                    </div>
                    @foreach ($thread->messages as $message)
                        <div class="card-body">
                            <h5 class="card-title">{{ $loop->iteration }} 名前：{{ $message->user->name }}：{{ $message->created_at }}</h5>
                            <p class="card-text">{{!! $message_service->convertUrl($message->body) !!}}</p>
                            <div class="row">
                            @if (!$message->images->isEmpty())
                            @foreach ($message->images as $image)
                            <div class="col-md-3">
                                <img src="{{asset('/storage/app/public/'.$image->image_file_path)}}" class="img-thumbnail" alt="" width="2000" height="1800">
                            </div>
                            @endforeach
                        @endif
                    </div>
                    @include('components.message-delete', compact('thread', 'message'))
                        </div>
                    @endforeach
                    <div class="card-footer">
                        @csrf
                        @include('components.message-create', compact('thread'))
                        @include('components.show-links', compact('thread'))
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="row justify-content-center">
        <div class="col-md-10 ">
        @include('layouts.flash-message')
            <div class="card">
                <p class="card-header">新規スレッド作成</h5>
                <div class="card-body">
                    <form method="POST" action="{{ route('users.store') }}">
                        @csrf
                        <div class="form-group">
                            <p class="thread-title ">タイトル名</p>
                            <input name="name" type="text" class="form-control" id="thread-title"
                                placeholder="名無し">
                        </div>
                        <div class="form-group">
                            <p class="thread-first-content ">コメント内容</p>
                            <textarea name="body" class="form-control" id="thread-first-content" rows="3"></textarea>
                        </div>
                        </div>
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-commenting" aria-hidden="true">
                                スレッド作成
                            </i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection