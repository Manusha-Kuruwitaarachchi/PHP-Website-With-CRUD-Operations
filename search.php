\<html>
<head>
    <title>Data Search</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form action="search.php" method="GET">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="search" value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>" placeholder="Search here...">
                        <button type="submit" class="btn btn-primary">Search</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-center">Fetched data</h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Email</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Created At</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $connection = new mysqli("localhost", "root", "", "myshop");

                            if (isset($_GET['search'])) {
                                $filtervalue = $_GET['search'];
                                $filterdata = "SELECT * FROM clients WHERE CONCAT(id, email, name, phone, address, CREATE_At) LIKE '%$filtervalue%'";
                            } else {
                                // If no search is specified, fetch all data
                                $filterdata = "SELECT * FROM clients";
                            }

                            $filterdata_run = mysqli_query($connection, $filterdata);

                            if ($filterdata_run && mysqli_num_rows($filterdata_run) > 0) {
                                foreach ($filterdata_run as $row) {
                                    ?>
                                    <tr>
                                        <td><?php echo $row['id'] ?></td>
                                        <td><?php echo $row['email'] ?></td>
                                        <td><?php echo $row['name'] ?></td>
                                        <td><?php echo $row['phone'] ?></td>
                                        <td><?php echo $row['address'] ?></td>
                                        <td><?php echo $row['CREATE_At'] ?></td>
                                    </tr>
                                    <?php
                                }
                            } else {
                                ?>
                                <tr>
                                    <td colspan="6">No Records Found</td>
                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
