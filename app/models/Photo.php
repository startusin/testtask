<?php
namespace app\models;

class Photo extends DBModel {
    function __construct() {
        self::$table = 'photo';
        parent::__construct();
    }

    /**
     * @param int $id
     * @return array|bool|null
     */
    public function info($id) {
        return $this->select(['id' => $id])[0] ?? $this->select(['id' => $id]);
    }
}
