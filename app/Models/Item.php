<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Filesystem\Filesystem;
use App\Models\Prediction;

class Item extends Model
{
    use HasFactory;

    public function prediction(){
        return $this->hasOne(Prediction::class);
    }

    public static $discreteAttributes = [
        'gender' => [
            'male',
            'female'
        ]
    ];

    public static $continousAttributes = [
        'cholesterol',
        'glucose',
        'hdl_chol',
        'chol_hdl_ratio',
        'age',
        'height',
        'weight',
        'bmi',
        'systolic_bp',
        'diastolic_bp',
        'waist',
        'hip',
        'waist_hip_ratio',
    ];

    public static function seed()
    {
        $fs = new Filesystem;
        $json_file = $fs->get(base_path('public\data\dataset.json'));
        $jsonArr = json_decode($json_file, true);

        foreach($jsonArr as $data){
            Item::create([
                'cholesterol' => $data['cholesterol'],
                'glucose' => $data['glucose'],
                'hdl_chol' => $data['hdl_chol'],
                'chol_hdl_ratio' => $data['chol_hdl_ratio'],
                'age' => $data['age'],
                'gender' => $data['gender'],
                'height' => $data['height'],
                'weight' => $data['weight'],
                'bmi' => $data['bmi'],
                'systolic_bp' => $data['systolic_bp'],
                'diastolic_bp' => $data['diastolic_bp'],
                'waist' => $data['waist'],
                'hip' => $data['hip'],
                'waist_hip_ratio' => $data['waist_hip_ratio'],
                'diabetes' => $data['diabetes']
            ]);
        }
    }

    public function getPropertiesAsArray()
    {
        return [
            'cholesterol' => $this->cholesterol,
            'glucose' => $this->glucose,
            'hdl_chol' => $this->hdl_chol,
            'chol_hdl_ratio' => $this->chol_hdl_ratio,
            'age' => $this->age,
            'gender' => $this->gender,
            'height' => $this->height,
            'weight' => $this->weight,
            'bmi' => $this->bmi,
            'systolic_bp' => $this->systolic_bp,
            'diastolic_bp' => $this->diastolic_bp,
            'waist' => $this->waist,
            'hip' => $this->hip,
            'waist_hip_ratio' => $this->waist_hip_ratio, 
        ];
    }

    public static function getProbabilities($input)
    {
        $positiveResult = (double) 1.0;
        $negativeResult = (double) 1.0;

        foreach(static::$discreteAttributes as $attr => $value){
            $dp = DiscreteProbability::where([
                ['attribute', "$attr" ],
                ['value', "$input[$attr]"]
            ])->get();
            
            $positiveProbability = $dp->where('diabetes', true)->first()->probability; 
            $negativeProbability = $dp->where('diabetes', false)->first()->probability; 
            $positiveResult *= $positiveProbability; 
            $negativeResult *= $negativeProbability;
        }

        foreach(Item::$continousAttributes as $attr){
            $cp = ContinousProbability::where('attribute', "$attr")->get();
            
            
            $positiveProbability = $cp->where('diabetes', true)->first()->getProbability($input[$attr]);
            $negativeProbability = $cp->where('diabetes', false)->first()->getProbability($input[$attr]);
            $positiveResult *= $positiveProbability;
            $negativeResult *= $negativeProbability;
        }

        // $positiveResult = round($positiveResult, 7);
        // $negativeResult = round($negativeResult, 7);

        $positiveResultNormalized = (double) $positiveResult / ($positiveResult + $negativeResult);
        // $positiveResultNormalized = round($positiveResultNormalized, 7);
        $negativeResultNormalized = (double) $negativeResult / ($positiveResult + $negativeResult);
        // $negativeResultNormalized = round($negativeResultNormalized, 7);

        return [
            'positive' => $positiveResultNormalized,
            'negative' => $negativeResultNormalized,
        ];
    }

}
