<?php
    include "baza.php";
    $podaci = json_decode(file_get_contents("php://input")); 

    if (!isset($_SESSION['user'])) {
        die( json_encode(['success'=>false, 'msg'=>'Please login first!']) );
    }

    if($podaci->tip == 'obrisi'){
        $rez = $db->del_reservation($podaci->id);
        if($rez == true)
            echo json_encode(['success'=>true]);
        else
            echo json_encode(['success'=>false, 'msg'=>'Can\'t cancel, please call us!']);

        exit;
    }

    if($podaci->tip == 'unesi'){
        $podaci->d1 = new DateTime($podaci->d1);
        $podaci->d2 = new DateTime($podaci->d2);
        
        $rez = $db->reserve_a_room($podaci);
        echo json_encode($rez);
    }