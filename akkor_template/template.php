<?php

function akkornew_html_head_alter(&$head_elements) {
    unset($head_elements['system_meta_generator']);
}

function akkornew_preprocess_page(&$variables, $hook) {
    // Для ноды типа 'portfolio' задаёт свой шаблон страницы page.tpl.php
    if (isset($variables['node']) && $variables['node']->type == 'portfolio')
    {
        $variables['theme_hook_suggestions'][] = 'page__portfolio';
    }

    // Шаблоны для 404 и 403 ошибок
    $status = drupal_get_http_header("status");  
    if($status == "404 Not Found") {      
        $variables['theme_hook_suggestions'][] = 'page__404';
    }

    if($status == "403 Forbidden") {      
        $variables['theme_hook_suggestions'][] = 'page__403';
    }

    // To display sublinks. 
    $main_menu_tree = menu_tree(variable_get('menu_main_links_source', 'main-menu')); 
    $vars['main_menu'] = $main_menu_tree;
}

/*
function akkornew_preprocess_region(&$variables) {
}
*/

function akkornew_menu_tree__main_menu(&$vars) {
    // To add CSS class to the main menu ul 
    return '<ul class="menu">' . $vars['tree'] . '</ul>'; 
}

function akkornew_menu_link(&$variables) {
    $element = $variables['element'];
    $sub_menu = '';
    if ($element['#below']) {
        $sub_menu = drupal_render($element['#below']);
        $sub_menu = '<div class="submenu">' . $sub_menu . '</div>';
    }
    if ($sub_menu) {
      $output = '<span>'.$element['#title'].'</span>';
    }
    else {
      $output = l($element['#title'], $element['#href'], $element['#localized_options']);
    }
    if ($element['#href'] == $_GET['q'] || $element['#href'] == '<front>' && $_GET['q'] == '<front>') {$current = 'class="active"';}
    else $current = '';
    return '<li '.$current.'>' . $output . $sub_menu ."</li>\n";
}

function akkornew_preprocess_search_block_form(&$variables) {
    // print_r($variables);
}


function akkornew_form_alter(&$form, &$form_state, $form_id) {
    if ($form_id == 'search_block_form') {
        $form['search_block_form']['#title'] = t('Search'); // Меняем текст заголовка
        $form['search_block_form']['#title_display'] = 'invisible'; // Выключаем отображение заголовка
        $form['search_block_form']['#size'] = 20;  // Задаем размер поля ввода
        // $form['actions']['submit']['#value'] = t('GO!'); // Меняем текст кнопки поиска
        $form['search_block_form']['#class'] = 'test';  // CSS-class текстового поля
        // $form['actions']['submit'] = array('#type' => 'image_button', '#src' => base_path() . path_to_theme() .'/images/searchbutton.png'); // Путь к картинке кнопки, если мы хотим заменить текст на картинку
            
        $searchtext = 'Search'; // Задаем текст внутри поля. Здесь я использую английское значение, его можно легко перевести в админке. Можно писать и по-русски. Помещаем его в переменную, чтобы было удобно с ним работать
        $form['search_block_form']['#default_value'] = t($searchtext);
        // Добавляем дополнительные атрибуты к текстовому полю. Убирает текст при наведении курсора в форму и возвращает его назад
        $form['search_block_form']['#attributes']['onblur'] = "if (this.value == '') {this.value = '" . t($searchtext)."';}";
        $form['search_block_form']['#attributes']['onfocus'] = "if (this.value == '" . t($searchtext) . "') {this.value = '';}";
        // Предотвращает от поиска текста по умолчанию
        $form['#attributes']['onsubmit'] = "if(this.search_block_form.value=='" . t($searchtext) . "'){ alert('" .t('Please enter a search') . "'); return false; }";
        // Альтернативный (HTML5) атрибут, вместо использования javascript
        $form['search_block_form']['#attributes']['placeholder'] = t($searchtext);
    }
}


function akkornew_truncate($string, $length = 80, $etc = '...', $break_words = false, $middle = false) {
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

function akkornew_preprocess_field(&$variables) {
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

function akkornew_preprocess_region(&$vars) {
}

function akkornew_preprocess_block(&$vars) {
}

function akkornew_preprocess_simpleads_block(&$vars) {
}

function akkornew_preprocess_simpleads_img_element(&$vars) {
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
  $link_attributes['attributes']['class'][] = 'event';
  if ($vars['ad']['target'] && !user_access('administer nodes')) {
    $link_attributes['attributes']['target'] = '_blank';
  }

  $image_attributes['attributes']['class'][] = 'banner-img';

  $vars['link_attributes'] = $link_attributes;
  $vars['image_attributes'] = $image_attributes;
}


/*
function m_akkor_theme() {
    return array(
        'm_akkor_news' => array(
          'template' => 'block-news',
          'variables' => array(
            'nodes' => null
          )
        ),
        'm_akkor_info' => array(
          'template' => 'block-info',
          'variables' => array(
            'nodes' => null
          )
        ),
        'm_akkor_info_mobile' => array(
          'template' => 'block-info-mobile',
          'variables' => array(
            'nodes' => null,

          ),

        ),
        'm_akkor_farmer_info' => array(
          'template' => 'block-farmer-info',
          'variables' => array(
            'nodes' => null
          )
        ),
        'm_akkor_opinions' => array(
          'template' => 'block-opinions',
          'variables' => array(
            'nodes' => null
          )
        ),
        'm_akkor_video' => array(
          'template' => 'block-video',
          'variables' => array(
            'nodes' => null
          )
        ),
        'm_akkor_farmers' => array(
          'template' => 'block-farmers',
          'variables' => array(
            'nodes' => null
          )
        ),
    );
}

function m_akkor_block_info() {
    $blocks['akkor-news'] = array(
        'info'  => t('Новости'),
        'cache' => DRUPAL_CACHE_PER_ROLE, // по умолчанию
    );
    $blocks['akkor-info']['info'] = t('Актуальная информация:десктоп');
    $blocks['akkor-info']['cache'] = DRUPAL_NO_CACHE;
    $blocks['akkor-info-mobile']['info'] = t('Актуальная информация:мобильная');
    $blocks['akkor-info-mobile']['cache'] = DRUPAL_NO_CACHE;
    $blocks['akkor-opinions']['info'] = t('Мнения');
    $blocks['akkor-opinions']['cache'] = DRUPAL_NO_CACHE;
    $blocks['akkor-video']['info'] = t('Видео');
    $blocks['akkor-video']['cache'] = DRUPAL_NO_CACHE;
    $blocks['akkor-farmer-info']['info'] = t('Информация для фермеров');
    $blocks['akkor-farmer-info']['cache'] = DRUPAL_NO_CACHE;
    $blocks['akkor-farmers']['info'] = t('Слово фермерам');
    $blocks['akkor-farmers']['cache'] = DRUPAL_NO_CACHE;

    return $blocks;
}

function m_akkor_block_view($delta = '') {
    $block = array();
    switch ($delta) {
        case 'akkor-news':
            $block['subject'] = t('Новости');
            $block['content'] = theme('m_akkor_news', array('nodes' => m_akkor_get_nodes('Новости', 8)));
            break;
        case 'akkor-info':
            $nodes = m_akkor_get_nodes('Актуальная информация', 6);
            $block['subject'] = t('Актуальная информация');
            $block['content'] = theme('m_akkor_info', array('nodes' => $nodes));
          break;
        case 'akkor-info-mobile':
            $nodes = m_akkor_get_nodes('Актуальная информация', 6);
            $block['subject'] = t('Актуальная информация');
            $block['content'] = theme('m_akkor_info_mobile', array('nodes' => $nodes));
          break;
        case 'akkor-farmer-info':
            $nodes = m_akkor_get_nodes('Информация для фермеров', 3);
            $block['subject'] = t('Информация для фермеров');
            $block['content'] = theme('m_akkor_farmer_info', array('nodes' => $nodes));
          break;
        case 'akkor-opinions':
            $nodes = m_akkor_get_nodes('Мнения', 2);
            $block['subject'] = t('Мнения');
            $block['content'] = theme('m_akkor_opinions', array('nodes' => $nodes));
          break;
        case 'akkor-video':
            $nodes = m_akkor_get_nodes('Видео', 1);
            $block['subject'] = t('Видео');
            $block['content'] = theme('m_akkor_video', array('nodes' => $nodes));
          break;
        case 'akkor-farmers':
            $nodes = m_akkor_get_nodes('Слово фермерам', 2);
          if (!empty($nodes)) {
            $block['subject'] = t('Слово фермерам');
            $block['content'] = theme('m_akkor_farmers', array('nodes' => $nodes));
          }
          break;
    }

    return $block;
}

function m_akkor_get_nodes($term_name, $limit) {
  if (empty($term_name) || empty($limit)) {
    return FALSE;
  }
  $term = taxonomy_get_term_by_name($term_name);
  if (empty($term)) {
    return FALSE;
  }
  sort($term);
  $nids = taxonomy_select_nodes($term[0]->tid, FALSE, $limit, array('t.sticky' => 'DESC', 't.created' => 'DESC'));
  if (empty($nids)) {
    return FALSE;
  }
  $nodes = node_load_multiple($nids);
  return $nodes;
}
*/