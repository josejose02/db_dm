<?php
// Also customer list
include "html/header.html";
include "php/main.php";
include "html/nav.html";


function dvd_list_render(){
    $get_data_sql = "SELECT * FROM DVD;";
    $get_data = run_sql($get_data_sql);

    while($row = $get_data->fetch_assoc()) {
        echo "
            <tr>
                <th scope=\"row\">" . $row["id"] . " </th>
                <td>" . $row["name"] . "</td>
                <td>" . $row["price"] . "</td>
                <td>
                    <div class=\"row\">
                        <div class=\"col-sm\">
                            <a href=\"dvd_update.php?id=". $row["id"]."\" role=\"button\" class=\"btn btn-outline-info btn-block\">Update</a>
                        </div>
                        <div class=\"col-sm\">
                            <form method='post'>
                                <input name=\"customer_list_remove\" type=\"hidden\">
                                <input name=\"id\" value='" . $row["id"] . "' type=\"hidden\">
                                <button type=\"submit\" class=\"btn btn-outline-danger btn-block\">Delete</button>
                            </form>
                        </div>
                    </div>                    
                </td>
            </tr>
            ";
    }
}

if(isset($_POST['customer_list_remove'])) {
    $remove_id = $_POST['id'];
    $remove_data = "DELETE FROM `Customer` WHERE `Customer`.`id` = " . $remove_id;
    run_sql($remove_data);
    echo "<meta http-equiv='refresh' content='0'>";
}

if(isset($_POST['customer_list_update'])) {
    $update_id = $_POST['id'];
    $update_data = "UPDATE `Customer` SET `name`='Test' WHERE `id` = " . $update_id;
    run_sql($update_data);
    echo "<meta http-equiv='refresh' content='0'>";
}
?>


<div class="container">
    <div class="row">
        <div class="col pt-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Customer list data</h5>
                    <table class="table table-striped">
                        <thead class="thead-dark">
                        <tr>
                            <th style="width: 12%">#</th>
                            <th style="width: 50%%">Name</th>
                            <th style="width: 10%">Debt</th>
                            <th style="width: 28%">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        dvd_list_render();
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col pt-4 pb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Add data</h5>
                    <form method="post">
                        <input name="customer_list_add" type="hidden">
                        <div class="form-row">
                            <div class="col">
                                <input type="text" class="form-control" placeholder="Forename" name="forename" required>
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" placeholder="Surname" name="surname" required>
                            </div>
                            <div class="col">
                                <button role="button" type="submit" class="btn btn-outline-info btn-block">Send</button>
                            </div>
                            <?php
                            // customer_list_add()
                            ?>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
