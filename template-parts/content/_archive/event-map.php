<?php $args = array(
    'posts_per_page'   => -1,
    'post_type'    => 'events',
    'meta_query' => array(
      array(
        'key' => 'lat',
        'value' => '',
        'compare' => '!='
      )
    )
  );
  $posts_array = get_posts( $args );
  ?>
  
    <script type="text/javascript">

      //svg and styles used by both maps
      var mapStyle = [
        {
          "featureType": "all",
          "elementType": "labels.text.fill",
          "stylers": [
            {
              "saturation": 36
            },
            {
              "color": "#333333"
            },
            {
              "lightness": 40
            }
          ]
        },
        {
          "featureType": "all",
          "elementType": "labels.text.stroke",
          "stylers": [
            {
              "visibility": "on"
            },
            {
              "color": "#ffffff"
            },
            {
              "lightness": 16
            }
          ]
        },
        {
          "featureType": "all",
          "elementType": "labels.icon",
          "stylers": [
            {
              "visibility": "off"
            }
          ]
        },
        {
          "featureType": "administrative",
          "elementType": "geometry.fill",
          "stylers": [
            {
              "color": "#fefefe"
            },
            {
              "lightness": 20
            }
          ]
        },
        {
          "featureType": "administrative",
          "elementType": "geometry.stroke",
          "stylers": [
            {
              "color": "#fefefe"
            },
            {
              "lightness": 17
            },
            {
              "weight": 1.2
            }
          ]
        },
        {
          "featureType": "landscape",
          "elementType": "geometry",
          "stylers": [
            {
              "color": "#f5f5f5"
            },
            {
              "lightness": 20
            }
          ]
        },
        {
          "featureType": "poi",
          "elementType": "geometry",
          "stylers": [
            {
              "color": "#f5f5f5"
            },
            {
              "lightness": 21
            }
          ]
        },
        {
          "featureType": "poi.park",
          "elementType": "geometry",
          "stylers": [
            {
              "color": "#dedede"
            },
            {
              "lightness": 21
            }
          ]
        },
        {
          "featureType": "road.highway",
          "elementType": "geometry.fill",
          "stylers": [
            {
              "color": "#ffffff"
            },
            {
              "lightness": 17
            }
          ]
        },
        {
          "featureType": "road.highway",
          "elementType": "geometry.stroke",
          "stylers": [
            {
              "color": "#ffffff"
            },
            {
              "lightness": 29
            },
            {
              "weight": 0.2
            }
          ]
        },
        {
          "featureType": "road.arterial",
          "elementType": "geometry",
          "stylers": [
            {
              "color": "#ffffff"
            },
            {
              "lightness": 18
            }
          ]
        },
        {
          "featureType": "road.local",
          "elementType": "geometry",
          "stylers": [
            {
              "color": "#ffffff"
            },
            {
              "lightness": 16
            }
          ]
        },
        {
          "featureType": "transit",
          "elementType": "geometry",
          "stylers": [
            {
              "color": "#f2f2f2"
            },
            {
              "lightness": 19
            }
          ]
        },
        {
          "featureType": "water",
          "elementType": "geometry",
          "stylers": [
            {
              "color": "#e9e9e9"
            },
            {
              "lightness": 17
            }
          ]
        }
      ]
      var svg = encodeURIComponent('<svg xmlns="http://www.w3.org/2000/svg" viewBox="905.825 6388.194 78.35 107.075" width="60px" height="60px"><defs><style>.a{fill:#70657a;}.b{fill:#fff;}</style></defs><path class="a" d="M25.7,75.969A39.177,39.177,0,1,1,56,74.563L39.869,107.075Z" transform="translate(905.825 6388.194)"/><g transform="translate(917.803 6400.654)"><path class="b" d="M50.763,34.334A23.492,23.492,0,0,1,35.276,50.573a18.776,18.776,0,0,1-10.876.351,17.108,17.108,0,0,1-7.769-4.461,20.371,20.371,0,0,1-5.012-7.919,19.332,19.332,0,0,1-1.1-9.172c.05-.251.3-.3.7-.2.351.1.551.251.5.5a12.059,12.059,0,0,0,2.707,8.019A14.635,14.635,0,0,0,22.094,42.4a15.688,15.688,0,0,0,12.43-1.5,16.276,16.276,0,0,0,7.518-10.375c1.3-4.912,1.053-9.122-.8-12.63-1.854-3.458-5.062-5.814-9.673-7.017a14.6,14.6,0,0,0-9.774.7A23.123,23.123,0,0,0,12.822,18.9a21.091,21.091,0,0,0,3.659,7.267,9.848,9.848,0,0,0,5.012,3.709,8.853,8.853,0,0,0,5.463.1,4.5,4.5,0,0,0,2.757-3.208,3.792,3.792,0,0,0-.15-2.807,2.915,2.915,0,0,0-2-1.554,2.989,2.989,0,0,0-2.306.15A2.287,2.287,0,0,0,24,24.21a3.014,3.014,0,0,0-.05,1.5c0,.1-.1.2-.251.251a.915.915,0,0,1-.451.1c-.2-.05-.351-.4-.5-1.053a4.567,4.567,0,0,1,.1-2.155,5.481,5.481,0,0,1,2.506-3.408,5.312,5.312,0,0,1,4.31-.551,7.094,7.094,0,0,1,4.611,3.408,7.441,7.441,0,0,1,.551,5.814,7.921,7.921,0,0,1-4.411,5.363,10.767,10.767,0,0,1-7.668.551,12.981,12.981,0,0,1-6.716-4.611,24.349,24.349,0,0,1-4.411-9.072C7.509,26.365,4,34.585,1.194,45.01c-.05.251-.3.3-.7.2s-.551-.3-.5-.5Q4.5,27.794,11.118,17.945A38.82,38.82,0,0,1,11.819.5l.05-.251c.05-.251.3-.3.7-.2s.551.3.5.5L13.022.8a33.975,33.975,0,0,0-.8,15.587q4.812-6.616,10.525-9.172a17.335,17.335,0,0,1,11.778-.952c6.867,1.9,11.728,5.313,14.585,10.375C52.016,21.7,52.567,27.568,50.763,34.334ZM47.3,32.781q2.406-9.022-1.353-15.638T33.321,8.121a15.678,15.678,0,0,0-13.583,2.556A17.7,17.7,0,0,1,31.968,9.424c4.962,1.353,8.47,3.909,10.525,7.719s2.356,8.37.952,13.733a17.794,17.794,0,0,1-8.17,11.277,17.045,17.045,0,0,1-13.533,1.654,15.191,15.191,0,0,1-8.771-5.613,14.289,14.289,0,0,0,4.01,5.914A15.332,15.332,0,0,0,23.5,47.516a17.78,17.78,0,0,0,9.974-.15A19.789,19.789,0,0,0,42.192,42,21.191,21.191,0,0,0,47.3,32.781ZM32.82,27.568a5.986,5.986,0,0,0-.4-4.611A5.7,5.7,0,0,0,28.81,20.3a3.282,3.282,0,0,0-2.957.551,4.718,4.718,0,0,1,2.055.15,4.407,4.407,0,0,1,2.907,2.205,5.15,5.15,0,0,1,.3,3.909,5.826,5.826,0,0,1-3.408,4.11,10.06,10.06,0,0,1-6.566,0,8.642,8.642,0,0,1-3.559-2.105,10.056,10.056,0,0,0,4.711,3.208,9.375,9.375,0,0,0,6.766-.251A6.367,6.367,0,0,0,32.82,27.568Z" transform="translate(0 0)"/></g></svg>');
      
      //map in footer (homepage only)
      function initMapFooter() {
        var mapDiv = document.getElementById('map');
        var myLatLng = {lat: 42.325777, lng:-71.253376};

        var contentString = '<div><a href="https://goo.gl/maps/cWdFVV8P3Fq" target="_blank">MD TLC <br>25 Walnut St., Suite 400<br>Wellesley, MA 02481</a></div>';

        var isDraggable = jQuery(document).width() > 480 ? true : false;

        var map = new google.maps.Map(mapDiv, {
          center: myLatLng,
          zoom: 15,
          streetViewControl: false,
          fullscreenControl: false,
          mapTypeControl: true,
          zoomControl: true,
          styles: mapStyle,
          draggable: isDraggable,
          scrollwheel: false
        });

        var image = {
          url: 'data:image/svg+xml;utf-8,' + svg,
          origin: new google.maps.Point(0, 0),
        };

        var infowindow = new google.maps.InfoWindow({
          content: contentString
        });

        var marker = new google.maps.Marker({
          position: myLatLng,
          map: map,
          icon: image
        });

        marker.addListener('click', function() {
          infowindow.open(map, marker);
        });

        //re-centers map on resize
        google.maps.event.addDomListener(window, "resize", function() {
          google.maps.event.trigger(map, "resize");
          map.setCenter(myLatLng);
        });

      }
    
  //events maps with all events on homepage
  <?php if(count($posts_array)):?>
    var mapAll;
    <?php foreach ($posts_array as $key => $post): ?>
        <?php
          $title = $post->post_title;
          $lat = get_post_meta($post->ID,'lat',true);
          $lng = get_post_meta($post->ID,'lng',true);
          $date = get_post_meta($post->ID, 'event_start_date', true);
          $text = '';
          if ( empty( $post->post_excerpt ) ) {
            $text = wp_kses_post( wp_trim_words( $post->post_content, 20 ) );
          } else {
            $text = wp_kses_post( $post->post_excerpt ); 
          }
        ?>
      <?php if( $lat && $lng ) : ?>
            var myLatLng<?php echo $key ?> = {lat: <?php echo $lat ?>, lng: <?php echo $lng ?>};
            var contentString<?php echo $key ?> = '<div class="marker_info text-center">'+
                '<h4 class="marker_info_title mb-1">'+
                '<?php echo $title; ?>' + '</h4>';

            //if post has date, show it
            <?php if($date): ?>
              contentString<?php echo $key; ?> += '<div class="marker_info_content"><?php echo date('F j, Y', $date); ?></div>';
            <?php endif; ?>

            //if post has content, show excerpt and link
            <?php if($text !== ''): ?>
              contentString<?php echo $key; ?> += 
                '<div class="marker_info_content mt-3" style="max-width:250px;">'+
                '<?php echo $text; ?>'+
                '</div>'+
                '<div style="margin-top:20px"><a class="btn btn-gold mb-0" href="<?php the_permalink(); ?>">Read More</a></div>';
            //<?php endif; ?>
            contentString<?php echo $key; ?> += '</div>';
        <?php endif; ?>
      <?php endforeach ?>

      var pinImage = {
        url: 'data:image/svg+xml;utf-8,' + svg
      };
      function initMapAll() {
          mapAll = new google.maps.Map(document.getElementById('map-all'), {
          center: myLatLng0,
          zoom: 3,
          styles: mapStyle,
          mapTypeControl: false,
          scrollwheel: false
        });
        
        //track last opened info window
        var lastOpened = '';
        
        <?php foreach ($posts_array as $key => $post): ?>
          <?php if( $lat && $lng ) : ?>
            var infowindow<?php echo $key ?> = new google.maps.InfoWindow({
                content: contentString<?php echo $key ?>
              });
            var marker<?php echo $key ?> = new google.maps.Marker({
              position: myLatLng<?php echo $key ?>,
              map: mapAll,
              icon: pinImage,
              title: '<?php echo $post->post_title ?>'
            });
            marker<?php echo $key ?>.addListener('click', function() {
              if(lastOpened) {
                lastOpened.close();
              }
              lastOpened = infowindow<?php echo $key ?>;
              infowindow<?php echo $key ?>.open(mapAll, marker<?php echo $key ?>);
            });
          <?php endif; ?>
        <?php endforeach ?>
        
        //close last opened info window on click
        
        //re-centers map on resize
        google.maps.event.addDomListener(window, "resize", function() {
          google.maps.event.trigger(mapAll, "resize");
          mapAll.setCenter(myLatLng0);
        });

      }
    function initBothMaps(){
      initMapAll()
      initMapFooter()
    }
  <?php else : ?>
    function initBothMaps(){
      initMapFooter()
    }
  <?php endif; ?>
  </script>
  <script async="" defer="" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAlVgoufMMncjtLoUOqeswGzP2pPBrKmyU&callback=initBothMaps"></script>

	<?php wp_reset_postdata();
  ?>