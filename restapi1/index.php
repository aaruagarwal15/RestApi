<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>RestApi</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="style.css">
    
  
</head>
<body>
    <div class="dropdown" style="text-align:center;margin-top:20px;">
        <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
            Choose REST API
        </button>
        <div class="dropdown-menu">
            <a class="dropdown-item" href="#">REST API for students data</a>
            <a class="dropdown-item" href = "../restapi2/index2.php" >REST API for shopping cart</a>
            <a class="dropdown-item" href = "../restapi3/index.php">REST API for project data</a>
        </div>
    </div>
    
    <div class="container" id="student_container">
        <br>
        <h3>REST API for Students data</h3><br>
        <button type="button" class="btn btn-primary  insert-data" data-toggle="modal" data-target="#myModal">Insert Record</button><br>
        <div class="table-responsive">
            <table class="table table-m table-bordered table-striped" id="table-m" style="font-size:20px;">
                <tr>
                    <th>Roll number</th>
                    <th>Name</th>
                    <th>Class</th>
                    <th>Update</th>
                    <th>Delete</th>
                </tr>    
            </table>
        </div>

        <div class='error' style='display:none'>Record has been deleted</div>
        <div class='errori' style='display:none'>Record has been inserted</div>
        <div class='erroru' style='display:none'>Record has been updated</div>
        <!-- Insert data modal -->
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog" >
                <div class="modal-content"  >
                    <form method="post" style="padding:20px;">
                        <div class="form-group">
                            <label for="rolln_insert" style="font-size:20px;">Roll Number:</label>
                            <input type="number" class="form-control" id="rolln_insert">
                        </div>
                        <div class="form-group">
                            <label for="name_insert" style="font-size:20px;">Name:</label>
                            <input type="text" class="form-control" id="name_insert">
                        </div>
                        <div class="form-group">
                            <label for="sclass_insert" style="font-size:20px;">Class:</label>
                            <input type="text" class="form-control" id="sclass_insert">
                        </div>
                        <button class="btn btn-primary insert_inner_data">Insert</button>
                        <button type="button" class="btn btn-basic" data-dismiss="modal">Close</button>
                    </form>     
                </div>
            </div>
        </div>
        <!-- Update data modal -->
        <div id="myModal1" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form method="post" id="update_form" style="padding:20px;">
                        <div class="form-group">
                            <label for="rolln_update" style="font-size:20px;">Roll Number:</label>
                            <input type="number" class="form-control" id="rolln_update">
                        </div>
                        <div class="form-group">
                            <label for="name_update" style="font-size:20px;">Name:</label>
                            <input type="text" class="form-control" id="name_update">
                        </div>
                        <div class="form-group">
                            <label for="sclass_update" style="font-size:20px;">Class:</label>
                            <input type="text" class="form-control" id="sclass_update">
                        </div>
                        <button class="btn btn-primary update_inner">Update</button>
                        <button type="button" class="btn btn-basic" data-dismiss="modal">Close</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    
    <script>
        
        //=========== Retrieve data ====================

        $(document).ready(function () {

            $.getJSON("read.php", function (json) {
                var tr;
                //console.log(json);                
                for (var i = 0; i < json.length; i++) {
                    tr = $('<tr/>');
                    tr.append("<td class='roll_no'>" + json[i].roll_no + "</td>");
                    tr.append("<td>" + json[i].name + "</td>");
                    tr.append("<td>" + json[i].class + "</td>");
                    tr.append("<td>" + "<button class='btn btn-success update_btn' data-toggle='modal' data-target='#myModal1'>Update</button>" + "</td>")
                    tr.append("<td>" + "<button class='btn btn-warning delete_btn'>Delete</button>" + "</td>");
                    $('#table-m').append(tr);
                }
            });
        });
    </script>
    <script>
        //=========== Insert data ==============
        var st1;

        $('.insert_inner_data').click((e) => {
            
            e.preventDefault();
            if( $('#rolln_insert').val() && $('#name_insert').val() && $('#sclass_insert').val()) 
            {
                $.post('insertdata.php',{rolln: $('#rolln_insert').val(),name: $('#name_insert').val(),sclass: $('#sclass_insert').val()},function(data,status){
                console.log(data);
                });
                var st = "</td><td><button class='btn btn-success update_btn' data-toggle='modal' data-target='#myModal1'>Update</button></td><td><button class='btn btn-warning delete_btn'>Delete</button></td></tr>";
                st1 = "<tr><td class='roll_no'>".concat($('#rolln_insert').val());
                st1 = st1.concat("</td><td class='name'>");
                st1 = st1.concat($('#name_insert').val());
                st1 = st1.concat("</td><td class='sclass'>");
                st1 = st1.concat($('#sclass_insert').val());
                st1 = st1.concat(st);
                $('.table-m').append(st1);
                console.log(st1);
                setTimeout(() => {
                    location.reload();
                }, 600);
                $('.errori').fadeIn(300).delay(1500).fadeOut(300);
            }
            else{
                alert("Fields cannot be empty");
            }
           
            
        });
        
        //========= Delete data ==========

        $(document).on('click', '.delete_btn', function(){
            var row_index = $(this).parents('tr').prevAll().length;
            var id = $(this).parents('tr').children()[0].innerText;
            $.ajax({
                url: "deletedata.php", 
                data: {"roll_no": id},
                method: 'POST',
                success: function(data,result) {
                    console.log(data);
                }
            });
            document.getElementById('table-m').deleteRow(row_index);
            $('.error').fadeIn(300).delay(1500).fadeOut(300);
        });
        
        //========= Update data ==========
       
        $(document).on('click', '.update_btn', function(){
           
            var roll = $(this).parents('tr').children()[0].innerText;
            var n = $(this).parents('tr').children()[1].innerText;
            var c = $(this).parents('tr').children()[2].innerText;
            $('#rolln_update').val(roll);
            $('#name_update').val(n);
            $('#sclass_update').val(c);

                $('.update_inner').click((e) => {
                    e.preventDefault();
                    if( $('#rolln_update').val() && $('#name_update').val() && $('#sclass_update').val()) 
                    {   
                        $.ajax({
                        url: "updatedata.php", 
                        data: {"rolln": $('#rolln_update').val(), "roll_old": roll, "name": $('#name_update').val(), "sclass": $('#sclass_update').val()},
                        method: 'POST',
                        success: function(data,result) {
                            console.log(data);
                        }
                        });
                        setTimeout(() => {
                            location.reload();
                        }, 600);
                        $('.erroru').fadeIn(300).delay(1500).fadeOut(300);
                    }
                    else{
                        alert("Fields cannot be empty");
                    }    
                });
        });
        
       
    </script>
</body>
</html>