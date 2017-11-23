@extends('layouts.blank')

@section('main_container')
  <div class="right_col" role="main">
    <div>
      <div class="page-title">
        <div class="title_left">
          <h3>Ubicacion</h3>
        </div>
      </div>
      <div id="map" style="height: 500px; width: 100%"></div>
    </div>
  </div>
@endsection

@push('scripts')
<script>
  var LaravelEcho = new Echo({
    broadcaster: 'pusher',
    key: '7372c857786c9f75f945',
    cluster: 'us2',
    encrypted: true,
  });

  var defaultCenter = { lat: -12.046374, lng: -77.042793	};
  var vehiclePositions = {!! $positions !!};
  vehiclePositions.reverse();

  vehiclePositions = vehiclePositions.map(function(position) {
    return {
      lat: position.latitude,
      lng: position.longitude,
    }
  });
  console.log(vehiclePositions);
  var center = vehiclePositions.reduce(function(reduct, position) {
    return {
      lat: reduct.lat + position.lat,
      lng: reduct.lng + position.lng,
    };
  }, { lat: 0, lng: 0});

  if (vehiclePositions.length) {
    center = {
      lat: center.lat / vehiclePositions.length,
      lng: center.lng / vehiclePositions.length,
    };
  } else {
    center = defaultCenter;
  }

  function paintPosition(position, markers, poly, map) {
    poly.getPath().push(new google.maps.LatLng(position));
    console.log(poly.getPath().b[0].toString());

    markers.push(new google.maps.Marker({
      position: position,
      map: map,
      title: position.lat + ', ' + position.lng,
      animation: google.maps.Animation.DROP,
    }));
  }

  function initMap() {
    // Create a map object and specify the DOM element for display.
    var map = new google.maps.Map(document.getElementById('map'), {
      center: center,
      zoom: 16,
    });
    var markers = []

    var poly = new google.maps.Polyline({
      strokeColor: '#2b6196',
      strokeOpacity: 1.0,
      strokeWeight: 3
    });

    poly.setMap(map);


    vehiclePositions.forEach(function(position) {
      paintPosition(position, markers, poly, map);
    });

    LaravelEcho.channel('position.stored.{{$vehicle->id}}')
      .listen('PositionStored', function(e) {
        var position = {
          lat: e.position.latitude,
          lng: e.position.longitude,
        };
        
        paintPosition(position, markers, poly, map);
      });
  }
</script>

<script src="https://maps.googleapis.com/maps/api/js?key={{env('GOOGLE_MAPS_API_KEY')}}&callback=initMap"async defer></script>
@endpush


