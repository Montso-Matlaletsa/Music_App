<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Strictly Lesotho Music') }}</title>



    <!-- Fonts -->
    
    <link href="{{ asset('css/materialize.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/font-awesome.css') }}" rel="stylesheet" />
    <link href="{{asset('css/app.css')}}" rel="stylesheet" />

    <script defer src="{{ asset('js/jquery.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/materialize.min.js') }}" defer></script>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

</head>
<body>
    <div id="app">
        <nav class="orange navbar-fixed">
            <div class="nav-wrapper">
              <a href="#!" class="brand-logo">Lesotho Music</a>
              <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
              <ul class="right hide-on-med-and-down">
            
                <li><a href="sass.html">Home</a></li>
                <li><a href="badges.html">Music</a></li>
                <li><a href="collapsible.html">Top Charts</a></li>
                <li><a href="mobile.html">Music Videos</a></li>

                @guest
                @if (Route::has('login'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                @endif

                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Sign Up') }}</a>
                    </li>
                @endif
            @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} {{ Auth::user()->last_name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest
              </ul>
            </div>
          </nav>
        
          <ul class="sidenav" id="mobile-demo">
            <li><a href="/">Home</a></li>
            <li><a href="badges.html">Music</a></li>
            <li><a href="collapsible.html">Top Charts</a></li>
            <li><a href="mobile.html">Music Videos</a></li>

            @guest
            @if (Route::has('login'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
            @endif

            @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Sign Up') }}</a>
                </li>
            @endif
        @else
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }} 
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </li>
        @endguest
          </ul>

        <main >
            @yield('content')
        </main>

        <div id="modal1" class="modal" style="margin-bottom: 50px; height: 400px">
            <div class="modal-content">
              <h5 class="center">Upload A Song</h4>
                <hr />
    
                {{ Form::open(array('url' => '/store', 'method' => 'post', 'encytype' =>'multipart/form-data' ,'files'=>'true')) }}
                {{Form::token()}}

                <div class="row">
                    <div class="col m4 s12">
                        <div class="file-upload col m12">
                            <button class="btn purple" type="button" onclick="$('.file-upload-input').trigger( 'click' )">Add Cover Image</button>
                          
                            <div class="image-upload-wrap">
                              <input class="file-upload-input" name="cover_image" type='file' onchange="readURL(this);" accept="image/*" />
                              <div class="drag-text">
                                <h3>Drop Image here</h3>
                              </div>
                            </div>
                            <div class="file-upload-content">
                              <img class="file-upload-image" src="#" alt="your image" />
                              <div class="image-title-wrap">
                                <button type="button" onclick="removeUpload()" class="btn red">Remove <span class="image-title">Uploaded Image</span></button>
                              </div>
                            </div>
                          </div>

                    </div>
                    <div class="col m8 s12">

                        <div class="input-field col s12">
                            <input id="first_name" name="song_name" type="text" class="validate">
                            <label for="first_name">Song Name</label>
                          </div>

                          <div class="input-field col s12">
                            <input id="first_name" name="artist_name" type="text" class="validate">
                            <label for="first_name">Artist Name</label>
                          </div>

                          <div class="input-field col s12">
                            <select name="genre">
                              <option value="" disabled selected>Choose your option</option>
                              <option value="Country">Country</option>
                              <option value="Jazz">Jazz</option>
                              <option value="Hip Hop">Hip Hop</option>
                              <option value="Rap">Rap</option>
                              <option value="blues">Blues</option>
                              <option value="Pop">Pop</option>
                              <option value="RnB">RnB</option>
                            </select>
                            <label>Genre</label>
                          </div>

                          
                          <div class="input-field col s12">
                            <input type="text" class="datepicker" name="release_date">
                            <label for="first_name">Song Release Date</label>
                          </div>

                          <div class="input-field col s12">
                            <input type="file"  name="song">
                          
                          </div>
                          
                          <input type="hidden" value="{{Auth::user()->id}}" name="user_id" />
                          

                          <div class="col s12">
                            <button type="submit" class="btn orange right">Upload</button>
                          </div>

                        
                    </div>

                    </div>

                    
                </div>
                {{ Form::close() }}
             
            </div>
          </div>
    </div>

   
</body>
</html>