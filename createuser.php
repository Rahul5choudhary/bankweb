<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .navbar-light .navbar-nav .nav-link {
            color: white;
        }

        .navbar-light .navbar-brand {
            color: white;
        }

        body {
            height: 100%;
            background-color: whitesmoke;
        }

        .container {
            position: relative;
            left: 31%;

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
                <a class="nav-link" href="allcustomer.php">All customer</a>
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

<body>
    <?php
    function function_alert($message) {
      
        // Display the alert box 
        echo "<script>alert('$message');</script>";
    }
      
include_once 'database.php';
if(isset($_POST['save']))
{	 
	 $name = $_POST['name'];
	 $email = $_POST['email'];
	 $balance = $_POST['balance'];

	 $sql = "INSERT INTO users (name,email,balance)
	 VALUES ('$name','$email','$balance')";
	 if (mysqli_query($conn, $sql)) {
		function_alert("Hurray! User Created");
	 } else {
		echo "Error: " . $sql . "
" . mysqli_error($conn);
	 }
	 mysqli_close($conn);
}
?>
    <h2 class="text-center mt-2">CREATE USER</h2>
    <div class="container">
        <div class="max-w-xs w-full ml-5 mt-5">
            <form method="post"  class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                        Name
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        name="name" type="text" placeholder="Name">
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                        Email
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        name="email" type="text" placeholder="email">
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="balance">
                        Balance
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        name="balance" type="text" placeholder="Balance">
                </div>

                <div class=" flex items-center justify-between">
                    <button
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                        type="submit"
                        name="save" value="create">
                        Create
                    </button>

                </div>
            </form>

        </div>
    </div>

 
</body>

</html>