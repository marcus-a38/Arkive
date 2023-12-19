<?php 

session_start();

if (isset($_SESSION['username'])) {
    header("location:index.php?msg=Access Denied");
    exit;
} 

?>

<style>  h5 { margin-bottom: 30px; } .w-75 {padding:10px;} hr { background: white; opacity: 100%; } #body { padding: 80px; } form { padding: 30px; }</style>

<?php include 'header.php' ?>
        <div class="container-fluid" id="form-container" style="display: flex; justify-content: center; align-items: center;">
            <form class="form-main border border-3 text-white" action="registerAction.php" method="POST">
                <div style="background: white; color: black; mix-blend-mode: screen;"><h1 class="m-2 p-4 text-center"><b>Register</b></h1></div>
                <div id="credentials">
                    <div class="w-75">
                        <h5>Info</h5>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text h-100"><img src="img/person-icon.png" alt="icon"></img></div>
                            </div>
                            <input class="typable border border-secondary rounded form-control w-25" type="text" name="username" size="24" maxlength="24" placeholder="Username">
                        </div>  
                        <small>4 - 24 alphanumeric characters.</small>
                    </div>
                    <div class="w-75">
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text h-100"><img src="img/email-icon.png" alt="icon"></img></div>
                            </div>
                            <input class="typable border border-secondary rounded form-control w-25" type="text" name="email" size="128" maxlength="128" placeholder="Email">
                        </div>
                        <small>E.g. marcus@arkive.com</small>
                    </div>
                    <div class="w-75">
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text h-100"><img src="img/lock-icon.png" alt="icon"></img></div>
                            </div>
                            <input class="typable border border-secondary rounded form-control w-25" type="password" name="password" size="32" placeholder="Password">
                        </div>        
                        <small>8 - 20 characters.</small>
                    </div>
                </div>
                <div id="security">
                    <div class="w-75">
                        <h5>Security</h5>
                        <select class="clickable form-select" name="sq-option" required>
                            <option value="" disabled selected>Pick a security question</option>
                            <option value="1">The name of your hometown</option>
                            <option value="2">The name of your first pet</option>
                            <option value="3">Your mother's maiden name</option>
                            <option value="4">Your birth-date</option>
                        </select>
                    </div>
                    <div class="w-75">
                        <div class="input-group mb-2">
                            <input class="typable border border-secondary rounded form-control" type="text" name="sq-answer" placeholder="Your answer..." maxlength="24">
                        </div>
                    </div>
                </div>
                <div id="checkboxes">
                    <div class="w-75">
                        <input type="checkbox" class="clickable" name="terms" required>
                        <label>Agree to the <a href="legal.php#terms">Terms of Service</a></label><br>
                        <input type="checkbox" class="clickable" name="promo" checked="checked">
                        <label>Sign up for promotional emails?</label>
                    </div>
                </div>
                <div id="form-buttons">
                    <div class="w-75">
                        <button type="submit" class="button btn btn-outline-light" style="width: 9.15vw;">Register&nbsp;&nbsp;&#10095;</button><br><br>
                        <small>Already have an account? <a href="login.php">Sign in.</a></small>
                    </div>
                </div>
            </form>
        </div>
        <?php include 'footer.php'; ?>