<?php

/**
 * @file
 * Default theme implementation to display a node.
 *
 * Available variables:
 * - $title: the (sanitized) title of the node.
 * - $content: An array of node items. Use render($content) to print them all,
 *   or print a subset such as render($content['field_example']). Use
 *   hide($content['field_example']) to temporarily suppress the printing of a
 *   given element.
 * - $user_picture: The node author's picture from user-picture.tpl.php.
 * - $date: Formatted creation date. Preprocess functions can reformat it by
 *   calling format_date() with the desired parameters on the $created variable.
 * - $name: Themed username of node author output from theme_username().
 * - $node_url: Direct URL of the current node.
 * - $display_submitted: Whether submission information should be displayed.
 * - $submitted: Submission information created from $name and $date during
 *   template_preprocess_node().
 * - $classes: String of classes that can be used to style contextually through
 *   CSS. It can be manipulated through the variable $classes_array from
 *   preprocess functions. The default values can be one or more of the
 *   following:
 *   - node: The current template type; for example, "theming hook".
 *   - node-[type]: The current node type. For example, if the node is a
 *     "Blog entry" it would result in "node-blog". Note that the machine
 *     name will often be in a short form of the human readable label.
 *   - node-teaser: Nodes in teaser form.
 *   - node-preview: Nodes in preview mode.
 *   The following are controlled through the node publishing options.
 *   - node-promoted: Nodes promoted to the front page.
 *   - node-sticky: Nodes ordered above other non-sticky nodes in teaser
 *     listings.
 *   - node-unpublished: Unpublished nodes visible only to administrators.
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 *
 * Other variables:
 * - $node: Full node object. Contains data that may not be safe.
 * - $type: Node type; for example, story, page, blog, etc.
 * - $comment_count: Number of comments attached to the node.
 * - $uid: User ID of the node author.
 * - $created: Time the node was published formatted in Unix timestamp.
 * - $classes_array: Array of html class attribute values. It is flattened
 *   into a string within the variable $classes.
 * - $zebra: Outputs either "even" or "odd". Useful for zebra striping in
 *   teaser listings.
 * - $id: Position of the node. Increments each time it's output.
 *
 * Node status variables:
 * - $view_mode: View mode; for example, "full", "teaser".
 * - $teaser: Flag for the teaser state (shortcut for $view_mode == 'teaser').
 * - $page: Flag for the full page state.
 * - $promote: Flag for front page promotion state.
 * - $sticky: Flags for sticky post setting.
 * - $status: Flag for published status.
 * - $comment: State of comment settings for the node.
 * - $readmore: Flags true if the teaser content of the node cannot hold the
 *   main body content.
 * - $is_front: Flags true when presented in the front page.
 * - $logged_in: Flags true when the current user is a logged-in member.
 * - $is_admin: Flags true when the current user is an administrator.
 *
 * Field variables: for each field instance attached to the node a corresponding
 * variable is defined; for example, $node->body becomes $body. When needing to
 * access a field's raw values, developers/themers are strongly encouraged to
 * use these variables. Otherwise they will have to explicitly specify the
 * desired field language; for example, $node->body['en'], thus overriding any
 * language negotiation rule that was previously applied.
 *
 * @see template_preprocess()
 * @see template_preprocess_node()
 * @see template_process()
 *
 * @ingroup themeable
 */
if ($view_mode == 'full'):
unset($content['links']);
$persons = !empty($content['group_persona'])
    ? $content['group_persona']['items']['#items'] : array();
$region = $content['group_main_info']['field_simple_text_6'];
$address = $content['group_main_info']['field_text_simple_1'];
$code = $content['group_main_info']['field_text_simple_4'];
if (isset($content['group_main_info']['field_text_simple_5']) &&
  !empty($content['group_main_info']['field_text_simple_5'])) {
    $timezone = $content['group_main_info']['field_text_simple_5'];
  }
?>
<div class="region-akkor">

  <div class="region-region"><?php print render($region); ?></div>
  
  <div class="region-body">
  <div class="region-name">
    <?php print render($title_prefix); ?>
    <h2<?php print $title_attributes; ?>><?php print $title; ?></h2>
    <?php print render($title_suffix); ?>
  </div>

  <?php if (!empty($timezone) || !empty($address) || !empty($code)): ?>
  <div class="region-addr-box">
    <div class="region-address"><?php print render($address); ?></div>
    
    <?php if (!empty($timezone)): ?>
      <div class="region-timezone">МСК <?php print render($timezone); ?></div>
    <?php endif; ?>
    
    
    <?php //if (!empty($code)): ?>
      <div class="region-code"><?php print render($code); ?></div>
    <?php //endif; ?>
  </div>
  <?php endif; ?>

  <div class="region-persons">
  <?php foreach ($persons as $person): ?>
    <?php if (!empty($person)): ?>
    <div class="region-person">
      <div class="rp-post"><?php print render($person['field_text_simple_2']); ?></div>
      <div class="rp-name">
        <?php if (!empty($person['field_text_simple_3'])): ?>
          <div class="rp-fio"><?php print render($person['field_text_simple_3']); ?></div>
        <?php endif; ?>
        <?php if (!empty($person['field_date_1']['#markup']['#is_empty'])): ?>
          <div class="rp-born"><?php print date('d.m.Y', strtotime($person['field_date_1']['#markup'])); ?> г.р.</div>
        <?php endif; ?>
        <?php if (!empty($person['field_text_full_1'])): ?>
          <div class="rp-personal-contacts"><?php print render($person['field_text_full_1']); ?></div>
        <?php endif; ?>
      </div>
      <div class="rp-contacts">
        <?php print render($person['field_text_full_2']); ?>
      </div>
    </div>
    <?php endif; ?>
  <?php endforeach; ?>
  </div>
  </div>
</div>
<?php endif; ?>