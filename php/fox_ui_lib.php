<?php


/* 
 * Some kind of library to show gui elements
 */

// Function to display messages
function display_alert($msg,$icon){
    echo '<p class="has-error">';
    echo $icon;
    echo $msg;
    echo "</p>";
}