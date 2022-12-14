<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <style media="screen">
    *{
      margin:0px;
      padding:0px;.
    }
    #content{
      position: relative;
      top: 0%;
      left: 50%;
      transform:translate(-50%,20%);
      border-radius: 6px;
      height: 500px;
      width:40%;
      box-shadow: 0px 0px 2px 2px rgba(0,0,0,.2);
      overflow: hidden;
    }
    #content h1{
      margin-top: 10px;
      color:black;
      text-align: center;
      text-transform:capitalize;
      font-weight: normal;
      font-family: arial;
      letter-spacing:2px;
      font-weight:bold;

      cursor: pointer;
    }
    .login{
      position: absolute;
      top:calc(40% / 2);
      left:calc(15% / 2);
      width: 80%;
      margin:10px;
    }
    #content input{
      display: block;
      width: 100%;
      overflow: visible;
      margin: 10px auto;
      margin-bottom:30px;
      border:none;
      outline: none;
      border-bottom: 1px solid black;
    }
    #content input:nth-child(8){
      display: inline-block;
      width: 30%;
      margin-left: 60px;
      border:none;
      background: #0868a8;
      padding: 5px 5px;
      font-family: arial;
      color: white;
      text-transform: capitalize;
      font-size: 20px;
      cursor: pointer;
      transform: scale(1);
      box-shadow: 0px 0px 2px 2px rgba(0,0,0,.2);
    }
    #content input:nth-child(8):active{
      transform: scale(.9);
    }
    #content input:nth-child(9){
      display: inline-block;
      width: 30%;
      margin-left:20px;
      border:none;
      background: #0868a8;
      padding: 5px 5px;
      font-family: arial;
      color: white;
      text-transform: capitalize;
      font-size: 20px;
      cursor: pointer;
      transform: scale(1);
      box-shadow: 0px 0px 2px 2px rgba(0,0,0,.2);
    }
    #content input:nth-child(9):active{
      transform: scale(.9);
    }
    a{
      position: absolute;
      bottom:22%;
      left:60%;
      text-decoration: none;
      color: #0868a8;
      text-transform: capitalize;
      font-size: 20px;
      font-family: arial;
    }
    a:hover{
      text-decoration: underline;
    }
      .error{
        position: absolute;
        top:55%;
        left: 50%;
        transform: translate(-50%,-50%);
        font-size: 14px;
        color: red;
        font-family: arial;
      }
    </style>
  </head>
  <body>

    <div id="content">
      <h1>welcome</h1>
    <form class="login" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" autocomplete="off">
      <input type="text" name="fname" value="" placeholder="First-Name" >
      <input type="text" name="lname" value="" placeholder="Last-Name" >
      <input type="text" name="mno" value="" placeholder="Mobile-No" >
      <input type="text" name="loc" value="" placeholder="Location" >
      <input type="text" name="username" value="" placeholder="User-id" required>
      <input type="password" name="password" value="" placeholder="Password" required>
      <select class="" name="user_type" hidden>
        <option value="2">Normal</option>
      </select>
      <input type="submit" name="save" value="submit">
      <input type="reset" name="" value="Reset">
    </form>
  </div>
  </body>
</html>
<?php

if(isset($_POST['save'])){
include 'config.php';
$fname = mysqli_real_escape_string($conn,$_POST['fname']);
$lname =  mysqli_real_escape_string($conn,$_POST['lname']);
$mno =  mysqli_real_escape_string($conn,$_POST['mno']);
$loc =  mysqli_real_escape_string($conn,$_POST['loc']);
$username = mysqli_real_escape_string($conn, $_POST['username']);
$password =  mysqli_real_escape_string($conn,md5($_POST['password']));
$user_type= mysqli_real_escape_string($conn,$_POST['user_type']);


$sql = "SELECT username FROM user WHERE username ='{$username}'";
$result = mysqli_query($conn,$sql)or die("query lost");


if(mysqli_num_rows($result)>0){
  echo "<p style='color:red';text-align:center;margin:10px 0;'>username allready exists.</p>";
}else{
  $sql1 = "INSERT INTO user(first_name,last_name,mobile_no,location,username,password,user_type)
  values('{$fname}','{$lname}','{$mno}','{$loc}','{$username}','{$password}','{$user_type}')";
  if(mysqli_query($conn,$sql1)){
    header("location: http://localhost/lrn/login.php");
  }
}

}

?>
