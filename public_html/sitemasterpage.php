<?php
if (!isset($_SESSION)) {
    session_start();
}

require_once '../application/configs/config.php';
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <title><?php echo $pageTitle; ?></title>
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
                    <div>
                        <a href=<?php echo SERVER_URL ?> title="devtrunk" style="text-decoration: none;" >
                            <div>
                                <div id="logo">DEVTRUNK GRE</div>
                                <div id="lg_catch">SIMPLE VOCABULARY BUILDER</div>
                            </div>
                        </a>
                    </div>
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
                        <li><a class="mnu" href='<?php echo SERVER_URL . '/projects.php'; ?>' >Projects</a></li>
                        <li><a class="mnu" href='<?php echo SERVER_URL . '/ideas.php'; ?>'>Ideas</a></li>
                        <li><a class="mnu" href='<?php echo SERVER_URL . '/about.php'; ?>'>About us</a></li>
                    </ul>       
                </div>          
            </div>    
        </div>

        <div class="contentPlaceHolder">
            <?php echo $pageMainContent; ?>
        </div>

        <div style="background:#f5f5f5;margin-top: 20px;"> 

            <div class="center" style="font-size:12px;padding:10px;overflow:hidden">

                <div style="float:left;width:500px"> &copy 2011 devtrunk , all rights reserved.</div>
                <div id="ctning"  >
                    <strong style="font-size:16px;">12,435,568</strong> 
                    words entered!
                </div>
            </div>   
        </div> 
        <script type="text/javascript">  
            $(function(){
                $(".mnu").hover(function(){
                    $(this).stop().animate({right:'20'},200,function(){});
                },function(){
                    $(this).stop().animate({right:'0'},200,function(){});
                });
                 
                $(".act-item").click(function(){
                    //hide current
                    $('#specbx').slideToggle('slow',function(){
                        $('#specbx').slideToggle('slow');
                    });              
                });
        
                //select the menu item
                $('.mnu').each(function(){
                    if ($(this).attr('href') == window.location.pathname)
                    {
                        $(this).addClass('current');  
                    }
                    else
                    {
                        $(this).removeClass('current');
                    }
                });
            });      
        </script>
    </body>
</html>
