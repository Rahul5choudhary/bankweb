<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SBM Bank</title>
    <link rel="stylesheet" href="transfermoney.css">
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        .navbar-light .navbar-nav .nav-link {
            color: white;
        }

        .navbar-light .navbar-brand {
            color: white;
        }
    </style>
</head>
<nav class="navbar navbar-expand-lg navbar-light bg-teal-400">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03"
        aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="index.php">SBM bank</a>

    <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item active">
                <a class="nav-link" href="index.php">Home </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="allcustomer.php">All customer</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="createuser.php">New User</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="transactionhistory.php">Transaction History</a>
            </li>
        </ul>
        <!-- <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button> 
        </form>-->
    </div>
</nav>

<body>

    <h2 class="text-center mt-2">TRANSACTION HISTORY</h2>

    <!-- component -->
    <div class="flex items-center justify-center">
        <div class="container">
            <table class="w-full flex flex-row flex-no-wrap sm:bg-white rounded-lg overflow-hidden sm:shadow-lg my-5">
                <thead class="text-white">
                    <tr
                        class="bg-teal-400 flex flex-col flex-no wrap sm:table-row rounded-l-lg sm:rounded-none mb-2 sm:mb-0">
                        <th class="p-3 text-left" width="50px">S.No.</th>
                        <th class="p-3 text-left ">Sender</th>
                        <th class="p-3 text-left">Receiver</th>
                        <th class="p-3 text-left">Amount</th>
                        <th class="p-3 text-left" width="-1px">Date & Time</th>
                    </tr>



                    <?php
$servername='localhost';
$username='root';
$password='';
$dbname = "sbmbank";
$conn=mysqli_connect($servername,$username,$password,"$dbname");
if(!$conn){
   die('Could not Connect My Sql:' .mysql_error());
}
$query="select * from transaction";
$result=mysqli_query($conn,$query);

while($row=mysqli_fetch_array($result))
{
   
   
//   echo $row[0];
//   echo $row[1];
//   echo $row[2];
//   echo $row[3];


?>

                </thead>
                <tbody class="flex-1 sm:flex-none">
                    <tr class="flex flex-col flex-no wrap sm:table-row">

                        <td class="border-grey-light border hover:bg-gray-100 p-3 truncate"><?php echo $row[0]; ?></td>

                        <td class="border-grey-light border hover:bg-gray-100 p-3 truncate"><?php echo $row[1]; ?></td>
                        <td class="border-grey-light border hover:bg-gray-100 p-3 truncate"><?php echo $row[2]; ?></td>
                        <td class="border-grey-light border hover:bg-gray-100 p-3"><?php echo $row[4]; ?></td>

                        <td class="border-grey-light border hover:bg-gray-100 p-3 truncate"><?php echo $row[3]; ?></td>
                        <?php }
?>
                    <!-- </tr>
                    <tr class="flex flex-col flex-no wrap sm:table-row mb-2 sm:mb-0">
                        <td class="border-grey-light border hover:bg-gray-100 p-3 truncate">2</td>

                        <td class="border-grey-light border hover:bg-gray-100 p-3 truncate">Rahul</td>
                        <td class="border-grey-light border hover:bg-gray-100 p-3 truncate">Manish</td>
                        <td class="border-grey-light border hover:bg-gray-100 p-3">10000.00</td>

                        <td class="border-grey-light border hover:bg-gray-100 p-3 truncate">2021-01-02 06:56</td>
                    </tr>
                    <tr class="flex flex-col flex-no wrap sm:table-row mb-2 sm:mb-0">
                        <td class="border-grey-light border hover:bg-gray-100 p-3 truncate">3</td>

                        <td class="border-grey-light border hover:bg-gray-100 p-3 truncate">Rahul</td>
                        <td class="border-grey-light border hover:bg-gray-100 p-3 truncate">Manish</td>
                        <td class="border-grey-light border hover:bg-gray-100 p-3">10000.00</td>

                        <td class="border-grey-light border hover:bg-gray-100 p-3 truncate">2021-01-02 06:56</td>
                    </tr>
                    <tr class="flex flex-col flex-no wrap sm:table-row mb-2 sm:mb-0">
                        <td class="border-grey-light border hover:bg-gray-100 p-3 truncate">4</td>

                        <td class="border-grey-light border hover:bg-gray-100 p-3 truncate">Rahul</td>
                        <td class="border-grey-light border hover:bg-gray-100 p-3 truncate">Manish</td>
                        <td class="border-grey-light border hover:bg-gray-100 p-3">10000.00</td>

                        <td class="border-grey-light border hover:bg-gray-100 p-3 truncate">2021-01-02 06:56</td>
                    </tr>
                    <tr class="flex flex-col flex-no wrap sm:table-row mb-2 sm:mb-0">
                        <td class="border-grey-light border hover:bg-gray-100 p-3 truncate">5</td>

                        <td class="border-grey-light border hover:bg-gray-100 p-3 truncate">Rahul</td>
                        <td class="border-grey-light border hover:bg-gray-100 p-3 truncate">Manish</td>
                        <td class="border-grey-light border hover:bg-gray-100 p-3">10000.00</td>

                        <td class="border-grey-light border hover:bg-gray-100 p-3 truncate">2021-01-02 06:56</td>
                    </tr>
                    <tr class="flex flex-col flex-no wrap sm:table-row mb-2 sm:mb-0">
                        <td class="border-grey-light border hover:bg-gray-100 p-3 truncate">6</td>

                        <td class="border-grey-light border hover:bg-gray-100 p-3 truncate">Rahul</td>
                        <td class="border-grey-light border hover:bg-gray-100 p-3 truncate">Manish</td>
                        <td class="border-grey-light border hover:bg-gray-100 p-3">10000.00</td>

                        <td class="border-grey-light border hover:bg-gray-100 p-3 truncate">2021-01-02 06:56</td>
                    </tr> -->
                   
                </tbody>
            </table>
        </div>
    </div>

    <style>
        html,
        body {
            height: 100%;
            background-color: whitesmoke;
        }

        @media (min-width: 640px) {
            table {
                display: inline-table !important;
            }

            thead tr:not(:first-child) {
                display: none;
            }
        }

        td:not(:last-child) {
            border-bottom: 0;
        }

        th:not(:last-child) {
            border-bottom: 2px solid rgba(0, 0, 0, .1);
        }
    </style>

    




</body>

</html>