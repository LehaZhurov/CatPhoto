<?php
namespace App\Action\PriceTag;
use App\Models\PriceTag;
class CreatedPriceTagAction{
        
    public static function execute(int $goodId,array $priceList) : void
    {
        foreach($priceList as $region_id => $price){
            $query = PriceTag::query();
            $query->where('good_id',$goodId)->where('region_id',$region_id);
            if(!$query->exists()){
                $newPriceTag = new PriceTag;
                $newPriceTag->price_purchase = $price['price_purchase'];
                $newPriceTag->price_selling = $price['price_selling'];
                $newPriceTag->price_discount = $price['price_discount'];
                $newPriceTag->region_id = $region_id;
                $newPriceTag->good_id = $goodId;
                $newPriceTag->save();
            }else{
                $priceTag = $query->first();
                $priceTag->price_purchase = $price['price_purchase'];
                $priceTag->price_selling = $price['price_selling'];
                $priceTag->price_discount = $price['price_discount'];
                $priceTag->region_id = $region_id;
                $priceTag->good_id = $goodId;
                $priceTag->save();
            }
        }
    }    
        
}