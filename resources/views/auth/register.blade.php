@extends('layouts.app')

@section('content')
<div id="loginpage">
    <div class="container">
        <div class="row">
            <div class="col m8"></div>
            <div class="card col m4 s12" style="margin-bottom: 40px; margin-top: 50px">
                <span class="card-title center ">
                   Register
                </span>
                <hr />
                <div class="card-content">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="input-field">
                            <input id="name" type="text" class="@error('name') is-invalid @enderror" name="name"  required  autofocus>
                            <label for="name">{{ __('Name') }}</label>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="input-field">
                            <input id="last_name" type="text" class="@error('name') is-invalid @enderror" name="last_name"  required  autofocus>
                            <label for="name">{{ __('Last Name') }}</label>
                            @error('last_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>


                        <div class="input-field">
                        
                                <input id="email" type="email" class="@error('email') is-invalid @enderror" name="email"  required >
                                <label for="email">{{ __('E-Mail Address') }}</label>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>


                        <div class="input-field">
                            <input id="password" type="password" class="@error('password') is-invalid @enderror" name="password" required >
                            <label for="password">{{ __('Password') }}</label>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="input-field">
                            <input id="password-confirm" type="password" name="password_confirmation" required />
                            <label for="password-confirm">{{ __('Confirm Password') }}</label>
                        </div>

                        <button type="submit" class="btn col s12 purple" style="margin-bottom: 50px">
                            {{ __('Register') }}
                        </button>

                    </form>
                </div>
     
              </div>
        </div>
    </div>
</div>
@endsection
