<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cart</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h3>Cart Items</h3>

        <div class="table-responsive">
                <table class="table table-m table-bordered table-striped" id="table-m" style="font-size:20px;">
                    <tr>
                        <th>Product ID</th>
                        <th>Product Name</th>
                        <th>Quantity</th>
                        <th>Update</th>
                        <th>Delete</th>
                    </tr>    
                </table>
        </div>
        <div class='error' style='display:none'>Item deleted from the cart</div>
        <div class='erroru' style='display:none'>Quantity has been updated</div>
        <div id="myModal1" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form method="post" id="update_form" style="padding:20px;">
                        <div class="form-group">
                            <label for="quantity_update" style="font-size:20px;">Quantity:</label>
                            <input type="number" class="form-control" id="quantity_update">
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
                    tr.append("<td class='p_id'>" + json[i].p_id + "</td>");
                    tr.append("<td>" + json[i].p_name + "</td>");
                    tr.append("<td>" + json[i].quantity + "</td>");
                    tr.append("<td>" + "<button class='btn btn-success update_btn' data-toggle='modal' data-target='#myModal1'>Update</button>" + "</td>")
                    tr.append("<td>" + "<button class='btn btn-warning delete_btn'>Delete</button>" + "</td>");
                    $('#table-m').append(tr);
                }
            });
        });
    </script>
    <script>
         $(document).on('click', '.delete_btn', function(){
            var row_index = $(this).parents('tr').prevAll().length;
            var id = $(this).parents('tr').children()[0].innerText;
            $.ajax({
                url: "deletedata.php", 
                data: {"p_id": id},
                method: 'POST',
                success: function(data,result) {
                    console.log(data);
                }
            });
            document.getElementById('table-m').deleteRow(row_index);
            $('.error').fadeIn(300).delay(1500).fadeOut(300);
        });
    </script>
    <script>
        $(document).on('click', '.update_btn', function(){
           
           var roll = $(this).parents('tr').children()[0].innerText;
           console.log(roll);
           var q = $(this).parents('tr').children()[2].innerText;
           console.log(q);
           $('#quantity_update').val(q);

               $('.update_inner').click((e) => {
                   e.preventDefault();
                   if( $('#quantity_update').val()) 
                   {   
                       $.ajax({
                       url: "updatedata.php", 
                       data: {"quantity": $('#quantity_update').val(), "p_id": roll},
                       method: 'POST',
                       success: function(data,result) {
                           console.log(data);
                       }
                       });
                       setTimeout(() => {
                           location.reload();
                       }, 400);
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