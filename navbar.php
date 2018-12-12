        <header>
            <nav class="navbar navbar-expand-md navbar-light fixed-top bg-light">
                <a class="navbar-brand mb-0 h1" href="./index.php">
                    <img src="./images/logo.jpg" width="30" height="30" class="d-inline-block align-top" alt="logo">
                    Climate Crowdfunding
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">About</a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="./index.php#story">Climate Crowdfunding Story</a>
                                <a class="dropdown-item" href="./index.php#why">Why?</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Renewable Energy</a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="./solar-energy.php">Solar Energy</a>
                                <a class="dropdown-item" href="./wind-energy.php">Wind Energy</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./project.php">Project</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./community.php">Community</a>
                        </li>
                    </ul>
<?php 
    //start a session, so that we can use the $_SESSION arry to store information across pages about a longger in customer
    if(!isset($_SESSION)) { 
        session_start(); 
    }
    //if a customer log in, show the button log-out
    if (is_array($_SESSION)){
        if (array_key_exists('customerEmail', $_SESSION)){
?> 
    <span class="navbar-text"><a class="btn btn-outline-primary d-lg-inline-block mb-3 mb-md-0 ml-md-3" href="./log-out.php">log out</a></span>
<?php 
        //if the cusomter not log in, show the button sign in and regiser 
        }  else {
?>           
        <span class="navbar-text"><a class="btn btn-outline-primary d-lg-inline-block mb-3 mb-md-0 ml-md-3" href="./sign-in.php"> Sign in</a></span>
        <span class="navbar-text"><a class="btn btn-outline-dark d-lg-inline-block mb-3 mb-md-0 ml-md-3" href="./register.php">Register</a></span> 
    <?php
        }
    }
?>              
                </div>
            </nav>
        </header>