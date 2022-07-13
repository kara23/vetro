@extends('navs.header')

@section('content')
    <div class="row justify-content-center">
    <div class="col-12 text-center mb-2"><h3><strong>Register</strong></h3></div>
        <div class="col-lg-3 bg-white p-3 round">
            <form action="{{ route('register') }}" method="post">
                @csrf
               
                <label for="name text-bold">Name</label>
                <input type="text" class="form-control" placeholder="" id="name" name="name" value="{{  old('name') }}" />
                    @error('name')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                    @enderror
                <br/>

                <label for="username text-bold">Username</label>
                <input type="text" class="form-control" placeholder="" id="username" name="username" value="{{  old('username') }}" />
                    @error('username')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                    @enderror
                <br/>

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
                <button type="submit" class="btn btn-primary form-control">Register</button>
            </form>
        </div>
    </div>
@endsection