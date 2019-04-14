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
    <div class="container mt-3" style="display:flex;">
        <h3 >REST API for Shopping Cart</h3>
        <button class="btn btn-warning" onclick="window.location.href = 'cart.php'" style="margin-left:60%;">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" width="51px" height="51px" viewBox="0 0 510 510" style="enable-background:new 0 0 510 510;" xml:space="preserve">
                    <g>
                        <g id="shopping-cart">
                            <path d="M153,408c-28.05,0-51,22.95-51,51s22.95,51,51,51s51-22.95,51-51S181.05,408,153,408z M0,0v51h51l91.8,193.8L107.1,306    c-2.55,7.65-5.1,17.85-5.1,25.5c0,28.05,22.95,51,51,51h306v-51H163.2c-2.55,0-5.1-2.55-5.1-5.1v-2.551l22.95-43.35h188.7    c20.4,0,35.7-10.2,43.35-25.5L504.9,89.25c5.1-5.1,5.1-7.65,5.1-12.75c0-15.3-10.2-25.5-25.5-25.5H107.1L84.15,0H0z M408,408    c-28.05,0-51,22.95-51,51s22.95,51,51,51s51-22.95,51-51S436.05,408,408,408z"/>
                        </g>
                    </g>
                </svg>
        </button>
    </div>
    
    <div class='errori' style='display:none'>Item added to cart</div>
       
    <div class="container mt-4" >
        <div class="card-deck">
            <div class="card">
                <img class="card-img-top" src="images/allout.jpg" alt="Card image" style="width:100%;height:50%;">
                <div class="card-body">
                    <input type="hidden" class="id" value="1">
                    <h4 class="card-title">All Out</h4>
                    <p class="card-text">All Out Mosquito Repellants. Good Knight Activ+ Mosquito Vaporiser Refill.</p>
                    <a href="#" class="btn btn-primary addbtn">Add to Cart</a>
                </div>
            </div>
            <div class="card">
                <img class="card-img-top" src="images/shampoo.jpg" alt="Card image" style="width:100%;height:50%;">
                <div class="card-body">
                    <input type="hidden" class="id" value="2">
                    <h4 class="card-title">Dove Shampoo</h4>
                    <p class="card-text">Shampoos are available for people with dandruff, color-treated hair etc.</p>
                    <a href="#" class="btn btn-primary addbtn">Add to Cart</a>
                </div>
            </div>
            <div class="card">     
                <img class="card-img-top" src="images/loreal.jpg" alt="Card image" style="width:100%;height:50%;">
                <div class="card-body">
                    <input type="hidden" class="id" value="3">
                    <h4 class="card-title">Loreal Cleanser</h4>
                    <p class="card-text"> Deep Cleansing, help unblock pores and get rid of oily skin, remove impurities.</p>
                    <a href="#" class="btn btn-primary addbtn">Add to Cart</a>
                </div>
            </div>
            <div class="card">
                <img class="card-img-top" src="images/crayons.jpg" alt="Card image" style="width:100%;height:50%;">
                <div class="card-body">
                    <input type="hidden" class="id" value="4">
                    <h4 class="card-title">Crayons</h4>
                    <p class="card-text">Crayons are available at a range of prices and are easy to work with.</p>
                    <a href="#" class="btn btn-primary addbtn">Add to Cart</a>
                </div>
            </div>  
        </div>
    </div>
    <script>
         $('.addbtn').click((e) => {

            id = e.currentTarget.parentElement.childNodes[1].value;
            name = e.currentTarget.parentElement.childNodes[3].innerText;
            
            $.post('addtocart.php',{p_id: id ,p_name: name ,quantity: "1"},function(data,status){
                console.log(data);
            });
            $('.errori').fadeIn(300).delay(1500).fadeOut(300);
                /*var st = "</td><td><button class='btn btn-success update_btn' data-toggle='modal' data-target='#myModal1'>Update</button></td><td><button class='btn btn-warning delete_btn'>Delete</button></td></tr>";
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
                }, 600);*/
                //$('.errori').fadeIn(300).delay(1500).fadeOut(300);
            
        });
    </script>
</body>
</html>