@extends('navs.header')

@section('content')
    <div class="row justify-content-center">
        <div class="col-12 text-center mb-2"><h3><strong>Login</strong></h3></div>
        <div class="col-lg-4 bg-white p-3 round">
            <form action="{{ route('login') }}" method="post">
                @csrf
                @if($errors->any())
                    <div class="alert alert-danger p-2">
                        {{ $errors->first() }}
                    </div>
                @endif
                
                <label for="email text-bold">Email</label>
                <input type="text" class="form-control" placeholder="" id="email" name="email" value="{{  old('email') }}" />
                    @error('email')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                    @enderror
                <br/>
                <label for="password text-bold">Password</label>
                <input type="password" class="form-control" placeholder="" id="password" name="password" />
                    @error('password')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                <br/>
                <button type="submit" class="btn btn-primary form-control">Login</button>
            </form>
        </div>
    </div>
@endsection