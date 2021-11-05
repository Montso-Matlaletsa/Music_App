@extends('layouts.admin')
@section('content')
<div class="row indigo darken-4" style="height: 600px">

  @if ($message = Session::get('success'))
  <div class="isa_success">
    <i class="fa fa-check"></i>
      Song uploaded Successfully
</div>
@endif

@if (count($errors) > 0)
<div class="isa_error">
    <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
    
    <div class="col m12 s12">
        <div class="col m12">
            <a class="btn right purple waves-effect waves-light modal-trigger" href="#modal1">
                Upload Song</a>
        </div>
        
        <div class="col m3 s12">
            <div class="collection">
                <a href="/a/{{Auth::user()->id}}" class="collection-item active orange"><i class="fa fa-2 fa-music"></i><span class="right">Music</span></a>
                <a href="#!" class="collection-item ">Videos</a>
                <a href="#!" class="collection-item">Artists</a>
                <a href="#!" class="collection-item">Genre</a>
              </div>
        </div>
        <div class="col m9 s12">
            

            <div class="row">

                <div class="col m12">
                    <table class="striped centered white-text">
                        <thead>
                          <tr>
                              <th>Song Name</th>
                              <th>Artist Name</th>
                              <th>Genre</th>
                              <th>Release Date</th>
                          </tr>
                        </thead>
                
                        <tbody>
                          @foreach($songs as $song)  
                          <tr>
                            <td>{{$song->song_name}}</td>
                            <td>{{$song->artist_name}}</td>
                            <td>{{$song->genre}}</td>
                            <td>{{$song->release_date}}</td>
                          </tr>
                          @endforeach  
                        </tbody>
                      </table>
                </div>
                
            </div>
        </div>
    </div>


</div>
@endsection