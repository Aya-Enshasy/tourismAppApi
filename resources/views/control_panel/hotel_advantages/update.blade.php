@extends('control_panel.master')
@section('content')

    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">enter hotel advantage form</h4>
                <form class="forms-sample" action="{{ route('hotel_advantages.update' , $hotel_advantage->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="form-group" >
                        <label for="Name">Name</label>
                        <input type="text" name="name" value="{{ old('name',$hotel_advantage->name) }}" class="form-control" id="Name" placeholder="Name">
{{--                        @if($errors->has('name'))--}}
{{--                            <span style="color: red;">{{ $errors->first('name') }}</span>--}}
{{--                        @endif--}}
                    </div>
                    <div class="form-group">
                        <label for="Color">Color</label>
                        <input type="text" name="color" value="{{ old('color',$hotel_advantage->color) }}" class="form-control" id="Color" placeholder="Color">
{{--                        @if($errors->has('color'))--}}
{{--                            <span style="color: red;">{{ $errors->first('color') }}</span>--}}
{{--                        @endif--}}
                    </div>
                    <div class="form-group">
                        <label for="Icon">Icon</label>
                        <input type="text" name="icon" value="{{ old('Icon',$hotel_advantage->icon) }}" class="form-control" id="Icon" placeholder="Icon">
{{--                        @if($errors->has('icon'))--}}
{{--                            <span style="color: red;">{{ $errors->first('icon') }}</span>--}}
{{--                        @endif--}}
                    </div>
                    <div class="form-group">
                        <label for="HotelId">Hotel Id</label>
                        <input type="number" name="hotel_id" value="{{ old('hotel_id',$hotel_advantage->hotel_id) }}" class="form-control" id="HotelId" placeholder="hotel id">
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
