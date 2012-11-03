<?php
include_once 'inc/dash.inc.php';

include_once CONTROLLERS.'/WordController.class.php';



$controller = new WordController();

$viewmodel = $controller->indexAll();
?>


<div style="background-color:#000000;">
 <?php
        $result = $viewmodel->getWords();
        
        echo "<ul id='dashlist_wd' style='list-style:none;'>";
        
        if ($result)
        {
            foreach ($result as $item) 
            {
                $val = $item->getValue();
                $desc = $item->getDescription();
                $listitem = "<li><a class='wrd_ft' href='javascript:void(0);'><span class='w_dval'>$val</span><div class='w_d'>$desc</div></a></li>";

                echo $listitem;

            }
        }
        
        echo "</ul>";         
?>

</div>

<?php
$pageTitle = "Your Stats - Dashboard  - DEVTRUNK GRE";
$pageMainContent = ob_get_contents();
ob_end_clean();

include 'usermasterpage.php';
?>