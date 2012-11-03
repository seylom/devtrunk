
<?php
ob_start();
?>

<div class="center">

        <div style="padding:20px;margin-top: 10px;">
            <div style="margin-top:10px; width:250px;">
                <a id="fedlog" href="try_auth.php">Login with your Google account</a>
            </div>
        </div>
</div>

<?php
$pageTitle = 'Login - DEVTRUNK GRE';
$pageMainContent = ob_get_contents();
ob_end_clean();

include 'masterpage.php';
?>