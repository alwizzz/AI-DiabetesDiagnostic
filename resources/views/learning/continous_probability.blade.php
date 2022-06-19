@extends('layouts.main')

@section('content')

    @include('partials.learning_navbuttons')

    <h1>Continous Probability</h1>

    <table id="dt" class="table table-stripped table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Attribute</th>
                <th scope="col">Average</th>
                <th scope="col">Standard Deviation</th>
                <th scope="col">Diabetes</th>
            </tr>
        </thead>
        <tbody>
            @foreach($continous_probabilities as $cp)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $cp->attribute }}</td>
                    <td>{{ $cp->average }}</td>
                    <td>{{ $cp->standard_deviation }}</td>
                    <td>{{ ($cp->diabetes) ? 'Yes' : 'No' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mb-5"></div>

@endsection