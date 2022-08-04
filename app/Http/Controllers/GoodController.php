<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Action\Good\CreatedGoodAction;
use App\Http\Resources\GoodResource;
class GoodController extends Controller
{
    public function index(Request $request){
        $goods = CreatedGoodAction::execute($request->all());
        return GoodResource::collection($goods);
        // return $goods;
    }
}
