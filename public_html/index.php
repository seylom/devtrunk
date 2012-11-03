<?php 
ob_start();
?> 

<div style="padding: 5px 0;">
    <div class="center">
        <h2 id="useit" style="font-size:20px;">Wanna use it?</h2>
    </div>    
</div>
<div style="background:#dddddd;" >
    <div class="center" style="padding:10px;height:200px;position:relative">
        <div style="position:absolute;width:300px;">
            <ul id="task-av">
                <li >
                    <a class="act-item" href="javascript:void(0);">Adding new words</a>
                </li>
                <li>
                    <a class="act-item" href="javascript:void(0);">Browsing existing ...</a>
                </li>
                <li>
                    <a class="act-item" href="javascript:void(0);">Checking your stats</a>
                </li>
                <li>
                    <a class="act-item" href="javascript:void(0);">Compare with other users</a>
                </li>
            </ul>       
        </div>
        <div id="specbx">

        </div>
    </div>      
</div>

<?php
$pageTitle = "DEVTRUNK GRE";
$pageMainContent = ob_get_contents();
ob_end_clean();

include 'sitemasterpage.php';
?>
      

