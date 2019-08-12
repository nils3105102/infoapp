@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Edit listing<a href ="{{url('/dashboard')}}" class="btn btn-secondary float-right">Go back</a></div>

            <div class="card-body">
                {{ Form::open(['action' => ['ListingsController@update', $listing->id], 'method'=> 'POST']) }}
                    {{Form::label('name', '',['class'=> ' mt-lg-2'])}}
                    {{Form::text('name', $listing->name, ['placeholder' => 'Input company name', 'class' => 'form-control'])}}
                    {{Form::label('website', '',['class'=> ' mt-lg-2'])}}
                    {{Form::text('website', $listing->website, ['placeholder' => 'Input company website', 'class' => 'form-control'])}}
                    {{Form::label('email', '', ['class'=> ' mt-lg-2'])}}
                    {{Form::text('email', $listing->email, ['placeholder' => 'Input email', 'class' => 'form-control'])}}
                    {{Form::label('phone', '', ['class'=> ' mt-lg-2'])}}
                    {{Form::text('phone', $listing->phone, ['placeholder' => 'Input phone', 'class' => 'form-control'])}}
                    {{Form::label('address', '', ['class'=> ' mt-lg-2'])}}
                    {{Form::text('address', $listing->address, ['placeholder' => 'Input address', 'class' => 'form-control'])}}
                    {{Form::label('bio', '', ['class'=> ' mt-lg-2'])}}
                    {{Form::textarea('bio', $listing->bio, ['placeholder' => 'Bio', 'class' => 'form-control'])}}
                    {{Form::hidden('_method', 'PUT')}}
                    {{Form::submit('Submit', ['class'=> 'btn btn-secondary btn-lg mt-lg-2'])}}
                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>
@endsection
