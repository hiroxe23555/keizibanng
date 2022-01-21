@inject('image_service', 'App\Services\ImageService')
@inject('message_service', 'App\Services\MessageService')


@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            @include('layouts.flash-message')
            <h3>{{ $thread->name }}</h3>
        </div>
        <div class="col-md-10 mb-3">
            @include('components.thread-index-back')
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-10 mb-5">
            @foreach ($thread->messages as $message)
            <div class="card mb-2">
                <div class="card-body">
                    <p>{{ $loop->iteration }} {{ $message->user->name }} {{ $message->created_at }}</p>
                    <p class="mb-0">{{!! $message_service->convertUrl($message->body) !!}}</p>
                    <div class="row">
                        @if (!$message->images->isEmpty())
                        @foreach ($message->images as $image)
                            <div class="col-md-3">
                                <img src="{{asset('/storage/app/public/'.$image->image_file_path)}}" class="img-thumbnail" alt="" width="2000" height="1800">
                            </div>
                            <div id = "app">
                            <router-view></router-view>
                            </div>
                            @endforeach
                        @endif
                    </div>
                    @include('components.message-delete', compact('thread', 'message')) 
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <h5 class="card-header mt-2">レスを投稿する</h5>
                <div class="card-body">
                    @csrf
                    @include('components.message-create', compact('thread'))
                </div>
            </div>
        </div>
    </div>
</div>
@endsection