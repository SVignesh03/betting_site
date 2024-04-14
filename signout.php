<?php
setcookie('user', $user_name, time()-3600,"/");
header("Location: index.php?err=5");
?> 