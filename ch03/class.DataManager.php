<?php

require_once('class.Entity.php'); // this will be needed later
require_once('class.Individual.php');
require_once('class.Organization.php');

class DataManager
{
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
		}
		return $hDB;
	}

	public static function getAddressData($addressID) {
		$sql = "SELECT * FROM entityaddress WHERE addressid=$addressID";
		$hDB = DataManager::_getConnection();
		$res = $hDB->prepare($sql);
		$res->execute();
		if(!($res && $res->rowCount())) {
			die("Failed getting address data for address $addressID");
		}

		return $res->fetch(PDO::FETCH_ASSOC);
	}

	public static function getEmailData($emailID) {
		$sql = "SELECT * FROM entityemail WHERE emailid = $emailID";
		$hDB = DataManager::_getConnection();
		$res = $hDB->prepare($sql);
		$res->execute();
		if(!($res && $res->rowCount())) {
			die("Failed getting email data for email $emailID");
		}

		return $res->fetch(PDO::FETCH_ASSOC);
	}

	public static function getPhoneNumberData($phoneID) {
		$sql = "SELECT * FROM entityphone WHERE phoneid = $phoneID";
		$hDB = DataManager::_getConnection();
		$res = $hDB->prepare($sql);
		$res->execute();
		if(!($res && $res->rowCount())) {
			die("Failed getting phone number data for phone $phoneID");
		}

		return $res->fetch(PDO::FETCH_ASSOC);
	}

	public static function getEntityData($entityID) {
		$sql = "SELECT * FROM entities WHERE entityid = $entityID";
		$hDB = DataManager::_getConnection();
		$res = $hDB->prepare($sql);
		$res->execute();		
		if(!($res && $res->rowCount())) {
			die("Failed getting entity $entityID");
		}
		return $res->fetch(PDO::FETCH_ASSOC);
	}

	public static function getAddressObjectForEntity($entityID) {
		$sql = "SELECT addressid FROM entityaddress WHERE entityid = $entityID";
		$hDB = DataManager::_getConnection();
		$res = $hDB->prepare($sql);
		$res->execute();
		if(!$res) {
			die("Failed getting address data for entity $entityID");
		}
		if($res->rowCount()) {
			$objs = array();
			while($rec = $res->fetch(PDO::FETCH_ASSOC)) {
				$objs[] = new Address($rec['addressid']);
			}
			return $objs;
		} else {
			return array();
		}
	}

	public static function getEmailObjectsForEntity($entityID) {
		$sql = "SELECT emailid FROM entityemail WHERE entityid = $entityID";
		$hDB = DataManager::_getConnection();
		$res = $hDB->prepare($sql);
		$res->execute();

		if(!$res) {
			die("Failed getting email data for entity $entityID");
		}

		if ($res->rowCount()) {
			$objs = array();
			while($rec = $res->fetch(PDO::FETCH_ASSOC)) {
				$objs[] = new EmailAddress($rec['emailid']);
			}
			return $objs;
		} else {
			return array();
		}
	}

	public static function getPhoneNumberObjectForEntity($entityID) {
		$sql = "SELECT phoneid FROM entityphone WHERE entityid = $entityID";
		$hDB = DataManager::_getConnection();
		$res = $hDB->prepare($sql);
		$res->execute();
		if(!$res) {
			die("Failed getting phone data for entity $entityID");
		}

		if($res->rowCount()) {
			$objs = array();
			while($rec = $res->fetch(PDO::FETCH_ASSOC)) {
				$objs[] = new PhoneNumber($rec['phoneid']);
			}
			return $objs;
		} else {
			return array();
		}
	}

	public static function getEmployer($individualID) {
		$sql = "SELECT organizationid FROM entityemployee WHERE individualid = $individualID";
		$hDB = DataManager::_getConnection();
		$res = $hDB->prepare($sql);
		$res->execute();
		if(!($res && $res->rowCount())) {
			die("Failed getting employer info for individual $individualID");
		}

		$row = $res->fetch(PDO::FETCH_ASSOC);

		if($row) {
			return new Organization($row['organizationid']);
		} else {
			return null;
		}
	}

	public static function getEmployees($orgID) {
		$sql = "SELECT individualid FROM entityemployee WHERE organizationid = $orgID";
		$hDB = DataManager::_getConnection();
		$res = $hDB->prepare($sql);
		$res->execute();
		if(!$res) {
			die("Failed getting employee info for org $orgID");
		}

		if($res->rowCount()) {
			$objs = array();
			while($row = $res->fetch(PDO::FETCH_ASSOC)) {
				$objs[] = new Individual($row['individualid']);
			}
			return $objs;
		} else {
			return array();
		}
	}

	public static function getAllEntitiesAsObjects() {
		$sql = "SELECT entityid,type FROM entities";
		$hDB = DataManager::_getConnection();
		$res = $hDB->prepare($sql);
		$res->execute();
		
		if(!$res) {
			die("Failed getting all entities");
		}

		if($res->rowCount()) {
			$objs = array();
			while($row = $res->fetch(PDO::FETCH_ASSOC)) {
				if($row['type'] == 'I') {
					$objs[] = new Individual($row['entityid']);
				} else if ($row['type'] == 'O') {
					$objs[] = new Organization($row['entityid']);
				} else {
					die("Unknown entity type {$row['type']} encountered!");
				}
			}
			return $objs;
		} else {
			return array();
		}
	}

}
