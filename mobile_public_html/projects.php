<?php
    ob_start();
?>

<div class="center" style="background-color: #fff;padding:10px;">
    <div style="overflow:hidden"> 
        <div class="prj">
        </div>
       <div class="prj">
        </div>
         <div class="prj">
        </div>
         <div class="prj">
        </div>
         <div class="prj">
        </div>
         <div class="prj">
        </div>
         <div class="prj">
        </div>
         <div class="prj">
        </div>
    </div>
</div>
  
<?php
   $pageTitle = 'Words - DEVTRUNK GRE';
   $pageMainContent = ob_get_contents();
   ob_end_clean();
   
   include 'sitemasterpage.php';
?>