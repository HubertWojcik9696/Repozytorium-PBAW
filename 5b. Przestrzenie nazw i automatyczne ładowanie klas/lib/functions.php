<?php
namespace lib;
function redirect($url) {
    header("Location: $url");
    exit();
}

?>
