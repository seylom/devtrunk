<?php
   
    if(!isset($_SESSION))
    {
        session_start();
    }  

    require_once '../application/configs/config.php';
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <title><?php echo $pageTitle;?></title>
        <link type="text/css" rel="stylesheet" href='<?php echo SERVER_URL . "/assets/css/base.css"; ?>' />
        <script type="text/javascript" src='<?php echo SERVER_URL . "/assets/js/jquery.js"; ?>' ></script>
    </head>
    <body style="background:#eaeaea">
        <div  id="headerbar">
            <div class="center" style="height:50px;padding:4px;">
                <div id="dash" >
                    <div style="float:right;width:50px;">
                        <?php
                        if (!isset($_SESSION['usr'])) {
                            echo '<a class="headlnk" href="' . SERVER_URL . '/login.php">Sign in</a>';
                        } else {
                            echo '<a class="headlnk" href="' . SERVER_URL . '/logout.php">Logout</a>';
                        }
                        ?>
                    </div>
                </div>
            </div>            
        </div>
        <div>
            <div class="center" style="overflow:hidden;padding:20px 0">
                <div style="float:left;width:190px;">
                    <div id="logo">DEVTRUNK GRE</div>
                    <div id="lg_catch">SIMPLE VOCABULARY BUILDER</div>

                    <div style="margin-top: 20px;">
                        <p style="color:#666666;line-height: 1.4em;font-size:12px">
                            Use the vocabulary builder to browse and save GRE vocabulary words
                            This is an experimental tool, provided as is with no warranty!
                        </p>
                    </div>            
                </div>

                <div style="float:right; height:150px;">
                    <ul id="menulst">
                        <li><a class="mnu" href='<?php echo SERVER_URL . '/dashboard.php'; ?>' >Dashboard</a></li>
                        <li><a class="mnu" href='<?php echo SERVER_URL . '/addword.php'; ?>' >Add New ...</a></li>
                        <li><a class="mnu" href='<?php echo SERVER_URL . '/words.php'; ?>'>Words List</a></li>
                        <li><a class="mnu" href='<?php echo SERVER_URL . '/stats.php'; ?>'>Stats!</a></li>
                    </ul>       
                </div>          
            </div>    
        </div>