<?php

namespace App\Http\Controllers;

use App\Models\album;
use Illuminate\Http\Request;

class picturesController extends Controller
{

public function addPicture(album $album){                             // view adding form
    return view('pictures.addPicture',['album'=>$album]);
}

public function store( album $album){                               /// add new picture

    request()->validate([
        'name'=>'required|min:4',
        'image'=>'required|image'
    ]);
    $imagePath = request('image')->store('uploads','public');
    $album->pictures()->create([
        'name'=>Request('name'),
        'image'=>$imagePath
    ]);
    return redirect('/albums/'.$album->id); 


}

}
