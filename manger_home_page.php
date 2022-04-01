<?php
include 'manager_auth_middleware.php';
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

</head>

<body>
    <!-- Header -->
    <header class="header">
        <div class="container">
            <a href="./"><img src="media/logo.png" alt="Logo" class="logo"></a>
            <a href='#' class="btn btn--v3" alt="Sign out" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Sign out</a>
        </div>
    </header>

    <h1 id="name">Welcome <?php echo $auth['first_name'] ?>!</h1>

    <div class="auth-page-form-inner">

        <div id="Req" style="overflow-x:auto;">
            <h2>Requests</h2>
            <table id="Requests" border="1" cellpadding="2">
                <tr>
                    <th id="Request type" colspan="3">promotion</th>

                </tr>
                <tr>
                    <th>Requests</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                <tr>
                    <td><a style="color:#333652; font-weight: bold;" href="Request_information_page.php">Ahmad alsalh -
                            11</a></td>
                    <td>In progress </td>
                    <td>
                        <button onclick="Approve();" class="btn btn--v2">Approve</button>
                        <button onclick="Decline();" class="btn btn--v1">Decline</button>
                    </td>
                </tr>
                <tr>
                    <td><a style="color:#333652; font-weight: bold;" href="Request_information_page.php">Ali alahmad –
                            5</a></td>
                    <td>Declined</td>
                    <td>
                        <button onclick="Approve();" class="btn btn--v2">Approve</button>
                    </td>
                </tr>
                <tr>
                    <td><a style="color:#333652; font-weight: bold;" href="Request_information_page.php">sarah Khaled -
                            3</a></td>
                    <td>Approved </td>
                    <td>
                        <button onclick="Decline();" class="btn btn--v1">Decline</button>
                    </td>
                </tr>


            </table>

            <table id="Requests" border="1" cellpadding="2">
                <tr>
                    <th id="Request type" colspan="3">Leave</th>

                </tr>
                <tr>
                    <th>Requests</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                <tr>
                    <td><a style="color:#333652; font-weight: bold;" href="Request_information_page.php">Asma alsalh -
                            17</a></td>
                    <td>In progress </td>
                    <td>
                        <button onclick="Approve();" class="btn btn--v2">Approve</button>
                        <button onclick="Decline();" class="btn btn--v1">Decline</button>
                    </td>
                </tr>
                <tr>
                    <td><a style="color:#333652; font-weight: bold;" href="Request_information_page.php">Khaled alahmad
                            – 6</a></td>
                    <td>Approved </td>
                    <td>
                        <button onclick="Decline();" class="btn btn--v1">Decline</button>
                    </td>
                </tr>



            </table>

            <table id="Requests" border="1" cellpadding="2">
                <tr>
                    <th id="Request type" colspan="3">resignation</th>

                </tr>
                <tr>
                    <th>Requests</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                <tr>
                    <td><a style="color:#333652; font-weight: bold;" href="Request_information_page.php">nourah salh -
                            10</a></td>
                    <td>In progress </td>
                    <td>
                        <button onclick="Approve();" class="btn btn--v2">Approve</button>
                        <button onclick="Decline();" class="btn btn--v1">Decline</button>
                    </td>
                </tr>
                <tr>
                    <td><a style="color:#333652; font-weight: bold;" href="Request_information_page.php">fahad alahmad
                            – 2</a></td>
                    <td>In progress </td>
                    <td>
                        <button onclick="Approve();" class="btn btn--v2">Approve</button>
                        <button onclick="Decline();" class="btn btn--v1">Decline</button>
                    </td>
                </tr>



            </table>
            <table id="Requests" border="1" cellpadding="2">
                <tr>
                    <th id="Request type" colspan="3">allowance</th>

                </tr>
                <tr>
                    <th>Requests</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                <tr>
                    <td><a style="color:#333652; font-weight: bold;" href="Request_information_page.php">lean fahad -
                            22</a></td>
                    <td>In progress </td>
                    <td>
                        <button onclick="Approve();" class="btn btn--v2">Approve</button>
                        <button onclick="Decline();" class="btn btn--v1">Decline</button>
                    </td>
                </tr>
                <tr>
                    <td><a style="color:#333652; font-weight: bold;" href="Request_information_page.php">ahmad noor
                            –32</a></td>
                    <td>Approved </td>
                    <td>
                        <button onclick="Decline();" class="btn btn--v1">Decline</button>
                    </td>
                </tr>



            </table>


            <table id="Requests" border="1" cellpadding="2">
                <tr>
                    <th id="Request type" colspan="3">healthInsurance</th>

                </tr>
                <tr>
                    <th>Requests</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                <tr>
                    <td><a style="color:#333652; font-weight: bold;" href="Request_information_page.php">salh mohammad-
                            24</a></td>
                    <td>In progress </td>
                    <td>
                        <button onclick="Approve();" class="btn btn--v2">Approve</button>
                        <button onclick="Decline();" class="btn btn--v1">Decline</button>
                    </td>
                </tr>
                <tr>
                    <td><a style="color:#333652; font-weight: bold;" href="Request_information_page.php">Khaled alahmad
                            –26</a></td>
                    <td>Declined</td>
                    <td>
                        <button onclick="Approve();" class="btn btn--v2">Approve</button>
                    </td>
                </tr>



            </table>





        </div>
    </div>




    <footer id="footer1">


        <!--Copy Rights-->
        <p>Copyright &copy; 2022 MANGENET . All Rights Reserved</p>

    </footer>

    <form id="logout-form" action="./manager_auth_middleware.php" method="POST" style="display: none;">
        <input type="hidden" name="signout" value="1">
    </form>

</body>

</html>