<?php

/**
 * @file
 * SimpleAds Block template
 *
 * Use Javascript code below when you enable caching,
 * otherwise it will be cached and rotating will not work.
 *
 * $ads_page
 *   Url to Advertise page (configurable in block settings).
 *
 * $tid
 *   Term ID
 *
 * $prefix
 *   Unique number (to identify container for ads)
 *
 * $ads
 *   Array of Ads
 *
 * $ads_width
 *   Ad width
 *
 * $ads_height
 *   Ad height
 *
 * $ads_limit
 *   Numer of ads to dispaly
 *
 * Note: Consider using only one method (javascript or static output),
 * otherwise ad impression counter will be doubled.
 *
 */

  $settings = array(
    'ads_width' => check_plain($ads_width),
    'ads_height' => check_plain($ads_height),
  );

?>
<?php if (count($ads) > 0) : ?>
  
  <?php /* If you would like to modify class attrbiute, please don't forget to update
    the first argument in function call above (_simpleads_load(...)).
  */
  ?>

<div class="events">
  <div class="rubric"><h4>Материалы мероприятий</h4></div>
  <div class="events-list">
    <a href="#" class="event" style="height: 150px"></a>
    <a href="#" class="event" style="height: 200px"></a>
    <a href="#" class="event" style="height: 250px"></a>
    
    <?php // Code below displays ad, but if Drupal cache enabled, the ad remains the same until the cache not cleared or not expired. ?>
    <?php if (count($ads) > 0) : ?>
      <?php foreach ($ads as $ad) : ?>
        <?php if ($ad['type'] == 'graphic') : ?>
          <?php print theme('simpleads_img_element', array('ad' => $ad, 'settings' => $settings)); ?>
        <?php elseif ($ad['type'] == 'text') : ?>
          <?php print theme('simpleads_text_element', array('ad' => $ad, 'settings' => $settings)); ?>
        <?php else : ?>
          <?php print theme('simpleads_flash_element', array('ad' => $ad, 'settings' => $settings)); ?>
        <?php endif; ?>
      <?php endforeach; ?>
    <?php endif; ?>
              
  </div>
</div>
<?php endif; ?>