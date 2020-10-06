<?php 
    session_start();
    require_once('../database/connection.php');

    if(isset($_POST['btn_save'])){
        $data = array(
            'firstname' => $_POST['firstname'],
            'lastname' => $_POST['lastname']
        );

        $sqlQuery = "insert into tbl_datas (firstname, lastname) 
                    values('". $data['firstname'] ."', '". $data['lastname'] ."')";
        if($conn->query($sqlQuery) === true){
            $_SESSION['message'] = "successfully added";
        }else{
            $_SESSION['message'] = $conn->error;
        }
        header("location: ../index.php");
        
    }

?>