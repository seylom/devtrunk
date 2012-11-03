<?php
if (!isset($_SESSION)) {
    session_start();
}

require_once 'inc/top.inc.php';
require_once '../application/configs/config.php';

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <title><?php echo $pageTitle; ?></title>
        <link type="text/css" rel="stylesheet" 
              href='<?php echo MOBILE_SERVER_URL . "/assets/css/mobile_base.css"; ?>'  />

         <?php if($browser == 'iphone'){ ?>
            <meta name="viewport"
                content="width=device-width,
                    minimum-scale=1.0, maximum-scale=1.0" />
         <?php } ?>

    </head>
    <body style="background:#eaeaea">
        <div id="viewport" style="background-color:#e9d7ad;padding:5px;">
            <div >
                <div id="headerbx">
                    <div style="float:left;width:190px;">
                        <div>
                            <a href=<?php echo MOBILE_SERVER_URL ?> title="devtrunk" style="text-decoration: none;" >
                                <div>
                                    <div id="logo">DEVTRUNK GRE</div>
                                    <div id="lg_catch">SIMPLE VOCABULARY BUILDER</div>
                                </div>
                            </a>
                        </div>                 
                    </div>

                    <div  id="dash" style="float:right;width:100px;">
                        <?php
                        if (!isset($_SESSION['usr'])) {
                            echo '<a class="headlnk" href="' . MOBILE_SERVER_URL . '/login.php">Sign in</a>';
                        } else {
                            echo '<a class="headlnk" href="' . MOBILE_SERVER_URL . '/logout.php">Logout</a>';
                        }
                        ?>
                    </div>

                </div>  
             
                <div style="overlow:hidden;">
                    <ul id="menulst">
                        <li><a class="mnu" href='<?php echo MOBILE_SERVER_URL . '/dashboard.php'; ?>' >Dashboard</a></li>
                        <li><a class="mnu" href='<?php echo MOBILE_SERVER_URL . '/projects.php'; ?>' >Projects</a></li>
                        <li><a class="mnu" href='<?php echo MOBILE_SERVER_URL . '/ideas.php'; ?>'>Ideas</a></li>
                        <li><a class="mnu" href='<?php echo MOBILE_SERVER_URL . '/about.php'; ?>'>About us</a></li>
                    </ul>
                    <div style="clear:both;"></div>
                        
                </div>
            </div>

            <div class="contentPlaceHolder">
                <?php echo $pageMainContent; ?>
            </div>

            <div id="foot"> 
                <div style="font-size:12px;">               
                     <a href=<?php echo SERVER_URL ?>>Full site</a> &nbsp;|&nbsp;&copy 2011 devtrunk , all rights reserved.
                </div>
                <div style="margin-top:5px;">
                    <div id="ctning"  >
                        <strong style="font-size:16px;">12,435,568</strong> 
                        words entered!
                    </dv>
                    <div style="clear:both;"></div>
                </div>
                       <div id="dt_desc">
                    <p id="dt_desc_ab">
                        Use the vocabulary builder to browse and save GRE vocabulary words
                        This is an experimental tool, provided as is with no warranty!
                    </p>
                </div>    
            </div> 
        </div>
    </body>
</html>
