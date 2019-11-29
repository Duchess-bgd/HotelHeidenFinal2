<?php
    session_start();
    
    class Baza{

        private $pdo;

        function __construct()
        {
            $host = 'localhost';  $db = 'hotel';
            $user = 'root';   $pass = '';
            $charset = 'utf8mb4';
            $dsn = "mysql:host=$host;port=3306;dbname=$db;charset=$charset";
            $options = array(
                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
            );

            try{
                $this->pdo = new PDO($dsn,$user,$pass,$options);
                //Uspešna konekcija
            }
            catch(PDOException $e)
            {
                echo "Could not connect: ".$e->getMessage();
            }
        }
        function selectQuery($sql, $tip = PDO::FETCH_ASSOC)
        {
            $podaci = $this->pdo->query($sql);
            if($podaci === FALSE) die("Bad SQL!");
            return $podaci->fetchAll($tip);
        }

        function selectPrepareFetchAll($sql, $niz_vr)
        {
            $stmt=$this->pdo->prepare($sql);
            $stmt->execute($niz_vr);
            $niz=$stmt->fetchAll(PDO::FETCH_ASSOC);
            return $niz;
        }

        function selectPrepareFetch($sql, $niz_vr)
        {
            $stmt=$this->pdo->prepare($sql);
            $stmt->execute($niz_vr);
            $niz=$stmt->fetch(PDO::FETCH_ASSOC);
            return $niz;
        }
        function isAdmin(){
            if (isset($_SESSION['user']) && $_SESSION['user_type'] == '1' ) {
                return true;
            }else{
                return false;
            }
        }
      
      
       
        function svi_korisnici()
        {
            return $this->selectQuery("SELECT * FROM users");
        }
        function sve_sobe()
        {
            return $this->selectQuery(
                "SELECT *,r.id,r.description AS view,r.price,ri.type,ri.description FROM rooms r 
                 JOIN room_info ri
                 ON r.room_info_id=ri.id"
            );
        }


        public function edit_sobe($id){
            $query = "SELECT rooms.id as rid, 
                    rooms.price, 
                    rooms.description AS view,
                    room_info.type,
                    room_info.description,
                    room_info.id AS ri_id,
                    rooms.room_info_id AS room_rid
                FROM rooms JOIN room_info ON rooms.room_info_id = room_info.id 
                WHERE rooms.id =:id";

            return $this->selectPrepareFetch($query, ['id' => $id]);
        }

        public function izmeni($id, $roomNo, $roomtype, $view, $roomsPrice){
            $query = "UPDATE rooms SET 
                            id = :roomNo, 
                            room_info_id = :roomtype, 
                            description = :view, 
                            price = :roomsPrice 
                            WHERE id = :id";
            $stmt = $this->pdo->prepare($query);
            $stmt->execute([
                'roomNo' => $roomNo, 
                'roomtype'=> $roomtype, 
                'view' => $view, 
                'roomsPrice' => $roomsPrice, 
                'id' => $id]);
            
            $stmt 
                ? header('Location: ../rooms.php') 
                : header('Location: ../rooms.php?id=$id');
        }

        public function dodajSobu($roomNo, $roomtype, $view, $roomsPrice){
            $query = "INSERT INTO rooms (id, room_info_id, description, price) VALUES (:roomNo, :roomtype, :view, :roomsPrice);";
            $stmt = $this->pdo->prepare($query);
            $stmt->execute([
                'roomNo' => $roomNo, 
                'roomtype'=> $roomtype, 
                'view' => $view, 
                'roomsPrice' => $roomsPrice 
                ]);
            if ($stmt) 
                header('Location: rooms.php');
        }

        public function obrisiSobu($id){
            $query = "DELETE FROM rooms WHERE id = :id LIMIT 1";
            $stmt = $this->pdo->prepare($query);
            $stmt->execute(['id' => $id]);

            if ($stmt) 
                header('Location: rooms.php');
        }

        public function sviOpisi(){
            return $this->selectPrepareFetchAll("SELECT * FROM room_info", []);
        }
        public function sveKategorije(){
            return $this->selectPrepareFetchAll("SELECT id, type FROM room_info", []);
        }

        public function izmeniKategoriju($id){
            return $this->selectPrepareFetch("SELECT * FROM room_info WHERE id =:id" , ['id' => $id]);
        }

        public function promeniOpisKategorije($id, $opis){
            $query = "UPDATE room_info SET description = :opis WHERE id = :id";
            $stmt = $this->pdo->prepare($query);
            $stmt->execute(['opis' => $opis, 'id' => $id]);
            
            if($stmt) header('Location: ../opisSoba.php');
        }

        public function dodajKategoriju($type, $description){
            echo $query = "INSERT INTO room_info (type, description) VALUES (:type, :description)";
            $stmt = $this->pdo->prepare($query);
            echo $stmt->execute([ 'type' => $type, 'description'=> $description ]);
            if ($stmt) 
                header('Location: opisSoba.php');
        }

        public function obrisiKategoriju($id){
            $query = "DELETE FROM room_info WHERE id = :id LIMIT 1";
            $stmt = $this->pdo->prepare($query);
            $stmt->execute(['id' => $id]);

            if ($stmt) 
                header('Location: opisSoba.php');
        }


        public function selectKorisnika($id){
            return $this->selectPrepareFetch("SELECT * FROM users WHERE id =:id" , ['id' => $id]);
        }

        public function snimiKorisnika($id, $user_type, $name, $surname, $personal_id, $address, $city, $email, $tel){
            $query = "UPDATE users SET 
                            user_type = :user_type, 
                            name = :name, 
                            surname = :surname, 
                            personal_id = :personal_id, 
                            address = :address, 
                            city = :city, 
                            email = :email, 
                            tel = :tel 
                            WHERE id = :id";
            $stmt = $this->pdo->prepare($query);
            $stmt->execute([
                'id' => $id,
                'user_type' => $user_type, 
                'name'=> $name, 
                'surname' => $surname, 
                'personal_id' => $personal_id, 
                'address' => $address, 
                'city' => $city, 
                'email' => $email, 
                'tel' => $tel 
                ]);
            $stmt 
                ? header('Location: ../index.php') 
                : header('Location: ../izmenaKorisnika.php?id=$id');   
        }

        public function obrisiKorisnika($id){
            $query = "DELETE FROM users WHERE id = :id LIMIT 1";
            $stmt = $this->pdo->prepare($query);
            $stmt->execute(['id' => $id]);

            if ($stmt) 
                header('Location: index.php');
        }

        public function sveRezervacije(){
            return $this->selectPrepareFetchAll("SELECT
                        rooms.id AS br_sobe,
                        room_info.type AS type,
                        users.name AS name,
                        users.surname AS surname,
                        users.personal_id AS personal_id,
                        users.country AS country,
                        users.email AS email,
                        reservations.id AS id,
                        reservations.price AS price,
                        reservations.guests AS guests,
                        reservations.check_in AS check_in,
                        reservations.check_out AS check_out
                    FROM
                        reservations
                    LEFT JOIN users ON reservations.user_id = users.id
                    LEFT JOIN rooms ON reservations.room_id = rooms.id
                    LEFT JOIN room_info ON rooms.room_info_id = room_info.id", []);
        }



        public function obrisiRezervaciju($id){
            $query = "DELETE FROM reservations WHERE id = :id LIMIT 1";
            $stmt = $this->pdo->prepare($query);
            $stmt->execute(['id' => $id]);

            if ($stmt) 
                header('Location: reservations.php');
        }

        function svi_newsUser()
        {
            return $this->selectQuery("SELECT * FROM mailing_list");
        }
 
 
        public function selectNewsUser($id){
      
            return $this->selectPrepareFetch("SELECT * FROM mailing_list WHERE id =:id" , ['id' => $id]);
        }

        public function snimiNewsUser($id, $mail){
            $query = "UPDATE mailing_list SET 
                            mail = :mail, 
                           
                            WHERE id = :id";
            $stmt = $this->pdo->prepare($query);
            $stmt->execute([
                'id' => $id,
                'mail' => $mail, 
                ]);
            $stmt 
                ? header('Location: ../NewsLetterUsers.php') 
                : header('Location: ../izmeniNewsLetterUsers.php?id=$id');   
        }

        public function obrisiNewsUser($id){
            $query = "DELETE FROM mailing_list WHERE id = :id LIMIT 1";
            $stmt = $this->pdo->prepare($query);
            $stmt->execute(['id' => $id]);

            if ($stmt) 
                header('Location: NewsLetterUsers.php');
        }


 }

    $db = new Baza();
    if(!$db->isAdmin()){
        die('Restricted area. Please <a href="../register.php">LOGIN</a>'.$_SESSION['user'].$_SESSION['user_type']);
    }
