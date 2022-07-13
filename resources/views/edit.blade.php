@extends('navs.header')

@section('content')
    <div class="row justify-content-center mb-3">
        <div class="col-lg-6 bg-white p-3 round">
            <form action="{{ route('updatePost') }}" method="post">
                @csrf
                @if(session()->has('message'))
                    <div class="alert alert-success mb-3 p-2">
                        {{ session()->get('message') }}
                    </div>
                @endif
                <strong>Edit post</strong>
                <textarea class="mt-2 form-control mb-3 @error('post') border border-danger @enderror" name="post" placeholder="Write new post" rows="6">@foreach ($post as $row){{ $row->post }}@endforeach</textarea>
                <input type="hidden" name="post_id" value="@foreach ($post as $row){{ $row->post_id }}@endforeach" />
                
                    @if(session()->has('error_msg'))
                        <div class="text-danger mb-3">
                            {{ session()->get('error_msg') }}
                        </div>
                @endif
                <button class="btn btn-primary">Update</button>
                
            </form>
        </div>
    </div>

   

@endsection