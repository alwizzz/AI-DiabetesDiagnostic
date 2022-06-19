@extends('layouts.main')

@section('content')

    <h1>Diabetes Diagnostic</h1>

    @if(isset($result))
        <h5>Result: </h5>
        <div autofocus class="alert alert-info mt-3 mb-4 p-4 text-center" role="alert" style="font-size:200%">
            {{ ($result)? 'You are diagnosed with diabetes' : 'You are not diagnosed with diabetes' }}
        </div>
    @endif


    <h5 class="mb-3">Fill the form below to get diagnosed</h5>

    <div class="card rounded-3 p-4 border-2 mb-3" style="width:75%">
        
        <form action="/" method="post">
            @csrf
            <div class="form-group col-sm-5">
                <label for="glucose" class="form-label">Glucose</label>
                <div class="mb-3">
                    <input type="number" class="form-control @error('glucose') is-invalid @enderror" id="glucose" 
                    name="glucose" value="{{ old('glucose', $post['glucose']) }}" >
                </div>
                @error('glucose')
                    <div style="margin-top:-15px"></div>
                        <div class="text-danger mb-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="row">
                <div class="form-group col-md-5">
                    <label for="cholesterol" class="form-label">Cholesterol</label>
                    <div class="mb-3">
                        <input type="number" class="form-control @error('cholesterol') is-invalid @enderror" id="cholesterol" 
                        name="cholesterol" value="{{ old('cholesterol', $post['cholesterol']) }}" >
                    </div>
                    @error('cholesterol')
                        <div style="margin-top:-15px"></div>
                        <div class="text-danger mb-2">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group col-md-5">
                    <label for="hdl_chol" class="form-label">HDL Cholesterol</label>
                    <div class="mb-3">
                        <input type="number" class="form-control @error('hdl_chol') is-invalid @enderror" id="hdl_chol" 
                        name="hdl_chol" value="{{ old('hdl_chol', $post['hdl_chol']) }}" >
                    </div>
                    @error('hdl_chol')
                        <div style="margin-top:-15px"></div>
                        <div class="text-danger mb-2">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-5">
                    <label for="age" class="form-label">Age</label>
                    <div class="mb-3">
                        <input type="number" class="form-control @error('age') is-invalid @enderror" id="age" 
                        name="age" value="{{ old('age', $post['age']) }}" >
                    </div>
                    @error('age')
                        <div style="margin-top:-15px"></div>
                        <div class="text-danger mb-2">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group col-md-5">

                    <label for="gender" class="form-label">Gender</label>
                    <div class="mb-3">
                        <select class="form-select  @error('gender') is-invalid @enderror" name="gender">
                            <option @if(!old('gender')) selected @endif value="">Choose Gender</option>
                            <option @if(old('gender', $post['gender']) == "male") selected @endif value="male">Male</option>
                            <option @if(old('gender', $post['gender']) == "female") selected @endif value="female">Female</option>
                        </select>
                    </div>
                    @error('gender')
                        <div style="margin-top:-15px"></div>
                        <div class="text-danger mb-2">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
        
            
            <div class="row">
                <div class="form-group col-md-5">
                    <label for="height" class="form-label">Height (in)</label>
                    <div class="mb-3">
                        <input type="number" class="form-control @error('height') is-invalid @enderror" id="height" 
                        name="height" value="{{ old('height', $post['height']) }}" >
                    </div>
                    @error('height')
                        <div style="margin-top:-15px"></div>
                        <div class="text-danger mb-2">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group col-md-5">
                    <label for="weight" class="form-label">Weight (lb)</label>
                    <div class="mb-3">
                        <input type="number" class="form-control @error('weight') is-invalid @enderror" id="weight" 
                        name="weight" value="{{ old('weight', $post['weight']) }}" >
                    </div>
                    @error('weight')
                        <div style="margin-top:-15px"></div>
                        <div class="text-danger mb-2">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>


            <div class="row">
                <div class="form-group col-md-5">
                    <label for="systolic_bp" class="form-label">Systolic Blood Pressure</label>
                    <div class="mb-3">
                        <input type="number" class="form-control @error('systolic_bp') is-invalid @enderror" id="systolic_bp" 
                        name="systolic_bp" value="{{ old('systolic_bp', $post['systolic_bp']) }}" >
                    </div>
                    @error('systolic_bp')
                        <div style="margin-top:-15px"></div>
                        <div class="text-danger mb-2">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group col-md-5">
                    <label for="diastolic_bp" class="form-label">Diastolic Blood Pressure</label>
                    <div class="mb-3">
                        <input type="number" class="form-control @error('diastolic_bp') is-invalid @enderror" id="diastolic_bp" 
                        name="diastolic_bp" value="{{ old('diastolic_bp', $post['diastolic_bp']) }}" >
                    </div>
                    @error('diastolic_bp')
                        <div style="margin-top:-15px"></div>
                        <div class="text-danger mb-2">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>


            <div class="row">
                <div class="form-group col-md-5">
                    <label for="waist" class="form-label">Waist (in)</label>
                    <div class="mb-3">
                        <input type="number" class="form-control @error('waist') is-invalid @enderror" id="waist" 
                        name="waist" value="{{ old('waist', $post['waist']) }}" >
                    </div>
                    @error('waist')
                        <div style="margin-top:-15px"></div>
                        <div class="text-danger mb-2">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group col-md-5">
                    <label for="hip" class="form-label">Hip (in)</label>
                    <div class="mb-3">
                        <input type="number" class="form-control @error('hip') is-invalid @enderror" id="hip" 
                        name="hip" value="{{ old('hip', $post['hip']) }}" >
                    </div>
                    @error('hip')
                        <div style="margin-top:-15px"></div>
                        <div class="text-danger mb-2">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>


            <div class="row mt-3">
                <div class="col">
                    <button type="submit" name="aksi" class="btn btn-primary">
                        Diagnose
                    </button>
                </div>
            </div>
        </form>

    </div>

@endsection