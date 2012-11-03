<?php
include_once 'inc/dash.inc.php';

include_once CONTROLLERS.'/DashboardController.class.php';
include_once CODE_DIR.'/Paging.class.php';

$controller = new DashboardController();
$dashboardmodel = $controller->index();

$count = $dashboardmodel->getTotalWords();
$pager = new Paging(20, 'page', $count);
$val = $pager->getLinks();

$pagerlinks = $val;
?>

<div>
    <h2 style="font-size:14px;font-weight: bold"> Quick summary of your activities this week!</h2>

    <div style="padding:20px;background-color: #f9feff;margin-top:10px;">
        <ul id="dashlist" style="list-style:none;">
            <li class="ctg">
                <div class="dsh_cat">
                    Words this week.
                </div>
                <ul class="wdlist">      
                    <?php
                    $resultset = $dashboardmodel->words;
                    if ($resultset != null) {
                        foreach ($resultset as $item) {
                            $val = $item->getValue();
                            echo "<li><a class='wrd' href='#'>$val</a>";
                        }
                    }
                    ?>
                </ul>
            </li>
            <li class="ctg">
                <div class="dsh_cat">
                    So far...
                </div>
                <ul id="sofar">
                    <li>
                        <span><b><?php echo $count;?></b> words</span>
                    </li>
                    <li>
                        <span><b>0</b> tests</span>
                    </li>
                    <li>
                        <span><b>0%</b> success rate!</span>
                    </li>
                </ul>
            </li>
            <li class="ctg">
                <div class="dsh_cat">
                    Your stats.
                </div>
                <div style="width:500px;">
                    <table class="stats_graph" cellspacing="1">
                        <tr style="height:70px;">
                            <?php
                            //$max = 30;
                            $idx = 0;
                            $stats = $dashboardmodel->getStats();
                            
                            if ($stats)
                            {
                            
                                foreach($stats as $item)
                                {
                                    $vals = $item->getTotal().'px';

                                     echo "<td class='bar' style='width:20px;' valign='bottom'>
                                            <div class='baritem'  style='width:20px;height:$vals;background-color:#95BDE7'> 
                                            </div>
                                           </td>";

                                     $idx+=1;

                                     if ($idx > 30)
                                     {
                                         break;
                                     }
                                }
                            }
                            
                            ?>
                        </tr>
                        <tr>
                            <?php
                            
                            $days = array('Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun');
                            $idx = 0;
                            
                            if ($stats)
                            {
                                foreach($stats as $item)
                                {
                                     $timestamp = strtotime($item->getDate());
                                     $date = date("d",$timestamp);

                                     echo "<td align='center' class='day'  valign='bottom'>
                                               <span style='font-size:10px;'>$date</span>
                                          </td>";

                                     $idx+=1;

                                     if ($idx > 30)
                                     {
                                         break;
                                     }
                                }
                            }
                            ?>
                        </tr>
                        <tr>
                            
                        </tr>
                    </table>
                </div>
            </li>
            <li class="ctg"></li>
        </ul>
    </div>

    <div id="grid_ct">
        <table class="tbl" style="width:100%;">
            <col style="width:100px;"/>
            <col/>
            <col style="width:150px;"/>
            <col style="width:100px;"/>
            <thead>
            <th>Word</th>
            <th>Description</th>
            <th style="text-align:right;">added date</th>
            <th></th>
            </thead>
            <tbody>
                <?php
                $idx = 0;

                $setitems = $dashboardmodel->getWordLargeSet();
                if ($setitems != null) {
                    foreach ($setitems as $item) {
                        $id = $item->getId();
                        $val = $item->getValue();
                        $desc = $item->getDescription();
                        $date = $item->getAddedDate();

                        $cls = ($idx % 2 == 0) ? 'even' : 'odd';

                        echo "<tr id='item_$id' class='tr-wrd $cls'>
                                    <td>$val</td>
                                    <td>$desc</td>
                                    <td style='text-align: right;'>$date</td>
                                    <td><a class='lnk' href='editword.php?id=$id'>Edit</a> | <a tag='$id' class='lnk delbtn' href='javascript:void(0);'>Delete</a></td>
                                  </tr>";

                        $idx+=1;
                    }
                }
                    ?>
            </tbody>
        </table>   
        <div class="pager">
            <?php
            echo "$pagerlinks";
            ?>
        </div>
    </div>
</div>

<script type="text/javascript">
    
    $(function(){
        
        $(".delbtn").click(function() {
        
            if (confirm("Are you sure you want to delete this word?"))
            {
                var tag = $(this).attr('tag');
           
                if ((tag !== undefined) && (tag !== '')) {
            
                    $.post("/deleteword.php",{id:tag});
                    
                     $('#item_'.tag).fadeOut(
                        function(){
                         
                         $('#item_'.tag).remove();
                     
                     });
                }       
            }
        });
        
        $('.tr-wrd').hover(function() {     
           
        });
       
    });
    

</script>

<?php
$pageTitle = "Dashboard - DEVTRUNK GRE";
$pageMainContent = ob_get_contents();
ob_end_clean();

include 'fullmasterpage.php';
?>