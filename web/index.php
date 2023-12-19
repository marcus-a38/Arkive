<?php include 'header.php'; ?>

    <div class="container-fluid text-center" id="intro" style="padding: 50px;">
            <h1 style="font-size: 128px">The Arkive</h1>
            <h4>
                A comprehensive music collection maintained by<br> 
                two afrofuturism enthusiasts.
            </h4>
            <?php if (isset($_SESSION["username"])): ?>
                <a href="browse.php" class="button btn btn-outline-light border-4 m-5" id="main-button"><h1 style="font-size: 25px; line-height: 35px;">Explore the Collection</h1></a>
            <?php else: ?>
                <a href="register.php" class="button btn btn-outline-light border-4 m-5" id="main-button"><h1 style="font-size: 25px; line-height: 35px;">Sign Up</h1></a>
            <?php endif; ?>
    </div>

    <div class="container-fluid text-center" id="about" style="background: white; color: black; padding: 50px; height: 900px;">
        <h1 class="purple-gradient-text display-1"><b>Our History</b></h3>
    </div>

    <div class="container-fluid text-center" id="boards" style="background: rgb(51,7,111); background: linear-gradient(180deg, rgba(51,7,111,1) 10%, rgba(120,9,199,1) 100%); padding: 50px; height: 900px;">
        <h1 class="display-1"><b>Boards</b></h1>
        <h2>Chat with Others About Tracks You Love</h2>
        <div class="container" id="trending-posts">
            <h5>Top Trending Posts</h5>
        </div>
        <a class="link-light text-decoration-none link-opacity-75-hover h3" href="#" id="boards-button">Explore <b>Boards</b> ></a>
    </div>

<?php include 'footer.php' ?>
    
