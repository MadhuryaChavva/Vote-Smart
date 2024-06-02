<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>VS</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href='http://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed' rel='stylesheet' type='text/css'>

    <style>
      .headerFont{
        font-family: 'Ubuntu', sans-serif;
        font-size: 24px;
      }

      .subFont{
        font-family: 'Raleway', sans-serif;
        font-size: 14px;
        
      }
      
      .specialHead{
        font-family: 'Oswald', sans-serif;
      }

      .normalFont{
        font-family: 'Roboto Condensed', sans-serif;
      }
    </style>

  </head>
  <body>
    
  <div class="container">
    <nav class="navbar navbar-default navbar-fixed-top navbar-inverse
    " role="navigation">
      <div class="container">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#example-nav-collapse">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <div class="navbar-header">
          <a href="cpanel.php" class="navbar-brand headerFont text-lg">Vote Smart</a>
        </div>

        <div class="collapse navbar-collapse" id="example-nav-collapse">
          <ul class="nav navbar-nav">
            
             <li><a href="nomination.html"><span class="subFont"><strong>Nominations</strong></span></a></li>
            <li><a href="changePassword.php"><span class="subFont"><strong>Change Password</strong></span></a></li>
            <li><a href="users.php"><span class="subFont"><strong>Voters</strong></span></a></li> 
            <li><a href="feedbackReport.php"><span class="subFont"><strong>Feedback Report</strong></span></a></li> 
          
          </ul>
          
          
          <span class="normalFont"><a href="index.html" class="btn btn-danger navbar-right navbar-btn" style="border-radius:0%">Logout</a></span></button>
        </div>

      </div> <!-- end of container -->
    </nav>

    <div class="container" style="padding:100px;">
      <div class="row">
        <div class="col-sm-12" style="border:2px outset gray;">
          
          <div class="page-header text-center">
            <h2 class="specialHead">ADMIN</h2>
            <p class="normalFont">Voting Results</p>
          </div>
          
          <div class="col-sm-12">
          <?php
require 'config.php';

$Akash = 0;
$Madhu = 0;
$UMESH = 0;
$SRIJANA = 0;

$conn = mysqli_connect($hostname, $username, $password, $database);
if (!$conn) {
    echo "Error While Connecting.";
} else {
    // AKASH
    $sql ="SELECT * FROM tbl_users WHERE voted_for='Akash'";
    $result= mysqli_query($conn, $sql);

    if(mysqli_num_rows($result)>0)
    {
        while($row= mysqli_fetch_assoc($result))
        {
            if($row['voted_for'])
                $Akash++;
        }

        $akash_value= $Akash*10;

        echo "<strong>Akash</strong><br>";
        echo "
              <div class='progress'>
                <div class='progress-bar progress-bar-danger' role='progressbar' aria-valuenow=\"$akash_value\" aria-valuemin=\"0\" aria-valuemax=\"100\" style='width: ".$akash_value."%'>
                  <span class='sr-only'>Akash</span>
                </div>
              </div>
              ";
    }

    // MADHU
    $sql ="SELECT * FROM tbl_users WHERE voted_for='Madhu'";
    $result= mysqli_query($conn, $sql);

    if(mysqli_num_rows($result)>0)
    {
        while($row= mysqli_fetch_assoc($result))
        {
            if($row['voted_for'])
                $Madhu++;
        }


        $madhu_value= $Madhu*10;

        echo "<strong>Madhu</strong><br>";
        echo "
              <div class='progress'>
                <div class='progress-bar progress-bar-info' role='progressbar' aria-valuenow=\"70\" aria-valuemin=\"0\" aria-valuemax=\"100\" style='width: ".$madhu_value."%'>
                  <span class='sr-only'>Madhu</span>
                </div>
              </div>
              ";
    }

    // UMESH
    $sql ="SELECT * FROM tbl_users WHERE voted_for='UMESH'";
    $result= mysqli_query($conn, $sql);

    if(mysqli_num_rows($result)>0)
    {
        while($row= mysqli_fetch_assoc($result))
        {
            if($row['voted_for'])
                $UMESH++;
        }


        $umesh_value= $UMESH*10;

        echo "<strong>UMESH</strong><br>";
        echo "
              <div class='progress'>
                <div class='progress-bar progress-bar-warning' role='progressbar' aria-valuenow=\"70\" aria-valuemin=\"0\" aria-valuemax=\"100\" style='width: ".$umesh_value."%'>
                  <span class='sr-only'>UMESH</span>
                </div>
              </div>
              ";
    }

    // SRIJANA
    $sql ="SELECT * FROM tbl_users WHERE voted_for='SRIJANA'";
    $result= mysqli_query($conn, $sql);

    if(mysqli_num_rows($result)>0)
    {
        while($row= mysqli_fetch_assoc($result))
        {
            if($row['voted_for'])
                $SRIJANA++;
        }


        $srijana_value= $SRIJANA*10;

        echo "<strong>SRIJANA</strong><br>";
        echo "
              <div class='progress'>
                <div class='progress-bar progress-bar-success' role='progressbar' aria-valuenow=\"70\" aria-valuemin=\"0\" aria-valuemax=\"100\" style='width: ".$srijana_value."%'>
                  <span class='sr-only'>SRIJANA</span>
                </div>
              </div>
              ";
    }

    echo "<hr>";

    $total = 0;

    // Total
    $sql ="SELECT * FROM tbl_users";
    $result= mysqli_query($conn, $sql);

    if(mysqli_num_rows($result)>0)
    {
        while($row= mysqli_fetch_assoc($result))
        {
            if($row['voted_for'])
                $total++;
        }


        $total= $total*10;


        echo "
          <div class='text-primary text-center'>
            <h3 class='normalFont'>TOTAL VOTES : $total </h3>
          </div>
        ";
    }

}
?>

          </div>

        </div>
      </div>
    </div>
  </div>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
