<?php
session_start();
require_once 'manager_auth_middleware.php';
require_once('connection.php');

if (!isset($_SESSION['manager_id'])) {
    header("Location: login_manger.php");
    die();
}

$id = $_SESSION['manager_id'];
$result = mysqli_query($conn, "SELECT * FROM `manager` WHERE id='$id';") or die(mysqli_error($conn));
$array = mysqli_fetch_assoc($result);

$result1 = mysqli_query($conn, "SELECT * FROM `employee`") or die(mysqli_error($conn));
while ($n = mysqli_fetch_assoc($result1))
    $emp[] = $n;


$result3 = mysqli_query($conn, "SELECT * FROM `service`") or die(mysqli_error($conn));
while ($n = mysqli_fetch_assoc($result3))
    $serv[] = $n;



if (isset($_GET['action']) && isset($_GET['id'])) {
    $action = $_GET['action'];
    $req_id = htmlspecialchars($_GET['id'], ENT_QUOTES);
    if ($action == "approve") {
        $req_q = mysqli_query($conn, "SELECT * FROM `request` WHERE id = '$req_id' ")or die(mysqli_error($conn));
        $req_data = mysqli_fetch_assoc($req_q);

        $req_q = mysqli_query($conn, "UPDATE `request` SET status = 'approved' WHERE id = '$req_id'");
             
        if ($req_q) {
            header("Location: manger_home_page.php");
            die(); 
            
 
            
        }
    } else if ($action == "decline") {
        $req_q = mysqli_query($conn, "SELECT * FROM `request` WHERE id = '$req_id'")or die(mysqli_error($conn));
        $req_data = mysqli_fetch_assoc($req_q);
        $req_q = mysqli_query($conn, "UPDATE `request` SET status = 'declined' WHERE id = '$req_id'");
        if ($req_q) {
            header("Location: manger_home_page.php");
            die();
        }
    }
}

$result2 = mysqli_query($conn, "SELECT * FROM `request` ORDER BY status DESC") or die(mysqli_error($conn));
while ($n = mysqli_fetch_assoc($result2))
    $req[] = $n;
?>
<!DOCTYPE html>
<html>

    <head>
        <title>Manager home page</title>

        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="css/styles.css">
        <link rel="stylesheet" href="css/my-colors.css">
        <style>

        </style>
    </head>

    <body>
        <main>
            <!-- Header -->
            <header class="header">

                <div class="container">

                    <a href=" manger_home_page.php"><img src="media/logo.png" alt="Logo" class="logo"></a>

                    <a  href = "signout.php"  class="btn btn--v3" >Sign out</a>
                </div>

            </header>

            <h1 id="name">Welcome <?php
                echo $array['first_name'] . " " . $array['last_name'] . " !";
                echo "<br>";
                ?> </h1>
            <h3 style="text-align:center; ">Manager info:</h3>
            <h4 style="text-align:center;"> name: <?php echo $array['first_name'] . " " . $array['last_name']; ?></h4>
            <h4 style="text-align:center;"> username: <?php echo $array['username']; ?></h4>

            <div class="auth-page-form-inner">



                <div id="Req" style="overflow-x:auto;">


                    <h2>Requests</h2>
                    <?php
                    for ($a = 0; $a < count($serv); $a++) {
                        $sercount = 0;
                        ?>
                        <table id="Requests" border="1" cellpadding="2">
                            <tr>
                                <th id="Request type" colspan="3"><?php echo $serv[$a]["type"];
                        ?></th>

                            </tr>
                            <tr>
                                <th>Requests</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            <?php
                            for ($i = 0; $i < count($req); $i++) {
                                for ($z = 0; $z < count($emp); $z++) {

                                    if ($emp[$z]['id'] == $req[$i]['emp_id'] && $serv[$a]['id'] == $req[$i]['service_id']) {
                                        $id = $req[$i]['id'];
                                        $sercount++;
                                        ?>

                                        <tr><?php
                                            if ($req[$i]['status'] == "declined" || $req[$i]['status'] == "approved")
                                                echo "<td>";
                                            else
                                                echo '<td style="background-color:#5F9EA0; text-align:center; ">';

                                            echo "<a class='text-darksky' href='Request_information_page.php?id=$id'>";
                                            echo $emp[$z]['first_name'];
                                            echo " ";
                                            echo $emp[$z]['last_name'];
                                            ?> - <?php echo $id; ?></a> </td>
                                            <?php
                                            if ($req[$i]['status'] == "declined" || $req[$i]['status'] == "approved") {
                                                echo "<td>";
                                                echo $req[$i]['status'];
                                            } else {
                                                $req[$i]['status'] = "in progress";
                                                echo '<td class ="text-darksky" style="background-color:#5F9EA0; text-align:center;">' . $req[$i]['status'];
                                            }
                                            ?></td>
                                            <?php
                                            if ($req[$i]['status'] != "declined" && $req[$i]['status'] != "approved") {
                                                echo '<td style="background-color:#5F9EA0; text-align:center;">';
                                                echo "  <button  class='btn btn--v2'><a href='manger_home_page.php?id=$id&action=decline' class = 'w3-bar-item w3-button mtry'>decline</a></button> ";
                                                echo " <button class='btn btn--v1'><a href='manger_home_page.php?id=$id&action=approve' class = 'w3-bar-item w3-button mtry'>approve</a></button> ";
                                            } else if ($req[$i]['status'] == "approved") {
                                                echo "<td>  <button  class='btn btn--v2'><a href='manger_home_page.php?id=$id&action=decline' class = 'w3-bar-item w3-button mtry'>decline</a></button> ";
                                            } else if ($req[$i]['status'] == "declined")
                                                echo "<td>  <button class='btn btn--v1''><a href='manger_home_page.php?id=$id&action=approve' class = 'w3-bar-item w3-button mtry'>approve</a></button> ";
                                            ?>
                                            </td>
                                            
                                        </tr>
                                        <?php
                                    }
                                }
                            }
                            if ($sercount == 0) {
                                echo '<td colspan="3" style="text-align:center;"> No requsets </td>';
                            }
                            ?>



                        </table>
                    <?php } ?>






                </div>
            </div>




            <footer id="footer1">

 

                <!--Copy Rights-->
                <p>Copyright &copy; 2022 MANGENET . All Rights Reserved</p>

            </footer>
  
        </main>
    </body>

    <!--$result1 = mysqli_query($conn, "SELECT employee.* FROM `employee` LEFT JOIN `request` ON  employee.id=request.emp_id ORDER BY request.status DESC ") or die(mysqli_error($conn));-->

</html>
