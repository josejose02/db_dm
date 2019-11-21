<?php
include  "html/header.html";
include "php/main.php";
include "html/nav.html";

function main(){
    $id = $_GET['id'];

    if(!$id){
        echo "<h1> 404 - Not found </h1>";
    }
    else {
        $get_data_sql = "SELECT * FROM Customer WHERE id=" . $id . ";";
        $get_data = run_sql($get_data_sql);

        while ($row = $get_data->fetch_assoc()) {
            echo "
            <form method='post'>
                <div class=\"input-group mb-3\">
                  <div class=\"input-group-prepend\">
                    <label class=\"input-group-text\"> Name </label>
                  </div>
                  <input type=\"text\" class=\"form-control\"  value=\"" . $row['name'] ."\"  >
                    <div class=\"input-group-append\">
                        <button class=\"btn btn-outline-secondary\" type=\"button\" id=\"button-addon2\">Update</button>
                    </div>
                </div>
            </form>
            
            <form method='post'>
                <div class=\"input-group mb-3\">
                  <div class=\"input-group-prepend\">
                    <label class=\"input-group-text\">Address</label>
                  </div>
                  <input type=\"text\" class=\"form-control\" value=\"" . $row['address'] ."\" >
                    <div class=\"input-group-append\">
                        <button class=\"btn btn-outline-secondary\" type=\"button\" id=\"button-addon2\">Update</button>
                    </div>
                </div>
            </form>
                
            <form method='post'>
                <div class=\"input-group mb-3\">
                  <div class=\"input-group-prepend\">
                    <label class=\"input-group-text\">Debt</label>
                  </div>
                  <input type=\"text\" class=\"form-control\" value=\"" . $row['debt'] ."\" >
                    <div class=\"input-group-append\">
                        <button class=\"btn btn-outline-secondary\" type=\"button\" id=\"button-addon2\">Update</button>
                    </div>
                </div>
            </form>
            ";
        }
    }
}

?>

<main role="main" class="container pt-4">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Update customer</h5>
            <?php main(); ?>
        </div>
    </div>
</main>

