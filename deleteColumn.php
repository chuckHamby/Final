<?php

    include_once "connection.php";
    $con=mysqli_connect("localhost","root","mysql","company_db");

    $id = $_GET['id'];

    $sql = "DELETE FROM employee_data WHERE id=$id";

    try{
        $result = mysqli_query($con,$sql);
    }
    catch(Exception $ex){
        print $ex;
        return false;
    }

    echo "<H3>Employee ID: $id has been deleted.</H3>";
    echo "Click <a href='home.php'>HERE</a> to return to home."
?>