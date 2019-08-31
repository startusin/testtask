<?php
namespace app\controllers;

use app\models\Photo;
use app\services\CloudService;
use app\services\Templator;

class PhotoController {
    private $cloudService;
    private $photo;
    private $templator;

    function __construct() {
        $this->cloudService = new CloudService();
        $this->photo = new Photo();
        $this->templator = new Templator();
    }

    public function main() {
        $this->templator->render('main/index');
    }

    public function upload() {
        $url = $this->cloudService->uploadPhoto($_POST);

        if (!$url) {
            header('', true, 422);
            die();
        }

        header('Image-URL: ' . $url, true, 200);
        die();
    }
}
