@extends('layouts.app')
@section('title')
    <h3> Post</h3>
@endsection
@section('content')
    <!-- container -->
    <div class="container">


        <div class="page-header">
            <h1> POSTS </h1>






            <table class='table table-hover table-responsive table-bordered'>
                <!-- creating our table heading -->
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Content</th>
                    <th>Image</th>
                    <th>AddedBy</th>
                    <th>Publish_Date</th>

                    <th>action</th>


                </tr>


                @foreach ($articles as $key => $value)
                    <tr>
                        <td>{{ $value->id }}</td>
                        <td>{{ $value->title }}</td>
                        <td>{{ substr($value->content, 0, 20) }}</td>
                        <td> <img src="{{ asset($value->image) }}" alt="" height="50px" width="50px">
                        </td>

                        <td>{{ $value->name }}</td>
                        <td>{{ $value->pu_date }}</td>

                        <td>
                            <a href='' data-toggle="modal" data-target="#modal_single_del{{ $key }}"
                                class='btn btn-danger m-r-1em'>Remove </a>
                            <a href='{{ url('/articales/' . $value->id . '/edit') }}'
                                class='btn btn-primary m-r-1em'>Edit</a>

                        </td>


                    </tr>






                    <div class="modal" id="modal_single_del{{ $key }}" tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">delete confirmation</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                <div class="modal-body">
                                    Remove {{ $value->title }} !!!!
                                </div>
                                <div class="modal-footer">
                                    <form action="{{ url('/articales/' . $value->id) }}" method="post">
                                        @csrf
                                        @method('delete')

                                        <div class="not-empty-record">
                                            <button type="submit" class="btn btn-primary">Delete</button>
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">close</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

                <!-- end table -->
            </table>

        </div>
        <!-- end .container -->


        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

        <!-- Latest compiled and minified Bootstrap JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        <!-- confirm delete record will be here -->
    @endsection
