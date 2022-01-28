<?php
spl_autoload_register(function ($class) {

    // project-specific namespace prefix
    $prefix = '';

    // base directory for the namespace prefix
    $base_dir = __DIR__ . '/';

    // does the class use the namespace prefix?
    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) {
        // no, move to the next registered autoloader
        return;
    }

    // get the relative class name
    $relative_class = substr($class, $len);

    // replace the namespace prefix with the base directory, replace namespace
    // separators with directory separators in the relative class name, append
    // with .php
    $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';
    // if the file exists, require it
    if (file_exists($file)) {
        require $file;
    }
});
use Pizza\PizzaProduct;
require "db.php";

if(isset($_POST["sauce"]) && isset($_POST["size"]) && isset($_POST["variety"])){
    $sauce = filter_var($_POST['sauce'],
        FILTER_SANITIZE_STRING);
    $size = filter_var($_POST['size'],
        FILTER_SANITIZE_STRING);
    $variety = filter_var($_POST['variety'],
        FILTER_SANITIZE_STRING);
    $pizza = new PizzaProduct($variety, $size, $sauce, $conn);
    echo json_encode(["type" => $pizza->getName(), "size"=>$pizza->getSize(), "sauce"=>$pizza->getSauce(),
        "price"=>$pizza->getPizzaTotalPrice(), "created"=>$pizza->created_at],JSON_UNESCAPED_UNICODE);
}
exit;