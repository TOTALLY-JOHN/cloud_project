<?php
    if(isset($_POST["export_vm"]))  
    {   
        $curDate = date("Ymd");
        // CREATE CONNECTION
        $dbc = @mysqli_connect ('localhost', 'id11209645_techadmin', '5W(gtMlz?748#gUX', 'id11209645_techarmy') OR die ('Could not connect to MySQL: ' . mysqli_connect_error());
        header('Content-Type: application/xls; charset=utf-8');  
        header('Content-Disposition: attachment; filename=vm_report('.$curDate.').xls');
        header("Pragma: no-cache"); 
        header("Expires: 0");

        $query = "SELECT uuid, domainName, storageAllocation, memoryAllocation, cpuAllocation, deviceType, sourcePath, storageFormat from vm_details ORDER BY uuid ASC";  
        $result = mysqli_query($dbc, $query);  

        echo '<table border="1">';
        echo '<tr><th colspan="7" style="font-size:25px; font-weight:bold;"><br />VM Summary Report<br />';
        echo '<p style="text-align:right; font-size:12px;">Date:'.date("d/m/Y").'<br /></p><br /></th></tr>';
        echo '<tr><th>UUID</th><th>Domain Name</th><th>Storage Allocation</th><th>Memory Allocation</th><th>CPU Allocation</th><th>Device Type</th><th>Storage Format</th></tr>';
        while ($row = mysqli_fetch_assoc($result)){
            echo "<tr><td>".$row['uuid']."</td><td>".$row['domainName']."</td><td>".number_format($row['storageAllocation'] / 1000000000, 2)."GB</td><td>".number_format($row['memoryAllocation'] / 1000, 2)."mib</td><td>".$row['cpuAllocation'].($row['cpuAllocation'] == 1 ? ' core':' cores')."</td><td>".$row['deviceType']."</td><td>".$row['storageFormat']."</td></tr>";
        }

        $query2 = "SELECT COUNT(uuid) AS total FROM vm_details";
        $result2 = mysqli_query($dbc, $query2);
        while ($row = mysqli_fetch_assoc($result2)) {
            echo '<tr><td colspan="7"><br />&nbsp; <b>A total of VM:</b> '.$row['total'].'<br />';    
        }
        
        $query3 = "SELECT AVG(storageAllocation) AS storageAvg, AVG(memoryAllocation) AS memoryAvg, AVG(cpuAllocation) AS cpuAvg FROM vm_details";
        $result3 = mysqli_query($dbc, $query3);
        

        while ($row = mysqli_fetch_assoc($result3)) {
            echo '&nbsp; <b>Storage Average Usage:</b> '.number_format($row['storageAvg'] / 1000000000, 2).'GB<br />';
            echo '&nbsp; <b>Memory Average Usage:</b> '.number_format($row['memoryAvg'] / 1000, 2).'mib<br />';
            echo '&nbsp; <b>CPU Average Usage:</b> '.number_format($row['cpuAvg'], 2).'%<br /><br /><p style="font-size:20px; font-weight:bold; text-align:center;">TECH ARMY<br /><br /></p></td></tr>';
        }
        echo '</table>';
    }  
?>  