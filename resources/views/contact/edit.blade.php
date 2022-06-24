@extends('layouts.app')
@section('title')
    <h3>edit Contact</h3>
@endsection
@section('content')
    <div class="contaner" style="margin-left: 50px;margin-top:20px;">
        <div class="row">
            <div class="col-md-9">
                {!! Form::open([ 'route'=>['contacts.update',$data->id],'method' => 'PUT', 'enctype' => 'multipart/form-data']) !!}
                <div class="form-group">
                    <label for="exampleInputName">Phone Number</label>
                    {!! Form::text('phone_number', $data->phone_number, ['class' => 'form-control', 'placeholder' => 'Edit Your phone Number']) !!}
                </div>
                <br><br>
                {!! Form::submit('update Contact!', ['class' => 'btn btn-primary']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
