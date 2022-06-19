@extends('layouts.main')

@section('content')

    @include('partials.learning_navbuttons')
    
    <h1>Discrete Probability</h1>

    <table id="dt" class="table table-stripped table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Attribute</th>
                <th scope="col">Value</th>
                <th scope="col">Diabetes</th>
                <th scope="col">Probability</th>
            </tr>
        </thead>
        <tbody>
            @foreach($discrete_probabilities as $dp)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $dp->attribute }}</td>
                    <td>{{ $dp->value }}</td>
                    <td>{{ ($dp->diabetes) ? 'Yes' : 'No' }}</td>
                    <td>{{ $dp->probability }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mb-5"></div>

@endsection