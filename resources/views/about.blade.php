@extends('layouts.main')

@section('content')
    <h1>{{ $title }}</h1>
    <p class="mt-3 text-justify" style="font-size: 120%">
            Diabetes Diagnostic is a web application which able to diagnose diabetes from a given data.
        The diagnose result has <a href="/learning/prediction">accuracy</a> of {{ $accuracy }}.
        The diagnose process is based on a model created from AI Learning using Naive Bayes Algorithm.
        The used training dataset is taken from <a href="https://www.kaggle.com/datasets/houcembenmansour/predict-diabetes-based-on-diagnostic-measures">Keggle</a>.
    </p>

    <h6>~ This project is created for 'Artifical Intelligent' project ~</h6>

@endsection