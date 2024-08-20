<?php

function akkor_html_head_alter(&$head_elements) {
  foreach ($head_elements as $key => $element) {
    if (isset($element['#attributes']['rel']) &&
    $element['#attributes']['rel'] == 'shortlink') {
      unset($head_elements[$key]);
    }
  }
}

function akkor_preprocess_page(&$variables) {

  $variables['navbar_classes_array'] = array('navbar');

  if (theme_get_setting('bootstrap_navbar_position') !== '') {
    $variables['navbar_classes_array'][] = 'navbar-' . theme_get_setting('bootstrap_navbar_position');
  }
  else {
    $variables['navbar_classes_array'][] = '';
  }
  if (theme_get_setting('bootstrap_navbar_inverse')) {
    $variables['navbar_classes_array'][] = 'navbar-inverse';
  }
  else {
    $variables['navbar_classes_array'][] = 'navbar-default';
  }
  if (!empty($variables['is_front'])) {
    unset($variables['page']['content']);
  }
}

function akkor_block_view_poll_recent_alter(&$data, $block) {
  if (isset($data['content']['links'])) {
    unset($data['content']['links']);
  }
}

function akkor_preprocess_field(&$variables) {
  $element = $variables['element'];
  $view_mode = $element['#view_mode'];
  $field_type = $element['#field_type'];
  $field_name = $element['#field_name'];
  $items = $variables['items'];

  if ($field_type == 'image') {
    if ($field_name == 'field_image') {
      switch ($view_mode) {
        case 'teaser':
          foreach ($items as $delta => $item) {
            $item['#item']['attributes']['class'][] = 'img-thumbnail img-responsive';
            $items[$delta] = $item;
          }
          $variables['classes_array'][] = 'pull-left';
          break;
        case 'full':
          foreach ($items as $delta => $item) {
            $item['#item']['attributes']['class'][] = 'img-thumbnail img-responsive';
            $items[$delta] = $item;
          }
          break;
      }
    }
    if ($field_name == 'field_ad_image') {
          foreach ($items as $delta => $item) {
            $item['#item']['attributes']['class'][] = 'img-thumbnail img-responsive';
            $items[$delta] = $item;
          }
    }
  }

  $variables['items'] = $items;
}

function akkor_preprocess_simpleads_img_element(&$vars) {
  $link_attributes = array();
  $image_attributes = array();
  $vars = _simpleads_theme_attributes_init($vars);
  _simpleads_increase_impression($vars['ad']['node']);
  // Image attributes
  $image_attributes['path'] = $vars['ad']['image_uri'];
  $image_attributes['alt'] = check_plain($vars['ad']['alt']);
  if (isset($vars['settings']['ads_width']) && is_numeric($vars['settings']['ads_width'])) {
    $image_attributes['width'] = check_plain($vars['settings']['ads_width']);
  }
  if (isset($vars['settings']['ads_height']) && is_numeric($vars['settings']['ads_height'])) {
    $image_attributes['height'] = check_plain($vars['settings']['ads_height']);
  }

  // Link attributes
  $link_attributes['html'] = TRUE;
  if ($vars['ad']['target'] && !user_access('administer nodes')) {
    $link_attributes['attributes']['target'] = '_blank';
  }

  $image_attributes['attributes']['class'][] = 'img-thumbnail';

  $vars['link_attributes'] = $link_attributes;
  $vars['image_attributes'] = $image_attributes;
}

function akkor_preprocess_node(&$variables) {
//  global $user;
  $variables['node'] = $variables['elements']['#node'];
  $node = $variables['node'];
//  $nids = array('9','20','21','22','23');
//  if (in_array($node->nid, $nids) && !$user->uid) {
//    $message = 'Для доступа к содержимому страницы необходимо авторизоваться на сайте.'
//       . 'Содержимое страницы могут просматривать только члены АККОР.';
//    drupal_set_message(t($message), 'error');
//    drupal_goto('user', array(), '303');
//  }
  $variables['date'] = format_date($node->created, 'short');
  if (variable_get('node_submitted_' . $node->type, TRUE)) {
    $variables['display_submitted'] = TRUE;
    $variables['submitted'] = t('!datetime', array('!datetime' => $variables['date']));
  }
}

function akkor_truncate($string, $length = 80, $etc = '...',
                                  $break_words = false, $middle = false)
{
    if ($length == 0) {
        return '';
    }

    if (mb_strlen($string) > $length) {
        $length -= min($length, mb_strlen($etc));
        if (!$break_words && !$middle) {
            $string = preg_replace('/\s+?(\S+)?$/u', '', mb_substr($string, 0, $length+1));
        }
        if(!$middle) {
          $string = mb_substr($string, 0, $length);
          if (in_array(mb_substr($string, -1, 1), array(',','.',':',';'))) {
            $length = mb_strlen($string);
            return mb_substr($string, 0, $length - 1) . $etc;
          }
          return $string . $etc;
        } else {
            return mb_substr($string, 0, $length/2) . $etc . mb_substr($string, -$length/2);
        }
    } else {
        return $string;
    }
}

function akkor_preprocess_block(&$variables) {
  if ('akkor-info-mobile' === $variables['block']->delta) {
    $variables['classes_array'][] = 'visible-xs';
  }
  if ('akkor-info' === $variables['block']->delta) {
    $variables['classes_array'][] = 'hidden-xs';
  }
}