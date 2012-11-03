<?php
    ob_start();
?>

<div class="center" style="height:200px;">
   More on this to come very soon! Stay tuned!
</div>
  
<?php
   $pageTitle = 'Ideas - DEVTRUNK GRE';
   $pageMainContent = ob_get_contents();
   ob_end_clean();
   
   include 'sitemasterpage.php';
?>