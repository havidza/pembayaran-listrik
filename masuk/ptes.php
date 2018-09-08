<?php
  $date1=$_POST['date1'];
  $date2=$_POST['date2'];
  $datetime1 = new DateTime($date1);
  $datetime2 = new DateTime($date2);
  $difference = $datetime1->diff($datetime2);
  echo $difference->days;
  ?>