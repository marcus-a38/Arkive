<?php 

session_start();

if (isset($_SESSION['username'])) {
    header("location:index.php");
    exit;
} 

?>

<style>  h5 { margin-bottom: 30px; } .w-75 {padding:5px;} hr { background: white } #body { padding: 80px; } form { padding: 30px; }</style>

<?php include 'header.php' ?>
            <div class="container-fluid" id="form-container" style="display: flex; justify-content: center; align-items: center; height: 100%;">
            <form class="form-main border border-3" style="color: white !important;" action="loginAction.php" method="POST">
            <div style="background: white; color: black; mix-blend-mode: screen;"><h1 class="m-2 p-4 text-center"><b>Login</b></h1></div>
                <div id="credentials">
                    <div class="w-75">
                        <h5>Welcome Back</h5>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text h-100"><img src="img/uinfo-icon.png" alt="icon"></img></div>
                            </div>
                            <input class="typable border border-secondary rounded form-control w-25" type="text" name="user" size="72" maxlength="72" placeholder="Username or Email">
                        </div>  
                    </div>
                    <div class="w-75">
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text h-100"><img src="img/lock-icon.png" alt="icon"></img></div>
                            </div>
                            <input class="typable border border-secondary rounded form-control w-25" type="password" name="password" size="32" placeholder="Password">
                        </div>        
                    </div>
                </div>
                <div id="checkboxes">
                    <div class="w-100">
                        <input type="checkbox" class="clickable" name="remember">
                        <label>Remember me</label>
                    </div>
                </div>
                <div id="form-buttons">
                    <div class="w-100">
                        <button type="submit" class="button btn btn-outline-light" style="width: 9.15vw;">Login&nbsp;&nbsp;&#10095;</button>
                        <small><a href="forgotPassword.php">Forgot password?</a></small><br><br>
                        <small>Don't have an account? <a href="register.php">Sign up</a></small>
                    </div>
                </div>
            </form>
        </div>
<?php include 'footer.php'; ?>