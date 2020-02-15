<!doctype html>
<html lang="en">
  <head>
    <title>Shop Listing Based on Current Location - Programming Fields </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>

</head>
  <body>
      <div class="container mt-5">
          <h3 class="text-center"> Shop Near By Location </h3>
        <div class="row mt-4">
            @foreach($shops as $shop)
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 m-auto">
                    <div class="card shadow p-3">
                        <div class="card-image border" style="height:228px;">
                            <img src="{{ url('/uploads/'.$shop->image) }}" class="img-fluid" style="height: 100%; width:100%;"/>
                        </div>
                            <h5 class="card-title float-left pt-2"> {{ $shop->shop_name }}  <small class="text-right float-right">{{round($shop->distance, 2) . " KM "}}</small></h5>
                        <p> {{ $shop->address }} </p>
                    </div>
                </div>
            @endforeach
        </div>
      </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
