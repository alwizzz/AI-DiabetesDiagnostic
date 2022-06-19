<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Item;

class ContinousProbability extends Model
{
    use HasFactory;

    public static function getAverageAndStandardDeviation($arr, $key)
    {
        $num_of_elements = $arr->count();
        $variance = 0.0;
          
                // calculating mean using array_sum() method
        $average = (double) $arr->avg($key);
          
        foreach($arr as $i)
        {
            // sum of squares of differences between 
                        // all numbers and means.
            $variance += pow(($i[$key] - $average), 2);
        }
          
        $standardDeviation = (double) sqrt($variance/$num_of_elements);

        return [
            'average' => $average,
            'standard_deviation' => $standardDeviation
        ];
    }

    // public static function getProbability($x, $avg, $std)
    // {
    //     return (double) (1.0 / ($std * sqrt( 2*pi() ))) * exp( (-1 * pow($x - $avg, 2)) / (2*pow($std, 2)));
    // } 

    public function getProbability($x)
    {
        return (double) (1.0 / ($this->standard_deviation * sqrt( 2*pi() ))) * exp( (-1 * pow($x - $this->average, 2)) / (2*pow($this->standard_deviation, 2)));
    } 


    public static function seed($attribute)
    {
        $data = Item::select($attribute, 'diabetes')->get();
        $cp = new ContinousProbability;

        $positiveData = $data->where('diabetes', true);
        $negativeData = $data->where('diabetes', false);
    
        $positiveResult = static::getAverageAndStandardDeviation($positiveData, $attribute);
        $positiveAvg = $positiveResult['average'];
        $positiveStd = $positiveResult['standard_deviation'];
        
        $negativeResult = static::getAverageAndStandardDeviation($negativeData, $attribute);
        $negativeAvg = $negativeResult['average'];
        $negativeStd = $negativeResult['standard_deviation'];

        ContinousProbability::create([
            'attribute' => $attribute,
            'average' => $positiveAvg,
            'standard_deviation' => $positiveStd,
            'diabetes' => true
        ]);

        ContinousProbability::create([
            'attribute' => $attribute,
            'average' => $negativeAvg,
            'standard_deviation' => $negativeStd,
            'diabetes' => false
        ]);


        // $prob = $this->getProbability(30, $positiveResult['average'], $positiveResult['standard_deviation'] );
        // dd($positiveResult['average'], $positiveResult['standard_deviation'], $prob);
    }


}
