@extends('control_panel.master')
@section('content')

<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">enter new user</h4>
            <form class="forms-sample" action="{{ route('users.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group" >
                    <label for="exampleInputUsername1">Username</label>
                    <input type="text" name="name" value="{{old('name')}}" class="form-control" id="exampleInputUsername1" placeholder="Username">
                    @if($errors->has('name'))
                        <span style="color: red;">{{ $errors->first('name') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" name="email" value="{{old('email')}}" class="form-control" id="exampleInputEmail1" placeholder="Email">
                    <small class="text-danger">* you will never be able to change your email later , please enter carefully .</small>
                    @if($errors->has('email'))
                        <span style="color: red;">{{ $errors->first('email') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="Address">Address</label>
                    <input type="text" name="address" value="{{old('address')}}" class="form-control" id="Address" placeholder="Address">
                    @if($errors->has('address'))
                        <span style="color: red;">{{ $errors->first('address') }}</span>
                    @endif
                </div>
                    <div class="form-group">
                        <label for="File">Image</label>
                        <input type="file" name="file" class="form-control" id="File" placeholder="Image">
                        @if($errors->has('file'))
                            <span style="color: red;">{{ $errors->first('file') }}</span>
                        @endif
                    </div>
                <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
            </form>
        </div>
    </div>
</div>

@endsection
