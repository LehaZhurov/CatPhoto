<?php
namespace App\Action\Good;
use App\Models\Good;
use Illuminate\Support\Collection;
use App\Action\PriceTag\CreatedPriceTagAction;
class CreatedGoodAction{
        
    public static function execute(array $goods) : Collection 
    {
        $Goods = [];
        foreach($goods as $key => $good){
            $query = Good::query();
            $query->where('id',$good['product_id']);
            if(!$query->exists()){
                $newGood = new Good();
                $newGood->id = $good['product_id'];
                $newGood->save();
                $Goods[] = $newGood;
                CreatedPriceTagAction::execute($good['product_id'],$good['prices']);
            }else{
                $Goods[] = $query->first();
            }
        }
        return collect($Goods);
    }    
        
}