<?php
error_reporting(E_ALL); // Устанавливаем, чтобы показывались все ошибки
$file = 'text.html';
$newfile = 'cron/text.html';
 

copy ($file, $newfile) or die ("Ошибка копирования файла");


#if (!copy($file, $newfile)) {
#    echo "не удалось скопировать $file...\n";
#}
?>