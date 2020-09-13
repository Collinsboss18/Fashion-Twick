<?php
session_start();
$_SESSION['infoA']=="";
session_unset();
//session_destroy();
$_SESSION['msg']="You have successfully logout";
?>
<script language="javascript">
    document.location="/";
</script>