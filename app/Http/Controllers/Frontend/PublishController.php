<?php

namespace App\Http\Controllers\Frontend;

use App\Model\Document;
use Illuminate\Http\Request;
use Auth;
use App\Helper\Common;
use App\Http\Controllers\Controller;

class PublishController extends Controller
{
       public function create()
       {	
           return view('frontend.published.document');
       }

       public function store(Request $request){
       	$input= array_filter($request->all());
        $input['user_id'] = Auth::id();
        if($request->file){
        $file = Common::uploadImage($request->file, env('PUBLISHED_IMAGE_PATH'));
        $input['file'] = $file;
        }
        Document::create($input);
       	return redirect()->route('publish.create');
       }

}
