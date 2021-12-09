<?php

$title = "Products";
include "../templates/_header.php";
include "../database_interactions/database_controller.php";

// Fetching the products to be displayed on the page
$products = fetchProducts();
// print_r($products);
?>


<main>
    <!-- <h3 class="ms-2 titlecard text-center mt-3 mb-3">All Products</h3> -->

    <?php
    foreach ($products as $key => $value) {
        echo '
                    <section>
                        <div class="card mb-3 ms-5 me-5" style="max-width: 100%;">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img src="../database_interactions/' . $value["product_image"] . '" class="img-fluid rounded-start" alt="...">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">' . $value["product_name"] . '</h5>
                                        <p class="card-text">' . $value["product_description"] . '</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                ';
    }
    ?>

</main>

<?php
include "../templates/_footer.php";
?>