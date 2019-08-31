<?php
namespace app\models;

use app\DB;

class DBModel {
    private $db;
    protected static $table;

    function __construct() {
        $this->db = DB::getInstance();
    }

    /**
     * @param array $where
     * @param array|string $what
     * @return array|bool|null
     */
    protected function select(array $where, $what = '*' ) {
        if (is_array($what)) {
            $what = implode(', ', $what);
        }

        if (is_array($where)) {
            $wherePrepared = '';
            $preparedData = ['1'];

            foreach ($where as $key => $value) {
                $wherePrepared .= 'AND ' . $key . ' = ?';
                $preparedData[] = $value;
            }
        }

        $sth = $this->db->prepare('SELECT ' . $what . ' FROM ' . self::$table . ' WHERE 1 = ? ' . $wherePrepared);
        $sth->execute($preparedData);

        return $sth->fetchAll(\PDO::FETCH_ASSOC);
    }
}
