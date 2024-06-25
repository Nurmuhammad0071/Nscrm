<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Company;
use App\Models\Gallery;
use App\Models\Header;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(){
        $header = Header::all();
        $about = About::all();
        $company = Company::all();
        $gallery = Gallery::all();

        return view('frontend.index' , [
            'headers' => $header,
            'abouts' => $about,
            'companies' => $company,
            'galleries' =>$gallery
        ]);
    }

}
