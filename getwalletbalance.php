<?php
@$userid=$_POST['userid'];
include("db.php");
 echo number_format(wallet($conn,$userid), 2); 
 ?>