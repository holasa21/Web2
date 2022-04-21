<?php
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
                        <table id="<?php echo $serv[$a]["type"];?>" border="1" cellpadding="2">
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

                                        <tr id="<?php echo $id."tr"?>"><?php
                                            if ($req[$i]['status'] == "declined" || $req[$i]['status'] == "approved")
                                                echo "<td>";
                                            else
                                                echo "<td style='background-color:#5F9EA0; text-align:center;' >";

                                            echo "<a class='text-darksky tooltip' href='Request_information_page.php?id=$id' onmouseover='showDesc($id)'>";
                                            echo $emp[$z]['first_name'];
                                            echo " ";
                                            echo $emp[$z]['last_name'];
                                            ?> - <?php echo $id; ?>
                                            <span class="tooltiptext" id="<?php echo 'tooltip'.$id?>"></span>
                                            </a> </td>
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
                                            $accept = '"approve"';
                                            $reject = '"decline"';
                                            if ($req[$i]['status'] != "declined" && $req[$i]['status'] != "approved") {
                                                echo '<td style="background-color:#5F9EA0; text-align:center;">';
                                                echo "  <button  class='btn btn--v2'><a onclick='return manageRequest($id,"."$reject".")' class = 'w3-bar-item w3-button mtry'>decline</a></button> ";
                                                echo " <button class='btn btn--v1'><a  onclick='return manageRequest($id,"."$accept".")' class = 'w3-bar-item w3-button mtry'>approve</a></button> ";
                                            } else if ($req[$i]['status'] == "approved") {
                                                echo "<td>  <button  class='btn btn--v2'><a  onclick='return manageRequest($id,"."$reject".")' class = 'w3-bar-item w3-button mtry'>decline</a></button> ";
                                            } else if ($req[$i]['status'] == "declined")
                                                echo "<td>  <button class='btn btn--v1'><a  onclick='return manageRequest($id,"."$accept".")' class = 'w3-bar-item w3-button mtry'>approve</a></button> ";
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
<script type="text/javascript">
    function showDesc(id){
        loadRequestDescription(id);
    }
    function loadRequestDescription(id) {
        const xhttp = new XMLHttpRequest();
        xhttp.onload = function() {
            let res = JSON.parse(this.response)
            let description = res ? res : "No Description";
            document.getElementById('tooltip'+id).innerHTML = description;
        }
        xhttp.open("GET", "request_info_json.php?id=" + id);
        xhttp.send();
    }

    function manageRequest(id,action){
        console.log(id);
        console.log(action);
        manageRequestAjax(id,action);
        return false;
    }

    function manageRequestAjax(id,action) {
        const xhttp = new XMLHttpRequest();
        xhttp.onload = function() {
            let res = JSON.parse(this.response)
            let tr  = document.getElementById(id+'tr');
            let childrens = tr.children;
            console.log(childrens);
            childrens[0].style.textAlign = 'unset'
            childrens[1].style.textAlign = 'unset'
            childrens[2].style.textAlign = 'unset'
            childrens[0].style.backgroundColor = 'unset'
            childrens[1].style.backgroundColor = 'unset'
            childrens[2].style.backgroundColor = 'unset'

            childrens[1].innerHTML=res;
            let btn = "";
            if(res=="approved"){
                text = 'decline'
                btn = '"decline"';
                childrens[2].innerHTML =  `<button  class='btn btn--v2'><a  onclick='return manageRequest(${id},${btn})' class = 'w3-bar-item w3-button mtry'>${text}</a></button>`
            }else if(res=="declined"){
                text = 'approve'
                btn = '"approve"';
                childrens[2].innerHTML =  `<button  class='btn btn--v1'><a  onclick='return manageRequest(${id},${btn})' class = 'w3-bar-item w3-button mtry'>${text}</a></button>`
            }
           
        }
        xhttp.open("GET", "approve_decline_request.php?id="+id+"&action="+action);
        xhttp.send();
    }

   



</script>