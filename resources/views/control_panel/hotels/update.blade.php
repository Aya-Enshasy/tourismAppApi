@extends('control_panel.master')
@section('content')

    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">edit hotel form</h4>
                 <img class="rounded"  width="200px" height="200px"  style="margin-bottom: 20px" src="{{ old('hotel_image',$hotel->hotel_image ) }}">
                <form class="forms-sample" action="{{ route('hotels.update' , $hotel->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="form-group" >
                        <label for="Name">Name</label>
                        <input type="text" name="name" value="{{ old('name',$hotel->name) }}" class="form-control" id="Name" placeholder="Name">
                        @if($errors->has('name'))
                            <span style="color: red;">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="Star">Star</label>
                        <input type="text" name="star" value="{{ old('star',$hotel->star) }}" class="form-control" id="Star" placeholder="Star">
                        @if($errors->has('star'))
                            <span style="color: red;">{{ $errors->first('star') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="Address">Address</label>
                        <input type="text" name="address" value="{{ old('address',$hotel->address) }}" class="form-control" id="Address" placeholder="Address">
                        @if($errors->has('address'))
                            <span style="color: red;">{{ $errors->first('address') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="Details">Details</label>
                        <textarea type="text" name="details" class="form-control" rows="5" id="Map" placeholder="Map">{{ old('details',$hotel->details) }}</textarea>
                        @if($errors->has('details'))
                            <span style="color: red;">{{ $errors->first('details') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="Map">Map (long - lat)</label>
                        <input type="text" name="map" value="{{ old('map',$hotel->map) }}" class="form-control" id="Map" placeholder="Map">
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
