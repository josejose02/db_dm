<?php
include  "html/header.html";
include "php/database.php";
include "html/nav.html";

function store_render(){
    $get_data_sql = "SELECT * FROM store;";
    $get_data = run_sql($get_data_sql);

    while($row = $get_data->fetch_assoc()) {
        echo "
            <tr>
                <th scope=\"row\">" . $row["id"] . " </th>
                <td>" . $row["address"] . "</td>
                <td>" . $row["opened_date"] . "</td>
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

if(isset($_POST['customer_list_add'])) {
    $new_address = check_str($_POST['address']);
    $new_date = check_str($_POST['date']);
    $add_data = "INSERT INTO `store` (`id`, `address`, `opened_date`) VALUES (NULL, '"
        . $new_address
        . "', '"
        . $new_date
        . "')";
    if (run_sql($add_data)){
        echo "<meta http-equiv='refresh' content='0'>";
    } else {
        echo "Error";
    }
}

if(isset($_POST['customer_list_remove'])) {
    $remove_id = $_POST['id'];
    $remove_data = "DELETE FROM `store` WHERE `store`.`id` = " . $remove_id;
    run_sql($remove_data);
    echo "<meta http-equiv='refresh' content='0'>";
}

?>

<div class="container">
    <div class="row">
        <div class="col pt-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Store data</h5>
                    <table class="table table-striped">
                        <thead class="thead-dark">
                        <tr>
                            <th style="width: 12%">#</th>
                            <th style="width: 40%%">Address</th>
                            <th style="width: 40%">Open Date</th>
                            <th style="width: 8%">Actions</th>
                            <!--<th style="width: 8%">Actions</th>-->
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        store_render();
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
                                <input type="text" class="form-control" placeholder="Address" name="address" required>
                            </div>
                            <div class="col">
                                <input id="datepicker" type="text" class="form-control" placeholder="Date" name="date" required>
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

<script>
    $(function(){
        $("#datepicker").datepicker({
            dateFormat: "yy-mm-dd"
        });
    });
</script>

<?php
// customer_list_remove
include "html/footer.html"
?>

