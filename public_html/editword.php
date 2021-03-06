<?php
include_once 'inc/dash.inc.php';
include_once CONTROLLERS . '/WordController.class.php';

$wordAdded = '';
$word_id;
$word_value;

$controller = new WordController();
$editviewModel;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $ins_result = $controller->updateWord();

    if ($ins_result) {
        header('location: dashboard.php');
        //$wordname = $_POST['word'];
        //$wordAdded = $wordname.' was successfully updated !';
    }
} else {
    if (isset($_GET['id'])) {
        $word_id = $_GET['id'];
        $editviewModel = $controller->editWord($word_id);
        $word_value = $editviewModel->getWord()->getValue();
    }
}
?>

<div style="background-color: #fff;">
    <h2 style="font-weight: bold; font-size: 14px;">Editing a Word?</h2>
    <div style="margin:10px 0 5px 0;">
        <span style="font-size:12px;">Please modify your word...</span>
    </div>
    <div style="margin:10px 0;vertical-align: top;padding:10px;background-color:#d9f4f0">    
        <form method="POST" action="editword.php" >
            <input type="text" class="iplgtxt" name="word" value="<?php echo $word_value; ?>"/>
            <input type="submit" name="submit" class="btnlg" text="Update Word" value="Update word">

            <?php
            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                echo "<input type='hidden' name='wordid' value='$word_id'/>";
            }
            ?>

            <div style="margin: 10px 0">
                <input id="autodef" type="checkbox" name="autodef" text="Look up definition automatically" value="auto" checked="checked" />
                <span> Look up definition automatically</span>
            </div>

            <div id="descbx"  style="display:none;">

                <h2 style="font-weight: bold; font-size: 14px;">Add definition</h2>
                <div style="margin:10px 0 5px 0;">
                    <span style="font-size:12px;">Please enter the word definition.</span>
                </div>

                <div  style="padding:10px;background-color:#d9f4f0 ">
                    <input id="word_def" name="word_def" type="text" class="iplgtxt" name="word"/> 
                </div>
            </div>
        </form>
    </div>
    <div>
        <?php echo $wordAdded; ?>
    </div>
</div>

<?php
$pageTitle = 'Edit word... - DEVTRUNK GRE';
$pageMainContent = ob_get_contents();
ob_end_clean();

include 'fullmasterpage.php';
?>