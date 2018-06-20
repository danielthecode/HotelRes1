
<section class="jumbotron text-center">
        <div class="container">
          <h1 class="jumbotron-heading">About</h1>
          <p class="lead text-muted">This project is for a hotel reservation system which allows user to book and manage their reservations easily</p>
          
        </div>
      </section>

  <div class="container">
          <div id="map">
          <script>
      function initMap() {
        var uluru = {lat: 50.375933,  lng: -4.139578};
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 15,
          center: uluru
        });
        var marker = new google.maps.Marker({
          position: uluru,
          map: map
        });
      }
    </script>
          </div>
        </div>

        <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCes4-F6qqespb608WQhKBzMaHqI9ZvuTQ&callback=initMap">
    </script>
