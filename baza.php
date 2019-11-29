<?php
    session_start();

    class Baza{
        private $pdo;
        function __construct(){
            $host = 'localhost';  $db = 'hotel';
            $user = 'root';   $pass = '';
            $charset = 'utf8';
            $dsn = "mysql:host=$host;port=3306;dbname=$db;charset=$charset";
            $options = array(
                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
            );
            try{
                $this->pdo = new PDO($dsn,$user,$pass,$options);
                //echo "Konektovan!";
            }catch(PDOException $e){
                echo "JOK: ".$e->getMessage();
            }
        }
        function selectQuery($sql, $tip = PDO::FETCH_ASSOC){
            $podaci = $this->pdo->query($sql);
            if($podaci === FALSE)
                die("LOŠ SQL!");
            return $podaci->fetchAll($tip);
        }
        function selectPrepare($sql, $niz_vr, $tip = true){
            $stmt=$this->pdo->prepare($sql);
            $rez = $stmt->execute($niz_vr);
            if($tip == true){
                $niz=$stmt->fetchAll(PDO::FETCH_ASSOC);
                return $niz;
            }else{
                return $rez;
            }
        }
        function getLastId(){
            return $this->pdo->lastInsertId(); 
        }
        function slike($tip){
            return $this->selectPrepare("SELECT * FROM room_imgs WHERE room_info_id=?", array($tip));
        }

        function naslovi($t){
            return $this->selectPrepare("SELECT type, description FROM room_info WHERE id=?" , array($t));
        }

        function roomPics($tri){
            return $this->selectPrepare("SELECT * FROM room_imgs WHERE room_info_id=?", array($tri));
        }

        function podaci_soba(){
            return $this->selectQuery("SELECT RI.*, min(R.price) as price, RS.img as img FROM (`room_info` AS RI INNER JOIN rooms AS R ON R.room_info_id=RI.id) INNER JOIN room_imgs AS RS ON RS.room_info_id=RI.id GROUP BY RI.id");
        }
        
        function check_room_availability($d1, $d2, $bg, $tip){
            $dDiff = floor(abs(strtotime($d2->format("Y-m-d")) - strtotime($d1->format("Y-m-d")))/ (60*60*24));  
            $sql = "SELECT distinct room_info_id, type, ";
            $cf = "$bg"; if($bg == 2) $cf = "1.5"; if($bg == 3) $cf = "1.8"; 
            $sql .= "cast(price*$cf*$dDiff as decimal(11,2)) AS price, R.description AS description "; 
            $sql .= "FROM `rooms` AS R LEFT JOIN room_info AS RI ON R.room_info_id=RI.id WHERE R.id NOT IN (SELECT room_id from reservations where ";
            $d = $d1->format("Y-m-d");
            $dp = $d1->modify('+1 day');
            $sql .= "('$d' BETWEEN check_in AND check_out) ";
            for($i = $dp; $i < $d2; $i->modify('+1 day')){
                $d = $i->format("Y-m-d");
                $sql .= "AND ('$d' BETWEEN check_in AND check_out) ";
            }
            $sql .= ") ";
            if($tip !== '')
                $sql .= "AND room_info_id=$tip ";
            $sql .= "ORDER BY room_info_id";
            return $this->selectQuery($sql);
        }

        function reserve_a_room($podaci){
            $sql = "SELECT R.id AS room_number "; 
            $sql .= "FROM `rooms` AS R LEFT JOIN room_info AS RI ON R.room_info_id=RI.id WHERE R.id NOT IN (SELECT room_id from reservations where ";
            $sd1 = $podaci->d1->format("Y-m-d");
            $sd2 = $podaci->d2->format("Y-m-d");
            $d = $podaci->d1->format("Y-m-d");
            $sql .= "('$d' BETWEEN check_in AND check_out) ";
            for($i = $podaci->d1->modify('+1 day'); $i < $podaci->d2; $i->modify('+1 day')){
                $d = $i->format("Y-m-d");
                $sql .= "AND ('$d' BETWEEN check_in AND check_out) ";
            }
            $sql .= ") AND R.room_info_id=".$podaci->rid." AND R.description LIKE '".$podaci->d."' ";
            $sql .= "LIMIT 1";
            $rez = $this->selectQuery($sql);
            $rid = $rez[0]['room_number'] ?? '';
            //return $sql." = ".$rid;

            if($rid == ''){
                return ['success'=>false,  'msg'=>'Reservation not successeful, please try again'];
            }else{
                $sql = "INSERT INTO `reservations`(`room_id`, `guests`, `check_in`, `check_out`, `user_id`, `rate`, price) VALUES (?,?,?,?,?,?,?)";
                $rez=$this->selectPrepare($sql, [$rid, $podaci->bg, $sd1, $sd2, $_SESSION['user'], 0, $podaci->p], false);
                if ($rez==true)
                return ['success'=>true];
                else 
                return ['success'=>false,  'msg'=>'Reservation not successeful, please try again'];
            }
        }

        function novi_korisnik($p1, $p2, $p3, $p4, $p5, $p6, $p7, $p8, $p9, $p10){
            $sql = "INSERT INTO `users`(`name`, `surname`, `personal_id`, `address`, `city`, `country`, `pass`, `email`, `tel`, `user_type`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            return $this->selectPrepare($sql, [$p1, $p2, $p3, $p4, $p5, $p6, $p7, $p8, $p9, $p10], false);
        }
        function loggedin($email, $pass){
            return $this->selectPrepare("SELECT id, user_type FROM users WHERE email=? AND pass=?", [$email, $pass]);
            
        }
        function subscribe($email){
            $sql="INSERT INTO `mailing_list`(`mail`, `deleted`) VALUES (?,?)";
            return $this->selectPrepare($sql, [$email, false], false);

        }
        function your_reservations(){
            return $this->selectPrepare("SELECT RES.id as id, RES.`check_in` AS d1, RES.`check_out` AS d2, RID.`type` AS type, R.`description` AS description, RES.`guests` AS guests, RES.price AS price FROM (reservations AS RES LEFT JOIN rooms AS R ON RES.room_id=R.id) LEFT JOIN room_info AS RID ON R.room_info_id=RID.id WHERE RES.user_id=?", array($_SESSION['user']));
        }
        function del_reservation($id){
            $sql="DELETE FROM reservations WHERE id=?";
            return $this->selectPrepare($sql, [$id], false);
        }
    }
    $db = new Baza();

  
    
?>