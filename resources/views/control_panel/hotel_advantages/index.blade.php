@extends('control_panel.master')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="shadow p-3 mb-5 bg-body rounded">
                        <h3 class="text-center"> advantages Table</h3>
                        </div>
                        <a href="{{ route('hotel_advantages.create') }}" class="btn btn-gradient-primary me-2 active" role="button" aria-pressed="true">Creat New Advantage</a>
                        </p>
                        <table class="table table-striped">
                            <thead>
                            <tr class="table-success text-center" >
                                <th> id </th>
                                <th> name </th>
                                <th> color </th>
                                <th> icon </th>
                                <th> hotel's id </th>
                                <th> hotel's name </th>
                                <th> Editing </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($hotel_advantages as $advantage)
                                    <tr class="text-center">
                                        <td> {{ $advantage -> id }} </td>
                                        <td> {{ $advantage -> name }} </td>
                                        <td> {{ $advantage -> color }} </td>
                                        <td> {{ $advantage -> icon }} </td>
                                        <td> {{ $advantage -> hotel_id }} </td>
                                        <td> {{ $advantage -> advantage_hotel_name }} </td>

                                        <td>
                                            <a href="{{ route('hotel_advantages.edit',$advantage->id) }}" class="btn btn-warning"><i class="mdi mdi-grease-pencil"></i></a>

                                            <form action="{{ route('hotel_advantages.destroy',$advantage->id) }}" method="post" style="display: inline-block">
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
