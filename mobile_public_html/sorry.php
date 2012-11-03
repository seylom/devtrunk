<?php  
    include_once 'inc/dash.inc.php';
?>

<div style="padding:10px;">
    Oups!<br/>
    Sorry but Rusty didn't want me to implement this!
</div>

<?php 
    
$pageTitle = "Start a test - Dashboard  - DEVTRUNK GRE";
$pageMainContent = ob_get_contents();
ob_end_clean();

include 'usermasterpage.php';
    
?>