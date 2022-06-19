<?php

use Illuminate\Support\Facades\Route;
use App\Models\Item;
use App\Models\ContinousProbability;
use App\Http\Controllers\ItemController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [ItemController::class, 'index']);
Route::post('/', [ItemController::class, 'diagnose']);

Route::get('/learning', [ItemController::class, 'learning']);
Route::get('/learning/discrete_probability', [ItemController::class, 'discrete_probability']);
Route::get('/learning/continous_probability', [ItemController::class, 'continous_probability']);
Route::get('/learning/prediction', [ItemController::class, 'prediction']);
Route::get('/about', [ItemController::class, 'about']);






// Route::get('/', function () {
    // $data = Patient::select('gender','diabetes')->where([
    //     ['gender', 'male']
    //     // ['diabetes', true]
    // ])->get();

    // $dataCount = $data->count();
    // $diabetesCount = $data->where('diabetes', true)->count();
    // $nonDiabetesCount = $data->where('diabetes', false)->count();
    // dd($diabetesCount/$dataCount, $nonDiabetesCount/$dataCount, $dataCount);

    // $attribute = 'gender';
    // $value = 'male';
    // $data = Patient::select($attribute, 'diabetes')->where([
    //     [$attribute, $value]
    // ])->get();

    // $dataCount = $data->count();
    // $positiveCount = $data->where('diabetes', true)->count();
    // $negativeCount = $data->where('diabetes', false)->count();

    // $positiveProbability = $positiveCount / $dataCount; 
    // $negativeProbability = $negativeCount / $dataCount;
    // // dd($dataCount, $positiveCount, $negativeCount); 
    // dd($positiveProbability, $negativeProbability);

    // $data = Patient::select('age', 'diabetes')->get();

    // $positiveData = $data->where('diabetes', true);
    // $negativeData = $data->where('diabetes', false);

    // // $positiveAvg = $positiveData->avg('age');
    // // $negativeAvg = $negativeData->avg('age');

    // // dd($positiveAvg, $positiveData->count(), $negativeAvg, $negativeData->count());

    // $positiveResult = ContinousProbability::getAverageAndStandardDeviation($positiveData, 'age');
    // $prob = ContinousProbability::getProbability(30, $positiveResult['average'], $positiveResult['standard_deviation'] );
    // dd($positiveResult['average'], $positiveResult['standard_deviation'], $prob);



    // $positive = ContinousProbability::where([
    //     ['attribute', 'cholesterol'], 
    //     ['diabetes', true]
    // ])->get()->first();
    // // dd($positive->average);
    // $negative = ContinousProbability::where([
    //     ['attribute', 'cholesterol'], 
    //     ['diabetes', false]
    // ])->get()->first();

    // $posProb = ContinousProbability::getProbability(300, $positive->average, $positive->standard_deviation);
    // $negProb = ContinousProbability::getProbability(300, $negative->average, $negative->standard_deviation);
    // // dd($posProb, $negProb);
    // dd($positive);




    // $input = [
    //     'cholesterol' => 200,
    //     'glucose' => 90,
    //     'hdl_chol' => 50,
    //     'chol_hdl_ratio' => 4.0,
    //     'age' => 22,
    //     'gender' => "male",
    //     'height' => 60,
    //     'weight' => 130,
    //     'bmi' => 25.4,
    //     'systolic_bp' => 120,
    //     'diastolic_bp' => 70,
    //     'waist' => 30,
    //     'hip' => 40,
    //     'waist_hip_ratio' => 0.75,
    // ]; 
//     // $prediction = Patient::getPrediction($input);
//     // dd( ($prediction['pos'] > $prediction['neg'] ? 'diabetes lur' : 'aman gan sehat') );
// });
