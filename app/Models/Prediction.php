<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Item;

class Prediction extends Model
{
    use HasFactory;

    public function item(){
        return $this->belongsTo(Item::class);
    }

    public static function seed(){
        $items = Item::all();
        foreach($items as $item){
            $item_id = $item->id;

            $result = Item::getProbabilities($item->getPropertiesAsArray());
            $positive_probability = $result['positive'];
            $negative_probability = $result['negative'];

            $diabetes_prediction = ($positive_probability >= $negative_probability) ? true : false;
            $is_accurate = ($diabetes_prediction == $item->diabetes) ? true : false;
            Prediction::create([
                'item_id' => $item_id,
                'positive_probability' => $positive_probability,
                'negative_probability' => $negative_probability,
                'diabetes_prediction' => $diabetes_prediction,
                'diabetes_real' => $item->diabetes,
                'is_accurate' => $is_accurate
            ]);
        }
    }

    public static function getAccuracy()
    {
        $all = Prediction::all();
        $correct_prediction = $all->where('is_accurate', true)->count();
        $accuracy = round( 100*($correct_prediction / $all->count()), 2);

        return $accuracy . '%';
    }
}
