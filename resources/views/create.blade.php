@extends('navs.header')

@section('content')
    <div class="row justify-content-center mb-3">
        <div class="col-lg-6 bg-white p-3 round">
            <form action="{{ route('createPost') }}" method="post">
                @csrf
                @if(session()->has('message'))
                    <div class="alert alert-success mb-3 p-2">
                        {{ session()->get('message') }}
                    </div>
                @endif
                <strong>Create post</strong>
                <textarea class="mt-2 form-control mb-3 @error('post') border border-danger @enderror" name="post" placeholder="Write new post" rows="6"></textarea>
                <input type="hidden" name="user_id" value=" @auth {{ Auth::user()->id }} @else @endauth" />
                @error('post')
                        <div class="text-danger mb-3">
                            {{ $message }}
                        </div>
                    @enderror
                <button class="btn btn-primary">Post</button>
            </form>
        </div>
    </div>

    <div class="row justify-content-center mb-3">
                @if(session()->has('success_msg'))
                <div class="row justify-content-center">
                    <div class="col-lg-6 p-0">
                        <div class="alert alert-success p-2">
                            {{ session()->get('success_msg') }}
                        </div>
                    </div>
                </div>
                    
                @endif
        <div class="col-lg-6 bg-white p-3 round">
            <strong>Posts</strong>
        </div>
    </div>

    <div class="row justify-content-center mb-3">
        <div class="col-lg-6 bg-white p-3 round">
            <div class="row">
                @foreach ($posts as $post) 
                    <div class="col-12 mb-3">
                    <strong>{{ $post->name }}</strong><br/>
                    @if( Auth::user()->id == $post->user_id )
                   <a href="{{ route('createPost') }}/{{$post->post_id}}">Delete</a> - <a href="{{ route('edit', $post->post_id) }}">Edit</a> - 
                   @endif
                   <a href="{{ route('like', $post->post_id) }}">@if( Auth::user()->id == $post->likes_user_id) Unlike @else Like @endif {{ $post->likes }} </a> - 
                     {{ $post->post }}<br/>
                   <span class="font-italic text-secondary">{{ $post->date }}</span>
                    </div>
                @endforeach
            </div>
           
        </div>
    </div>

@endsection