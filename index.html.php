<!DOCTYPE html>
<html>
<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <link rel="stylesheet" href="style.css">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
        <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
      </script>
        <title>BetterWaste Portal</title>
    </head>
<body>

<?php
    $localhost="localhost";
    $database="betterWaste";
    $userName="root";
    $password="";           
    $pdo = new PDO('mysql:dbname=' . $database . ';host=' . $localhost, $userName, $password,  //connection to database is established here
    [ PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    
    session_start();
    ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-md-6 vh-100 d-flex align-items-center justify-content-center">
       
            <form  action="index.html.php" method="POST">
                <div class="text-center"> <h1 class="fw-bold dark-blue-text"> Login To Portal </h1></div>
    <div class="row mt-3 gap-2"> 
        <div class="col-12 ">
             <input  class="w-100 form-input-border-style form-input-height border-raidus custom-input" type="text" name="username" id="username" placeholder="username"> 
            </div>
        <div class="col-12 "> 
            <input class="w-100 form-input-border-style form-input-height border-raidus custom-input" type="text" name="password" id="password" placeholder="password"> 
        </div>
    </div>


    <div class="row mt-3 gap-3 "> 
       
      <div class="col-12">
        <input class="w-100 py-3 green-button" type="submit" id="submit" name="submit" value="Login">
      </div>
    </div>

     </form>
<?php  
if(isset($_POST['submit'])){

$query=$pdo->prepare('select * from users where username =:username');
$query->execute([
':username' => $_POST['username']
]);

$username=$query->fetch();

if($username) {

if($username['password'] == $_POST['password']) {
  echo $_SESSION['user'] = $username['username'];
  echo $_SESSION['user_id'] = $username['id'];
  header("location:admin.html.php");
}

else{
    echo "no password match";
}
}
else{
    echo 'username does not match please check login details ';
}
}

?>
            </div>
            <div class="col-12 col-md-6 vh-100 grey-background d-flex justify-content-center align-items-center">
                <img src="https://portal.betterwaste.co.uk/assets/img/group-image-login.png" alt="">
        </div>
        </div>
    </div>
</body>
</html>