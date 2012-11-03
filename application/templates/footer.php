        <div style="background:#f5f5f5;margin-top: 20px;height:200px;"> 

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
