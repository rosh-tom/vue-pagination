<?php 
        session_start();
       require_once('../database/connection.php');

       $received_data = json_decode(file_get_contents("php://input"));

       $data = array();

       if($received_data->action == 'fetchDatas'){

        $numberPerPage = $received_data->ax_numberPerPage;
        $page = $received_data->ax_page;
        $sqlQuery = "select * from tbl_datas";
        $result = $conn->query($sqlQuery);
        $numberOfDatas = $result->num_rows;

        $numberOfPages = ceil($numberOfDatas/$numberPerPage);      
        $data  = [
            'numberOfPages' =>  $numberOfPages
        ];  

        $pageResult = ($page-1)*$numberPerPage; 

        $sqlQuery = "select * from tbl_datas order by id limit ". $pageResult .", ". $numberPerPage;
        $result = $conn->query($sqlQuery);

        while ($row = $result->fetch_assoc()) {
            $data ['datas'][] = $row;
        } 
           echo json_encode($data);
       }




?>