<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Action\Good\CreatedGoodAction;
class GoodController extends Controller
{
    public function index(Request $request){
        $goods = CreatedGoodAction::execute($request->all());
        return $goods;
    }
}
