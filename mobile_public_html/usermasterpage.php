<?php
if (!isset($_SESSION)) {
    session_start();
}

require_once 'inc/top.inc.php';
require_once '../application/configs/config.php';

?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <?php if($browser == 'iphone'){ ?>
            <meta name="viewport"
                content="width=device-width,
                    minimum-scale=1.0, maximum-scale=1.0" />
         <?php } ?>
        <title><?php echo $pageTitle ?></title>
           <link type="text/css" rel="stylesheet" 
              href='<?php echo MOBILE_SERVER_URL . "/assets/css/mobile_base.css"; ?>'  />
           
        <script type="text/javascript" src='<?php echo MOBILE_SERVER_URL . "/assets/js/jquery.js"; ?>' ></script>
    </head>
    <body>
        <div id="viewport" style="background-color:#fafafa;">
            <div id="db_header">
                <div style="float:left;width:200px;padding:6px 20px;">
                    <a style="outline:none;text-decoration: none;" href=<?php echo MOBILE_SERVER_URL ?> title="devtrunk" >
                        <div>
                            <div id="logo">DEVTRUNK GRE</div>
                            <div id="lg_catch">SIMPLE VOCABULARY BUILDER</div> 
                        </div>
                    </a>
                </div>             
            </div>
            <div id="dash_mn_bx">       

                <ul id="dash_mnu">
                    <li>
                        <a class="dm_it" href="/dashboard.php">
                            <span class="icon"  id="dash_ico"></span>
                            <span style="margin-left:24px;">Overview</span>
                        </a>
                    </li>
                    <li>

                        <a class="dm_it" href="/yourwords.php">
                            <span class="icon"  id="words_ico"> </span>
                            <span style="margin-left:24px;"> Words</span>
                        </a>
                    </li> 
                    <li>
                        <a class="dm_it" href="/addyourword.php">
                            <span class="icon" id="add_ico"> </span>
                            <span style="margin-left:24px;">Add ...</span>
                        </a>
                    </li>
                    <li>
                        <a class="dm_it" href="/yourstats.php">
                            <span  class="icon" id="stats_ico"> </span>
                            <span style="margin-left:24px;">Stats</span>
                        </a>
                    </li>

                    <li>
                        <a class="dm_it" href="/startatest.php">
                            <span class="icon"  id="test_ico"></span>
                            <span style="margin-left:24px;">Start Test</span>
                        </a>
                    </li>
                </ul>
                <div style="clear:both"></div>

            </div>

            <div id="dash_bd">
                <?php echo $pageMainContent; ?>
            </div>

            <div id="db_footer">

            </div>  
        </div>

        <script type="text/javascript">  
            $(function(){
                //select the menu item
                $('.dm_it').each(function(){
                    if ($(this).attr('href') == window.location.pathname)
                    {
                        $(this).addClass('curr');  
                    }
                    else
                    {
                        $(this).removeClass('curr');
                    }
                });
                
                $(".even,.odd").hover(function() { $(this).addClass('hilight'); },
                function() { $(this).removeClass('hilight'); });
            });      
        </script>
    </body>
</html>
