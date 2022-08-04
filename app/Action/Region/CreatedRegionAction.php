<?php
namespace App\Action\Region;
use App\Models\Region;
class CreatedRegionAction{
        
    public static function execute(array $regionList) : void
    {
        foreach($regionList as $key => $price){
            $query = Region::query();
            if(!$query->where('id',$key)->exists()){
                $newRegion = new Region;
                $newRegion->id = $key;
            }
        }
    }    
        
}