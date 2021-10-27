<?php echo $header_src;?> <body>
  <!--div id="preloader"><div class="loader"><svg class="circular" viewBox="25 25 50 50"><circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" /></svg></div></div -->
  <div id="main-wrapper"> <?php echo $header; ?> <?php echo $sidebar; ?>
    <!--Product Muster Main Panal -->
    <div class="content-body">
      <div class="container-fluid mt-3">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Sales Details</h4>
                <hr class="bg-dark">
                
                <!-- /////////////////////////////////////////////// -->
                <!-- Button trigger modal -->
                
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">New sale</button>
                <a href="<?php echo base_url()?>customer_view"><button id="dis_Btn" class="btn btn-info">discount</button></a>
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

                <!--SALE EDIT_MODAL SHOW-->
                  <!-- Modal -->
                <div class="modal fade" id="saleEditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Update Sale Form</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form id="form" action="" method="post">
                         

                          <div class="nameGroup form-group">
                            <label for="">Product Name</label>
                            <input type="text" id="UpName" class="form-control">
                          </div>
                          <div class="form-group">
                            <label for="">Price</label>
                            <input type="text" id="Upprice" class="form-control">
                            <input type="hidden" id="Upid" class="form-control">
                          </div>
                          <div class="form-group">
                            <label for="">saleprice</label>
                            <input type="number" id="Upsaleprice"  class="form-control">
                          </div>

                          <div class="form-group">
                            <label for="">Due</label>
                            <input type="number" id="Updue" class="form-control">
                          </div>
                         </form>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Censel</button>
                        <button  id="UpsaleBtn" class="btn btn-primary">Update Sale<button>
                      </div>
                    </div>
                  </div>
                </div>
                <!--//////////////////////////////////////////////-->
                <!--SALE EDIT_MODAL END-->
                
              </div>
            </div>
          </div>
        </div>
        <!--second Row -->
        <!--Open Details DropDown -->
       <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">See All Expense</h4>
                                <p class="text-muted dropdown-header"></p>
                                <div class="basic-dropdown">
                                    <div class="dropdown">
                                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">See Informatin</button>
                                        <button type="text" id="totalBtn" class="btn btn-danger">Total</button>
                                        <div class="dropdown-menu">
                                          <a class="dropdown-item" id="today" href="#">Today</a> 
                                          
                                          <a class="dropdown-item" id="thisMonth" href="#">This month</a>
                                          <a class="dropdown-item"  href="#"><button class="btn-sm btn btn-danger" id="customDate">custom date</button><input id="custom_date_get" placeholder="yyyy-mm-dd" type="text" class="form-control"></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
          </div>
        <!-- End Details DropDown-->
            <!--Sale Details Table Open-->
            <div class="col-lg-6">
                            <div id="sale_box" class="saleBox">
                                
                            </div>
            </div>

            <!-- Sale Details Table End-->
        <!--second Row End -->
      </div>
      <!-- #/ container -->
    </div>
    <!--Product Muster Main Panal-->
    <div class="footer">
      <div class="copyright">
        <p>Copyright &copy; Designed & Developed by <a href="https://themeforest.net/user/quixlab">Quixlab</a> 2018 </p>
      </div>
    </div>
  </div> 


  <?php echo $footer_src;?> 
  <script>
    var product_Id;
    var stock;
    
    
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
                    var sesstionId = $('#session_id').val();

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

    //SEE ALL SALE  YOUR DATE WISE OPEN FUNCTION
    $(document).on("click", "#customDate", function(e){

          $(this).addClass('active');
          $('#thisMonth').removeClass('active');
          $('#today').removeClass('active');
          var chooseData = $('#custom_date_get').val();
          chooseData = chooseData.replace('/','-').replace('/', '-');
          $('.dropdown-toggle').html(chooseData)

        if(chooseData==""){
          $('.dropdown-toggle').html('Not Selected');
        }else{
          $.ajax({
              url:"<?php echo base_url()?>todaySale",
              type:"post",
              dataType:"json",
              data:{
                created:chooseData
              },
              success: function(data){
                console.log(data);
                // $('#productTable').empty();
                // $('#productTable').DataTable().destroy();
                var saleBox = "";
                var customTotal = 0;
                      
                      
                      for(var key in data){
                        customTotal += parseInt(data[key]['sale_price']);
                        saleBox +="<div class='card'>";
                        saleBox += "<div class='card-body'>";
                        saleBox += "<div class='float-left'>";
                        saleBox +="<h6 class='font-weight-light'>"+data[key]['created']+"</h6>";
                        saleBox +="<h2 class='font-weight-bold'>"+data[key]['product_name']+"</h2>";
                        saleBox +="<h5 class='font-weight-light'>"+"Price = "+data[key]['price']+"</h5>";
                        saleBox +="<h6 class='font-weight-bold'>"+"Sale Price = "+data[key]['sale_price']+"</h6>";
                        saleBox +="<h6 class='font-weight-bold'>"+"quantity = "+data[key]['quantity']+"</h6>";
                        saleBox +="<h6 class='due font-weight-bold'>"+"Due = "+data[key]['due']+"</h6>";
                        saleBox += "</div>";
                        saleBox += "<div class='float-right'>";
                        saleBox += "<p><button class='btn btn-sm btn-danger' id='del_id' del_id="+data[key]['id']+"><i class='fas fa-trash-alt'></i></button></p>";
                        saleBox += "<p><button class='btn btn-sm btn-primary' id='edit_sale_customDate' edit_id="+data[key]['id']+"><i class='fas fa-edit'></i></button></p>";
                        saleBox += "</div>"
                        saleBox += "</div>";
                        saleBox +="</div>";
                      }
                      $('#sale_box').html(saleBox);
                      $('#totalBtn').html(customTotal);
                      
              }
            })
        }

    })

$(document).on("click", "#edit_sale_customDate", function(e){
  e.preventDefault();
  var edit_sale = $(this).attr('edit_id');
  editSale(edit_sale);
})

//SEE ALL SALE EXPENSE YOUR DATE WISE END FUNCTION

    //SEE TODAY EXPENCE RECORD FUNCTION

    $(document).on("click", "#today", function(e){

            $(this).addClass('active');
            $('#thisMonth').removeClass('active');
            $('.dropdown-toggle').html("Today")
              let today = new Date();
              let date = today.getDate();
              
              let month = today.getMonth();
              let currentM = month + 1;
              let year =today.getFullYear();
              
              
              var actualDate = `${year}-${currentM < 10 ?'0':''}${currentM}-${date<10 ? '0':''}${date}`

              $.ajax({
              url:"<?php echo base_url()?>todaySale",
              type:"post",
              dataType:"json",
              data:{
                created:actualDate
              },
              success: function(data){
                console.log(data);
                // $('#productTable').empty();
                // $('#productTable').DataTable().destroy();
                var saleBox = "";
                let todayTotal = 0;      
                      
                      for(var key in data){
                        todayTotal += parseInt(data[key]['sale_price']);
                        saleBox +="<div class='card'>";
                        saleBox += "<div class='card-body'>";
                        saleBox += "<div class='float-left'>";
                        saleBox +="<h6 class='font-weight-light'>"+data[key]['created']+"</h6>";
                        saleBox +="<h2 class='font-weight-bold'>"+data[key]['product_name']+"</h2>";
                        saleBox +="<h5 class='font-weight-light'>"+"Price = "+data[key]['price']+"</h5>";
                        saleBox +="<h6 class='font-weight-bold'>"+"Sale Price = "+data[key]['sale_price']+"</h6>";
                        saleBox +="<h6 class='font-weight-bold'>"+"quantity = "+data[key]['quantity']+"</h6>";
                        saleBox +="<h6 class='due font-weight-bold'>"+"Due = "+data[key]['due']+"</h6>";
                        saleBox += "</div>";
                        saleBox += "<div class='float-right'>";
                        saleBox += "<p><button class='btn btn-sm btn-danger' id='del_id' del_id="+data[key]['id']+"><i class='fas fa-trash-alt'></i></button></p>";
                        saleBox += "<p><button class='btn btn-sm btn-primary' id='edit_sale' edit_id="+data[key]['id']+"><i class='fas fa-edit'></i></button></p>";
                        saleBox += "</div>"
                        saleBox += "</div>";
                        saleBox +="</div>";
                      }
                      $('#sale_box').html(saleBox);
                      $('#totalBtn').html(todayTotal);

                   }
            })
    })

    $(document).on("click", "#edit_sale", function(e){
      e.preventDefault();
      var edit_sale = $(this).attr('edit_id');
      editSale(edit_sale);
    })
   

    // SEE MONTHLY ALL SALE RECORD

    $(document).on("click", "#thisMonth", function(e){

            $(this).addClass('active');
            $('#thisMonth').removeClass('active');
            $('.dropdown-toggle').html("This Month")
            let today = new Date();
            let date = today.getDate();
            
            let month = today.getMonth();
            let currentM = month + 1;
            let year =today.getFullYear();
            
            
            var actualMonth = `${year}-${currentM < 10 ?'0':''}${currentM}`
            console.log(actualMonth)


              $.ajax({
              url:"<?php echo base_url()?>todaySale",
              type:"post",
              dataType:"json",
              data:{
                created:actualMonth
              },
              success: function(data){
                console.log(data);
                // $('#productTable').empty();
                // $('#productTable').DataTable().destroy();
                var saleBox = "";
                let thisMonthTotal = 0;      
                      
                      for(var key in data){
                        thisMonthTotal += parseInt(data[key]['sale_price']);
                        saleBox +="<div class='card'>";
                        saleBox += "<div class='card-body'>";
                        saleBox += "<div class='float-left'>";
                        saleBox +="<h6 class='font-weight-light'>"+data[key]['created']+"</h6>";
                        saleBox +="<h2 class='font-weight-bold'>"+data[key]['product_name']+"</h2>";
                        saleBox +="<h5 class='font-weight-light'>"+"Price = "+data[key]['price']+"</h5>";
                        saleBox +="<h6 class='font-weight-bold'>"+"Sale Price = "+data[key]['sale_price']+"</h6>";
                        saleBox +="<h6 class='font-weight-bold'>"+"quantity = "+data[key]['quantity']+"</h6>";
                        saleBox +="<h6 class='due font-weight-bold'>"+"Due = "+data[key]['due']+"</h6>";
                        saleBox += "</div>";
                        saleBox += "<div class='float-right'>";
                        saleBox += "<p><button class='btn btn-sm btn-danger' id='del_id' del_id="+data[key]['id']+"><i class='fas fa-trash-alt'></i></button></p>";
                        saleBox += "<p><button class='btn btn-sm btn-primary' id='edit_Monthh_sale' edit_id="+data[key]['id']+"><i class='fas fa-edit'></i></button></p>";
                        saleBox += "</div>"
                        saleBox += "</div>";
                        saleBox +="</div>";
                      }
                      $('#sale_box').html(saleBox);
                      $('#totalBtn').html(thisMonthTotal)

                      
              }
            })

        })


        $(document).on("click", "#edit_Monthh_sale", function(e){
          e.preventDefault();
            var edit_sale = $(this).attr('edit_id');
                       
            editSale(edit_sale);
        })

        //EDIT SALE INFORMATION SELECT FUNCTION
      function editSale(edit_sale){
        $.ajax({
          url:"<?php echo base_url()?>editSaleInfo",
          type:"post",
          dataType:"json",
          data:{
            id:edit_sale
          },
          success:function(data){
            console.log(data);
            $('#saleEditModal').modal('show');
            $('#Upid').val(data.id);
            $('#UpName').val(data.product_name);
            $('#Upprice').val(data.price);
            $('#Upsaleprice').val(data.sale_price);
            $('#Updue').val(data.due);

          }
        })
      }
      //UPDATE SALE REQUEST FUNCTION
      $(document).on("click", "#UpsaleBtn", function(e){
        e.preventDefault();

        var up_id = $('#Upid').val();
        var up_name = $('#UpName').val();
        var up_price = $('#Upprice').val();
        var up_saleprice = $('#Upsaleprice').val();
        var up_due = $('#Updue').val();
        console.log(up_name+" "+up_id+" "+up_price+" "+up_saleprice+" "+up_due);
        $.ajax({
          url:"<?php echo base_url()?>updatesale",
          type:"post",
          dataType:"json",
          data:{
            id:up_id,
            product_name:up_name,
            price:up_price,
            sale_price:up_saleprice,
            due:up_due
          },
          success:function(data){
            console.log(data);
            $('#saleEditModal').modal('hide');
            if(data.responce == "success"){
              Command: toastr["success"]("Update is Succesfully!!");

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
          }
        })
      }) 

  </script>
</body>
</html>