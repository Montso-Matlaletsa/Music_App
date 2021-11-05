@extends('layouts.app')

@section('content')

    <div id="loginpage">
        <div class="container">
            <div class="row">

                <div class="card col m4 s12" style="margin-top: 70px; ">


                    <div class="card-content">

                        <div class="card-title valign-wrapper center-align">
                            <div class="card purple white-text" style="height: 50px">
                               <b>Login</b>
                            </div>
                        </div>
                      

                        <div class="card-body">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <div class="input-field col s12">
                                    <input id="email" type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    <label for="email" class="col-md-4 col-form-label text-md-right">
                                        {{ __('E-Mail Address') }}</label>

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                  </div>


                                  <div class="input-field col s12">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
        
                                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                  </div>
        

                                  <div class="form-check">
                                        
                                    <label>
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}/>
                                        {{ __('Remember Me') }}
                                      </label>
                                </div>

                                
                                <button type="submit" class="btn purple col s12" style="margin-top: 30px">
                                    {{ __('Login') }}
                                </button>
        
                                @if (Route::has('password.request'))
                                <a class="btn col s12 green" href="{{ route('password.request') }}" style="margin-top: 30px;
                                 margin-bottom: 30px">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                            </form>
                        </div>


                    </div>
                  </div>
            </div>
            
        </div>
    </div>
@endsection
