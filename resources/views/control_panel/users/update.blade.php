@extends('control_panel.master')
@section('content')

    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">enter user form</h4>
                <img class="rounded"  width="200px" height="200px"  style="margin-bottom: 20px" src="{{ old('user_avatar',$user->user_avatar) }}">
                <form class="forms-sample" action="{{ route('users.update' , $user->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="form-group" >
                        <label for="exampleInputUsername1">Username</label>
                        <input type="text" name="name" value="{{ old('name',$user->name) }}" class="form-control" id="exampleInputUsername" placeholder="Username">
                        @if($errors->has('name'))
                            <span style="color: red;">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="Email">Email address</label>
                        <input type="email" name="email" value="{{ old('email',$user->email) }}" class="form-control" id="Email" placeholder="Email" disabled>
                        <small class="text-danger">* you aren't able to change your email .</small>
                        @if($errors->has('email'))
                            <span style="color: red;">{{ $errors->first('email') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="Address">Address</label>
                        <input type="text" name="address"value="{{ old('address',$user->address) }}" class="form-control" id="Address" placeholder="Address">
                        @if($errors->has('address'))
                            <span style="color: red;">{{ $errors->first('address') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="user_avatar">Image</label>
                        <input type="file" name="user_avatar" class="form-control" id="user_avatar" placeholder="Image">
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
