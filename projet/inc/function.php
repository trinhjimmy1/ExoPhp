<?php

function user_is_connected() {
    if(!empty($_SESSION['user'])) return true;
    return false;
}