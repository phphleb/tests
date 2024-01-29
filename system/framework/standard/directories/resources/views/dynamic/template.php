<?php
$с =  "DATA:";
$с .= isset($first) ? $first . '|' : '';
$с .=  isset($second) ? $second . '|' : '';
$с .= $third ?? '';

echo trim($с, '|');

