@extends('layouts.app')
@section('title')
    <h3> Contact</h3>
@endsection
@section('content')
    <!-- container -->
    <div class="container">


        <div class="page-header">
            <h1> Contacts </h1>






            <table class='table table-hover table-responsive table-bordered'>
                <!-- creating our table heading -->
                <tr>
                    <th>ID</th>
                    <th>Phone_Number</th>
                    <th>Content of User</th>


                    <th>action</th>


                </tr>


                @foreach ($contact as $key => $value)
                    <tr>
                        <td>{{ $value->id }}</td>
                        <td>{{ $value->phone_number }}</td>

                        <td>{{ $value->name }}</td>

                        <td>
                            <a href='' data-toggle="modal" data-target="#modal_single_del{{ $key }}"
                               class='btn btn-danger m-r-1em'>Remove </a>
                            <a href='{{ url('/contacts/' . $value->id . '/edit') }}'
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
                                    <form action="{{ url('/contacts/' . $value->id) }}" method="post">
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
