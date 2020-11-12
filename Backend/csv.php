<?php include('dbcon.php'); ?>


<?php
if (isset($_POST['addcsv'])) {
  

    $subfolder="Calender";
    
  
    if ($_FILES["attachment"]["error"] > 0) {
        echo "Return Code: " . $_FILES["attachment"]["error"] . "<br/><br/>";
    } else {
            $random=rand();
            $filename = $_FILES['attachment']['name'];
            $modified_file_name = "file_".$random.".csv";
  
        if (file_exists("attachments/" . $modified_file_name)) {
            echo $modified_file_name . " <b>already exists.</b> ";
        } else {
            move_uploaded_file($_FILES["attachment"]["tmp_name"], "attachments/" . $modified_file_name);
                
  
        $open = fopen("http://localhost/fiver/Backend/attachments/file_".$random.".csv",'r');

        $results = mysqli_query($conn, "SHOW FULL COLUMNS FROM person_db");

        $DB_columns=array();

        while ($row = mysqli_fetch_array($results)) {

            array_push($DB_columns,$row['Field']);
            
        }

        unset($DB_columns[0]);

        $variable_array=$DB_columns;

        $List = implode(', ', $DB_columns); 

        foreach ($variable_array as &$value) {
            $value = '$' . $value;
        }
        unset($value);

        $List2 = implode(',', $variable_array); 

        $set = $variable_array;

        foreach ($set as &$v) {
            $v = "'" . $v. "'";
        }
        unset($v);


        $List3 = implode(',', $set); 


        
        // print_r($List3);

        // print_r($DB_columns);

        print_r($List3);


   
                while (!feof($open)) 
                {
                  $getTextLine = fgets($open);
                  $explodeLine = explode(",",$getTextLine);

                  list($Person_Name,$first_name,$last_name,$profession,$age,$date_of_birth,$place_of_birth,$home_town,$death_date,$salary)=$explodeLine;
                  
                // list($List2) = $explodeLine;
                  
                // print_r($List);

                $qry = "insert into person_db (Person_Name, first_name, last_name, profession, age, date_of_birth, place_of_birth, home_town, death_date, salary) 
                values('$Person_Name','$first_name','$last_name','$profession','$age','$date_of_birth','$place_of_birth','$home_town','$death_date','$salary')";

                //   $qry = "insert into person_db ($List) values($List3)";

                 if( mysqli_query($conn,$qry)){
                     echo 'Successs';
                 }
                else {
                    echo "Error: " . $qry . "<br>" . mysqli_error($conn);
                }

                }
                 
                // $location =getcwd().'file_".$random.".csv"';
  
                fclose($open);
                // unlink($location);
  
            // echo $location;
            header('Location: ' . $_SERVER['HTTP_REFERER']);;
        }
    }

}
?>