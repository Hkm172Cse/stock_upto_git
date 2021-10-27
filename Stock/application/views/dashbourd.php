<?php echo $header_src;?>
<body>

    <div id="preloader">
            <div class="loader">
                <svg class="circular" viewBox="25 25 50 50">
                    <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
                </svg>
            </div>
        </div>
    <div id="main-wrapper">

        <?php echo $header; ?>
                
        <?php echo $sidebar; ?>
            
        <?php echo $content; ?>
         <!-- Button trigger modal -->
     <button type="button" class="pixedbtn" data-toggle="modal" data-target="#exampleModal"><i class="far fa-plus"></i></button>
     
     <a href="<?php echo base_url()?>customer_view"><button class="dis_pixedbtn" id="dis_Btn"><i class="fas fa-percent"></i></button></a>
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Sale Entry Form</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                      <form id="form" action="" method="post">
                          <div class="form-group">
                            <label for="">Customer Name</label>
                            <input type="text" id="customarName" class="form-control">
                            <div class="nameGroup list-group" id="customarList">
                              
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="">Contact</label>
                            <input type="number" id="phone"  class="form-control">
                          </div>

                          <div class="form-group">
                            <label for="">Brands</label>
                            
                            <select class="form-control" id="brands">
                              <option value="selected">Select Brand</option>
                              <?php foreach($brnads as $val){ ?>
                              <option value="<?php echo $val->brand?>"><?php echo $val->brand?></option>
                              <?php }?>
                            </select>
                            
                          </div>

                          <div class="nameGroup form-group">
                            <label for="">Product Name</label>
                            <input type="text" id="name" class="form-control">
                            <div class="nameGroup list-group" id="showList">
                              
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="">Price</label>
                            <input type="text" id="price" class="form-control">
                          </div>
                          <div class="form-group">
                            <label for="">saleprice</label>
                            <input type="number" id="saleprice"  class="form-control">
                          </div>

                          <div class="form-group">
                            <label for="">Quantity</label>
                            <input type="number" id="quantity" value="1" class="form-control">
                          </div>
                         
                         </form>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Censel</button>
                        <button  id="saleSaveBtn" class="btn btn-primary">Save Sales<button>
                      </div>
                    </div>
                  </div>
                </div>  
               <!--//////////////////////////////////////////////-->   
                
                
    </div>
        
    <?php echo $footer_src;?>
    <script>
    var product_Id;
    var stock;

    //DISCOUNT FUNCTION
    
    function discount(customarName,phone){
        $(document).on("click", "#dis_Btn", function(e){
          e.preventDefault();
              let today = new Date();
              let date = today.getDate();
              
              let month = today.getMonth();
              let currentM = month + 1;
              let year =today.getFullYear();
              
              
              var actualDate = `${year}-${currentM < 10 ?'0':''}${currentM}-${date<10 ? '0':''}${date}`
          // $('#dis_Modal').modal('show');
           $('#setName').val(customarName);
          $.ajax({
                  url:"<?php echo base_url()?>discountSelect",
                  type:"post",
                  dataType:"json",
                  data:{
                   
                    customarName:customarName,
                    contact:phone,
                    created:actualDate
                  },
                  success: function(data){
                    console.log(data);
                    $('#dis_Modal').modal('show');
                    var products = "";
                    var prices = 0;
                    for(var key in data){
                      products += data[key]['product_name']+", ";
                      prices += parseInt(data[key]['sale_price']);
                    }
                    $('#set_products').val(products);
                    $('#set_price').val(prices);

                        

                  },
                  error: function(data){
                    console.log(data);
                  }
                })
        })
      }

     //DISCOUNT SAVE BUTTON FUNCTION
     $(document).ready(function(){
      $(document).on("click","#disBtnSave", function(){
          var dis_name = $('#setName').val();
          var dis_products = $('#set_products').val();
          var disPrice = $('#set_price').val();
          var dis_value = $('#dis_price').val();
          var afterDis = disPrice - dis_value;
          if(dis_value == ''){
            Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Somthing Discount Please!'
                    
                  })
          }else if(afterDis<0){
            Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Discount Invalid!'
                    
                  })
          }else{

        $.ajax({
          url:"<?php echo base_url()?>discountSave",
          type:"post",
          dataType:"json",
          data:{
            customarName:dis_name,
            products:dis_products,
            prices:disPrice,
            discount:dis_value,
            dis_price:afterDis
          },
          success:function(data){
            console.log(data);
            $('#dis_Modal').modal('hide');
            Command: toastr["success"]("DisCount Value Saved");

                        toastr.options = {
                          "closeButton": true,
                          "debug": false,
                          "newestOnTop": false,
                          "progressBar": false,
                          "positionClass": "toast-top-right",
                          "preventDuplicates": false,
                          "onclick": null,
                          "showDuration": "300",
                          "hideDuration": "1000",
                          "timeOut": "5000",
                          "extendedTimeOut": "1000",
                          "showEasing": "swing",
                          "hideEasing": "linear",
                          "showMethod": "fadeIn",
                          "hideMethod": "fadeOut"
                        }
          }
         
        })
        setTimeout(() => {
              window.location.reload();
            }, 500);
      }
      })

    
    })
    
    //SUGGETION CUSTOMAR NAME
    $(document).ready(function(){
      $('#customarName').keyup(function(){
        var nameId = $(this).val();
        if(nameId != ''){
          $.ajax({
                url:"<?php echo base_url()?>customarNameSuggest",
                type:"post",
                dataType:"json",
                data:{
                  customarName:nameId
                },
                success: function(data){
                  console.log(data);
                  console.log(data.length)
                  if(data.length == 0){
                    $('#customarList').html(
                      "<div><a id='customarLink' class='text-info selectName list-group-item'>New Customar</a></div>"
                      );
                  }else{

                  

                  var listBody = "";
                  var pricedb = "";
                  
                  for(var key in data){
                    listBody +="<div>";
                    listBody +="<a id='customarlink' data-id="+data[key]['contact']+" class='selectName list-group-item'>"+data[key]['customarName']+"</a>";
                    listBody +="</div>";
                  
                  }

                  $('#customarList').html(listBody);
                  }
                }
              })
        }else{
          $('#customarList').html('');
        }
        //console.log(nameId);
      })
      
    })
    //SET CUSTOMAR NAME FROM SUGGETION LIST
    $(document).ready(function(){
      $(document).on('click', '#customarlink', function(){
        var setcustomarName = $(this).html();
        var setCuostomarPhn = $(this).data('id');
        
          $('#customarName').val(setcustomarName);
          $('#phone').val(setCuostomarPhn);
        
          $('#customarList').html('');

      })
    })

    // SUGGETION PRODUCT NAME
    $(document).ready(function(){
      $('#name').keyup(function(){
        var nameId = $(this).val();
        var brand = $('#brands').val();
        console.log(brand);
        
        if(nameId != ''){
          $.ajax({
                url:"<?php echo base_url()?>saleData_fetch",
                type:"post",
                dataType:"json",
                data:{
                  brand:brand,
                  name:nameId
                },
                success: function(data){
                  console.log(data);
                  console.log(data.length)
                  if(data.length == 0){
                    $('#showList').html(
                      "<div><a id='link' class='text-danger selectName list-group-item'>Product Not Found</a></div>"
                      );
                  }else{

                  

                  var listBody = "";
                  var pricedb = "";
                  
                  for(var key in data){
                    listBody +="<div>";
                    listBody +="<a id='link' data-id="+data[key]['price']+" productid="+data[key]['id']+" stockvalue="+data[key]['stock']+"  class='selectName list-group-item'>"+data[key]['name']+"</a>";
                    listBody +="</div>";
                  
                  }

                  $('#showList').html(listBody);
                  }
                }
              })
        }else{
          $('#showList').html('');
        }
        //console.log(nameId);
      })
      
    })
// SET PRODUCT VALUE FORM SUGGETION LINK
    $(document).ready(function(){
      $(document).on('click', '#link', function(){
        var setvalue = $(this).html();
        var price = $(this).data('id');
        product_Id = $(this).attr('productid');
        stock = $(this).attr('stockvalue');
       
          $('#name').val(setvalue);
          $('#price').val(price);
          $('#showList').html('');

      })
    })


    //insert into database
    $(document).ready(function(){
      $(document).on("click", "#saleSaveBtn",function(){
        var customarName = $('#customarName').val();
        var phone = $('#phone').val();
        var brand = $('#brands').val();
        var name = $('#name').val();
        var saleprice = $('#saleprice').val();
        var price = $('#price').val();
        var quantity = $('#quantity').val();
        var todat_price = saleprice*quantity;
        var checkStock = stock - quantity;
        console.log(checkStock);

       if(saleprice=='' || saleprice < 0){
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Something went wrong!',
                    footer: '<a href="">Sale Price Not Empty & non negative</a>'
                  })
       }else if(quantity < 1){
            Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Something went wrong!',
                    footer: '<a href="">Quantity Value Gratter then Zero </a>'
                  })
       }else if(stock == 0){
          Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Something went wrong!',
                    footer: "<h3 class='text-danger'>Product Have not Stock!!! </h3>"
                  })
       }else if(checkStock<0){
        Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Something went wrong!',
                    footer: "<h3 class='text-danger'>"+stock+ " product is available </h3>"
                  })
       }else{
            updateStock(stock,quantity,product_Id);
            
            
            $.ajax({
                  url:"<?php echo base_url()?>saleData_insert",
                  type:"post",
                  dataType:"json",
                  data:{
                    product_id:product_Id,
                    customarName:customarName,
                    contact:phone,
                    brand:brand,
                    product_name:name,
                    price:price,
                    quantity:quantity,
                    sale_price:todat_price
                  },
                  success: function(data){
                    console.log(data);
                    $('.modal').modal('hide');
                    Command: toastr["success"](data.message);

                        toastr.options = {
                          "closeButton": true,
                          "debug": false,
                          "newestOnTop": false,
                          "progressBar": false,
                          "positionClass": "toast-top-right",
                          "preventDuplicates": false,
                          "onclick": null,
                          "showDuration": "300",
                          "hideDuration": "1000",
                          "timeOut": "5000",
                          "extendedTimeOut": "1000",
                          "showEasing": "swing",
                          "hideEasing": "linear",
                          "showMethod": "fadeIn",
                          "hideMethod": "fadeOut"
                        }

                  },
                  error: function(data){
                    console.log(data);
                  }
                })
        
          $('#form')[0].reset();
       }
        //  CALLING THE UPDATE FUNCTION
        
        
      })
      
    })


    //Update Stock Product Table
    function updateStock(stock,quantity,product_Id){
        var updateStock = stock-quantity;

        console.log(updateStock);

        $.ajax({
                url:"<?php echo base_url()?>updateStock",
                type:"post",
                dataType:"json",
                data:{
                  id:product_Id,
                  stock:updateStock
                },
                success: function(data){
                  console.log(data);

                }
              })

    }


  </script>
</body>

</html>