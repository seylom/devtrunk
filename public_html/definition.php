<?php
include_once 'inc/dash.inc.php';
include_once CODE_DIR.'/Wordnik.php';

$definition = '';
$wordnik = Wordnik::instance(WORDNIK_API_KEY);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    if (isset($_POST['word']))
    {
        $word = $_POST['word'];
        $word = strtolower($word);
        $result = $wordnik->getDefinitions($word,1);
        
        if ($result)
        {
            $definition = $result[0]->text;
        }
    }
    
} else {
    
}
?>

<div style="background-color: #fff;">
    <h2 style="font-weight: bold; font-size: 14px;">In need of a word definition?</h2>
    <div style="margin:10px 0 5px 0;">
        <span style="font-size:12px;">Please Enter your word...</span>
    </div>
    <div style="margin:10px 0;vertical-align: top;padding:10px;background-color:#d9f4f0">    
        <form method="POST" action="definition.php" >
            <input type="text" class="iplgtxt" name="word" />
            <input type="submit" name="submit" class="btnlg" text="Get definition" value="Get Definition">
        </form>
    </div>
    <?php if ($_SERVER['REQUEST_METHOD'] == 'POST') { ?>
        <div style="padding:10px;background-color: #eaeaea;">
            <?php echo $definition; ?>
        </div>
    <?php } ?>
</div>

<?php
$pageTitle = 'Word definitions - DEVTRUNK GRE';
$pageMainContent = ob_get_contents();
ob_end_clean();

include 'fullmasterpage.php';
?>