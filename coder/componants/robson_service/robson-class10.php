<?php
$strSQL = sprintf("SELECT count(*) total FROM ".$tbprefix."registerrecord a
          left join ".$tbprefix."delivery c on a.record_id = c.record_id
          left join ".$tbprefix."outcome d on a.record_id = d.record_id
          left join ".$tbprefix."complication_delivery e on a.record_id = e.record_id
          WHERE
          a.confirm_status = 1
          AND a.username in (SELECT a.username FROM ".$tbprefix."useraccount a inner join ".$tbprefix."userdescription b on a.username = b.username WHERE b.institute_id = '%s')
          AND c.ga_del >= '37'
          AND c.indication not in ('3', '12')
          AND a.date_adm between '".$start_date."' and '".$end_date."'
          GROUP BY a.record_id HAVING COUNT(*) = 1", mysql_real_escape_string($valueUserinfo['institute_id']));
$result = $db->select($strSQL,false,true);

if($result){
  print number_format(sizeof($result));
}else{
  print "-";
}
?>
