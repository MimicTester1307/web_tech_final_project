<?php
$title = "Events";
include "../templates/_header.php";
include "../database_interactions/database_controller.php";


// Fetching the events to be displayed on the page
$events = fetchEvents();

?>

<main>
    <div class="container">
        <!-- Displaying the events -->
        <?php
        foreach ($events as $key => $value) {
            echo '
        <div>
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

                    <button type="button" class="btn btn-primary event-registration-btn" name="register-button" data-bs-toggle="modal" data-bs-target="#event-registration-modal">Register to Watch on Demand</button>
                </div>
            </div>
        </div>
            ';
        }
        ?>
    </div>


    <!-- Modal for Event Registration -->
    <div class="modal fade" id="event-registration-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Register for Event</h5>
                    <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                </div>
                <div class="modal-body">
                    <form>
                        <!-- 2 column grid layout with text inputs for the first and last names -->
                        <div class="row mb-4">
                            <div class="col">
                                <div class="form-outline">
                                    <input type="text" id="event-registration-fName" class="form-control" />
                                    <label class="form-label" for="event-registration-fName">First name</label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-outline">
                                    <input type="text" id="event-registration-lName" class="form-control" />
                                    <label class="form-label" for="event-registration-lName">Last name</label>
                                </div>
                            </div>
                        </div>

                        <!-- Email input -->
                        <div class="form-outline mb-4">
                            <input type="email" id="event-registration-email" class="form-control" />
                            <label class="form-label" for="event-registration-email">Email</label>
                        </div>

                        <!-- Submit button -->
                        <button type="submit" class="btn btn-primary btn-block mb-4">Watch Now</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

</main>

<?php
include "../templates/_footer.php";
?>