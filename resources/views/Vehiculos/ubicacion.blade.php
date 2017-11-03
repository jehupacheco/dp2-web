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
  function initMap() {
    // Create a map object and specify the DOM element for display.
    var map = new google.maps.Map(document.getElementById('map'), {
      center: {
        lat: -12.046374,
        lng: -77.042793
      },
      zoom: 8
    });
  }
</script>

<script src="https://maps.googleapis.com/maps/api/js?key={{env('GOOGLE_MAPS_API_KEY')}}&callback=initMap"async defer></script>
@endpush


