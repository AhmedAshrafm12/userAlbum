<?php

namespace App\Http\Controllers;

use App\Models\album;
use Illuminate\Http\Request;

use App\Models\picture;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $albums =  auth()->user()->albums;
       
        return view('home', ['albums'=>$albums]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    return view('albums.create');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorealbumRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|min:4',
            'cover'=>'required|image'
        ]);
        $imagePath = request('cover')->store('uploads','public');
        auth()->user()->albums()->create([
            'name'=>$request->name,
            'cover'=>$imagePath
        ]);
        return redirect('/home'); 
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\album  $album
     * @return \Illuminate\Http\Response
     */
    public function show(album $album)
    {
        return view('albums.show',compact('album'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\album  $album
     * @return \Illuminate\Http\Response
     */
    public function edit(album $album)
    {
    return view('albums.edit',['album'=>$album]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatealbumRequest  $request
     * @param  \App\Models\album  $album
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, album $album)
    {
        $request->validate([
            'name'=>'required|min:3',
        ]);

        $imagePath =  request('cover') == null  ? $album->cover : request('cover')->store('uploads','public');

        $album->name = $request->name;
        $album->cover = $imagePath;
        $album->update();
        return redirect('/home');   
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\album  $album
     * @return \Illuminate\Http\Response
     */
    public function destroy(album $album)
    {
         album::destroy($album->id);      
     }

  public function deleteAll(album $album){
   
    $album->pictures()->delete();
    $album->delete();
    return redirect('/home');   

  }

  public function movePictures($sourceAlbumId,$targetAlbumId)
  {
      $pictures = album::find($sourceAlbumId)->pictures;
      foreach($pictures as $picture){
          $picture->album_id = $targetAlbumId;
          $picture->save();
      }
      $this->destroy(album::find($sourceAlbumId));
    return redirect('/home');   

  }




  public function albumsList()             // git albums list for moving pictures
  {
      return auth()->user()->albums;
  }
}
