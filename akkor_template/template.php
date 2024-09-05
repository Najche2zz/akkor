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

function akkornew_preprocess_region(&$variables) {
}

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
    $output = l($element['#title'], $element['#href'], $element['#localized_options']);
    if ($element['#href'] == '<front>' ||  $element['#href'] == $_GET['q']) {$current = 'class="active"';}
    else $current = '';
    return '<li '.$current.'>' . $output . $sub_menu ."</li>\n";
}

function akkornew_form_alter(&$form, &$form_state, $form_id) {
    if ($form_id == 'search_block_form') {
        $form['search_block_form']['#title'] = t('Search'); // Меняем текст заголовка
        $form['search_block_form']['#title_display'] = 'invisible'; // Выключаем отображение заголовка
        $form['search_block_form']['#size'] = 20;  // Задаем размер поля ввода
        $form['actions']['submit']['#value'] = t('GO!'); // Меняем текст кнопки поиска
        $form['search_block_form']['#class'] = 'search-form';  // CSS-class текстового поля
        $form['actions']['submit'] = array('#type' => 'image_button', '#src' => base_path() . path_to_theme() .'/images/searchbutton.png'); // Путь к картинке кнопки, если мы хотим заменить текст на картинку
            
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