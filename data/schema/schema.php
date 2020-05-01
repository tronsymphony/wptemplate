<script type="application/ld+json">
{"@context": "http://schema.org",
"@type": "Physician",
"name": "<?php echo get_bloginfo( 'blogname' ) ?>",
"address": {
  "@type": "PostalAddress",
  "addressLocality": "City",
  "addressRegion": "State",
  "postalCode": "ZIP",
  "streetAddress": "Address"
},
"aggregateRating": {
  "@type": "AggregateRating",
  "ratingValue": "5",
  "reviewCount": "4"
},
"openingHours": ["Mo 9:00-16:00", "Tu 9:00-18:00", "We 9:00-18:00", "Th 9:00-18:00", "Fr 9:00-16:00", "Sat 9:00-15:00"],
"areaServed": {
  "@type": "Place",
  "geo": {"@type": "GeoCoordinates", "latitude": "xx.xxxxx", "longitude": "-xx.xxxxxx" }
},
"image": "<?php echo IMG ?>/banner-placeholder.jpg",
"logo": "<?php echo IMG ?>/logo@2x.png",
"url": "<?php echo get_bloginfo( 'wpurl' ) ?>",
"MedicalSpecialty":"Aesthetics Center",
"description": "Site description",

  <?php
  global $client;
  $args = array(
		'post_status' => 'publish',
		'post_type' => 'providers',
		'posts_per_page' => -1
	);
	$provider_schema = new WP_Query( $args );

	// The Loop
	if ( $provider_schema->have_posts() ) {
    $prov_count = 0; ?>
    "member": {
      "@type": "Person",
      "name": [
      <?php while ( $provider_schema->have_posts() ) {
			$provider_schema->the_post();
      $prov_count++; ?>
        "<?php echo get_the_title(); ?>"<?php if ($provider_schema->found_posts != $prov_count) {echo ',';} ?>
      <?php } ?>
      ]
  <?php } ?>
  },
  <?php wp_reset_postdata(); ?>

  <?php
  $args = array(
		'post_status' => 'publish',
		'post_type' => 'treatments',
		'posts_per_page' => -1
	);
	$treatment_schema = new WP_Query( $args );

	// The Loop
	if ( $treatment_schema->have_posts() ):
    $treat_count = 0; ?>
    "availableService": [
      <?php while ( $treatment_schema->have_posts() ):
        $treatment_schema->the_post();
        $treatment = $client->treatment(get_the_id($treatment_schema));
        $conditions = $treatment->conditions();
        $conditions_count = 0;
        $treat_count++; ?>
        {"@type": "MedicalProcedure", "name": "<?php echo get_the_title(); ?>"
        <?php if(count($conditions)>0):

        ?>, "indication": [
            <?php foreach($conditions as $condition):
            $conditions_count++;?> {"name": "<?php echo $condition->name ?>"}<?php if (count($conditions) != $conditions_count) {echo ',';} ?>
            <?php endforeach; ?>]
        <?php endif; ?>
        }<?php if ($treatment_schema->found_posts != $treat_count) {echo ',';} ?>

      <?php endwhile; ?>
      ],
  <?php endif; ?>
  <?php wp_reset_postdata(); ?>


"sameAs" : [ "https://www.facebook.com/xx/", "https://www.instagram.com/xx/" ]
}
</script>
