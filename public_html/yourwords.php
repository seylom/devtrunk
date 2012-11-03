<?php
include_once 'inc/dash.inc.php';

include_once CONTROLLERS . '/WordController.class.php';

$controller = new WordController();

$viewmodel = $controller->indexAll();


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $controller->updateDefinitions();
}
else{
    
}

?>

<div>
    <div style="padding:10px;margin-bottom:10px;" >
        <form method="POST" action="yourwords.php">
           <input type="submit" name="submitdefinition" class="btnlg" text="Update Definitions" value="Update definitions"/>
        </form>
    </div>
    <div>
        <?php
        $idx = 0;
        $result = $viewmodel->getWords();
        $first = true;
        $prefix = "<li class='ctg'><ul class='wdlist'>";
        $header = "<div class='dsh_cat'>word sets</div>";

        $prefix .=$header;

        echo "<ul id='dashlist' style='list-style:none;'>";

        if ($result) {
            foreach ($result as $item) {
                $val = $item->getValue();
                $desc = $item->getDescription();
                $listitem = "<li><a class='wrd' title='$desc' href='#'>$val</a></li>";
                if ($idx % 10 == 0) {
                    echo "$prefix" . $listitem;
                    $prefix = "</ul></li><li class='ctg'><ul class='wdlist'>" . $header;
                } else {
                    echo $listitem;
                }

                $idx+=1;
            }
        }
        echo "</ul></li>";

        echo "</ul>";
        ?>
    </div>
</div>

        <?php
        $pageTitle = "Your Stats - Dashboard  - DEVTRUNK GRE";
        $pageMainContent = ob_get_contents();
        ob_end_clean();

        include 'fullmasterpage.php';
        ?>
