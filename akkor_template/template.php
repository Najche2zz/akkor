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
    return '<ul class="nav navbar-nav">' . $vars['tree'] . '</ul>'; 
}