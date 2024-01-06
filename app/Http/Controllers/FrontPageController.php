<?php

namespace App\Http\Controllers;

use App\Models\Deed\DeedFontStyle;
use App\Models\Deed\DeedFrame;
use App\Models\Deed\DeedLocation;
use App\Models\Deed\DeedPrintFrame;
use App\Models\Deed\DeedPrintSize;
use App\Models\Deed\Package;
use App\Models\Deed\PackageDetail;
use Illuminate\Http\Request;

class FrontPageController extends Controller
{
    public function index(){
        return view('index.index',[
        ]);
    }

}
