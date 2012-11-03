<?php
    ob_start();
?>

<div class="center" style="height:200px;">
   This is just an experimental project!
</div>
  
<?php
   $pageTitle = 'About - DEVTRUNK GRE';
   $pageMainContent = ob_get_contents();
   ob_end_clean();
   
   include 'sitemasterpage.php';
?>