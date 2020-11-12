<?php include('Backend/dbcon.php'); ?>
<html>

<head>
    <title>System</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
   

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

     <!-- MDBootstrap Datatables  -->
    <link href="Bootstrap/css/addons/datatables.min.css" rel="stylesheet">
    <!-- MDBootstrap Datatables  -->
    <script type="text/javascript" src="Bootstrap/js/addons/datatables.min.js"></script>
    <title>System</title>

</head>
<center><h1>System</h1></center>

<body>
    <?php $results = mysqli_query($conn, "SHOW FULL COLUMNS FROM person_db"); ?>

    <ul class="nav nav-tabs" role="tablist" id="myTab">
        <li ><a href="#previousIssue" role="tab" data-toggle="tab">Table Structure</a></li>
        <li class="active"><a href="#importcsv" role="tab" data-toggle="tab">View Data</a></li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content container-fluid">
        <div class="tab-pane" id="previousIssue">
            <div class="row">
                <div class="col-md-6">
                    <h2>Table View</h2>
                </div>
                <div class="col-md-6">
                    <br>
                    <button class="btn btn-primary pull-right" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus" aria-hidden="true"></i> New Field</button>
                </div>
            </div>

            <div class="row">
                <div class="col-md-1"></div>

                <div class="col-md-10">
                    <table class="table table-striped" style="font-size:15px;">
                        <thead>
                            <tr scope="row">
                                <th scope="col" width="0">Field</th>
                                <th scope="col" width="0">Type</th>
                                <th scope="col" width="0">Collation </th>
                                <th scope="col" width="0">Null</th>
                                <th scope="col" width="0">Default</th>
                                <th scope="col" width="0">Privileges </th>
                                <th scope="col" width="0">Action </th>

                            </tr>
                        </thead>
                        <tbody id="myTable">
                            <?php while ($row = mysqli_fetch_array($results)) { ?>
                                <tr scope="row">
                                    <td><?php echo $row['Field']; ?></td>
                                    <td><?php echo $row['Type']; ?></td>
                                    <td><?php echo $row['Collation']; ?></td>
                                    <td><?php echo $row['Null']; ?></td>
                                    <td><?php echo $row['Default']; ?></td>
                                    <td><?php echo $row['Privileges']; ?></td>
                                    <td>
                                        <button class="btn btn-danger" data-id="<?php echo $row['Field']; ?>" id="delete" name="delete"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                    </td>


                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-1"></div>

            </div>
        </div>

        <div class="tab-pane active" id="importcsv">
        <div class="row">
        <?php $results = mysqli_query($conn, "Select * from person_db"); ?>

                <div class="col-md-12">
                    <h2>Data View</h2>
                </div>
                <div class="col-md-2">
                    <form method="post" name='importcsv' action="Backend/csv.php" enctype="multipart/form-data">
                    <input type="file"  name="attachment" data-toggle="modal"required></input>
                </div>
                <div class="col-md-10">
                <button class="btn btn-success" name="addcsv" type="submit" name="go">import CSV</button>
                    </form>
                </div>


                <div class="col-md-12">
                    <table id="dtBasicExample" class="table table-striped" style="font-size:15px;">
                        <thead>
                            <tr scope="row">
                                <th scope="col" width="0">Person Name</th>
                                <th scope="col" width="0">First Name</th>
                                <th scope="col" width="0">Last Name </th>
                                <th scope="col" width="0">Proffession</th>
                                <th scope="col" width="0">Age</th>
                                <th scope="col" width="0">Date of Birth </th>
                                <th scope="col" width="0">Place of Birth</th>
                                <th scope="col" width="0">HomeTown</th>
                                <th scope="col" width="0">Death date</th>
                                <th scope="col" width="0">Salary</th>
                                <th scope="col" width="0">Action</th>


                            </tr>
                        </thead>
                        <tbody id="myTable">
                            <?php while ($row = mysqli_fetch_array($results)) { ?>
                                <tr scope="row">
                                    <td><?php echo $row['Person_Name']; ?></td>
                                    <td><?php echo $row['first_name']; ?></td>
                                    <td><?php echo $row['last_name']; ?></td>
                                    <td><?php echo $row['profession']; ?></td>
                                    <td><?php echo $row['age']; ?></td>
                                    <td><?php echo $row['date_of_birth']; ?></td>
                                    <td><?php echo $row['place_of_birth']; ?></td>
                                    <td><?php echo $row['home_town']; ?></td>
                                    <td><?php echo $row['death_date']; ?></td>
                                    <td><?php echo $row['salary']; ?></td>
                                    
                                    <td>
                                    <button class="btn btn-warning" data-toggle="modal" data-target="#exampleModal1"
                                     data-id="<?php echo $row['id']; ?>"
                                     data-Person="<?php echo $row['Person_Name']; ?>"
                                     data-first="<?php echo $row['first_name']; ?>"
                                     data-last="<?php echo $row['last_name']; ?>"
                                     data-proffession="<?php echo $row['profession']; ?>"
                                     data-age="<?php echo $row['age']; ?>"
                                     data-dob="<?php echo $row['date_of_birth']; ?>"
                                     data-pob="<?php echo $row['place_of_birth']; ?>"
                                     data-home="<?php echo $row['home_town']; ?>"
                                     data-death="<?php echo $row['death_date']; ?>"
                                     data-salary="<?php echo $row['salary']; ?>"

                                    id="editdata" name="editdata"><i class="fa fa-pencil" aria-hidden="true"></i></button>

                                    <button class="btn btn-danger" data-id="<?php echo $row['id']; ?>" id="deletedata" name="deletedata"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                    </td>


                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>

                     

        </div>
        </div>



    </div>


    <!-- Bootstrap Modal for New Column -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>

                </div>
                <div class="modal-body">
                    <form id="data-form">
                        <div class="form-group">
                            <label for="column" class="col-form-label">Column Name</label>
                            <input type="text" class="form-control" id="column"  name="column" required>
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Type:</label>
                            <select class="form-control" id="typeof" name="typeof" required>
                                <option selected disabled>String data types</option>
                                <option value="VARCHAR">VARCHAR</option>
                                <option value="TEXT">TEXT</option>
                                <option value="CHAR">CHAR</option>
                                <option value="LONGTEXT">LONGTEXT</option>
                                <option disabled>Numeric data types</option>
                                <option value="BOOLEAN">BOOLEAN</option>
                                <option value="INT">INT</option>
                                <option value="BIGINT">BIGINT</option>
                                <option value="FLOAT">FLOAT</option>
                                <option value="DOUBLE">DOUBLE</option>
                                <option disabled>Date and Time data types</option>
                                <option value="DATE">DATE</option>
                                <option value="DATETIME">DATETIME</option>
                                <option value="YEAR">YEAR</option>
                                <option value="TIMESTAMP">TIMESTAMP</option>

                            </select>
                        </div>
                        <div class="form-group" id="len">
                            <label for="message-text" class="col-form-label">Length:</label>
                            <input type="number" class="form-control" id="length">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="btn-add" name="btn-add">ADD</button>

                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>

                </div>
                <div class="modal-body">

                    <form id="data-update-form">
                        <input type="hidden" class="form-control" id="idof"  name="idof" required>

                        <div class="form-group">
                            <label for="column" class="col-form-label">Person Name</label>
                            <input type="text" class="form-control" id="Person_Name"  name="Person_Name" required>
                        </div>
                        <div class="form-group">
                            <label for="column" class="col-form-label">First Name</label>
                            <input type="text" class="form-control" id="first_name"  name="first_name" required>
                        </div>
                        <div class="form-group">
                            <label for="column" class="col-form-label">Last Name</label>
                            <input type="text" class="form-control" id="last_name"  name="last_name" required>
                        </div>
                        <div class="form-group">
                            <label for="column" class="col-form-label">Proffession</label>
                            <input type="text" class="form-control" id="profession"  name="profession" required>
                        </div>
                        <div class="form-group">
                            <label for="column" class="col-form-label">Age</label>
                            <input type="number" class="form-control" id="age"  name="age" required>
                        </div>
                        <div class="form-group">
                            <label for="column" class="col-form-label">Date Of Birth</label>
                            <input type="date" class="form-control" id="date_of_birth"  name="date_of_birth" required>
                        </div>
                        <div class="form-group">
                            <label for="column" class="col-form-label">Place of Birth</label>
                            <input type="text" class="form-control" id="place_of_birth"  name="place_of_birth" required>
                        </div>
                        <div class="form-group">
                            <label for="column" class="col-form-label">Home Town</label>
                            <input type="text" class="form-control" id="home_town"  name="home_town" required>
                        </div>
                        <div class="form-group">
                            <label for="column" class="col-form-label">Death Date</label>
                            <input type="text" class="form-control" id="death_date"  name="death_date" required>
                        </div>
                        <div class="form-group">
                            <label for="column" class="col-form-label">Salary</label>
                            <input type="text" class="form-control" id="salary"  name="salary" required>
                        </div>
                      
                        
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-warning" id="btn-update" name="btn-update">Update</button>

                </div>
            </div>
        </div>
    </div>


</body>
<script>


    $(document).ready(function () {
    $('#len').hide();
    $('#dtBasicExample').DataTable({
        "pagingType": "simple" // "simple" option for 'Previous' and 'Next' buttons only
    });
    $('.dataTables_length').addClass('bs-select');
    });


    $(document).on('click','#btn-add',function(e) {
        $('#btn-add').show();


        var column = $("#column").val();
        var typeOfColumn = $("#typeof").val();
        var length = $("#length").val();

		$.ajax({
            url: "Backend/backend.php",
			data: {
                type:2,
                column:column,
                typeOfColumn:typeOfColumn,
                length:length,
            },
            type: "POST",
            cache: false,
            error: function(e) {
                swal("Error!", "Error Inserting Column", "error");

            },
            success: function(data) {
                
                swal("Success!", "Column Inserted", "success");
                setTimeout(function() {
                    window.location.reload();
                }, 1000);					
            
            }
		});
	});

    $('#exampleModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var recipient = button.data('whatever') // Extract info from data-* attributes
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)
    modal.find('.modal-title').text('New message to ' + recipient)
    modal.find('.modal-body input').val(recipient)
    });


    

    $('#edit').on('click', function(e) {
        e.preventDefault();
        $('#btn-add').hide();
        $('#btn-update').show();


    });

    $("[name='typeof']").on('change', function(e) {
        e.preventDefault();

        var id = $(this).val();
      
        if(id=='VARCHAR' || id=='TEXT' || id=='CHAR'){
            $('#len').show();
           
        }else{
            $('#len').hide();
        }

    });


    $("[name='delete']").on('click', function(e) {
        e.preventDefault();

        var id = $(this).data("id");
        console.log(id);
        console.log("delete clicked");


        $.ajax({
            url: "Backend/backend.php",
            data: {
                type: 1,
                id: id,
            },
            type: "POST",
            cache: false,
            error: function(e) {
                swal("Error!", "Error deleting record", "error");

            },
            success: function(data) {

                swal("Success!", "Column Dropped", "success");
                setTimeout(function() {
                    window.location.reload();
                }, 1000);

            }
        });
    });

    // ON data Table

    $("[name='deletedata']").on('click', function(e) {
        e.preventDefault();

        var id = $(this).data("id");
        console.log(id);
        console.log("delete clicked");


        $.ajax({
            url: "Backend/backend.php",
            data: {
                type: 4,
                id: id,
            },
            type: "POST",
            cache: false,
            error: function(e) {
                swal("Error!", "Error deleting record", "error");

            },
            success: function(data) {

                swal("Success!", "Record Deleted Successfully", "success");
                setTimeout(function() {
                    window.location.reload();
                }, 1000);

            }
        });
    });

    $("[name='editdata']").on('click', function(e) {
        var id=$(this).attr("data-id");
        var Person=$(this).attr("data-Person");
        var first=$(this).attr("data-first");
        var last=$(this).attr("data-last");
        var proffession=$(this).attr("data-proffession");
        var age=$(this).attr("data-age");
        var dob=$(this).attr("data-dob");
        var pob=$(this).attr("data-pob");
        var home=$(this).attr("data-home");
        var death=$(this).attr("data-death");
        var salary=$(this).attr("data-salary");

	
		$('#idof').val(id);
		$('#Person_Name').val(Person);
		$('#first_name').val(first);
		$('#last_name').val(last);
        $('#profession').val(proffession);      	
		$('#age').val(age);
		$('#date_of_birth').val(dob);
		$('#place_of_birth').val(pob);
		$('#home_town').val(home);
        $('#death_date').val(death);
        $('#salary').val(salary);



    });

    $(document).on('click','#btn-update',function(e) {


        var id=$('#idof').val();
        var Person=$('#Person_Name').val();
        var first=$('#first_name').val();
        var last=$('#last_name').val();
        var proffession=$('#profession').val(); 
        var age=$('#age').val();
        var dob=$('#date_of_birth').val();
        var pob=$('#place_of_birth').val();
        var home=$('#home_town').val();
        var death=$('#death_date').val();
        var salary=$('#salary').val();

		$.ajax({
            url: "Backend/backend.php",
			data: {
                type:3,
                id:id,
                Person:Person,
                first:first,
                last:last,
                proffession:proffession,
                age:age,
                dob:dob,
                pob:pob,
                home:home,
                death:death,
                salary:salary,
               
            },
            type: "POST",
            cache: false,
            error: function(e) {
                swal("Error!", "Error Updating Column", "error");

            },
            success: function(data) {
                
                swal("Success!", "Column Updated", "success");
                setTimeout(function() {
                    window.location.reload();
                }, 1000);					
            
            }
		});
	});

</script>

</html>