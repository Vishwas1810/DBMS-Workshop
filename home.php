<?php
//including the database connection file
include_once("config.php");

//fetching data in descending order (lastest entry first)
//$result = mysql_query("SELECT * FROM users ORDER BY id DESC"); // mysql_query is deprecated
$result = mysqli_query($mysqli, "SELECT * FROM users ORDER BY id DESC"); // using mysqli_query instead
?>

<html>
    <head>
		<link rel="stylesheet" href="style.css">
		<link rel="stylesheet" href="./font-awesome/css/font-awesome.min.css">
    </head>

    <body>
        <center>
            <h2>Database Data</h2>
            <table class="styled-table">
                <thead>
                    <tr>
                        <td>Name</td>
                        <td>Age</td>
                        <td>Email</td>
                        <td>Update</td>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        //while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array 
                        while($res = mysqli_fetch_array($result)) { 		
                            echo "<tr>";
                            echo "<td>".$res['name']."</td>";
                            echo "<td>".$res['age']."</td>";
                            echo "<td>".$res['email']."</td>";	
                            echo "<td><a href=\"edit.php?id=$res[id]\"><i class=\"fa fa-pencil-square-o\" aria-hidden=\"true\"></i><input type=\"submit\" value=\"Edit\" class=\"edit1\"></a> | 
                                    <a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\"><i class=\"fa fa-trash\" aria-hidden=\"true\"></i><input type=\"submit\" value=\"Delete\" class=\"edit2\"></a></td>";		
                        }
                    ?>
                </tbody>
            </table>

            <a href="add.html" >
                <input type="submit" value="Add New Data" class="btn1">
            </a><br/><br/>
        </center>
    </body>
</html>
