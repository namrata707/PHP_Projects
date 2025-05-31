<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignUp/SignIn</title>
    <style>
        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
        }
        body{
            background-image:url(picss1.jpg);
            background-repeat: no-repeat;
            background-size: cover;
        }
        .rf{
            width: 400px;
            height: 400px;
            border: 10px inset;
            padding: 40px;
            position: absolute;
            top: 50%;
            left: 50%;
            transform:translate(-50%,-50%);
            border-radius: 10px;
            background-color: rgba(0, 166, 255, 0.33);

        }
        h1{
            margin-bottom: 30px;
            color:black;
            font-weight:bold;
        }
        #name,#email,#password{
            width: 280px;
            height: 30px;
           
        }
        .btn{
            width: 80px;
            height: 40px;
            margin-left: 30px;
            margin-top: 15px;
            background-image: linear-gradient(120deg,rgb(61, 61, 238),white,rgb(44, 209, 138));
            border-radius: 30px;
            border: 5px inset white;
            cursor: pointer;

        }
        label{
            color: black;
        }
    </style>
</head>
<body>
    <div class="rf">
        <h1>User SignUp/SignIn</h1>
        <form action="" method="post">
            <label for="name">Name</label><br>
            <input type="text" name="name" id="name"><br><br>
            <label for="email">Email</label><br>
            <input type="email" name="email" id="email"><br><br>
            <label for="password">Password</label><br>
            <input type="password" name="password" id="password"><br><br>
            <input type="submit" class="btn" value="SignUP" name="signup" id="signup">
            <input type="submit" class="btn" value="SignIN" name="signin" id="signin">


        </form>
    </div>
    <?php
    if(isset($_POST['signup']))
    {
        $name=$_POST['name'];
        $email=$_POST['email'];
        $password=$_POST['password'];
        $mycon=mysqli_connect('localhost','root',"",'login');
        $q="insert into users values ('$name','$email','$password')";
        $res=mysqli_query($mycon,$q);
        echo $res."SignUP Completed!";


    }
    if(isset($_POST['signin']))
    {
        $name=$_POST['name'];
        $email=$_POST['email'];
        $password=$_POST['password'];
        $mycon=mysqli_connect("localhost","root","","login");
        $q="select * from users where email='$email' and password='$password'";
        $rec=mysqli_query($mycon,$q);
        if(mysqli_num_rows($rec)>0)
        {
            echo "Login!";
        }
        else{
            echo "Login Failed because invalid email or password!";
        }
    }
    ?>
</body>
</html>
