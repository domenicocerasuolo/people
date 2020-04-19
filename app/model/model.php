<?php
/**
 * @Copyright (c) 2020 Domenico Cerasuolo <https://github.com/domenicocerasuolo>.
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program. if not, see <https://www.gnu.org/licenses/>.
 *
 * @author  Domenico Cerasuolo <https://github.com/domenicocerasuolo>
 * @version 1.0
 */



interface iModel
{

    public function autenticazione($login,$password);
  
}



/**
 * @author d.cerasuolo <cerasuolo@santannapisa.it>
 *
 * Classe contenente i metodi che implementano la business logic del Sistema di Valutazione Toscana e Network
 *
 *
 */
class Model implements iModel{

private $database;
private $conn = null;
public  $autore = "D. Cerasuolo";
private static $esito;
private static $_singleton;


private function __construct($db)
{
$this -> database=$db['database'];
try {
$this->conn = new PDO("mysql:host=localhost;dbname=".$this->database,$db['user'], $db['password'],array(PDO::ATTR_PERSISTENT => true));
$this->conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    $encoding = 'utf8';
    $this->conn->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, 'SET NAMES '.$encoding ); //on every re-connect
    $this->conn->exec(' SET NAMES '. $encoding); 
    
} catch (PDOException $e) {
self::$esito=$e->getMessage();
}
}

public function __destruct() {
}

public static function getIstance ($db) {
if (is_null(self::$_singleton)) self::$_singleton = new Model($db);
 return self::$_singleton;
}


public function autenticazione($email,$password)
{
    try {
        $profilo = array();
        $stm = $this->conn->prepare("select id from users where email=:email and password=:password");
        $stm->bindParam(':email', $email);
        $stm->bindParam(':password', $password);
        $stm->execute();
        while ($row = $stm->fetch())
            $profilo = $row;
        return $profilo;
    } catch (Exception $e) {
        $e->getMessage();
        self::$esito = "Failed: " . $e->getMessage();
    }
}



}
?>