@extends('layouts.main')

@section('content')

    @include('partials.learning_navbuttons')

    <h1>Learning Dataset</h1>

    <table id="dt" class="table table-stripped table-hover ">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Cholesterol</th>
                <th scope="col">Glucose</th>
                <th scope="col">HDL Cholesterol</th>
                <th scope="col">Cholesterol HDL Ratio </th>
                <th scope="col">Age</th>
                <th scope="col">Gender</th>
                <th scope="col">Height (in)</th>
                <th scope="col">Weight (lb)</th>
                <th scope="col">BMI</th>
                <th scope="col">Systolic Blood Pressure</th>
                <th scope="col">Diastolic Blood Pressure</th>
                <th scope="col">Waist (in)</th>
                <th scope="col">Hip (in)</th>
                <th scope="col">Waist Hip Ratio</th>
                <th scope="col">Diabetes</th>
            </tr>
        </thead>
        <tbody>
            @foreach($items as $item)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $item->cholesterol }}</td>
                    <td>{{ $item->glucose }}</td>
                    <td>{{ $item->hdl_chol }}</td>
                    <td>{{ $item->chol_hdl_ratio }}</td>
                    <td>{{ $item->age }}</td>
                    <td>{{ $item->gender }}</td>
                    <td>{{ $item->height }}</td>
                    <td>{{ $item->weight }}</td>
                    <td>{{ $item->bmi }}</td>
                    <td>{{ $item->systolic_bp }}</td>
                    <td>{{ $item->diastolic_bp }}</td>
                    <td>{{ $item->waist }}</td>
                    <td>{{ $item->hip }}</td>
                    <td>{{ $item->waist_hip_ratio }}</td>
                    <td>{{ ($item->diabetes) ? 'Yes' : 'No' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mb-5"></div>

@endsection