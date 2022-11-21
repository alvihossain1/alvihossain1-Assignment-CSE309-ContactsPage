<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="./style/style.css">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">
    <!-- Fonts End -->
</head>
<?php 
    $textMsg = "";

    // if(isset($_POST['submit'])){
    //     $email = $_POST['email'];
    //     $pass = $_POST['password'];

    //     if($email === "admin@gmail.com" || $pass === "admin"){
    //         header('Location: adminHome.php');
    //     }
    //     else{
    //         $textMsg = "Email or Pass is incorrect";
    //     }
    // }

    $link = mysqli_connect("localhost", "root", "", "contactdb");

    if ($link === false) {
        die("ERROR: Could not connect" . mysqli_connect_error());
    }


    if(isset($_POST['submit'])){

        $emailInput = $_POST['email'];
        $passInput = $_POST['password'];

        $sql = "SELECT email, pass FROM adminUser WHERE email = '$emailInput' and pass = '$passInput'";
        $result = mysqli_query($link, $sql);
        $num = mysqli_num_rows($result);
        $textMsg = $num;

        $found = false;

        while($row = mysqli_fetch_assoc($result)){
            if($row['email'] === $emailInput || $row['pass'] === $passInput){
                header('Location: adminHome.php');
            }  
        }

        if(!$found){
            $textMsg = "Email or Pass is not found";
        }
    }

    mysqli_close($link);

?>
<body>
    <div class="main" style="background: url(../assignment2/image/background.jpg);" >
        <div class="nav-heading">
            <a href="login.php"><h1>Admin Login</h1></a>
        </div>
        <div class="section">
            <form class="form-container special" method="POST" action="">
                <div class="form-box flex-column">
                    <div class="form-block full-width" style="text-align: center;">
                        <h2>Login</h2>
                    </div>                    
                    <div class="form-block full-width">
                        <label class="text-label">Email</label>
                        <input class="text-input" type="email" name="email" required>
                    </div>
                    <div class="form-block full-width">
                        <label class="text-label">Password</label>
                        <input class="text-input" type="password" name="password" required>
                    </div>
                    
                    <div style="display: <?php if($textMsg === ""){echo "none;";}else{echo "flex;";} ?>">
                        <div class="form-block full-width">
                            <p> <?php echo $textMsg ?> </p>
                        </div>
                    </div>

                    <div class="form-block full-width">
                        <button class="form-button" type="submit" name="submit">Login</button>
                    </div>
    
                </div>
            </form>
        </div>
    </div>
    
</body>
</html>