<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        
            $val = 'I am a get request';
            
            if ($_SERVER['REQUEST_METHOD'] == 'POST')
            {
                $val = 'I am a post request';
            }
        ?>
        
        <div>
            <form method ="POST" action ="test.php">
                <input type="submit" name ="submitrequest" value ="Submit test"/>
            </form>
        </div>
        <div> 
            <?php  echo $val; ?>
        </div>
        
    </body>
</html>
