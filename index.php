<?php
    $link= mysqli_connect("shareddb-w.hosting.stackcp.net","formTest-31343940eb","t4sg4nsr7h","formTest-31343940eb");
    echo mysqli_connect_error(); 
    $firstName=$_POST['first-name'];
    $lastName=$_POST['last-name'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $confirmPassword=$_POST['confirm-password'];
?>
<html>
    <head>
        <title>Sign Up Form</title>
        <script type="text/javascript" src="jquery-3.4.1.min.js"></script>
        <style type="text/css">
            *{
                margin: 0 auto;
                box-sizing: border-box;
            }
            body{
                background-color: #3598DC;
                font-family: sans-serif;
            }
            .container{
                background-color: #FFFFFF;
                margin: 0 auto;
                width: 400px;
                height: 580px;
                margin-top: 50px;
                padding: 30px;
                border-radius: 4px;
            }
            h1{
                margin-bottom: 10px;
            }
            small{
                color: 	#A59A9A;
                font-size: 15px;
            }
            hr{
                border: 0.2px solid #F0F0F0;
                margin: 20px 0 10px 0;
            }
            input{
                display: inline-block;
                height: 45px;
                border: 0;
                margin-top: 20px;
                width: 340px;
                background-color: #F5F5F5;
                padding-left: 10px;
                font-size: 14px;
            }
            #first-name, #last-name{
                width: 155px;
            }
            #first-name{
                margin-right: 20px;
            }
            #terms-check{
                height: 12px;
                width: 12px;
                margin-right: 10px;
            }
            a{
                text-decoration: none;
            }
            #sign-up{
                padding: 15px 40px;
                background-color: #3598DC;
                color: white;
                font-size: 16px;
                font-weight: bold;
                border: 0;
                border-radius: 2px;
                margin-top: 20px;
            }
            .error,.success{
                margin-top: 20px;
                background-color: rgba(168,0,0,0.4);
                width: 340px;
                padding-top: 15px;
                padding-bottom: 15px;
                padding-left: 15px;
                border-radius: 4px;
            }
            .success{
                 background-color: rgba(50,205,50,0.4);
            }
        </style>
    </head>
    <body>
        <div class="container">
        <h1>Sign Up</h1>
        <small>Please fill this form to create an account</small>
        <hr>
        <form method="post">
            <input type="text" id="first-name" name="first-name" placeholder="First Name" value="<?php echo $_POST['first-name'] ?>" required>
            <input type="text" id="last-name" name="last-name" placeholder="Last Name" value="<?php echo $_POST['last-name'] ?>" required>
            <input type="email" id="email" name="email" placeholder="Email" value="<?php echo $_POST['email'] ?>" required>
            <input type="password" id="password" name="password" placeholder="Password" required>
            <input type="password" id="confirm-password" name="confirm-password" placeholder="Confirm Password" required>
            <div class="terms">
            <input type="checkbox" id="terms-check" required>
                <label><small>I accept the <a href="#">Terms of Use </a>&amp; <a href="#">Privacy Policy</a></small></label>
            </div>
            <button type="submit" id="sign-up" name="sign-up">Sign Up</button>
        </form>
            <?php
            if($_POST){
                if($password != $confirmPassword)
                    exit("<div class='error'>Password doesn't match</div>");
                else{
                    $query="SELECT email FROM formTest";
                    if($result=mysqli_query($link,$query)){
                        while($row=mysqli_fetch_array($result)){
                            if($row[0]==$email)
                                exit("<div class='error'>This email is already registered</div>");
                        }
                    }
                    $query_insert="INSERT INTO formTest (`first name`,`last name`,`email`,`password`) VALUES ('".mysqli_real_escape_string($link,$firstName)."','".mysqli_real_escape_string($link,$lastName)."','".mysqli_real_escape_string($link,$email)."','".mysqli_real_escape_string($link,$password)."')";
                    if(mysqli_query($link,$query_insert)){
                        exit("<div class='success'>Registered Successfully</div>");
                    }
                }
            }
            ?>
        </div>
    </body>
</html>