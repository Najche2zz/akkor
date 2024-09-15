<div class="dsg-news">
    <div class="rubric"><h3>Движение сельских женщин</h3></div>
    <div class="dsg-list">

    <?php 
        foreach ($nodes as $node): 
        $img = image_style_url('medium', $node->field_image['und'][0]['uri']);
    ?>
        <div class="dsg-item">
            <?php if ($img) : ?>
                <div class="dsg-img">
                    <a href="<?php print drupal_get_path_alias('node/' . $node->nid); ?>">
                        <img src="<?php print $img; ?>" alt="<?php print $node->title; ?>" />
                    </a>
                </div>
                <div class="dsg-text">
                    <div class="news-date"><?php print format_date($node->created, 'short'); ?></div>
                    <h3>
                        <a href="<?php print drupal_get_path_alias('node/' . $node->nid); ?>">
                            <?php print akkornew_truncate(strip_tags($node->title), 60);?>
                        </a>
                    </h3>
                </div>
            <?php else: ?>
                <div class="dsg-text">
                    <div class="news-date"><?php print format_date($node->created, 'short'); ?></div>
                    <h3>
                        <a href="<?php print drupal_get_path_alias('node/' . $node->nid); ?>">
                            <?php print strip_tags($node->title);?>
                        </a>
                    </h3>
                    <?php akkornew_truncate(strip_tags($node->body['und'][0]['summary']), 300); ?>
                </div>
            <?php endif; ?>
            
        </div>

    <?php endforeach; ?>

    </div>
</div>