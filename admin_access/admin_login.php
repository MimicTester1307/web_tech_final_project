<?php
session_start();
include "../templates/_header.php";
include "../validation/admin_signin_validate.php";
?>

<div class="container" style="height: 100%; width:600px;">
    <form method="POST">
        <!-- Email input -->
        <div class="form-outline mb-4">
            <input type="email" name="adminLoginEmail" id="admin-Login-Email" class="form-control" required />
            <label class="form-label" for="admin-Login-Email">Email address</label>
        </div>

        <!-- Password input, includes regex for password patern recognition-->
        <div class="form-outline mb-4">
            <input type="password" name="adminLoginPassword" id="admin-Login-Password" class="form-control" required />
            <label class=" form-label" for="admin-Login-Password">Password</label>
        </div>

        <!-- 2 column grid layout for inline styling -->
        <div class="row mb-4">
            <div class="col d-flex justify-content-start">
                <!-- Checkbox -->
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="form1Example3" />
                    <label class="form-check-label" for="form1Example3"> Remember me </label>
                </div>
            </div>

            <div class="col">
                <!-- Simple link -->
                <a href="#">Forgot password?</a>
            </div>
        </div>

        <!-- Submit button -->
        <button type="submit" class="btn btn-primary col-12 mx-auto" name="adminSignInButton">Sign in</button>
    </form>
</div>
<?php
include "../templates/_admin_footer.php";
