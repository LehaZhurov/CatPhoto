<?php
namespace App\Action\Good;
use App\Models\Good;
use Illuminate\Support\Collection;

class CreatedGoodAction{
        
    public static function execute(array $goods) : Collection 
    {
        $Goods = [];
        foreach($goods as $key => $good){
            $query = Good::query();
            if(!$query->where('id',$good['product_id'])->exists()){
                $newGood = new Good();
                $newGood->id = $good['product_id'];
                $newGood->save();
                $Goods[] = $newGood;
            }
        }
        return collect($Goods);
    }    
        
}