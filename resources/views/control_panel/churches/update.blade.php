@extends('control_panel.master')
@section('content')

    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">enter hotel form</h4>
                <img class="rounded"  width="200px" height="200px"  style="margin-bottom: 20px" src="{{ old('church_image',$church->church_image ) }}">
                <form class="forms-sample" action="{{ route('churches.update' , $church->id) }}" method="post"  enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="form-group" >
                        <label for="Name">Name</label>
                        <input type="text" name="name" value="{{ old('name',$church->name) }}" class="form-control" id="Name" placeholder="Name">
                        @if($errors->has('name'))
                            <span style="color: red;">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="Address">Address</label>
                        <input type="text" name="address" name="address" value="{{ old('address',$church->address) }}" class="form-control" id="Address" placeholder="Address">
                        @if($errors->has('address'))
                            <span style="color: red;">{{ $errors->first('address') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="Details">Details</label>
                        <textarea type="text" name="details" class="form-control" rows="5" id="Map" placeholder="Map">{{ old('details',$church->details) }}</textarea>
                        @if($errors->has('details'))
                            <span style="color: red;">{{ $errors->first('details') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="AvailableTime">Available Time</label>
                        <input type="text" name="available_time" value="{{ old('available_time',$church->available_time) }}" class="form-control" id="AvailableTime" placeholder="Available Time">
                        @if($errors->has('available_time'))
                            <span style="color: red;">{{ $errors->first('available_time') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="AvailableDay">Available Day</label>
                        <input type="text" name="available_day" value="{{ old('available_day',$church->available_day) }}" class="form-control" id="AvailableDay" placeholder="Available Day">
                        @if($errors->has('available_day'))
                            <span style="color: red;">{{ $errors->first('available_day') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="visitorsCount">visitors Count</label>
                        <input type="text" name="visitors_count" value="{{ old('visitors_count',$church->visitors_count) }}" class="form-control" id="visitorsCount" placeholder="visitors Count">
                        @if($errors->has('visitors_count'))
                            <span style="color: red;">{{ $errors->first('visitors_count') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="AreaSpace">Area Space</label>
                        <input type="text" name="area_space" value="{{ old('area_space',$church->area_space) }}" class="form-control" id="AreaSpace" placeholder=" Area Space">
                        @if($errors->has('area_space'))
                            <span style="color: red;">{{ $errors->first('area_space') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="PhoneNumber">Phone Number</label>
                        <input type="text" name="phone_number" value="{{ old('phone_number',$church->phone_number) }}" class="form-control" id="PhoneNumber" placeholder="Phone Number">
                        @if($errors->has('phone_number'))
                            <span style="color: red;">{{ $errors->first('phone_number') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="Map">Map (long - lat)</label>
                        <input type="text" name="map" value="{{ old('map',$church->map) }}" class="form-control" id="Map" placeholder="Map">
                        @if($errors->has('map'))
                            <span style="color: red;">{{ $errors->first('map') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="file">Image</label>
                        <input type="file" name="file" class="form-control" name="file" id="file" placeholder="Image">
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
