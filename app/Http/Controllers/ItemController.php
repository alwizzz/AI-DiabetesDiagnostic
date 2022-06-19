<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\DiscreteProbability;
use App\Models\ContinousProbability;
use App\Models\Prediction;

class ItemController extends Controller
{
    public function index()
    {
        return view('index', [
            'title' => 'Diagnostic',
            'post' => [
                'cholesterol' => null,
                'glucose' => null,
                'hdl_chol' => null,
                'age' => null,
                'gender' => null,
                'height' => null,
                'weight' => null,
                'systolic_bp' => null,
                'diastolic_bp' => null,
                'waist' => null,
                'hip' => null,
            ]
        ]);
    }

    public function diagnose(Request $request)
    {
        $rules = [
            'cholesterol' => 'required',
            'glucose' => 'required',
            'hdl_chol' => 'required',
            'age' => 'required',
            'gender' => 'required',
            'height' => 'required',
            'weight' => 'required',
            'systolic_bp' => 'required',
            'diastolic_bp' => 'required',
            'waist' => 'required',
            'hip' => 'required',
        ];

        $validatedData = $request->validate($rules);

        $validatedData['chol_hdl_ratio'] = $validatedData['cholesterol'] / $validatedData['hdl_chol'];
        $validatedData['bmi'] = $validatedData['weight'] / pow($validatedData['height'], 2);
        $validatedData['waist_hip_ratio'] = $validatedData['waist'] / $validatedData['hip'];
        
        $resultProbabilities = Item::getProbabilities($validatedData);
        
        $result = ($resultProbabilities['positive'] >= $resultProbabilities['negative']) ? true : false;

        return view('index', [
            'title' => 'Diagnostic',
            'result' => $result,
            'post' => $validatedData
        ]);
    }
    
    public function about()
    {
        return view('about', [
            'title' => 'About',
            'accuracy' => Prediction::getAccuracy()
        ]);
    }

    public function learning()
    {
        return view('learning.index', [
            'title' => 'Learning',
            'items' => Item::all()
        ]);
    }
    
    public function discrete_probability()
    {
        return view('learning.discrete_probability', [
            'title' => 'Discrete Probability',
            'discrete_probabilities' => DiscreteProbability::all()
        ]);
    }
    
    public function continous_probability()
    {
        return view('learning.continous_probability', [
            'title' => 'Continous Probability',
            'continous_probabilities' => ContinousProbability::all()
        ]);
    }
    
    public function prediction()
    {
        $all = Prediction::all();
        $correct_prediction = $all->where('is_accurate', true)->count();
        // dd(Prediction::where('is_accurate', true)->get() );
        // dd($all);
        $false_prediction = $all->where('is_accurate', false)->count();
        $accuracy = round( 100*($correct_prediction / ($correct_prediction + $false_prediction)), 2);

        return view('learning.prediction', [
            'title' => 'Prediction',
            'predictions' => $all,
            'correct_prediction' => $correct_prediction,
            'false_prediction' => $false_prediction,
            'accuracy' => $accuracy,
        ]);
    }




}
