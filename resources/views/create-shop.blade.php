<!doctype html>
<html lang="en">
  <head>
    <title>Find Near By Location : Example Programming Fields</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>

    <div class="container mt-5">
        <form action="{{ url('store-shop') }}" method="post" enctype="multipart/form-data ">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-xl-6 m-auto">
                    <div class="card shadow">
                        <div class="card-header bg-primary">
                            <h5 class="card-title text-white mt-2"> Create Shop With Latitude and Longitude </h5>
                        </div>
                        <div class="card-body">

                            {{-- print success message --}}
                            @if(Session::has('success'))
                                <div class="alert alert-success">
                                    {{ Session::get('success') }}
                                    @php
                                        Session::forget('success');
                                    @endphp
                                </div>
                            @endif

                            <div class="form-group">
                                <label for="shop_name"> Shop Name <span class="text-danger"> * </span>  </label>
                                <input type="text" name="shop_name" class="form-control" id="shop_name" placeholder="Shop Name" value="{{ old('shop_name') }}">
                                {!! $errors->first('shop_name', '<small class="text-danger">:message </small>') !!}
                            </div>

                            <div class="form-group">
                                <label for="description"> Description  </label>
                                <input type="text" name="description" class="form-control" id="description" placeholder="Description" value="{{ old('description') }}">
                            </div>

                            <div class="form-group">
                                <label for="description"> Location  </label>
                                <input type="text" name="location" class="form-control" id="location" placeholder="Select Location" value="{{ old('location') }}">
                                <input type="hidden" name="latitude" class="form-control" id="latitude" value="{{ old('latitude') }}">
                                <input type="hidden" name="longitude" class="form-control" id="longitude" value={{ old('longitude') }}>
                                {!! $errors->first('location', '<small class="text-danger">:message </small>') !!}
                            </div>

                            <div class="form-group">
                                <label for="file"> Image </label>
                                <input type="file" name="filename" id="filename" class="form-control">
                                {!! $errors->first('file', '<small class="text-danger">:message </small>') !!}
                            </div>
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-success"> Save </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>


    {{-- javascript code --}}
   <script src="https://maps.google.com/maps/api/js?key=YOUR_KEY&libraries=places&callback=initAutocomplete" type="text/javascript"></script>

   <script>
       $(document).ready(function() {
            $("#lat_area").addClass("d-none");
            $("#long_area").addClass("d-none");
       });
   </script>


   <script>
       google.maps.event.addDomListener(window, 'load', initialize);

       function initialize() {
           var options = {
             componentRestrictions: {country: "IN"}
           };

           var input = document.getElementById('location');
           var autocomplete = new google.maps.places.Autocomplete(input, options);
           autocomplete.addListener('place_changed', function() {
               var place = autocomplete.getPlace();
               $('#latitude').val(place.geometry['location'].lat());
               $('#longitude').val(place.geometry['location'].lng());

            // --------- show lat and long ---------------
               $("#lat_area").removeClass("d-none");
               $("#long_area").removeClass("d-none");
           });
       }
    </script>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
