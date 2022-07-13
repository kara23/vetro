@extends('navs.header')

@section('content')
    <div class="row justify-content-center mb-3">
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
                    <a href="{{ route('like', $post->post_id) }}">Likes {{ $post->likes }}</a> - {{ $post->post }}<br/>
                   <span class="font-italic text-secondary">{{ $post->date }}</span>
                    </div>
                @endforeach
            </div>
           
        </div>
    </div>
@endsection