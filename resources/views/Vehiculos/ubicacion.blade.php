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
  var vehiclePositions = {!! $positions !!};
  var center = vehiclePositions.reduce(function(reduct, position) {
    return {
      lat: reduct.lat + position.latitude,
      lng: reduct.lng + position.longitude,
    };
  }, { lat: 0, lng: 0});

  center = {
    lat: center.lat / vehiclePositions.length,
    lng: center.lng / vehiclePositions.length,
  };

  console.log(center);

  function initMap() {
    // Create a map object and specify the DOM element for display.
    var map = new google.maps.Map(document.getElementById('map'), {
      center: center,
      zoom: 8
    });
  }
</script>

<script src="https://maps.googleapis.com/maps/api/js?key={{env('GOOGLE_MAPS_API_KEY')}}&callback=initMap"async defer></script>
@endpush


