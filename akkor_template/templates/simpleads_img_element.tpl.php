<?php

/**
 * @file
 * SimpleAds Image ad.
 *
 * Avaialable variables
 * array $ad
 * array $settings
 * array $image_attributes
 * array $link_attributes
 *
 */
?>
  <!-- Simple ADS block -->
  <?php if (!empty($ad['destination_url'])) : ?>
    <?php 
      print l(theme('image', $image_attributes), $ad['url'], $link_attributes); 
    ?>
  <?php else : ?>
    <?php print '<div class="event">'.theme('image', $image_attributes).'</div>'; ?>
  <?php endif; ?>