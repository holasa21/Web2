<?php
session_start();
include_once('connection.php');

if (!isset($_SESSION['manager_id'])) {
    header("Location: login_manger.php");
    die();
}
if ($_SESSION['manager_role'] != "manager") {
    header("Location: EmployeeHomePage.php");
    die();
}
$id = $_SESSION['manager_id'];
$result = mysqli_query($conn, "SELECT * FROM `manager` WHERE id='$id';") or die(mysqli_error($conn));
$array = mysqli_fetch_assoc($result);

$result1 = mysqli_query($conn, "SELECT * FROM `employee`") or die(mysqli_error($conn));
while ($n = mysqli_fetch_assoc($result1))
    $emp[] = $n;

$result2 = mysqli_query($conn, "SELECT * FROM `request`") or die(mysqli_error($conn));
while ($n = mysqli_fetch_assoc($result2))
    $req[] = $n;

$result3 = mysqli_query($conn, "SELECT * FROM `service`") or die(mysqli_error($conn));
while ($n = mysqli_fetch_assoc($result3))
    $serv[] = $n;



if (isset($_GET['action']) && isset($_GET['id'])) {
    $action = $_GET['action'];
    $req_id = htmlspecialchars($_GET['id'], ENT_QUOTES);
    if ($action == "approve") {
        $req_q = mysqli_query($db_conn, "SELECT * FROM requests WHERE ID = '$req_id'");
        $req_data = mysqli_fetch_assoc($req_q);
        if ($req_data['status'] == "0") {
            $req_q = mysqli_query($db_conn, "UPDATE requests SET status = 'Approved' WHERE ID = '$req_id'");
            if ($req_q) {
                header("Location: manager-homepage.php");
                die();
            }
        }
    } else if ($action == "decline") {
        $req_q = mysqli_query($db_conn, "SELECT * FROM requests WHERE ID = '$req_id'");
        $req_data = mysqli_fetch_assoc($req_q);
        if ($req_data['status'] == "0") {
            $req_q = mysqli_query($db_conn, "UPDATE requests SET status = 'Decline' WHERE ID = '$req_id'");
            if ($req_q) {
                header("Location: manager-homepage.php");
                die();
            }
        }
    }
}
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

        <!-- Header -->
        <header class="header">
            <div class="container">
                <a href="./"><img src="media/logo.png" alt="Logo" class="logo"></a>
                <a href='./index.html' class="btn btn--v3">Sign out</a>
            </div>
        </header>

        <h1 id="name">Welcome <?php
            echo $array['first_name'] . " " . $array['last_name'] . " !";
            echo "<br>";
            echo "username:" . $array['username'];
            ?> </h1>


        <div class="auth-page-form-inner">



            <div id="Req" style="overflow-x:auto;">
                <h2>Requests</h2>
                <?php
                for ($a = 0;
                        $a < count($serv);
                        $a++) {
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
                        for ($z = 0; $z < count($emp); $z++) {
                            for ($i = 0; $i < count($req); $i++) {
                                if ($emp[$z]['id'] == $req[$i]['emp_id'] && $serv[$a]['id'] == $req[$i]['service_id']) {
                                    $id = $req[$z]['id'];
                                    ?>
                                    <tr><?php
                                        if ($req[$z]['status'] != "In progress")
                                            echo "<td>";
                                        else
                                            echo '<td style="background-color:#5F9EA0; text-align:center; ">';
                                        ?>
                                    <a href="Request_information_page.php?id=<?php echo $emp[$z]['id']; ?>" ><?php
                                        echo $emp[$z]['first_name'];
                                        echo " ";
                                        echo $emp[$z]['last_name'];
                                        ?> - <?php echo $req[$z]['id']; ?></a> </td>
                                    <?php
                                    if ($req[$z]['status'] != "In progress")
                                        echo "<td>";
                                    else
                                        echo '<td style="background-color:#5F9EA0; text-align:center; color:white;">';

                                    echo $req[$z]['status'];
                                    ?></td>
                                        <?php
                                        if ($req[$z]['status'] == "In progress") {
                                            echo '<td style="background-color:#5F9EA0; text-align:center;">';
                                            echo ' <button onclick="Approve();" class="btn btn--v2">Approve</button>';
                                            echo ' <button onclick="Decline();" class="btn btn--v1">Decline</button>';
                                        } else if ($req[$z]['status'] == "Approved") {
                                            echo ' <td> <button onclick="Decline();" class="btn btn--v1">Decline</button>';
                                        } else if ($req[$z]['status'] == "Declined")
                                            echo "<td>  <button onclick='Approve();' class='btn btn--v2'><a href='manager-homepage.php?id=$id&action=decline' class = 'w3-bar-item w3-button mtry'>Approve</a></button> ";
                                        ?>
                                    </td>
                                    </tr>
                                    <?php
                                }
                            }
                        }
                        ?>



                    </table>
                <?php } ?>

                <script>
// Modal Image Gallery
                    function onClick(element) {
                        document.getElementById("img01").src = element.src;
                        document.getElementById("modal01").style.display = "block";
                        var captionText = document.getElementById("caption");
                        captionText.innerHTML = element.alt;
                    }


// Toggle between showing and hiding the sidebar when clicking the menu icon
                    var mySidebar = document.getElementById("mySidebar");

                    function w3_open() {
                        if (mySidebar.style.display === 'block') {
                            mySidebar.style.display = 'none';
                        } else {
                            mySidebar.style.display = 'block';
                        }
                    }

// Close the sidebar with the close button
                    function w3_close() {
                        mySidebar.style.display = "none";
                    }

                </script>




            </div>
        </div>




        <footer id="footer1">


            <!--Copy Rights-->
            <p>Copyright &copy; 2022 MANGENET . All Rights Reserved</p>

        </footer>

    </body>

</html>
