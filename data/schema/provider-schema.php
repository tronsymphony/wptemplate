<script type="application/ld+json">
  <?php global $post; global $client;
    $provider = $client->provider(get_the_ID());
    $treatments = $provider->treatments();
    $locations = get_post_meta($post->ID, 'provider_locations', true);
    $provider_title = get_post_meta($post->ID, 'provider_title', true);
    $provider_info = wp_get_post_terms($post->ID, 'provider_info', array("fields" => "names"));
	  $provider_department = wp_get_post_terms($post->ID, 'provider_department', array("fields" => "names"));
    $suffix_count = 0;
    $location_count = 0;
  ?>

  {
  "@context": "http://schema.org",
   "@type": "Person",
   "name": "<?php echo get_the_title() ?>",
   "honorificSuffix": [
     <?php foreach($provider_info as $suffix) {
      $suffix_count++;
      if ($suffix_count !== count($provider_info)) {
        echo '"'.$suffix.'", ';
      } else {echo '"'.$suffix.'"';}
    } ?>
   ],
   <?php if ($provider_title !== '') { ?>
    "jobTitle":"<?php echo $provider_title; ?>",
   <?php } ?>
   "url": "<?php echo get_permalink() ?>",
   <?php if(!empty($locations)) : ?>
     "workLocation": [
     <?php foreach($locations as $id) :
      $location_count++;
      $location = get_post($id);
      $url = get_post_permalink($id);
      $name = get_the_title($id);

        if($location_count !== count($locations)):?>
         {
          "@type":"Place",
          "name": "<?php echo get_bloginfo( 'blogname' ) ?> - <?php echo $name ?>",
          "sameAs" : "<?php echo $url ?>"
         },
        <?php else: ?>
          {
          "@type":"Place",
          "name": "<?php echo get_bloginfo( 'blogname' ) ?> - <?php echo $name ?>",
          "sameAs" : "<?php echo $url ?>"
         }
        <?php endif; ?>
      <?php endforeach; ?>
     ]

   <?php endif; ?>
  }
</script>
