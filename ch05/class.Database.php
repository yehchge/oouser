<?php

/**
 * @desc 資料庫類別
 * @created 2018/09/09
 */

class Database {

	private function __construct(){
		return self::_getConnection();
	}

    public static function instance(){
        static $objDB;

        if(!isset($objDB)){
            $objDB = new Database();
		}
		return $objDB;
    }

    private static function _getConnection() {
		static $hDB;

		if(isset($hDB)) {
			return $hDB;
		}

		$dsn = "mysql:host=localhost;dbname=sample_db;port:3306;charset=utf8";
		try {
			$hDB = new PDO($dsn,'phpuser','phppass',array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8';"));
			$hDB->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		} catch(PDOException $e) {
			echo $e->getMessage();
			die();
			//die("Failure connecting to the database!");
		}catch (Exception $e){
            echo "Could not connect: localhost<br>\n";
            echo $e->getMessage()."<br>\n";
            exit;
        }
		return $hDB;
	}

    public function select($sSql='') {
        if(!$sSql) return array();
		$hDB = self::_getConnection();
		$res = $hDB->prepare($sSql);
		$res->execute();
		if(!$res) {
			die("No data. The query: $sSql<br>\n");
		}

		if($res->rowCount()) {
			$objs = array();
			while($rec = $res->fetch(PDO::FETCH_ASSOC)) {
				$objs[] = $rec;
			}
			return $objs;
		}
        return null;
	}

}
