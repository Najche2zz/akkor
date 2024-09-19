<div class="news">
    <div class="rubric"><h3>Новости</h3></div>
    <div class="list">

    <?php $i = 0; foreach ($nodes as $node): $i++; if ($i < 5) { continue; } ?>

        <div class="item">
            <div class="news-date"><?php print format_date($node->created, 'short'); ?></div>
            <h3>
                <a href="<?php print drupal_get_path_alias('node/' . $node->nid); ?>">
                    <?php print $node->title;?>
                </a>
            </h3>
            <div class="intro">
                <?php print akkornew_truncate(strip_tags($node->body['und'][0]['safe_value']), 300); ?>
            </div>
        </div>

    <?php endforeach; ?>

    </div>
</div>