<?php
include 'employee_auth_middleware.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Home</title>
    <link rel="stylesheet" href="css/employee.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/my-colors.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
</head>

<body>
    <header>
        <nav class="navbar navbar-lightgrey bg-lightgrey">
            <div class="container">
                <div class="col-1">
                    <a class="navbar-brand" href="#">
                        <img src="media/mini-logo.png" alt="" width="" height="75" class="d-inline-block align-text-top">
                    </a>
                </div>
                <div class="col-10 align-middle">
                    <h3 class="text-darksky">EMPLOYEE MANGENET SYSTEM</h3>
                </div>
            </div>
        </nav>
    </header>
    <div class="dashboard bg-lightgrey my-3">
        <div id="emp-info">
            <p class="emp-welcome text-darksky fs-1">Welcome <span class="emp-name"> <?php echo $auth['first_name'] ?></span>!</p>
            <p>Employee's ID: <span class="emp-id"><?php echo $auth['emp_number'] ?></span></p>
            <P>Job Title: <span class="job-title"><?php echo $auth['job_title'] ?></span></p>

        </div>
        <div id="buttons">
            <a class="offset-7 col-5 btn btn-lg btn-darksky" id="myLink" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Sign out</a>
            <a class="offset-7 col-5 btn btn-lg btn-grey" href="Add new request.php">+ Add request</a>
        </div>

        <div id="requests">

            <h3 class="main-title">Requests</h3>
            <h3 class="request-heading">In progress</h3>

            <table>
                <tr>
                    <td class="request"><a href="Request_information_page.php">1111- Promotion</a></td>
                    <td><a class="col-6 btn btn-lg btn-darksky fs-3" href="Edit_request_page.php">Edit</a></td>

                </tr>
                <tr>
                    <td class="request"><a href="Request_information_page.php">1111- Leave</a></td>
                    <td><a class="col-6 btn btn-lg btn-darksky fs-3" href="Edit_request_page.php">Edit</a></td>

                </tr>
            </table>

            <h3 class="request-heading">Previous Requests</h3>

            <table>

                <tr>
                    <th>Requests</th>
                    <th>Status</th>
                    <th> </th>
                </tr>

                <tr>
                    <td class="request"><a href="Request_information_page.php">1111- Allowance</a></td>
                    <td>Approved</td>

                    <td><a class="col-6 btn btn-lg btn-darksky fs-3" href="Edit_request_page.php">Edit</a></td>
                </tr>

            </table>

        </div>


    </div>
    <footer>

        <!--Copy Rights-->
        <p>Copyright &copy; 2022 MANGENET . All Rights Reserved</p>

    </footer>

    <form id="logout-form" action="./employee_auth_middleware.php" method="POST" style="display: none;">
        <input type="hidden" name="signout" value="1">
    </form>

    <script src="js/employee.js"></script>
</body>

</html>