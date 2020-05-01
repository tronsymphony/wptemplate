<script type="application/ld+json">
  <?php global $post; global $client;

    $address = get_post_meta($post->ID, 'address', true);
    $lat = get_post_meta($post->ID, 'lat', true);
    $lng = get_post_meta($post->ID, 'lng', true);
    $phone = get_post_meta($post->ID, 'location_phone', true);
    $providers = get_post_meta($post->ID, 'location_providers', true);
    $treatments = get_post_meta($post->ID, 'location_treatments', true);
  ?>

  {
  "@context": "http://schema.org",
   "@type": "Physician",
   "name": "<?php echo get_bloginfo( 'blogname' ) ?> - <?php echo get_the_title() ?>",
   "address": "<?php echo $address ?>",
   "url": "<?php echo get_permalink() ?>",
   "areaServed": {
      "@type": "Place",
      "geo": {
        "@type": "GeoCoordinates",
        "latitude": "<?php echo $lat ?>",
        "longitude": "<?php echo $lng ?>"
      }
   },
   "telephone": "<?php echo $phone ?>",
   "MedicalSpecialty": ["List", "Sepcialities"],
   <?php if(count($treatments)>0):
    $treatments_count = 0;
   ?>
     "availableService": {
      "@type": "MedicalProcedure",
      "name": [
      <?php foreach($treatments as $id) :
        $treatments_count++;
        $treatment_name = get_the_title($id);
      ?>
        "<?php echo $treatment_name ?>"<?php if ($treatments_count!==count($treatments)) {echo ',';}?>
      <?php endforeach; ?>
      ]
     },
   <?php endif; ?>
   <?php if (count($providers)>0) :
    $provider_count = 0;
   ?>
   "member": [
    <?php foreach($providers as $id) :
      $id = (int)$id;
      $provider = $client->provider($id);
      $provider_info = wp_get_post_terms($id, 'provider_info', array("fields" => "names"));
      $provider_title = get_post_meta($id, 'provider_title', true);
      $suffix_count = 0;
      $provider_count++;
    ?>
      {
        "@type": "Person",
        "url": "<?php echo get_post_permalink($id)?>",
        "sameAs": "<?php echo get_post_permalink($id)?>",
        "name": "<?php echo get_the_title($id) ?>",
        "honorificSuffix": [
         <?php foreach($provider_info as $suffix) {
          $suffix_count++;
          if ($suffix_count !== count($provider_info)) {
            echo '"'.$suffix.'", ';
          } else {echo '"'.$suffix.'"';}
        } ?>
       ],
       <?php if($provider_title) : ?>
       "jobTitle": "<?php echo $provider_title; ?>",
       <?php endif; ?>
         "workLocation": {
          "@type":"Place",
           "name":"<?php echo get_bloginfo( 'blogname' ) ?> - <?php echo get_the_title() ?>"
        }
      }<?php if($provider_count!==count($providers)) echo ','; ?>
    <?php endforeach ?>

   ]
   <?php endif ?>
  }
</script>
