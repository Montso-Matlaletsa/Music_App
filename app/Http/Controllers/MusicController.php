<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Song;
use DB;

class MusicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($user_id)
    {
        //$songs = Song::find($user_id);
        $songs =DB::table('songs')->where('user_id', $user_id)->get();
        return View('pages.music')->with('songs', $songs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

  
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->hasFile('song')){

            $song = new Song();
           $img = time()."_".$request->file('cover_image')->getClientOriginalName();

          //  $fileName = $request->file('song')->getClientOriginalName();       
           // $request->file('song')->storeAs(public_path('singles'), $fileName);
       
            $request->cover_image->move(public_path('uploads'), $img);
          // $img = $request->get('cover_image') . '.' . $request->file('cover_image')->extension();        
          // $request->file('cover_image')->storeAs(public_path('covers'), $img);

            $req_song = time()."_".$request->file('song')->getClientOriginalName();
           
            $request->song->move(public_path('music'), $req_song);

            $song->song_name = $request->song_name;
            $song->artist_name = $request->artist_name;
            $song->cover_image = $img;
            $song->song = $req_song;
            $song->release_date = $request->release_date;
            $song->genre = $request->genre;
            $song->user_id = $request->user_id;

            if($song->save()){
                return back()
                ->with('success','Song has been uploaded.')
                ->with('Song', $song->song_name);
            }
        }else{
            return ("awwwwww");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
