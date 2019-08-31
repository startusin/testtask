<?php
namespace app\services;

class Templator {
    public function render($name) {
        print(file_get_contents('templates/' . $name . '.phtml'));
        die();
    }
}
