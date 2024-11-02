@extends('layout.app')

@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>User List <small>Some examples to get you started</small></h3>
                </div>

                <div class="title_right">
                    <form class="col-md-5 col-sm-5   form-group pull-right top_search" action="{{ route('user.index') }}">
                        <div class="input-group">
                            <input type="text" class="form-control" name="search" placeholder="Search for..."
                                value="{{ $search }}">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="submit">Go!</button>
                            </span>
                        </div>
                    </form>
                </div>
            </div>
            <div class="clearfix"></div>

            <div class="row" style="display: block;">
                <div class="col-md-12 col-sm-12  ">
                    <div class="x_panel">
                        @include('messages')
                        <div class="x_content">

                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>UserName</th>
                                        <th>Email</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <th>{{ $user->id }}</th>
                                            <td>{{ $user->username }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>
                                                {{-- <a href="#" class="btn btn-default">Edit</a> --}}
                                                <a href="{{ route('user.delete', $user->id) }}"
                                                    class="btn btn-default">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {!! $users->appends(['search' => $search])->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /page content -->
@endsection
