<?php
require_once("helpers.php");
require_once("functions.php");
require_once("data.php");
require_once("init.php");
require_once("models.php");




if (!$con) {
    $error = mysqli_connect_error();
} else {
    $sql = "SELECT character_code, name_category FROM categories";
    $result = mysqli_query($con, $sql);
    if ($result) {
        $categories = mysqli_fetch_all($result, MYSQLI_ASSOC);
    } else {
        $error = mysqli_error($con);
    }
}

$sql = get_query_list_lots('2021-07-15');

$res = mysqli_query($con, $sql);
if ($res) {
    $goods = mysqli_fetch_all($res, MYSQLI_ASSOC);
} else {
    $error = mysqli_error($con);
}

$page_content = include_template("main.php", [
    "categories" => $categories,
    "goods" => $goods
]);
$layout_content = include_template("layout.php", [
    "content" => $page_content,
    "categories" => $categories,
    "title" => "Главная",
    "is_auth" => $is_auth,
    "user_name" => $user_name
]);

print($layout_content);


// Лайф-7
// Cookies
// $name = "visitcount";
// $value = 1;
// $expire = "Mon, 25-Jan-2027 10:00:00 GMT";
// $path = "/";

// setcookie($name, $value, $expire, $path);

// if (isset($_COOKIE['visitcount'])) {
//     print($_COOKIE['visitcount']);
// }
// Fatal error: Uncaught TypeError: setcookie(): Argument 
#3 ($expires_or_options) must be of type array|int, string given in C:\OpenServer\domains\yeticave-htmlacademy\index.php:54 Stack trace: #0 C:\OpenServer\domains\yeticave-htmlacademy\index.php(54): setcookie() #1 {main} thrown in C:\OpenServer\domains\yeticave-htmlacademy\index.php on line 54
