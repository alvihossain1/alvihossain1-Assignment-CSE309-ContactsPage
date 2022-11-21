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
    // echo $fname;
    // echo $lname;
    // echo $email;
    // echo $gender;
    // echo $msg;

    $textMsg = "";
    $link = mysqli_connect("localhost", "root", "", "contactdb");

    if($link === false){
        die("ERROR: Could not connect" . mysqli_connect_error());
    }

    if(isset($_POST['submit'])){

        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $msg = $_POST['msg'];

        $sql = "INSERT INTO contacts_t(fname, lname, email, msg) VALUES ('$fname', '$lname', '$email', '$msg');";


        if(mysqli_query($link, $sql)){
            $textMsg =  "Records Added Successfully";
        }
        else{
            $textMsg =  "Error";
        }
    }

    mysqli_close($link);

?>
<body>
    <div class="main" style="background: url(../assignment2/image/background.jpg);">
        <div class="nav-heading">
           <a href="index.php"><h1>Contact Us</h1></a>
        </div>
        <div class="section">
            <form class="form-container" method="POST" action="">
                <div class="form-box">
                    <div class="form-block">
                        <label class="text-label">First Name</label>
                        <input class="text-input" type="text" name="fname" required>
                    </div>
                    <div class="form-block">
                        <label class="text-label">Last Name</label>
                        <input class="text-input" type="text" name="lname" required>
                    </div>
                    <div class="form-block full-width">
                        <label class="text-label">Email</label>
                        <input class="text-input" type="email" name="email" required>
                    </div>
                    <div class="form-block full-width">
                        <label class="text-label">Message</label>
                        <textarea class="text-input no-resize area-height" name="msg"></textarea required>
                    </div>
                    
                    <div style="display: <?php if($textMsg === ""){echo "none;";}else{echo "flex;";} ?>">
                        <div class="form-block full-width">
                            <p> <?php echo $textMsg ?> </p>
                        </div>
                    </div>

                    <div class="form-block full-width">
                        <button class="form-button" type="submit" name="submit">Contact Us</button>
                    </div>
    

    
                </div>
            </form>
        </div>
    </div>
    
</body>
</html>