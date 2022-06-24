@extends('layouts.app')
@section('title')
    <h3>edit Post</h3>
@endsection
@section('content')
    <div class="contaner" style="margin-left: 50px;margin-top:20px;">
        <div class="row">
            <div class="col-md-9">
                {!! Form::open([ 'route'=>['articales.update',$data->id],'method' => 'PUT', 'enctype' => 'multipart/form-data']) !!}
                <div class="form-group">
                    <label for="exampleInputName">Title</label>
                    {!! Form::text('title', $data->title, ['class' => 'form-control', 'placeholder' => 'Title',]) !!}
                </div>


                <div class="form-group">
                    <label for="exampleInputEmail">Content</label>
                    {!! form::textarea('content',$data->content, ['class' => 'form-control', 'placeholder' => 'Content',]) !!}
                </div>
                <br>

                <div class="form-group">
                    <label for="exampleInputPassword">Image</label>
                    {!! Form::file('image') !!}

                </div>
                <br><br>
                <div class="form-group">
                <p> <img src="{{url($data->image)}}" alt=""  height="80px" width="80px">  </p>
                </div>
                <br>

                {!! Form::submit('update Post!', ['class' => 'btn btn-primary']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
