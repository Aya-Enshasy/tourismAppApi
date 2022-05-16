@extends('control_panel.master')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="shadow p-3 mb-5 bg-body rounded">
                        <h3 class="text-center">Hotels Table</h3>
                        </div>
                        <a href="{{ route('hotels.create') }}" class="btn btn-gradient-primary me-2 active" role="button" aria-pressed="true">Creat New Hotel</a>
                        </p>
                        <table class="table table-striped">
                            <thead>
                            <tr class="table-success text-center" >
                                <th> id </th>
                                <th > Image </th>
                                <th> name </th>
                                <th> star </th>
                                <th> address </th>
                                <th> details </th>
                                <th> map </th>
                                <th> rooms count </th>
                                <th> advantages count </th>
                                <th> Display hotel's </th>
                                <th> Editing </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($hotels as $hotel)
                                    <tr class="text-center">
                                        <td> {{ $hotel -> id }} </td>
                                        <td> <img src="{{ $hotel->hotel_image }}"> </td>
                                        <td> {{ $hotel -> name }} </td>
                                        <td> {{ $hotel -> star }} </td>
                                        <td> {{ $hotel -> address }} </td>
                                        <td> {{ $hotel -> details }} </td>
                                        <td> {{ $hotel -> map }} </td>
                                        <td> {{ $hotel -> rooms_count }} </td>
                                        <td> {{ $hotel -> advantages_count }} </td>
                                        <td><a href="{{ route('hotel_rooms.index') }}" class="btn btn-inverse-danger btn-fw">rooms</a>
                                            <a href="{{ route('hotel_advantages.index') }}" class="btn btn-inverse-info btn-fw">advantage</td>

                                        <td>
                                            <a href="{{ route('hotels.edit',$hotel->id) }}" class="btn btn-warning"><i class="mdi mdi-grease-pencil"></i></a>

                                            <form action="{{ route('hotels.destroy',$hotel->id) }}" method="post" style="display: inline-block">
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
