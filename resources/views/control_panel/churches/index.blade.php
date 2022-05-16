@extends('control_panel.master')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="shadow p-3 mb-5 bg-body rounded">
                        <h3 class="text-center">churches Table</h3>
                        </div>
                        <a href="{{ route('churches.create') }}" class="btn btn-gradient-primary me-2 active" role="button" aria-pressed="true">Creat New Church</a>
                        </p>
                        <table class="table table-striped">
                            <thead>
                            <tr class="table-success text-center" >
                                <th> id </th>
                                <th > Image </th>
                                <th> name </th>
                                <th> address </th>
                                <th> details </th>
                                <th> available time </th>
                                <th> available day </th>
                                <th> visitors count </th>
                                <th> area space </th>
                                <th> phone number </th>
                                <th> map </th>
                                <th> Editing </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($churches as $church)
                                    <tr class="text-center">
                                        <td> {{ $church -> id }} </td>
                                        <td> <img src="{{ $church->church_image }}"> </td>
                                        <td> {{ $church -> name }} </td>
                                        <td> {{ $church -> address }} </td>
                                        <td> {{ $church -> details }} </td>
                                        <td> {{ $church -> available_time }} </td>
                                        <td> {{ $church -> available_day }} </td>
                                        <td> {{ $church -> visitors_count }} </td>
                                        <td> {{ $church -> area_space }} </td>
                                        <td> {{ $church -> phone_number }} </td>
                                        <td> {{ $church -> map }} </td>
                                        <td>
                                            <a href="{{ route('churches.edit',$church->id) }}" class="btn btn-warning"><i class="mdi mdi-grease-pencil"></i></a>

                                            <form action="{{ route('churches.destroy',$church->id) }}" method="post" style="display: inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class=" btn btn-danger"><i class="mdi mdi-delete-forever"></i></button>
                                            </form>
                                        </td>
                                    </tr>
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
