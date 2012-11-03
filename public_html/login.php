
<?php
    ob_start();
?>

<div class="center" style="background:#fff;padding:20px;">
    <div style="padding:20px;">
        <h3 style="font-size:14px">Sign In to the GRE Dashboard.</h3>
    </div>    
    <div style="overflow:hidden">
        <div style="float:left;width:300px;padding:20px;border-right:1px solid #bababa">
            <form  method="POST" action="login.php">
                <div style="margin:10px 0 5px 0;">
                    <span style="font-size:12px;">Username*</span>
                </div>
                <div>
                    <input id="username" name="username" type="text" class="iptxt"/>
                </div>
                <div style="margin:10px 0 5px 0;">
                    <span style="font-size:12px;">Password*</span>
                </div>
                <div>
                    <input id="password" name="password" type="password"  class="iptxt" />
                </div>
                <div style="padding:10px 0;">

                    <input type="submit" name="submit" class="btn" text="Login" value="Login">
                </div>
            </form>
        </div>
        <div style="float:left;width:250px;">
            <div style="padding:20px;margin-top: 10px;">
                <h3 style="font-size:14px">Or ...</h3>

                <div style="margin-top:10px">
<!--                    <input id="fedlogin" type="text"  class="iptxt blr" value="john.smith@google.com" />-->
                    
                    <a id="fedlog" href="try_auth.php">Login with your Google account</a>
                </div>
            </div>
        </div>
    </div>

</div>

<script type="text/javascript">
//    $(function(){
//        var smith = "john.smith@google.com";
//        
//        $("#fedlogin").focus(function(){
//            if ($(this).val() == smith)
//            {
//                $(this).val("");
//                $(this).removeClass("blr");
//            }
//        });
//        
//        $("#fedlogin").blur(function(){
//            if ($(this).val() == "")
//            {
//                $(this).val(smith);
//                $(this).addClass("blr");
//            }
//        });
//    });
</script>





<?php
   $pageTitle = 'Login - DEVTRUNK GRE';
   $pageMainContent = ob_get_contents();
   ob_end_clean();
   
   include 'sitemasterpage.php';
?>