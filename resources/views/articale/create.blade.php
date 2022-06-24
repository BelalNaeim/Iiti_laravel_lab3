@extends('layouts.app')
@section('title')
    <h3>Craete Post</h3>
@endsection
@section('content')
    <div class="contaner" style="margin-left: 50px;margin-top:20px;">
        <div class="row">
            <div class="col-md-9">
                {!! Form::open(['route' => 'articales.store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                <div class="form-group">
                    <label for="exampleInputName">Title</label>
                    {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Title']) !!}
                </div>


                <div class="form-group">
                    <label for="exampleInputEmail">Content</label>
                    {!! form::textarea('content', null, ['class' => 'form-control', 'placeholder' => 'Content']) !!}
                </div>
                <br>

                <div class="form-group">
                    <label for="exampleInputPassword">Image</label>
                    {!! Form::file('image') !!}
                </div>
                <br>

                {!! Form::submit('Save Post!', ['class' => 'btn btn-primary']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
