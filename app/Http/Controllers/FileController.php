<?php

namespace App\Http\Controllers;

/******************************************************
 * IM - Vocabulary Builder
 * Version : 1.0.2
 * Copyright© 2016 Imprevo Ltd. All Rights Reversed.
 * This file may not be redistributed.
 * Author URL:http://imprevo.net
 ******************************************************/
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Log;

class FileController extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
      $active_file = null;
      $destinationPath = public_path() . "/upload/";
      $files = scandir($destinationPath);
      array_splice($files, 0, 2);

      $data = [];
      foreach ($files as $key => $file){
        $ext = pathinfo($destinationPath.$file, PATHINFO_EXTENSION);
        array_push($data, array('file' => $file, 'ext' => $ext, 'key' => $key));
      }
      if (isset($data[0])) $active_file = $data[0];

      return view('welcome', [
        'files' => $data,
        'active_file' => $active_file,
      ]);
    }

    public function file($id)
    {
      $active_file = null;
      $destinationPath = public_path() . "/upload/";
      $files = scandir($destinationPath);
      array_splice($files, 0, 2);

      $data = [];
      foreach ($files as $key => $file){
        $ext = pathinfo($destinationPath.$file, PATHINFO_EXTENSION);
        array_push($data, array('file' => $file, 'ext' => $ext, 'key' => $key));
      }
      if (isset($data[$id]))
        $active_file = $data[$id];
      else
        return redirect('/');

      return view('welcome', [
        'files' => $data,
        'active_file' => $active_file
      ]);
    }

    public function upload(Request $request)
    {

      $attributes = Input::all();
      if (isset($attributes['fileToUpload'])) {

          $file = $attributes['fileToUpload'];

          // delete old image
          $destinationPath = public_path() . "/upload/";
          $fileName = time().'_'.$file->getClientOriginalName();
          $fileSize = $file->getClientSize();
          $upload_success = $file->move($destinationPath, $fileName);

          if ($upload_success) {
              $imageFileUrl = "/upload/".$fileName;
          }
      }
      return redirect('/');
    }
}
