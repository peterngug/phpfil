<?php
        if(isset($_POST['submit'])){
            $grade = $_POST['grade'];  
            if ($grade >= 1 && $grade <= 3) {
                echo ("The level is: Lower Primary ");
            } 
           else if ($grade >= 4 && $grade <= 6) {
                echo ("The level is: Upper Primary ");
            } 
          else  if ($grade >= 7 && $grade <= 9) {
                echo ("The level is: Junior Secondary ");
            } 
          else  if ($grade >= 10 && $grade <= 12) {
                echo ("The level is: Senior secondary ");
            } 
            else  if ($grade >= 13&& $grade <= 15) {
                echo ("The level is: Higher Secondary ");
            }   
            else {
                echo ("The level is: Higher Secondary ");
            } 
            
        }
        ?>