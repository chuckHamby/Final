<?php
include_once "include/header.php";
?>

<!doctype html>
    <html>
    <head>
    </head>
    <body>
        <form method="post" action="insert.php">
            <table border="0">
                <tr>
                    <td>Employee Name:</td>
                    <td><input type="text" name="employee_name" required /><br></td>
                </tr>
                <tr>
                    <td>Address:</td>
                    <td><textarea name="employee_address" required></textarea></td>
                </tr>
                <tr>
                    <td>Age:</td>
                    <td><input type="number" name="age" min="16" required><br></td>
                </tr>
                <tr>
                    <td>Language:</td>
                    <td>
                        <select name="language_spoken[]" multiple required>
                            <option value="English">English</option>
                            <option value="Spanish">Spanish</option>
                            <option value="French">French</option>
                        </select><br>
                    </td>
                </tr>
                <tr>
                    <td>Marital Status: </td>
                    <td>
                        <input type="radio" name="is_married" value="1" required> Married<br>
                        <input type="radio" name="is_married" value="0" required> Single<br><br>
                    </td>
                </tr>
            </table>
            <input type="submit" name="submit" value="Submit">
        </form>
        <br>
        <a href="searchByName.php"><button>Search By Name</button></a>
        <a href="searchByLanguage.php"><button>Search By Language</button></a>
    </body>
</html>

<?php
include_once "include/footer.php";
?>