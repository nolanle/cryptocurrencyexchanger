<?php
$target = 'storage/app/public'; 
$shortcut = 'public/storage'; 
symlink($target, $shortcut);
echo "OK";
?>