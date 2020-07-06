<?php

if(isset($id_to_edit)){
    echo 'aaaaaa';
    getEdit();
}
function getStatus(){
    include('conexao.php');
	$sql = "SELECT * FROM status;";
	
    $result = $conn->query($sql);
    
	if ($result->num_rows > 0) {
   		// output data of each row
    	while($row = $result->fetch_assoc()) {
            // $msg.="<option value='".$row['id']."'>".$row['description']."</option>";
            $all_data[] = $row;
        }
        
    }
    // var_dump($all_data[0]['statusId']);
    return $all_data;
}

function getPositions(){
    include('conexao.php');
	$sql = "SELECT * FROM position;";
	
    $result = $conn->query($sql);
    
	if ($result->num_rows > 0) {
   		// output data of each row
    	while($row = $result->fetch_assoc()) {
            // $msg.="<option value='".$row['id']."'>".$row['description']."</option>";
            $all_data[] = $row;
        }
        
    }
    // var_dump($all_data[0]['statusId']);
    return $all_data;
}

function getEdit($id_to_edit){
    include('conexao.php');

    $sql = "SELECT name AS a, birthdate AS b, adress AS c, statusId AS d, positionId AS e, created AS f, updated AS h
            FROM employee
            WHERE empolyeeId = ".$id_to_edit.";";

    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        // var_dump($result->num_rows);
        while($row = $result->fetch_assoc()) {
            $ir = array(
                "empolyeeId"=>$id_to_edit,
                "name"=>$row['a'],
                "birthdate"=>$row['b'],
                "adress"=>$row['c'],
                "statusId"=>$row['d'],
                "positionId"=>$row['e'],
                "created"=>$row['f'],
                "updated"=>$row['h']
            );
        }
    }

    return $ir;

}
   
?>