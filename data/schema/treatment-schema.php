<?php global $post; global $client;
  $treatment = $client->treatment(get_the_ID());
  $conditions = $treatment->conditions();
  $conditions_count = 0;
?>
<script type="application/ld+json">
{
"@context": "http://schema.org",
"@type": "MedicalProcedure",
"name": "<?php echo get_the_title()?>"
}
</script>
