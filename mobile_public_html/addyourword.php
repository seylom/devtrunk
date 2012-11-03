<?php
include_once 'inc/dash.inc.php';
include_once CONTROLLERS . '/WordController.class.php';

$wordAdded = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $controller = new WordController();
    $ins_result = $controller->insertWord();


    if ($ins_result) {
        //header('location: addword.php');
        $wordname = $_POST['word'];
        $wordAdded = $wordname . ' successfully added to your dictionnary';
    }
}
?>

<div style="background-color: #fff;padding:10px;">
    <h2 style="font-weight: bold; font-size: 14px;">Adding Word</h2>
    <div style="margin:10px 0 5px 0;">
        <span style="font-size:12px;">Please enter the word you would like to add to your library...</span>
    </div> 
    <form method="POST" action="addyourword.php" >
        <div style="margin:10px 0;vertical-align: top;padding:10px;background-color:#d9f4f0">    
            <input type="text" class="iplgtxt"  name="word"/>
        </div>
        <div>
            <input type="submit" name="submit" class="btnlg" text="Add Word" value="Add word">
        </div>

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

    <div>
        <?php echo $wordAdded; ?>
    </div>
</div>

<?php
$pageTitle = 'Add new word... - DEVTRUNK GRE';
$pageMainContent = ob_get_contents();
ob_end_clean();

include 'usermasterpage.php';
?>

<script type="text/javascript">
    $(function(){
        $('#infobtn').click(function(){
            var word = $('#word_item').val();
            if (word != '')
            {
                $('#wordinfo').val(word);
            }
        });
          
          
        $('#autodef').change(function(){
              
            if($(this).is(':checked')){
                $('#descbx').slideUp(100);
            } else {
                $('#descbx').slideDown(100);
            }

        });
    });
    
</script>
