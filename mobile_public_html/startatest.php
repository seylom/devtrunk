<?php  
    include_once 'inc/dash.inc.php';
?>

<div style="padding:10px;">
    <div style="background:#eaeaea;height:200px;">
        
    </div>
</div>

<?php 
    
$pageTitle = "Start a test - Dashboard  - DEVTRUNK GRE";
$pageMainContent = ob_get_contents();
ob_end_clean();

include 'usermasterpage.php';
    
?>