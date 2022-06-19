<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Item;

class DiscreteProbability extends Model
{
    use HasFactory;
    // public static $attributeArr = [
    //     'gender' => [
    //         'male',
    //         'female'
    //     ]
    // ];

    public static function seed($attribute, $value)
    {
        $data = Item::select($attribute, 'diabetes')->where([
            [$attribute, $value]
        ])->get();
    
        $dataCount = $data->count();
        $positiveCount = $data->where('diabetes', true)->count();
        $negativeCount = $data->where('diabetes', false)->count();

        $positiveProbability = $positiveCount / $dataCount; 
        $negativeProbability = $negativeCount / $dataCount;

        DiscreteProbability::create([
            'attribute' => $attribute,
            'value' => $value,
            'diabetes' => true,
            'probability' => $positiveProbability
        ]);
        DiscreteProbability::create([
            'attribute' => $attribute,
            'value' => $value,
            'diabetes' => false,
            'probability' => $negativeProbability
        ]);
    }

}
