<?php 
include_once("config.php");
$result = mysqli_query($db, "SELECT * FROM event INNER JOIN organizer ON event.organizer_id=organizer.organizer_id ORDER BY event_date");
// SELECT * from event INNER JOIN organizer ON event.organizer_id=organizer.organizer_id



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Treasure Web - Home</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>

<body>
    <!-- Start of Nav Bar -->
    <nav class="navbar fixed-top navbar-expand-md navbar-dark bg-dark">
        <div class="container">
            <div style=" width: 55px; height: 50px;  overflow: hidden;  ">
                <img src="img/SVG/Artboard 1.svg" alt="" style=" object-fit:fill; width: 60px;">
            </div>
            <a href="#" class="navbar-brand text-uppercase">Treasure Web</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
            <div class="collapse navbar-collapse" id="navbarToggler">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.html">Home </a>
                    </li>
                    <li class="nav-item">
                        <a href="event.html" class="nav-link active">Events <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a href="rules.html" class="nav-link">Rules</a>
                    </li>
                    <li class="nav-item">
                        <a href="profile.html" class="nav-link ">Profile</a>
                    </li>
                    <li class="specialDropdown nav-item dropdown d-md-none">
                        <a class="nav-link dropdown-toggle active" href="#" id="utilitiesDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Login/Signup
                        </a>
                        <div class="dropdown-menu mb-2 " aria-labelledby="utilitiesDropdown">
                            <a class="dropdown-item" href="#">Login</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">New around here? Sign up</a>
                            <a class="dropdown-item" href="#">Forgot password?</a>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="dropdown mb-2 d-none d-md-inline pt-2">
                <button class="btn btn-outline-light btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Login/Signup
                    </button>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="#">Login</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">New around here? Sign up</a>
                    <a class="dropdown-item" href="#">Forgot password?</a>
                </div>
            </div>
        </div>
        </div>
    </nav>
    <!-- End of Nav Bar -->

    <!-- Start of Content -->
    <div class="container-fluid p-0">
        <section id="headingCover">
            <div class="d-flex align-items-center justify-content-center text-light aw-vertical-align">
                <h1 class="aw-border text-center " style="font-size:xx-large">Let The Hunt Begin!</h1>
            </div>
        </section>

        <div class="container">
            <h1 style="font-size: 4rem;" class="text-center">
                Events
            </h1>
            <div class="aw-hr-long mb-3"></div>

            

            <div class="row">
                <?php while($res = mysqli_fetch_array($result)) { ?>
                        <div class="mb-3 col-md-6 col-lg-4 ">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title"> <?php echo $res['event_name'] ?></h5>
                                    <h6 class="card-subtitle mb-2 text-muted">                          
                                        <?php echo $res['organizer_name'];?>
                                    </h6>
                            <div class="dropdown-divider"></div>
                            <p class="card-text ">
                                    <?php                                     
                                    echo date("H:i a",strtotime($res['event_time']));
                                    echo "<br>";
                                    echo date("l jS M Y", strtotime($res['event_date']));
                                    ?> 
                            </p>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="#" class="card-link">Details</a>
                            <a href="#" class="card-link">Join Event</a>

                        </div>
                    </div>
                </div>
                <?php 
                    }
                    mysqli_close($db);
                ?>                
            </div>
        </div>
    </div>

    <!-- End of Content -->




    <!-- Start of Footer -->
    <footer class="bg-light p-3 pt-5 mt-0 ">
        <ul class="list-inline text-uppercase text-center ">
            <li class="list-inline-item mx-3 ">
                <a href="Rules.html " class="text-danger ">Rules</a>
            </li>
            <li class="list-inline-item mx-3 ">
                <a href="events.html " class="text-danger ">Events</a>
            </li>
        </ul>

    </footer>
    <!-- End of Footer -->

    <!-- JS Scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>