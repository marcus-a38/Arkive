<?php 
@session_start();

if (isset($_SESSION['username']) == false) {
    header("location:index.php?msg=Access Denied");
    exit;
}
?>

<?php include "header.php"; ?>
    <div class="container-fluid">
        <h1 class="text-white text-center" style="font-size: 72px;">Hello&nbsp;<span class="text-decoration-underline"><?php echo $_SESSION['username']; ?></span>!</h1>
    </div>
    <div id="entries"></div>
    <div id="posts"></div>
    <?php include "footer.php"; ?>
</div>
</body>
</html>