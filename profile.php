<?php
include ('session.php');
session_start();
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

    <!--CSS for Ni ZheHan-->
    <link href='http://fonts.googleapis.com/css?family=Bitter' rel='stylesheet' type='text/css'>
    <style type="text/css">
        .form-style-10{
            width:450px;
            padding:30px;
            margin:40px auto;
            background: #FFF;
            border-radius: 10px;
            -webkit-border-radius:10px;
            -moz-border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.13);
            -moz-box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.13);
            -webkit-box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.13);
        }
        .form-style-10 .inner-wrap{
            padding: 30px;
            background: #F8F8F8;
            border-radius: 6px;
            margin-bottom: 15px;
        }
        .form-style-10 h1{
            background: #2A88AD;
            padding: 20px 30px 15px 30px;
            margin: -30px -30px 30px -30px;
            border-radius: 10px 10px 0 0;
            -webkit-border-radius: 10px 10px 0 0;
            -moz-border-radius: 10px 10px 0 0;
            color: #fff;
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.12);
            font: normal 30px 'Bitter', serif;
            -moz-box-shadow: inset 0px 2px 2px 0px rgba(255, 255, 255, 0.17);
            -webkit-box-shadow: inset 0px 2px 2px 0px rgba(255, 255, 255, 0.17);
            box-shadow: inset 0px 2px 2px 0px rgba(255, 255, 255, 0.17);
            border: 1px solid #257C9E;
        }
        .form-style-10 h1 > span{
            display: block;
            margin-top: 2px;
            font: 13px Arial, Helvetica, sans-serif;
        }
        .form-style-10 label{
            display: block;
            font: 13px Arial, Helvetica, sans-serif;
            color: #888;
            margin-bottom: 15px;
        }
        .form-style-10 input[type="text"],
        .form-style-10 input[type="date"],
        .form-style-10 input[type="datetime"],
        .form-style-10 input[type="email"],
        .form-style-10 input[type="number"],
        .form-style-10 input[type="search"],
        .form-style-10 input[type="time"],
        .form-style-10 input[type="url"],
        .form-style-10 input[type="password"],
        .form-style-10 textarea,
        .form-style-10 select {
            display: block;
            box-sizing: border-box;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            width: 100%;
            padding: 8px;
            border-radius: 6px;
            -webkit-border-radius:6px;
            -moz-border-radius:6px;
            border: 2px solid #fff;
            box-shadow: inset 0px 1px 1px rgba(0, 0, 0, 0.33);
            -moz-box-shadow: inset 0px 1px 1px rgba(0, 0, 0, 0.33);
            -webkit-box-shadow: inset 0px 1px 1px rgba(0, 0, 0, 0.33);
        }

        .form-style-10 .section{
            font: normal 20px 'Bitter', serif;
            color: #2A88AD;
            margin-bottom: 5px;
        }
        .form-style-10 .section span {
            background: #2A88AD;
            padding: 5px 10px 5px 10px;
            position: absolute;
            border-radius: 50%;
            -webkit-border-radius: 50%;
            -moz-border-radius: 50%;
            border: 4px solid #fff;
            font-size: 14px;
            margin-left: -45px;
            color: #fff;
            margin-top: -3px;
        }
        .form-style-10 input[type="button"],
        .form-style-10 input[type="submit"]{
            background: #2A88AD;
            padding: 8px 20px 8px 20px;
            border-radius: 5px;
            -webkit-border-radius: 5px;
            -moz-border-radius: 5px;
            color: #fff;
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.12);
            font: normal 30px 'Bitter', serif;
            -moz-box-shadow: inset 0px 2px 2px 0px rgba(255, 255, 255, 0.17);
            -webkit-box-shadow: inset 0px 2px 2px 0px rgba(255, 255, 255, 0.17);
            box-shadow: inset 0px 2px 2px 0px rgba(255, 255, 255, 0.17);
            border: 1px solid #257C9E;
            font-size: 15px;
        }
        .form-style-10 input[type="button"]:hover,
        .form-style-10 input[type="submit"]:hover{
            background: #2A6881;
            -moz-box-shadow: inset 0px 2px 2px 0px rgba(255, 255, 255, 0.28);
            -webkit-box-shadow: inset 0px 2px 2px 0px rgba(255, 255, 255, 0.28);
            box-shadow: inset 0px 2px 2px 0px rgba(255, 255, 255, 0.28);
        }
        .form-style-10 .privacy-policy{
            float: right;
            width: 250px;
            font: 12px Arial, Helvetica, sans-serif;
            color: #4D4D4D;
            margin-top: 10px;
            text-align: right;
        }
    </style>


</head>

<body>

    <!-- Start of Nav Bar -->
    <nav class="navbar fixed-top navbar-expand-md navbar-dark bg-dark">
        <div class="container">
            <div style=" width: 55px; height: 50px;  overflow: hidden;  ">
                <img src="img/SVG/Artboard 1.svg" alt="" style=" object-fit:fill; width: 60px;">
            </div>
            <a href="index.php" class="navbar-brand text-uppercase">Treasure Web</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggler"
                aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarToggler">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home </a>
                    </li>
                    <li class="nav-item">
                        <!-- <a href="event.php" class="nav-link">Events</a> -->
                        <?php 
                            if(!empty($_SESSION) && $_SESSION['usertype']=="Organizer"){
                                echo '<a href="eventOrganizer.php" class="nav-link">Events</a>';
                            } else {
                                echo '<a href="event.php" class="nav-link">Events</a>';
                            }
                        ?>
                    </li>
                    <li class="nav-item">
                        <!-- <a href="profile.html" class="nav-link">Profile</a> -->
                        <?php 
                            if(!empty($_SESSION) && $_SESSION['usertype']=="Organizer"){
                                echo '<a href="profile_org.php" class=" active nav-link">Profile<span class="sr-only">(current)</span></a>';
                            } else if (!empty($_SESSION) && $_SESSION['usertype']=="User"){
                                echo '<a href="profile.php" class="active nav-link">Profile<span class="sr-only">(current)</span></a>';
                            }
                        ?>
                    </li>
                    <!-- This part is for small screen -->
                    <?php
                    if(!empty($_SESSION)){
                        include("config.php");
                    $id=$_SESSION['userid'];
                    if ($_SESSION['usertype']=='User'){
                        $findname="SELECT first_name as name from participant WHERE participant_id='$id'";
                    } else {
                        $findname="SELECT organizer_name as name from organizer WHERE organizer_id='$id'";
                    }
                    $run=$db->query($findname);
                    $Loginname=$run->fetch_assoc();
                    $name = $Loginname['name'];
                    $greetings = "Hello " . $Loginname['name']."!";
                    echo '<div class="mr-auto  align-items-center text-light d-flex d-md-none">';
                       echo $greetings.
                    '<button class = "btn btn-outline-light btn-sm ml-2">Log Out</button>';
                    }else{?>

                    <li class="specialDropdown nav-item dropdown d-md-none">
                        <a class="nav-link dropdown-toggle active" href="#" id="utilitiesDropdown"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Login/Signup
                        </a>
                        <div class="dropdown-menu mb-2 " aria-labelledby="utilitiesDropdown">
                            <a class="dropdown-item" href="login.html">Login</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">New around here? Sign up</a>
                        </div>
                    </li>


                    <?php
                    }                                        
                    ?>

                </ul>
            </div>
            <!-- This part is for large screen -->
            <?php
                if(!empty($_SESSION)){
                    include("config.php");
                    $id=$_SESSION['userid'];
                    if ($_SESSION['usertype']=='User'){
                        $findname="SELECT first_name as name from participant WHERE participant_id='$id'";
                    } else {
                        $findname="SELECT organizer_name as name from organizer WHERE organizer_id='$id'";
                    }
                    $run=$db->query($findname);
                    $Loginname=$run->fetch_assoc();
                    $name = $Loginname['name'];
                    $greetings = "Hello " . $Loginname['name']."!";
                    ?>
            <div class="mr-auto d-none d-md-inline align-items-center text-light">
                <?php echo $greetings?>
                <button class="btn btn-outline-light btn-sm ml-2" onclick="window.location.href='logout.php'">Log
                    Out</button>
            </div>
            <?php
                }    
                 else {
                    echo '<div class="dropdown mb-2 d-none d-md-inline pt-2">
                            <button class="btn btn-outline-light btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Login/Signup
                            </button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="login.html">Login</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">New around here? Sign up</a>                    
                        </div>';
                }
            ?>
        </div>
        </div>
    </nav>
    <!-- End of Nav Bar -->

    <!-- Start of Content -->
    <div class="container mt-5">
        <div class="row" style="padding-top: 16px;">
            <div class="col-lg-4 col-md-5 col-sm-12">
                <div class="nav flex-column nav-pills mt-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <!-- <img class="card-img-top" src="img/Profile pic1.jpg" alt="Profile Picture"> -->
                    <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">About me</a>
                    <a class="nav-link" id="v-pills-event-tab" data-toggle="pill" href="#v-pills-event" role="tab" aria-controls="v-pills-event" aria-selected="false">Events Joined</a>
                    <!-- <a class="nav-link" id="v-pills-notification-tab" data-toggle="pill" href="#v-pills-notification" role="tab" aria-controls="v-pills-notification" aria-selected="false">Notification</a> -->
                    <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Settings</a>
                </div>
            </div>
            <div class="col-lg-8 col-md-7">
                <div class="tab-content pt-2" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">

                        <div class="panel-body inf-content">
                            <div class="col-md-6">
                                <div class="table-responsive">
                                  <table class="table table-user-information" >
                                         <tr>
                                             <td>
                                                 <p><strong>FirstName:</strong></p>
                                             </td>
                                            <td>
                                                <p><?php echo $_SESSION['firstname']; ?></p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p><strong>LastName:</strong></p>
                                            </td>
                                            <td>
                                                <p><?php echo $_SESSION['lastname']; ?></p>
                                            </td>
                                        </tr>
                                        <tr>
                                         <td>
                                             <p><strong>E-mail:</strong></p>
                                          </td>
                                          <td>
                                             <p><?php echo $_SESSION['email']; ?></p>
                                          </td>
                                       </tr>
                                      <tr>
                                           <td>
                                               <p><strong>Birthday:</strong></p>
                                           </td>
                                           <td>
                                             <p><?php echo $_SESSION['birthday']; ?></p>
                                          </td>
                                      </tr>
                                      <tr>
                                            <td>
                                             <p><strong>Age:</strong></p>
                                         </td>
                        <?php
                        function getAge($birth){
                            if($birth == null){
                                return 'you have not finish all of your personal information completely';
                            }else{
                                $birth=getDate(strtotime($birth));
                                $now=getDate();
                                $month=0;
                                if($now['month']>$birth['month'])
                                    $month=1;
                                if($now['month']==$birth['month'])
                                    if($now['mday']>=$birth['mday'])
                                        $month=1;
                                return $now['year']-$birth['year']+$month;
                            }
                        }
                        ?>
                                     <td>
                                           <p><?php echo getAge($_SESSION['birthday']); ?></p>
                                        </td>
                                  </tr>
                             </table>
                          </div>
                      </div>

                </div>
             </div>

                    <div class="tab-pane fade" id="v-pills-event" role="tabpanel" aria-labelledby="v-pills-event-tab">
                        <?php                         
                        $userEmail = $_SESSION['email'];
                        $stmt = "SELECT p.first_name,p.last_name, e.event_name, t.team_name, o.organizer_name, e.event_date, e.event_time, e.event_id ";
                        $stmt .= "FROM participant p, participant_team pt, team t, event e, event_team et , organizer o ";
                        $stmt .= "WHERE p.participant_id = pt.participant_id and pt.team_id = t.team_id and t.team_id = et.team_id and et.event_id = e.event_id and e.organizer_id = o.organizer_id and p.email='$userEmail' ";
                        $stmt .= "ORDER BY e.event_date;";
                        $run=$db->query($stmt);

                       

                        
                        ?>
                        <table class="table mb-4">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Event Name</th>
                                    <th scope="col">Event Date</th>
                                    <th scope="col">Event Time</th>                                    
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                //The session is for testing purpose
                                //$_SESSION['userid']=3;                                
                                $id=$_SESSION['userid'];
                                while($rowevent = $run->fetch_assoc()){
                                    echo '<tr>
                                    <td scope="row">'.$rowevent['event_name'].'</td>
                                        <td>'.date("jS M Y (l)", strtotime($rowevent['event_date'])).'</td>
                                        <td>'.date("H:i a",strtotime($rowevent['event_time'])).'</td>                                                                                                        
                                    </tr>';
                                }
                                ?>
                            </tbody>
                        </table>                        
                    </div>

                    <div class="tab-pane fade" id="v-pills-notification" role="tabpanel" aria-labelledby="v-pills-notification-tab">
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Sapiente iste dolorem, earum laborum fugit ad hic animi impedit temporibus libero cupiditate cumque id quas aliquid quaerat delectus placeat recusandae? Sunt obcaecati pariatur
                            fuga consequuntur quis eius quidem dolore porro vitae dolorem omnis inventore, mollitia perspiciatis quo voluptatum possimus accusantium facilis modi. Consectetur molestias voluptas, repudiandae iusto esse accusamus. Cumque,
                            ratione dignissimos asperiores accusantium ad fugiat deleniti. Alias possimus distinctio ex?</p>
                    </div>

                    <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                        <div class="form-style-10">
                            <h1>Profile Editing<span>Please note that your information will be changed directly in the database</span></h1>

                            <form action="profile_edit.php" method="post">
                                <div class="section"><span>1</span>Your Name</div>
                                <div class="inner-wrap">
                                    <label>First Name <input type="text" name="firstname" value="<?php echo $_SESSION['firstname']; ?>" required/></label>
                                    <label>Last Name <input type="text" name="lastname" value="<?php echo $_SESSION['lastname']; ?>" required/></input></label>
                                </div>

                                <div class="section"><span>2</span>Personal Information</div>
                                <div class="inner-wrap">
                                    <!--<label>Email Address <input type="email" name="email" /></label>-->
                                    <label>Birthday <input type="date" name="birthday" required/></label>
                                </div>

                                <div class="section"><span>3</span>Passwords</div>
                                <div class="inner-wrap">
                                    <label>Password <input type="password" name="password" required/></label>
                                    <label>Confirm Password<input type="password" name="rptpassword" required/></label>
                                </div>
                                <div class="button-section">
                                    <input type="submit" name="submit" />
                                </div>
                            </form>
                            <br>
                            <form action = 'delete_account.php' method="POST">
                                <input type="submit" action style="background-color: #b22222" name="delete" value="Delete" onclick="return confirm('Are you sure you want to delete this account?');">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End of Content -->

    <!-- Start of Footer -->
    <footer class="bg-light p-3 pt-5 mt-0 ">
        <ul class="list-inline text-uppercase text-center ">
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