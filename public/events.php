<?php
$title = "Events";
include "../templates/_header.php";
include "../database_interactions/database_controller.php";


// Fetching the events to be displayed on the page
$events = fetchEvents();
// print_r($events);
?>

<main>
    <?php
    foreach ($events as $key => $value) {
        echo '
        <div class="container">
            <div class="card mb-4" height="200px;">
                <img src="../assets/event.jpg" class="card-img-top" alt="Wild Landscape" />
                <div class="card-body">
                    <h5 class="card-title">' . $value["event_name"] . '</h5>
                    <p class="card-text">
                        ' . $value["event_date"] . ' CET
                    </p>
                    <p class="card-text">
                        <small class="text-muted">' . $value["event_speakers"] . '</small>
                    </p>

                    <button type="button" class="btn btn-primary" name="register-button">Register to Watch on Demand</button>
                </div>
            </div>
        </div>
            ';
    }
    ?>

</main>

<?php
include "../templates/_footer.php";
?>