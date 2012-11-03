<?php
ob_start();
?> 

<div style="background:#dddddd;margin-top:70px;" >
    <div class="center" style="padding:10px;height:200px;position:relative">
        <div style="position:absolute;width:300px;">
            <ul id="task-av">
                <li >
                    <a class="act-item" href="javascript:void(0);">Add words</a>
                </li>
                <li>
                    <a class="act-item" href="javascript:void(0);">Browse ...</a>
                </li>
                <li>
                    <a class="act-item" href="javascript:void(0);">Stats</a>
                </li>
                <li>
                    <a class="act-item" href="javascript:void(0);">Compare with peers</a>
                </li>
            </ul>       
        </div>
        <div id="specbx">

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
<?php
$pageTitle = "DEVTRUNK GRE";
$pageMainContent = ob_get_contents();
ob_end_clean();

include 'masterpage.php';
?>
      

