<?php
function renderTemplate($template, $data) {
    if (!file_exists($template)) {
        return '';
    }
    ob_start();
    if (is_array($data)) {
        extract($data);
    }

    include $template;
    return ob_get_clean();

}


?>


