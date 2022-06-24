@extends('layouts.app')
@section('title')
    <h3>Craete Contact</h3>
@endsection
@section('content')
    <div class="contaner" style="margin-left: 50px;margin-top:20px;">
        <div class="row">
            <div class="col-md-3">
                {!! Form::open(['route' => 'contacts.store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                <div class="form-group">
                    <label for="exampleInputName">Phone Number</label>
                    {!! Form::text('phone_number', null, ['class' => 'form-control', 'placeholder' => 'Enter Your phone Number']) !!}
                </div>
                <br><br>
                {!! Form::submit('Save Contact!', ['class' => 'btn btn-primary']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
