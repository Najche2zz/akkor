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

<?php 
foreach ($nodes as $node):
    $commentator = node_load($node->field_commentator['und'][0]['nid']);
    if (empty($commentator)) { continue; }
    $images = field_get_items('node', $commentator, 'field_image');
    $field_image = field_view_value('node', $commentator, 'field_image', $images[0], $options);
    ?>

<div class="first">
    <div class="rubric"><h4>От первого лица</h4></div>
    <div class="first-header">
        <div class="f-img"><?php print render($field_image); ?></div>
        <div class="first-title">
            <?php print $commentator->title; ?>
            <span><?php print $commentator->field_status['und'][0]['value']; ?><br /></span>
        </div>
    </div>
    <div class="first-text">
    <p><?php print strip_tags($node->body['und'][0]['summary']); ?></p>
    <p><a href="<?php print drupal_get_path_alias('node/' . $node->nid); ?>">Читать полностью</a></p>
    </div>
</div>
<?php endforeach; ?>

<?php endif;?>
<?php else:?>
<p>Нет материалов для отображения</p>
<?php endif; ?>
