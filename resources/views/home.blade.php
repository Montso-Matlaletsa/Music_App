@extends('layouts.admin')

@section('content')
<div class="row indigo darken-4">
    <div class="col m12">
        <div class="col m3">
            <div class="collection">
                <a href="/a/{{Auth::user()->id}}" class="collection-item"><i class="fa fa-2 fa-music"></i><span class="right">Music</span></a>
                <a href="#!" class="collection-item">Videos</a>
                <a href="#!" class="collection-item">Artists</a>
                <a href="#!" class="collection-item">Genre</a>
              </div>
        </div>
        <div class="col m9">

            <div class="row">
                <div class="col m3">
                    <div class="card">
hfhg
                    </div>
                </div>

                <div class="col m3">
                    <div class="card">
                        fh
                    </div>
                </div>

                <div class="col m3">
                    <div class="card">
                        gfh
                    </div>
                </div>

                <div class="col m3">
                    <div class="card">
                        dgfhf
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
