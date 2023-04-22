<?php
$files = scandir(__DIR__);
foreach($files as $file) {
    if($file != '.' && $file != '..') {
        echo "<a href='$file'>$file</a><br>";
    }
}
?>