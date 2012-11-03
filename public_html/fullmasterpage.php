<?php
if (!isset($_SESSION)) {
    session_start();
}

require_once '../application/configs/config.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title><?php echo $pageTitle ?></title>
        <link type="text/css" rel="stylesheet" href='<?php echo SERVER_URL . "/assets/css/base.css"; ?>' />
        <link type="text/css" rel="stylesheet" href='<?php echo SERVER_URL . "/assets/css/tipTip.css"; ?>' />
        <script type="text/javascript" src='<?php echo SERVER_URL . "/assets/js/jquery.js"; ?>' ></script>
        <script type="text/javascript" src="<?php echo SERVER_URL.'/assets/js/jquery.tipTip.minified.js'; ?>" ></script>
    </head>
    <body>
        <div id="db_header">
            <div style="float:left;width:200px;height:50px;padding:6px 20px;">
                <a style="outline:none;text-decoration: none;" href=<?php echo SERVER_URL ?> title="devtrunk" >
                    <div>
                        <div id="logo">DEVTRUNK GRE</div>
                        <div id="lg_catch">SIMPLE VOCABULARY BUILDER</div> 
                    </div>
                </a>
            </div>             
        </div>

        <table width="100%">
            <tr>
                <td style="width:170px;" valign="top">
                    <div id="dash_mn_bx">       
                        <div>
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
                                        <span style="margin-left:24px;"> Your words</span>
                                    </a>
                                </li> 
                                <li>
                                    <a class="dm_it" href="/addyourword.php">
                                        <span class="icon" id="add_ico"> </span>
                                        <span style="margin-left:24px;">Add new words</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="dm_it" href="/definition.php">
                                        <span class="icon" id="add_ico"> </span>
                                        <span style="margin-left:24px;">Find a word definition</span>
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
                                        <span style="margin-left:24px;">Start a test</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </td>
                <td style="text-align: left;" valign="top">
                    <div id="dash_bd">
                        <?php echo $pageMainContent; ?>
                    </div>

                </td>
            </tr>

        </table>
        <div id="db_footer">

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
                            
                $(".wrd").tipTip();
            });      
        </script>
    </body>
</html>
