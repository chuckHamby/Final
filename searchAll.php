</doctype html>
<html>
<head>
</head>
<body>
<div align="center"><h1><u>Search By Language</u></h1></div>
<form method="post" enctype="multipart/form-data">
    Search By Language :
    <input type="text" name="language" required>
    <input type="submit" name="search_name" value="Search">
</form>
</body>
</html>

<?php

include("connection.php");

if(isset($_POST['search_name'])){
    $language = $_POST['language'];
    $sql = "SELECT * FROM employee_data";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table border=\"1\" width=\"100%\">
                <tr> <th>ID</th>
                <th>Name</th>
                <th>Address</th>
                <th>Age</th>
                <th>Languages</th>
                <th>Married</th></tr>";
        $language_list="";
        while($row = $result->fetch_assoc()) {
            $language_list.="'".$row["language_spoken"]."', ";

            $id = $row["id"];

            echo "<tr>
                    <td>{$id}</td>
                    <td>".$row["employee_name"]."</td>
                    <td>".$row["employee_address"]."</td>
                    <td>".$row["age"]."</td>
                    <td>".$row["language_spoken"]."</td>
                    <td>".$row["is_married"]."</td>
                    <td><a href='deleteColumn.php?id={$id}'>Delete</a></td>
                 </tr>";
        }
        $language_list=substr($language_list, 0, -2);
        ?>
        <form method="post">
            <input type="hidden" name="to_delete" value="<?php echo $language_list; ?>">
        </form>
        <?php
        echo "</table>";
    } else {
        echo "0 results";
    }
}

echo "<br><br><a href='index.php'>Back</a>";
?>