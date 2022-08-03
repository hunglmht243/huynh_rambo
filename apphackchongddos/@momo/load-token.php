<?php

include "momo.php";
    $result = $VIP->fetch_assoc("SELECT * FROM `cron_momo` ORDER BY `id` ASC ", 0);
    
        foreach ($result as  $row)
        {
            
            
            $history = $momo->LoadData($row["phone"])->LoginTimeSetup();
            echo "<pre>";
            print_r($history);
             echo "</pre>";
        }
        
        
        
        
        ?>
       