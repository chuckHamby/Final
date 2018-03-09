</doctype html>
    <html>
    <head>
    </head>
    <body>
        <div align="center"><h1><u>Search By Name</u></h1></div>
        <form method="post" enctype="multipart/form-data">
            Search By Name :
            <input type="text" name="Name" required>
            <input type="submit" name="search_name" value="Search">
        </form>
    </body>
    </html>

<?php

include("connection.php");

if(isset($_POST['search_name'])){
    $name = $_POST['Name'];
    $sql = "SELECT employee_name, employee_address, age, language_spoken, is_married FROM employee_data where employee_name like '%$name%'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table border=\"1\" width=\"100%\"><tr><th>Name</th><th>Address</th><th>Age</th><th>Languages</th><th>Married</th></tr>";
        $name_list="";

        while($row = $result->fetch_assoc()) {
            $name_list.="'".$row["employee_name"]."', ";
            echo "<tr><td>".$row["employee_name"]."</td><td>".$row["employee_address"]."</td><td>".$row["age"]."</td><td>".$row["language_spoken"]."</td><td>".$row["is_married"]."</td></tr>";
        }
        $name_list=substr($name_list, 0, -2);
        ?>
        <form method="post">
            <input type="hidden" name="to_delete" value="<?php echo $name_list; ?>">
            <input type="submit" name="delete" value="Delete">
        </form>
        <?php
        echo "</table>";
    } else {
        echo "0 results";
    }
}

if(isset($_POST['delete'])){
    $todelete = $_POST['to_delete'];
    echo $todelete."<br>";
    $sql = "DELETE FROM employee_data WHERE employee_name in ($todelete)";

    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

echo "<br><br><a href='index.php'>Back</a>";
?>