<?php
session_start();
$is_auth = isset($_SESSION["name"]);

if ($is_auth == 1) {
    $user_name = $_SESSION["name"];
    $user_id = $_SESSION["id"];
} else {
    $user_name = '';
    $user_id = '';
}
