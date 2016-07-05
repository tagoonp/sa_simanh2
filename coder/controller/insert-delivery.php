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

$strSQL = sprintf("SELECT * FROM ".$tbprefix."delivery WHERE record_id = '%s'", mysql_real_escape_string($_SESSION[$sessionName.'PID']));
$result = $db->select($strSQL,false,true);

if($result){
  $strSQL = sprintf("DELETE FROM ".$tbprefix."delivery WHERE record_id = '%s' ", mysql_real_escape_string($_SESSION[$sessionName.'PID']));
  $resultDelete = $db->delete($strSQL);
}

$strSQL = sprintf("INSERT INTO ".$tbprefix."delivery VALUE ('', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s')",
          mysql_real_escape_string($_POST['txt-gadel']),
          mysql_real_escape_string($_POST['txt-datedel']),
          mysql_real_escape_string($_POST['txt-timedel']),
          mysql_real_escape_string($_POST['txt_moddel']),
          mysql_real_escape_string($_POST['inditation']),
          mysql_real_escape_string($_POST['txt-typeba']),
          mysql_real_escape_string($_POST['txt-mt-ba']),
          mysql_real_escape_string($_POST['txt-mt-ba-id']),
          mysql_real_escape_string($_POST['radio-rpr']),
          mysql_real_escape_string($_POST['radio-rprt']),
          mysql_real_escape_string($_POST['radio-hiv']),
          mysql_real_escape_string($_POST['radio-onart']),
          mysql_real_escape_string($_POST['radio-hiv1test']),
          mysql_real_escape_string($_POST['radio-hiv12test']),
          mysql_real_escape_string(''),
          mysql_real_escape_string($_POST['radio-cd4']),
          mysql_real_escape_string($_POST['txt-cd4count']),
          mysql_real_escape_string($_POST['radio-artdel']),
          mysql_real_escape_string($_POST['radio-bba']),
          mysql_real_escape_string($_POST['txt-gaadm']),
          mysql_real_escape_string($_POST['txtLbstage']),
          mysql_real_escape_string($_POST['txt-Datelbs']),
          mysql_real_escape_string($_POST['txt-Timelbs']),
          mysql_real_escape_string($_POST['txt-Daterm']),
          mysql_real_escape_string($_POST['txt-Timerm']),
          mysql_real_escape_string($_POST['txt-Date34']),
          mysql_real_escape_string($_POST['txt-Time34']),
          mysql_real_escape_string($_POST['txt-Datefd']),
          mysql_real_escape_string($_POST['txt-Timefd']),
          mysql_real_escape_string($_POST['txt-durr']),
          mysql_real_escape_string($_SESSION[$sessionName.'PID'])
        );
$resultInsert = $db->insert($strSQL,false,true);

if($resultInsert){
  $db->disconnect();
  ?>
  <script type="text/javascript">
    swal({
      title: "Seccess!",
      text: "Insert obstetric information success!",
      type: "success",
      showCancelButton: false,
      confirmButtonColor: "teal",
      confirmButtonText: "Go to next step",
      closeOnConfirm: false
    }, function(){
      window.location = '../add-delivery.php';
    });
  </script>
  <?php
}else{
  ?>
  <script type="text/javascript">
    swal({
      title: "Sorry",
      text: "Can not insert obstetric information!",
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
