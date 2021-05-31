<?php
    if(isset($_POST["export_vm_usage"]))  
    {   
        $curDate = date("Ymd");
        // CREATE CONNECTION
        $dbc = @mysqli_connect ('localhost', 'id11209645_techadmin', '5W(gtMlz?748#gUX', 'id11209645_techarmy') OR die ('Could not connect to MySQL: ' . mysqli_connect_error());
        header('Content-Type: application/xls; charset=utf-8');  
        header('Content-Disposition: attachment; filename=vm_usage_report('.$curDate.').xls');
        header("Pragma: no-cache"); 
        header("Expires: 0");
        
        $uuid = $_POST["uuid"];
        $query = "SELECT * FROM vm_usage WHERE uuid = '".$uuid."'";
        $result = mysqli_query($dbc, $query);  

        echo '<table border="1">';
        echo '<tr><th colspan="4" style="font-size:25px; font-weight:bold;"><br />VM Usage Summary Report<br />';
        echo '<p style="text-align:right; font-size:12px;">Date:'.date("d/m/Y").'<br /></p><br /></th></tr>';
        echo '<tr><th>UUID</th><th>Usage Date</th><th>CPU Usage</th><th>Memory Usage</th></tr>';
        while ($row = mysqli_fetch_assoc($result)){
            echo "<tr><td>".$row['uuid']."</td><td>".$row['usageDate']."</td><td>".number_format($row['cpuUsed'],2)."%</td><td>".number_format($row['memoryUsed']/1000,2)."mib</td></tr>";
        }

        $query2 = "SELECT COUNT(uuid) AS total FROM vm_usage WHERE uuid = '".$uuid."'";
        $result2 = mysqli_query($dbc, $query2);
        while ($row = mysqli_fetch_assoc($result2)) {
            echo '<tr><td colspan="4"><br />&nbsp; <b>A total of VM Usage Written:</b> '.$row['total'].'<br />';    
        }
        
        $query3 = "SELECT AVG(cpuUsed) AS cpuAvg, AVG(memoryUsed) AS memoryAvg FROM vm_usage WHERE uuid = '".$uuid."'";
        $result3 = mysqli_query($dbc, $query3);
        
        while ($row = mysqli_fetch_assoc($result3)) {
            echo '&nbsp; <b>Memory Average Usage:</b> '.number_format($row['memoryAvg']/1000,2).'mib<br />';
            echo '&nbsp; <b>CPU Average Usage:</b> '.number_format($row['cpuAvg'],2).'%<br /><br /><p style="font-size:20px; font-weight:bold; text-align:center;">TECH ARMY<br /><br /></p></td></tr>';
        }
        echo '</table>';
    }  
?>  