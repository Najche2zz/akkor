<div class="main-news">
    <div class="rubric"><h3>Главные новости</h3></div>

    <?php $i = 0; foreach ($nodes as $node): if ($i == 1) { break; } ?>

    <div class="main-news-wrapper">
        <div class="head-new">
            <div class="first-img">
                <a href="<?php print drupal_get_path_alias('node/' . $node->nid); ?>">
                    <img src="<?php print image_style_url('large', $node->field_image['und'][0]['uri']); ?>" alt="" class="img-responsive" title="">
                </a>
            </div>
            <div class="first-text">
                <div class="news-date"><?php print format_date($node->created, 'short'); ?></div>
                <h2>
                    <a href="<?php print drupal_get_path_alias('node/' . $node->nid); ?>">
                        <?php print $node->title;?>
                    </a>
                </h2>
                <div class="first-intro">
                    <?php print akkornew_truncate(strip_tags($node->body['und'][0]['safe_value']), 300); ?>
                </div>
            </div>
        </div>

        <?php $i++; endforeach; ?>

        <div class="main-list">

        <?php $i = 0; foreach ($nodes as $node): $i++; if ($i > 4) { break; } ?>

            <div class="main-item">
                <div class="main-img">
                    <a href="<?php print drupal_get_path_alias('node/' . $node->nid); ?>" style="background-image: url(<?php print image_style_url('thumbnail', $node->field_image['und'][0]['uri']); ?>);">
                    </a>
                </div>
                <div class="main-text">
                    <div class="news-date"><?php print format_date($node->created, 'short'); ?></div>
                    <h3>
                        <a href="<?php print drupal_get_path_alias('node/' . $node->nid); ?>">
                            <?php print akkornew_truncate(strip_tags($node->title), 60);?>
                        </a>
                    </h3>
                </div>
            </div>
        
        <?php endforeach; ?>

        </div>
    </div>
</div>

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