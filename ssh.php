<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ssh cheker</title>
</head>
<body>
<?php
ini_set('display_errors', 0);
echo "<pre>";
if(isset($_POST['val'])){
 if(!empty($_POST['val'])){
  $list=explode(PHP_EOL,$_POST['val']);
  for($i=0;$i<count($list);$i++){
    $acc=explode(";",$list[$i]);
   
    $host = $acc[0];
    $port = 22;
    $username = $acc[1];
    $password = $acc[2];
  
    $connection = ssh2_connect($host, $port);
    $con = ssh2_auth_password($connection, $username, $password);
  if($con){
    ?>
    <div style="color:green">
      
     <?php print_r(" url:=> "." ".$acc[0]." "." "."userneme: ==>"." " . $acc[1]." "."passwd: =>"." " .$acc[2]." "." CONECTED".PHP_EOL);
      ?>
      </div>
      <?php
    }else{
      ?>
      <div style="color:red">
      <?php print_r(" url:=> "." ".$acc[0]." "." "."userneme: ==>"." " . $acc[1]." "."passwd: =>"." " .$acc[2]." "." NOT CONECTED!!!!".PHP_EOL);
      ?>
      </div>
      <?php
    }

  }
 }
  
}
?>
<form method="post">
<div class="form-group">
<textarea class="form-control" id="exampleFormControlTextarea1" name="val" rows="20"></textarea>
<input type="submit" name="submit" ></input>
</form>
</body>
</html>