<?php
$templateFiles = scandir(dirname(__DIR__) . '/pages');
if (!empty($templateFiles)) {
    echo "<ul>";
    foreach ($templateFiles as $item) {
        if ($item === '.'
            || $item === '..'
            || strpos($item, '404') !== false
            || strpos($item, '.php') == 0
        ) {
            continue;
        }

        //$item = substr($item, 0, strlen($item) - 4);
        $itemParts = explode('.', $item);
        echo "<li><a href='index.php?p=". $itemParts[0] ."'>{$itemParts[0]}</a></li>";
    }
    echo "</ul>";
}