<?php
include 'conexao.php';

date_default_timezone_set('Europe/Lisbon');
$op = isset($_POST['op']) ? $_POST['op'] : $_GET['op'];

if ($op == 1){
    $msg = "";
    $val = 0;

    $name=$_POST['name'];
    $birthdate=$_POST['birthdate'];
    $address=$_POST['address'];
    $status=$_POST['status'];
    $position=$_POST['position'];

    $a = date('Y-m-d H:i:s');

    $sql = "INSERT INTO employee (name, birthdate, adress, statusId, positionId, created, updated) 
            values('$name', '$birthdate', '$address', $status, $position, '$a', '$a');";

    if ($conn->query($sql) === TRUE) {
        $msg = "Registo efetuado com sucesso";
        $val = 1;
    }
    else{
        $msg = "ERRO - Falha no registo" . mysqli_error($conn) . "\n";
        $msg .= 'Query: ' . $sql;
    }

    $ir = array(
        "msg"=>$msg,
        "val"=>$val
    );
    echo json_encode($ir);

    // echo json_encode(array("msg"=>$msg,"val"=>$val));
}

else if($op == 2 && isset($_POST['tableSearch'])){
    $msg = 
    "<thead>
            <tr>
                <th>Name</th>
                <th>Age</th>
                <th>Address</th>
                <th>Status</th>
                <th>Position</th>
                <th>Created</th>
                <th>Updated</th>
                <th>Options</th>
            </tr>
    </thead>
    <tbody>";

    $tableSearch=$_POST['tableSearch'];
    
    if ($tableSearch == ""){
        
        $sql = "SELECT empolyeeId as a, NAME as b, birthdate as c, adress as d, status.description as e, position.description as f, created as g, updated as h
                FROM employee, position, status
                WHERE employee.positionId = position.positionId AND employee.statusId = status.statusId;";
    }
    else if ($tableSearch != ""){
                $sql = "SELECT DISTINCT empolyeeId AS a, NAME as b, birthdate as c, adress as d, status.description as e, position.description AS f, created AS g, updated AS h
                FROM employee, position, status
                WHERE 
                employee.positionId = position.positionId AND
                employee.statusId = status.statusId AND
                (name LIKE '%".$tableSearch."%' OR
                adress  LIKE '%".$tableSearch."%' OR
                birthdate LIKE '%".$tableSearch."%' OR
                status.description LIKE '%".$tableSearch."%' OR
                position.description LIKE '%".$tableSearch."%');";
    }

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        // var_dump($result->num_rows);
        while($row = $result->fetch_assoc()) {

            //Calcular idade
            $birthdate = strtotime(explode(' ', $row['c'])[0]); //strtotime converte para segundos
            $now = strtotime(date('Y-m-d'));

            $age = abs($now - $birthdate); 
            $age = floor($age / (365*60*60*24));  //floor arredonda para baixo
            
            // var_dump($age_ms);

            $msg .=
            "<tr>
                <td>".$row['b']."</td>
                <td>".$age."</td>
                <td>".$row['d']."</td>
                <td>".$row['e']."</td>
                <td>".$row['f']."</td>
                <td>".$row['g']."</td>
                <td>".$row['h']."</td>
                <td>
                    <a href='insertCollaborator.php?id_to_edit=".$row['a']."' id='edit_row' class='text-info mr-2' data-id='".$row['a']."'><i class='fas fa-edit'></i></a>
                    <a href='#' id='delete_row' class='text-danger' data-id='".$row['a']."'><i class='fas fa-trash'></i></a>
                </td>
            </tr>";
        }
    }

    $msg .= 
    "</tbody>
        <tfoot>
            <tr>
                <th>Name</th>
                <th>Age</th>
                <th>Address</th>
                <th>Status</th>
                <th>Position</th>
                <th>Created</th>
                <th>Updated</th>
                <th>Options</th>
            </tr>
        </tfoot>";

    $ir = array(
        "msg"=>$msg
    );

    echo(json_encode($ir));
}

else if ($op == 3){
    $msg = "";
    $val = 0;

    $id_to_delete=$_POST['id_to_delete'];

    $sql = "DELETE FROM employee WHERE empolyeeId = ".$id_to_delete.";";
    
    if (mysqli_query($conn, $sql)) {
        $val = 1;
        $msg = "delete feito com sucesso.";
    }else {
        $msg = "error at: ".mysqli_error($conn);
    }

    $ir = array(
        "val"=>$val,
        "msg"=>$msg
    );

    echo json_encode($ir);
}

else if ($op == 4){
    $msg = "";
    $val = 0;

    $empolyeeId=$_POST['empolyeeId'];
    $name=$_POST['name'];
    $birthdate=$_POST['birthdate'];
    $address=$_POST['address'];
    $status=$_POST['status'];
    $position=$_POST['position'];

    $a = date('Y-m-d H:i:s');

    $sql = "UPDATE employee
            SET name = '$name', birthdate = '$birthdate', adress = '$address', statusId = $status, positionId = $position, updated = '$a'
            WHERE empolyeeId = $empolyeeId;";

    if ($conn->query($sql) === TRUE) {
        $msg = "Update efetuado com sucesso";
        $val = 1;
    }
    else{
        $msg = "ERRO - Falha no Update" . mysqli_error($conn) . "\n";
        $msg .= 'Query: ' . $sql;
    }

    $ir = array(
        "msg"=>$msg,
        "val"=>$val
    );
    echo json_encode($ir);
}


?>