
  /*===========================================================
   * Creating Map
  ===========================================================*/
  function prepare_map() {
  var map_container = document.getElementById('map');

  if (map_container == null) { return; }
  var ajax_url  = $('#wp-ajax-submit').val();

  jQuery.ajax({
    url: ajax_url,
    type: 'post',
    data: {
      action: 'get_map_data'
    },
    error: function (response){
      console.log(response);
    },
    success: function (response){
      var data = JSON.parse(response);
      initMap(data);
    }
  });

  }


  function initMap(data) {
    var location = {lat: data.center.lat, lng: data.center.lan};
    var container = document.getElementById('map');
    var marker_label = data.title;


    var map = new google.maps.Map(container, {
      zoom: data.zoom,
      center: location
    });

    var marker = new google.maps.Marker({
      position: map.getCenter(),
      map: map,
      icon: {
        url: data.icon,
        labelOrigin: new google.maps.Point(23, 56),
        size: new google.maps.Size(46, 46),
        scaledSize: new google.maps.Size(46, 46),
      },
      label: {
        text: marker_label,
        color: "#EE3A19",
        fontWeight: "bold",
        fontSize: "18px"
      }
    });
  }

