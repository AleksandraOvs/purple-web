<?php

//show current template

add_filter('template_include', 'var_template_include', 1000);
function var_template_include($t)
{
    $GLOBALS['current_theme_template'] = basename($t);
    return $t;
}

function get_current_template($echo = false)
{
    if (!isset($GLOBALS['current_theme_template']))
        return false;
    if ($echo)
        echo $GLOBALS['current_theme_template'];
    else
        return $GLOBALS['current_theme_template'];
}

//необходимо добавить этот код в футер:

// if (current_user_can('administrator')) {
//     echo '<div style="position: fixed;bottom: 10px;right: 10px;background: rgba(255, 255, 255, .2);color: #cacaca;padding: 5px;font-size: 12px;z-index: 1000;"class="show-temp">' . get_current_template() . '</div>';
// }