<?php
global $sparta;
if(!isset($sparta['menu_layout'])) {
    require 'layouts/1.php';
} else {
    require 'layouts/'.$sparta['menu_layout'].'.php';
}