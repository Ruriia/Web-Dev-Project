<?php
    require "../admin/action/databasekey.php";

    $key = connection();
    
    $sql = "SELECT * from msdata where nim = ?";
     
    $result = $key->prepare($sql);
    $postnim = [$_POST['student_id']];
    $result->execute($postnim);
    $fetchdata = $result->fetch();

    if($fetchdata['nim'] == $_POST['student_id'] && $fetchdata['email'] == $_POST['email']){
        echo "nim atau email terdaftar!";
    }else{
        echo "nim atau email tidak terdaftar";
    }
    /*$i = 0;
    while($data = $result->fetch()){
        if($data['nim'] == $postnim){
        try{
            
            $sql = "INSERT INTO ticket(email,nim,subject_ticket,question,category,priority) VALUES (?,?,?,?,?,?)";
            $data = [
                $_POST['emailticket'],
                $_POST['student_id'],
                $_POST['subject'],
                $_POST['pertanyaan'],
                $_POST['category'],
                $_POST['inlineRadioOptions']
            ];
        
            $hasil=$key->prepare($sql);
            
            $hasil->execute($data);
            $i = 1;
            break;
            
            }catch(PDOException $e){
                
            }
        } 
    }
    if($i == 0)
        echo "NIM anda tidak terdaftar"; 
    else
        echo "Ticket Berhasil!!";
    */

    


?>