@extends('control_panel.master')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="shadow p-3 mb-5 bg-body rounded">
                            <h3 class="text-center">Users Table</h3>
                        </div>
                        <a href="{{ route('users.create') }}" class="btn btn-gradient-primary me-2 active" role="button" aria-pressed="true">Creat New User</a>
                         </p>
                        <table class="table table-striped">
                            <thead>
                            <tr class="table-success text-center">
                                <th> Image </th>
                                <th> id </th>
                                <th> name </th>
                                <th> email </th>
                                <th> address </th>
                                <th> editing </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                    <tr class="text-center">
                                        <td> <img src="{{ $user->user_avatar }}"> </td>
                                        <td> {{ $user -> id }} </td>
                                        <td> {{ $user -> name }} </td>
                                        <td> {{ $user -> email }} </td>
                                        <td> {{ $user -> address }} </td>
                                        <td>
                                            <a href="{{ route('users.edit',$user->id) }}" class="btn btn-warning"><i class="mdi mdi-grease-pencil"></i></a>

                                            <form action="{{ route('users.destroy',$user->id) }}" method="post" style="display: inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class=" btn btn-danger"><i class="mdi mdi-delete-forever"></i></button>
                                            </form>
                                        </td>
                                    </>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
            <div class="container-fluid d-flex justify-content-between">
                <span class="text-muted d-block text-center text-sm-start d-sm-inline-block">Copyright © bootstrapdash.com 2021</span>
                <span class="float-none float-sm-end mt-1 mt-sm-0 text-end"> Free <a href="https://www.bootstrapdash.com/bootstrap-admin-template/" target="_blank">Bootstrap admin template</a> from Bootstrapdash.com</span>
            </div>
        </footer>
        <!-- partial -->
    </div>
@endsection
