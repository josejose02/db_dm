<?php
include  "html/header.html";
include "php/database.php";
include "html/nav.html";

function customer_list_render(){
    $get_data_sql = "SELECT * FROM employee;";
    $get_data = run_sql($get_data_sql);

    while($row = $get_data->fetch_assoc()) {
        echo "
            <tr>
                <th scope=\"row\">" . $row["id"] . " </th>
                <td>" . $row["forename"] . "</td>
                <td>" . $row["surname"] . "</td>
                <td>" . $row["job_name"] . "</td>
                <td>
                    <form method='post'>
                        <input name=\"customer_list_remove\" type=\"hidden\">
                        <input name=\"id\" value='" . $row["id"] . "' type=\"hidden\">
                        <button type=\"submit\" class=\"btn btn-outline-danger\">Delete</button>
                    </form>
                </td>
            </tr>";
    }
}


if(isset($_POST['employee_add'])) {
    $new_forename = check_str($_POST['forename']);
    $new_surname = check_str($_POST['surname']);
    $new_job_title = check_str($_POST['job_title']);
    " 'T', 'T', 'T', NULL);";
    $add_data = "INSERT INTO `employee` (`id`, `forename`, `surname`, `job_name`, `store_id`) VALUES (NULL,'"
        . $new_forename
        . "', '"
        . $new_surname
        . "','"
        . $new_job_title
        ."', NULL
        )";
    run_sql($add_data);
    echo "<meta http-equiv='refresh' content='0'>";
}

if(isset($_POST['customer_list_remove'])) {
    $remove_id = $_POST['id'];
    $remove_data = "DELETE FROM `employee` WHERE `employee`.`id` = " . $remove_id;
    run_sql($remove_data);
    echo "<meta http-equiv='refresh' content='0'>";
}

?>

<div class="container">
    <div class="row">
        <div class="col pt-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Employee data</h5>
                    <table class="table table-striped">
                        <thead class="thead-dark">
                        <tr>
                            <th style="width: 12%">#</th>
                            <th style="width: 25%%">Forename</th>
                            <th style="width: 25%">Surname</th>
                            <th style="width: 30%">Job Title</th>
                            <th style="width: 8%">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        customer_list_render();
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
                        <input name="employee_add" type="hidden">
                        <div class="form-row">
                            <div class="col">
                                <input type="text" class="form-control" placeholder="Forename" name="forename" required>
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" placeholder="Surname" name="surname" required>
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" placeholder="Job Title" name="job_title" required>
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

<?php
// customer_list_remove
include "html/footer.html"
?>

