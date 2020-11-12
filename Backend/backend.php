<?php include('dbcon.php'); ?>

<?php 

if(count($_POST)>0){
	if($_POST['type']=='1'){

		$id=$_POST['id'];
        $sql = "ALTER TABLE person_db
        DROP COLUMN $id; ";
        
		if (mysqli_query($conn, $sql)) {
            echo $id;
            echo "inside successs";

		} 
		else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
		mysqli_close($conn);
	}
}

if(count($_POST)>0){
	if($_POST['type']=='2'){
        

        $column=$_POST['column'];
        $typeOfColumn=$_POST['typeOfColumn'];
        $length=$_POST['length'];

        
        if($length==''){
            $sql = "ALTER TABLE person_db
            ADD $column $typeOfColumn; ";
        }
        else{       
             $sql = "ALTER TABLE person_db
             ADD $column $typeOfColumn($length); ";
        }
          
		if (mysqli_query($conn, $sql)) {

			echo $column;
            echo $typeOfColumn;
            echo $length;
        
		} 
		else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
		mysqli_close($conn);
	}
}

if(count($_POST)>0){
	if($_POST['type']=='4'){

		$id=$_POST['id'];
        $sql = "Delete from person_db where id='$id'";
        
		if (mysqli_query($conn, $sql)) {
            echo $id;
            echo "object deleted";

		} 
		else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
		mysqli_close($conn);
	}
}

if(count($_POST)>0){
	if($_POST['type']=='3'){

		$id=$_POST['id'];
		$Person=$_POST['Person'];
		$first=$_POST['first'];
		$last=$_POST['last'];
		$proffession=$_POST['proffession'];
		$age=$_POST['age'];
		$dob=$_POST['dob'];
		$pob=$_POST['pob'];
		$home=$_POST['home'];
		$death=$_POST['death'];
		$salary=$_POST['salary'];


		$sql="UPDATE person_db SET Person_Name='$Person', first_name='$first', last_name='$last', profession='$proffession', age=' $age', date_of_birth= ' $dob',
		 place_of_birth= ' $pob', home_town= ' $home', death_date= ' $death', salary= ' $salary'
		 WHERE id='$id' ";		
		 
		 if (mysqli_query($conn, $sql)) {
            
            echo "object edited";

		} 
		else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
		mysqli_close($conn);
	}
}



?>
