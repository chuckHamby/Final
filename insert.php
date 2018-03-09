<?php

$name=$_POST['employee_name'];
$address=$_POST['employee_address'];
$age=$_POST['age'];
//$language=$_POST['language_spoken'];
$married=$_POST['is_married'];

$languages_list="";
foreach ($_POST['language_spoken'] as $selectedOption){
    $languages_list.=$selectedOption.", ";
}
$languages_list=substr($languages_list, 0, -2);

echo "Name: ".$name."<br>";
echo "Address: ".$address."<br>";
echo "Age: ".$age."<br>";
echo "Language: ".$languages_list."<br>";
echo "Marital Status: ".$married."<br>";


include("connection.php");


$sql = "INSERT INTO employee_data (employee_name, employee_address, age, language_spoken, is_married)
VALUES ('$name','$address',$age,'$languages_list','$married')";

if (mysqli_query($conn, $sql)) {
    echo "<br>New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
echo "<br><br><a href='index.php'>Back</a>";
?>