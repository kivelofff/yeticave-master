<?php
function renderTemplate($template, $data) {
    if (!file_exists($template)) {
        return '';
    }

    if (is_array($data)) {
        extract($data);
    }
    ob_start();
    include $template;
    return ob_get_clean();

}


?>


