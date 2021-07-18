<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>SBM Bank</title>
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


        .navbar-light .navbar-nav .nav-link {
            color: white;
        }

        .navbar-light .navbar-brand {
            color: white;
        }

        button {
            position: relative;
            left: 47%;
            top: 50%;
            margin-top: 10px;
        }



        .btn-success {
            color: #fff;
            background-color: hsl(174, 74%, 44%);
            border-color: hsl(174, 74%, 44%);
        }

        .btn-success:hover {
            color: #fff;
            background-color: #26a69a;
            border-color: #26a69a;
        }
    </style>

</head>
<nav class="navbar navbar-expand-lg navbar-light bg-teal-400 text">
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
                <a class="nav-link" href="allcustomer.php">All Customer</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="createuser.php">New User</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="transactionhistory.php">Transaction History</a>
            </li>
        </ul>
      
    </div>
</nav>
<?php

function function_alert($message) {
      
    // Display the alert box 
    echo "<script>alert('$message');</script>";
}
$servername='localhost';
$username='root';
$password='';
$dbname = "sbmbank";
$conn=mysqli_connect($servername,$username,$password,"$dbname");
if(!$conn){
   die('Could not Connect My Sql:' .mysql_error());
}
$id='';
$id = intval($_GET['id']);
// echo $id;


$query="select * from users where id='$id'";
$result=mysqli_query($conn,$query);


while($row=mysqli_fetch_array($result))
{


    $senderid= $row[0];
    $sendername= $row[1];
    
    
    
    
    $date=date("Y-m-d");
    $amount='20';
    $receiverid='';
    $receivername='';
    


    if(isset($_POST['save']))
    {$date=date("Y-m-d");
    $amount=$_POST['amount'];
    $receiverid=$_POST['receiverid'];
    
    $query="SELECT name FROM users WHERE id='$receiverid'";
          $result=mysqli_query($conn,$query);
        $rname=mysqli_fetch_array($result);
      $receivername=$rname[0];
   
    
    $sql="INSERT into transaction (sender,receiver,datetime,amount)
    values ('$sendername','$receivername','$date','$amount')";
        if (mysqli_query($conn, $sql)) {
            function_alert("Transaction successful");

            $query="SELECT balance FROM users WHERE id='$receiverid'";
            $result=mysqli_query($conn,$query);
          $rbal=mysqli_fetch_array($result);
        $receiverbal=$rbal[0];
        
        $query="SELECT balance FROM users WHERE id='$senderid'";
        $result=mysqli_query($conn,$query);
      $r=mysqli_fetch_array($result);
    $senderbal=$r[0];

    $senderbal=$senderbal-$amount;
    $receiverbal=$receiverbal+$amount;

    $sql="update users set balance='$senderbal' where id='$senderid'";
    mysqli_query($conn,$sql);



    $sql="update users set balance='$receiverbal' where id='$receiverid'";
    mysqli_query($conn,$sql);







         } else {
            echo "Error: " . $sql . "
    " . mysqli_error($conn);
         }
         mysqli_close($conn);}
    
     
    //    echo $row[2];
    //    echo $row[3];


   ?>
   

<body>

    <h2 class="text-center mt-2">TRANSACTION</h2>

    <div class="flex items-center justify-center">
        <div class="container">
            <table class="w-full flex flex-row flex-no-wrap sm:bg-white rounded-lg overflow-hidden sm:shadow-lg my-5">
                <thead class="text-white">
                    <tr
                        class="bg-teal-400 flex flex-col flex-no wrap sm:table-row rounded-l-lg sm:rounded-none mb-2 sm:mb-0">
                        <th class="p-3 text-left" width="110px">ID</th>
                        <th class="p-3 text-left">Name</th>
                        <th class="p-3 text-left">Email</th>
                        <th class="p-3 text-left" width="110px">Balance</th>

                    </tr>
                   
                    </tr>
                </thead>
                <tbody class="flex-1 sm:flex-none">
                    <tr class="flex flex-col flex-no wrap sm:table-row mb-2 sm:mb-0">
                        <td class="border-grey-light border hover:bg-gray-100 p-3"><?php echo $row[0];?></td>
                        <td class="border-grey-light border hover:bg-gray-100 p-3 truncate"><?php echo $row[1];?></td>
                        <td class="border-grey-light border hover:bg-gray-100 p-3"><?php echo $row[2];?></td>
                        <td class="border-grey-light border hover:bg-gray-100 p-3"><?php echo $row[3];?></td>
                       
                    </tr>

                </tbody>
            </table>
        </div>
    </div>

    <style>

    </style>

    <div class="container">
        <form method="post">

            <div class="form-group">
                <label for="exampleFormControlSelect1">Transfer to:</label>
                <input type="text" class="form-control" name="receiverid">
                <!-- <select class="form-control" id="exampleFormControlSelect1" name="receiverid" >
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                </select> -->
            </div>

            <div class="form-group">
                <label for="exampleFormControlInput1">Amount</label>
                <input type="text" class="form-control"name="amount">
            </div>
            <!-- <div class="form-group">
                <label for="exampleFormControlSelect2">Example multiple select</label>
                <select multiple class="form-control" id="exampleFormControlSelect2">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                </select>
            </div> -->
            <div class="transferbtn"><button type="submit" class="btn btn-success"  name="save" value="create">Transfer</button></div>
            <!-- <button
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                        type="submit"
                        name="save" value="create">
                        Create
                    </button> -->
        </form>



    </div>
   

</body>

<?php
}


?>

</html>