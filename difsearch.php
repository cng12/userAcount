<?php

if(isset($_POST['search']))
{
   $valueToSearch = $_POST['valueToSearch'];
    // search in all table columns
    // using concat mysql function
   $query = "SELECT * FROM `myguests` WHERE CONCAT(`id`, `firstname`, `lastname`, `school`) LIKE '%".$valueToSearch."%'";
   $search_result = filterTable($query);
    
}
 else {
    $query = "SELECT * FROM `myguests`";
    $search_result = filterTable($query);
}

// function to connect and execute the query
function filterTable($query)
{
    $connect = mysqli_connect("localhost", "root", "", "mydb");
    $filter_Result = mysqli_query($connect, $query);
    return $filter_Result;
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title>PHP HTML TABLE DATA SEARCH</title>
        <style>
            table,tr,th,td
            {
                border: 1px solid black;
            }
        </style>
    </head>
    <body>
<form action="difsearch.php" method="post" style="width:600px; background-color:#ccffcc">
            <input type="text" name="valueToSearch" placeholder="Value To Search"><br><br>
            <input type="submit" name="search" value="Filter">
            <button type="button" onclick="window.location.href='submit.php'">Add a new member</button>
<br><br>
            <table>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Age</th>
                </tr>

      <!-- populate table from mysql database -->
                <?php while($row = mysqli_fetch_array($search_result)):?>
				                <tr>
                    <td><?php echo $row['firstname'];?></td>
                    <td><?php echo $row['lastname'];?></td>
                    <td><?php echo $row['school'];?></td>
                </tr>
                <?php endwhile;?>
            </table>
        </form>
    </body>
</html>
