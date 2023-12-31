@extends("layouts.app")

@section("title") Sign In @endsection

@section("content")

    <div class="row" style="height: 100vh !important;">

        <div class='container mt-5'>
            <div class='row justify-content-center'>
                <div class='col-8 col-md-5'>

                    <form action="{{ route("login") }}" id="login-form" method="POST" accept-charset="utf-8">
                        @csrf
                        <h2>
                            <label class="login-title">
                                Tech Soft Coding Test
                            </label>
                        </h2>
                        <hr/>

                        <!-- Message -->

                        <div class="form-group">
                            <label><font color="#000">Email</font></label>
                            <input class="form-control @error('email') is-invalid @enderror" type="text" placeholder="Email" name='email' value="">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label><font color="#000">Password</font></label>
                            <input class="form-control @error('password') is-invalid @enderror" type="password"  placeholder="Password" name='password' value="">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                            @enderror

                        </div>

                        <button class="btn btn-primary" type="submit">Sign In</button>
                        <a href="{{ route("register") }}" class="btn btn-outline-primary" type="submit">Sign Up</a>

                    </form>
                    <hr>

                    {{-- <a href="{{ route("password.request") }}">Forgot Password?</a> --}}

                </div>
            </div>
        </div>

    </div>
@endsection







