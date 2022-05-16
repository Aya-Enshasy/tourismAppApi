@extends('control_panel.master')
@section('content')

<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">enter hotel advantage form</h4>
            <form class="forms-sample" action="{{ route('hotel_advantages.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group" >
                    <label for="Name">Name</label>
                    <input type="text" name="name" value="{{old('name')}}" class="form-control" id="Name" placeholder="Name">
                    <small class="text-danger">* name must be unique</small>
                    @if($errors->has('name'))
                        <span style="color: red;">{{ $errors->first('name') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="Color">color</label>
                    <input type="text" name="color" value="{{old('color')}}" class="form-control" id="group" placeholder="color">
                    <small class="text-danger">* color must be unique</small>
                @if($errors->has('color'))
                        <span style="color: red;">{{ $errors->first('color') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="Icon">icon</label>
                    <input type="text" name="icon" value="{{old('icon')}}" class="form-control" id="Icon" placeholder="icon">
                    <small class="text-danger">* icon must be unique</small>
                    @if($errors->has('icon'))
                        <span style="color: red;">{{ $errors->first('icon') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="HotelId">Hotel Id</label>
                    <input type="number" name="hotel_id" value="{{old('hotel_id')}}" class="form-control" id="HotelId" placeholder="hotel id">
                    @if($errors->has('hotel_id'))
                        <span style="color: red;">{{ $errors->first('hotel_id') }}</span>
                    @endif
                </div>
                <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
            </form>
        </div>
    </div>
</div>

@endsection
