@extends('layouts.main')

@section('content')

    @include('partials.learning_navbuttons')
    
    <h1>Learning Prediction</h1>

    <ul class="list-group list-group-flush mb-4">
        <li class="list-group-item"><b>Correct Prediction:</b> {{ $correct_prediction }}</li>
        <li class="list-group-item"><b>False Prediction:</b> {{ $false_prediction }}</li>
        <li class="list-group-item"><b>Accuracy:</b> {{ $accuracy }}%</li>
        <li class="list-group-item"></li>
    </ul>

    <table id="dt" class="table table-stripped table-hover">
        <thead>
            <tr>
                <th scope="col">Data ID</th>
                <th scope="col">Positive Probability</th>
                <th scope="col">Negative Probability</th>
                <th scope="col">Diabetes Prediction</th>
                <th scope="col">Diabetes Real</th>
                <th scope="col">Is Accurate</th>
            </tr>
        </thead>
        <tbody>
            @foreach($predictions as $p)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ number_format($p->positive_probability, 10) }}</td>
                    <td>{{ number_format($p->negative_probability, 10) }}</td>
                    <td>{{ ($p->diabetes_prediction) ? 'Yes' : 'No' }}</td>
                    <td>{{ ($p->diabetes_real) ? 'Yes' : 'No' }}</td>
                    <td>{{ ($p->is_accurate) ? 'Yes' : 'No' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mb-5"></div>

@endsection