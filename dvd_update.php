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
        $get_data_sql = "SELECT * FROM DVD WHERE id=" . $id . ";";
        $get_data = run_sql($get_data_sql);

        while ($row = $get_data->fetch_assoc()) {
            echo "
                <div class=\"input-group mb-3\">
                  <div class=\"input-group-prepend\">
                    <label class=\"input-group-text\"> Name </label>
                  </div>
                  <input type=\"text\" class=\"form-control\"  value=\"" . $row['name'] ."\"  >
                    <div class=\"input-group-append\">
                        <button class=\"btn btn-outline-secondary\" type=\"button\" id=\"button-addon2\">Update</button>
                    </div>
                </div>
                
                <div class=\"input-group mb-3\">
                  <div class=\"input-group-prepend\">
                    <label class=\"input-group-text\">Price</label>
                  </div>
                  <input type=\"text\" class=\"form-control\" value=\"" . $row['price'] ."\" >
                    <div class=\"input-group-append\">
                        <button class=\"btn btn-outline-secondary\" type=\"button\" id=\"button-addon2\">Update</button>
                    </div>
                </div>
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

