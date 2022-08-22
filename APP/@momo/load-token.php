<?php

include "momo.php";
    $result = $VIP->fetch_assoc("SELECT * FROM `cron_momo` ORDER BY `id` ASC ", 0);
    
        foreach ($result as  $row)
        {
            
            
            $history = $momo->LoadData($row["phone"])->Login_by_token();//LoginTimeSetup //Login_by_token
            echo "<pre>";
            print_r($history);
             echo "</pre>";
        }
        
        
        
        
        ?>
       