<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileUpload extends Controller
{
    function upload(Request $request){
        $result = $request->file('file')->store('fileResources');
        return ['key',$result];
    }
}
