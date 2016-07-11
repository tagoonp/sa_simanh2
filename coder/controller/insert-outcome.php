<?php
session_start();

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>SIMANH : Inp rogress....</title>
    <link rel="stylesheet" type="text/css" href="../../library/sweetalert/dist/sweetalert.css">
    <script src="../../library/sweetalert/dist/sweetalert.min.js"></script>
  </head>
  <body>

  </body>
</html>
<?php


include "../../database/database.class.php";
$db = new database();
$db->connect();

$tbprefix = $db->getTablePrefix();
$sessionName = $db->getSessionname();

if(isset($_SESSION[$sessionName.'sessID'])){
  if($_SESSION[$sessionName.'sessID']==session_id()){
    if(isset($_SESSION[$sessionName.'sessUsername'])){

    }else{
      header('Location: ../../');
      exit();
    }
  }else{
    header('Location: ../../');
    exit();
  }
}else{
  header('Location: ../../');
  exit();
}

if(isset($_SESSION[$sessionName.'PID'])){

}else{
  header('Location: ../../');
  exit();
}

$strSQL = sprintf("SELECT * FROM ".$tbprefix."outcome WHERE record_id = '%s'", mysql_real_escape_string($_SESSION[$sessionName.'PID']));
$result = $db->select($strSQL,false,true);

$nbID = 1;
if($result){
  if(sizeof($result)>0){
    $nbID = sizeof($result) + 1;
  }
}

$gender = 'N/A';
if($_POST['radio-gender']==1){
  $gender = 'Male';
}else if($_POST['radio-gender']==2){
  $gender = 'Female';
}

$strSQL = sprintf("INSERT INTO ".$tbprefix."outcome VALUE ('', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s')",
          mysql_real_escape_string($gender),
          mysql_real_escape_string($_POST['txt-birth']),
          mysql_real_escape_string($_POST['radio-alive']),
          mysql_real_escape_string($_POST['radio-alivecon']),
          mysql_real_escape_string($_POST['txt-ga5']),
          mysql_real_escape_string($_POST['txt-ga10']),
          mysql_real_escape_string($_POST['radio-resus']),
          mysql_real_escape_string($_POST['txt-bw']),
          mysql_real_escape_string($_POST['txt-hc']),
          mysql_real_escape_string($_POST['txt-fl']),
          mysql_real_escape_string($_POST['radio-bdf']),
          mysql_real_escape_string($_POST['txt-bdfindentift']),
          mysql_real_escape_string($_POST['radio-bdn']),
          mysql_real_escape_string($_POST['radio-ebf']),
          mysql_real_escape_string($_POST['radio-bf']),
          mysql_real_escape_string($_POST['radio-ff']),
          mysql_real_escape_string($_POST['radio-s2s']),
          mysql_real_escape_string($_POST['radio-lbhiv']),
          mysql_real_escape_string($_POST['radio-na']),
          mysql_real_escape_string($_POST['txt-dateadm']),
          mysql_real_escape_string($_POST['txt-timeadm']),
          mysql_real_escape_string($_POST['radio-neo7']),
          mysql_real_escape_string($_POST['radio-neo28']),
          mysql_real_escape_string($_POST['radio-sep']),
          mysql_real_escape_string($_POST['txt-tranfac']),
          mysql_real_escape_string("nb.".$_SESSION[$sessionName.'PID']."-".$nbID),
          mysql_real_escape_string($_SESSION[$sessionName.'PID'])
        );
$resultInsert = $db->insert($strSQL,false,true);

if($resultInsert){
  $db->disconnect();
  ?>
  <script type="text/javascript">
    swal({
      title: "Seccess!",
      text: "Insert newborn information success!",
      type: "success",
      showCancelButton: false,
      confirmButtonColor: "teal",
      confirmButtonText: "Go to next step",
      closeOnConfirm: false
    }, function(){
      window.location = '../add-newborn.php';
    });
  </script>
  <?php
}else{
  ?>
  <script type="text/javascript">
    swal({
      title: "Sorry",
      text: "Can not newborn delivery information!",
      type: "warning",
      showCancelButton: false,
      confirmButtonColor: "#DD6B55",
      confirmButtonText: "Go back",
      closeOnConfirm: false
    }, function(){
      window.history.back();
    });
  </script>
  <?php
}


?>
