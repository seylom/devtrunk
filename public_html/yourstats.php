<?php
include_once 'inc/dash.inc.php';
?>

<div>
    <div style="background:#e4f9f6;height:200px;">

    </div>
    <div style="overflow:hidden;">
        <div style="margin-top:10px;float:left;">
            <input type="button" text="button" value="Tests" class="btndf"/>
            <input type="button" text="button" value="Compare" class="btndf"/>
        </div>  
        <div style="margin-top:10px;float:right;">
            <input type="button" text="button" value="Previous" class="btndf"/>
            <input type="button" text="button" value="Next" class="btndf"/>
        </div>  
    </div>
</div>

<?php
$pageTitle = "Your Stats - Dashboard  - DEVTRUNK GRE";
$pageMainContent = ob_get_contents();
ob_end_clean();

include 'fullmasterpage.php';
?>