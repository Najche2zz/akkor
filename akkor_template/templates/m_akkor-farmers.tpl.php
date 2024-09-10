<?php if (!empty($nodes)):?>
<?php 
$options = array(
  'type' => 'image',
  'settings' => array(
    'image_style' => 'medium',
    'image_link' => 'content', // content, file
  )
);
if(!empty($nodes)):
?>

<div class="people">
         <div class="rubric"><h4>Слово фермерам</h4></div>
         <div class="people-list">

<?php 
foreach ($nodes as $node):
    $commentator = node_load($node->field_commentator['und'][0]['nid']);
    if (empty($commentator)) { continue; }
    $images = field_get_items('node', $commentator, 'field_image');
    $field_image = field_view_value('node', $commentator, 'field_image', $images[0], $options);
    ?>
    <div class="people-item">
        <div class="people-header">
            <div class="people-img"><?php print render($field_image); ?></div>
            <div class="people-title">
                <?php print $commentator->title; ?>
                <span><?php print $commentator->field_status['und'][0]['value']; ?></span>
            </div>
        </div>
        <div class="people-text">
            <p><?php print akkor_truncate(strip_tags($node->body['und'][0]['safe_value']), 300); ?></p>
            <p><a href="<?php print drupal_get_path_alias('node/' . $node->nid); ?>">Читать далее...</a></p>
        </div>
    </div>
<?php endforeach; ?>

</div>
</div>

<?php endif;?>
<?php else:?>
<p>Нет материалов для отображения</p>
<?php endif; ?>