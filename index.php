<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My shop</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container my-5"><!--my-5 is the margin-->
         <h2> List of CLients </h2>
         <a class="btn btn-primary" href="/myshop/create.php" role="button">New Client</a> <!--href give the path to the pg when the new client button is pressed -->
         <a class="btn btn-primary" href="/myshop/search.php" role="button">Search</a>
         <br>
         <table class="table">
         <thead>                <!--Column names -->
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Created At</th>
                <th>Action</th>
            </tr>
         </thead>
         <tbody>

            <?php
            $Servername = "localhost";
            $username = "root";
            $password = "";
            $database = "myshop";

            //Create Connection
            $connection = new mysqli($Servername,$username,$password,$database);

            //Check connection
            if($connection->connect_error){
                die("Connection failed: " . $connection->connect_error);
            }

            //read all the rows from the DB
            $sql = "SELECT * FROM clients";
            $result = $connection->query($sql);

            if(!$result){
                die("Invalid query:" .$connection->error);
            }

           // read data of each row

           while ($row = $result->fetch_assoc()) {
            echo "
            <tr>
                <td>$row[id]</td>
                <td>$row[name]</td>
                <td>$row[email]</td>
                <td>$row[phone]</td>
                <td>$row[address]</td>
                <td>$row[CREATE_At]</td>
                <td>
                    <a class='btn btn-primary btn-sm' href='/myshop/edit.php?id=$row[id]'>Edit</a> <!-- Fix syntax error here -->
                    <a class='btn btn-danger btn-sm' href='/myshop/delete.php?id=$row[id]'>Delete</a> <!-- Fix syntax error here -->
                </td>
            </tr>
            ";
        }

            ?>

           

         </tbody>
         </table>
    </div>
</body>
</html>
