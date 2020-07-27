@extends('layouts.auth')
@section('content')
<section style="background-color: lightgrey">
    <div class="container row">
        <div class="col m7 offset-m2 l7 offset-l2 xl4 offset-xl4 s10 offset-s1 card card-login z-depth-4" style="background-color: white">
            <div class="card-title card-title-login  lighten-2 white-text" style="background-color: lightgreen">
                <h5 class="center flow-text">Login</h5>
            </div>
            <div class="card-content">
                <form action="{{ route('auth.authenticate') }}" method="POST">
                    <div class="input-field">
                        <!-- <i class="material-icons prefix">mail</i> -->
                        <input type="email" name="email" id="email" class="validate" value="{{ old('email') ? : '' }}">
                        <label for="email">Email</label>
                        <span class="{{$errors->has('email') ? 'helper-text red-text' : '' }}">{{$errors->has('email') ? $errors->first('email') : '' }}</span>
                    </div>
                    <div class="input-field">
                        
                        <input type="password" name="password" id="password">
                        <label for="password">Password</label>
                        <span class="{{$errors->has('password') ? 'helper-text red-text' : '' }}">{{$errors->has('password') ? $errors->first('password') : '' }}</span>
                    </div>
                    @csrf()
                    <!-- <p>
                        <label for="remember">
                            <input type="checkbox" id="remember" name="remember" />
                            <span>Remember Me</span>
                        </label>
                    </p>
                    <a href="{{route('password.request')}}" class="right">Forgot Password</a> -->
                    <br>
                    <div class="card-action">
                        <button class="btn col s12 m12 l12 xl12" type="submit" name="submit" style="background-color: lightgreen">Login</button>
                    </div>
                    <br>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection