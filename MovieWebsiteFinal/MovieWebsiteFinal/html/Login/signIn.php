<?php

$is_invalid = false;

if ($_SERVER["REQUEST_METHOD"] === "POST"){

    $mysqli = require __DIR__ . "/database.php";

    $sql = sprintf("SELECT * FROM user_table 
               WHERE email = '%s'", 
               $mysqli->real_escape_string($_POST['email']));


    $result = $mysqli->query($sql);

    $user = $result->fetch_assoc();

    if($user) {
      if   (password_verify($_POST["password"], $user["password_hash"])) {

        session_start();

        session_regenerate_id();

        $_SESSION["user_id"] = $user["userId"];

        header("Location: ../homepage.php");
        exit;
      } 
   }

   $is_invalid = true;
}

?>


<!DOCTYPE html>
<html>

<head>

    <title>Sign In</title>
<link rel="stylesheet" href="Styles/signIn.css">


<title>Sign in </title>
</head>

<body>
    <div class="background-container">

        <div class="overlay"></div> 

          <div class="content">

            <form method="POST">

            <h1>Login</h1>
            
                <div class="form-columns">

                

                <?php if($is_invalid): ?>
                   <div>  <em>Invalid Login</em></div> 
                <?php endif; ?>

                  
                      
                        <label for="email">Email</label><br>
                        <input type="email" id="email" name="email" value="<?= htmlspecialchars($_POST["email"] ?? "") ?>"><br>


                        <label for="password">Password</label><br>
                        <input type="password" id="password" name="password" ><br>

                   
                </div>

            

                <!-- <script src="https://accounts.google.com/gsi/client" async></script>
                <div id="g_id_onload"
                    data-client_id="YOUR_GOOGLE_CLIENT_ID"
                    data-login_uri="https://your.domain/your_login_endpoint"
                    data-auto_prompt="false">
                </div>
                <div class="g_id_signin"
                    data-type="standard"
                    data-size="large"
                    data-theme="outline"
                    data-text="sign_in_with"
                    data-shape="rectangular"
                    data-logo_alignment="left"> <br>
                </div>
                
                <br>
                <div>
                <input type="checkbox" id="rm">
                <label for="rm">Remember me</label>
            </div> -->

                <!-- Submit button centered below the form -->

                <br><input type="submit" value="SIGN IN">



                <div class="footer">

                
                <p>Don't have an account?</p><a href="signUp.html" class="gray-button" id="l">Sign up</a>


                </div>
              
               
            </form>
        </div>
    </div> 

</body>
</html>





