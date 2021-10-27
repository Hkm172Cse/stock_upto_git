<?php echo $header_src;?> 
<body>
  <!--div id="preloader"><div class="loader"><svg class="circular" viewBox="25 25 50 50"><circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" /></svg></div></div -->
  <div id="main-wrapper"> <?php echo $header; ?> <?php echo $sidebar; ?>
    <!--Product Muster Main Panal -->
    <div class="content-body">
      <div class="container-fluid mt-3">
        <!--OPEN MODAL-->
            <!-- Button trigger modal -->
            <!--button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">new Sale</button-->
                <!-- Modal -->
                <div class="modal fade" id="dueModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form id="form" action="" method="post">
                        <div class="form-group">
                            <label for="">Customar Name</label>
                            <input type="text" id="catchCustomar"  class="form-control">
                          </div>

                          <div class="form-group">
                            <label for="">Due</label>
                            <input type="number" id="due" class="form-control">
                            <input type="hidden" id="catchDueId">
                          </div>

                          <div class="form-group">
                            <label for="">Payment</label>
                            <input type="number" id="payment"  class="form-control">
                          </div>
                         </form>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Censel</button>
                        <button  id="paymentBtn" class="btn btn-primary">Pay<button>
                      </div>
                    </div>
                  </div>
                </div>
        
        <!-- END MODAL-->
        <!--second Row -->
        <!--Open Details DropDown -->
       <div class="row">
                    <div class="col-lg-12 due-header-box">
                        
                                <div class="row col-12">
                                  <?php echo $session_id2?>
                                  <h4 class="col-6 card-title text-info">Due Record</h4>
                                  <button type="text" id="totalBtn" class="col-6 btn btn-sm btn-danger">Total</button>
                                </div>
                                
                                <p class="text-muted dropdown-header"></p>
                                <div class="row col-12">
                                    <div class="basic-dropdown col-6">
                                        <div class="dropdown">
                                            
                                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">See</button>
                                            <div class="dropdown-menu">
                                              <a class="dropdown-item" id="totalDue" href="#">Total Due</a> 
                                              <a class="dropdown-item" id="today" href="#">Today</a>
                                              <a class="dropdown-item" id="thisMonth" href="#">This Mounth</a>
                                              <a class="dropdown-item"  href="#"><button class="btn-sm btn btn-danger" id="customDate">custom Name</button><input id="custom_date_get" placeholder="customar name" type="text" class="form-control"></a>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <input type="text" id="customer_due" placeholder="search Customer" class="col-6 customer-search">
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

    //SUGGESTION CUSTOMAR DUE
   $(document).ready(function(){
    $('#customer_due').keyup(function(){
        var customarName = $(this).val();
        if(customarName == ""){
          $('#sale_box').html(
                            "<div class='card'><div class='card-body'><h4 class='text-danger'>Search Again</h4></div></div>"
                          );
        }else{

        
          $.ajax({
                url:"<?php echo base_url()?>customarDue",
                type:"post",
                dataType:"json",
                data:{
                  customarName:customarName
                },
                success: function(data){
                  console.log(data);

                  if(data.length == 0){
                          $('#sale_box').html(
                            "<div class='card'><div class='card-body'><h4 class='text-danger'>Customar Not Found</h4></div></div>"
                            );
                        }else{

                        
                  
                
                      var saleBox = "";
                      let customTotal = 0;
                      
                      
                      for(var key in data){
                        
                        customTotal += parseInt(data[key]['due']);
                        saleBox +="<div class='card'>";
                        saleBox += "<div class='card-body'>";
                        saleBox += "<div class='float-left'>";
                        saleBox +="<h6 class='font-weight-light'>"+data[key]['created']+"</h6>";
                        saleBox +="<h4 class='font-weight-bold'>"+data[key]['customarName']+"</h4>";
                        saleBox +="<h5 class='font-weight-light'>"+data[key]['product_name']+"</h5>";
                        saleBox +="<h6 class='font-weight-bold'>"+"Sale Price = "+data[key]['sale_price']+"</h6>";
                        saleBox +="<h6 class='font-weight-bold'>"+"quantity = "+data[key]['quantity']+"</h6>";
                        saleBox +="<h6 class='due font-weight-bold' data-id="+data[key]['due']+" id='due_id'>"+"Due = "+data[key]['due']+"</h6>";
                        saleBox += "</div>";
                        saleBox += "<div class='float-right'>";
                        saleBox += "<p><button class='paymentlink btn btn-sm btn-danger' id='del_id' del_id="+data[key]['id']+"><i class='fas fa-trash-alt'></i></button></p>";
                        saleBox += "<p><button class='paymentlink btn btn-sm btn-primary' id='edit_due' edit_id="+data[key]['id']+"><i class='fab fa-amazon-pay'></i></button></p>";
                        saleBox += "</div>"
                        saleBox += "</div>";
                        saleBox +="</div>";
                        
                      }
                      $('#sale_box').html(saleBox);
                      $('#totalBtn').html(customTotal);
                }
                }
              })
            }  
      })
   });

   
//DUE CLEAR OPTION
    $(document).on("click","#edit_due", function(){
      var edit_due_id = $(this).attr('edit_id');
      console.log(edit_due_id)
      $.ajax({
        url:"<?php echo base_url()?>editDue",
        type:"post",
        dataType:"json",
        data:{
          id:edit_due_id
        },
        success:function(data){
          console.log(data);
          $('#dueModal').modal('show');
          $('#catchDueId').val(data.post.id);
          $('#catchCustomar').val(data.post.customarName)
          $('#due').val(data.post.due);
        },
        error:function(data){
          console.log(data);
        }
      })
  


    })
    
  //DUE PYMENT OPTION
  $(document).on("click", "#paymentBtn", function(){
    let due_id = $('#catchDueId').val();
    let dueValue = $('#due').val();
    let paymentValue = $('#payment').val();

    let updateDue = dueValue - paymentValue;
    if(updateDue < 0){
      Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'payment Invalid!'
                  })

    }else if(paymentValue == ''){
      Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'payment Invalid!'
                  })

    }else{
    $.ajax({
      url:"<?php echo base_url()?>updateDue",
      type:"post",
      dataType:"json",
      data:{
        id:due_id,
        due:updateDue
      },
      success:function(data){
        console.log(data);
        $('#dueModal').modal('hide');
        if(data.responce == 'success'){
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
            
         }
      }
    })
    $('#form')[0].reset();
  }
    
  })
   
    //SELECT DUE RECORDS
    $(document).on("click", "#totalDue", function(e){

            $(this).addClass('active');
        //   $('#thisMonth').removeClass('active');
        //   $('#today').removeClass('active');
        //   var chooseData = $('#custom_date_get').val();  
            $('.dropdown-toggle').html("Total Due")
          $.ajax({
              url:"<?php echo base_url()?>fetchDue",
              type:"post",
              dataType:"json",
              success: function(data){
                console.log(data);
               
                var saleBox = "";
                var customTotal = 0;
                      
                      
                      for(var key in data){
                        customTotal += parseInt(data[key]['due']);
                        saleBox +="<div class='card'>";
                        saleBox += "<div class='card-body'>";
                        saleBox += "<div class='float-left'>";
                        saleBox +="<h6 class='font-weight-light'>"+data[key]['created']+"</h6>";
                        saleBox +="<h4 class='font-weight-bold'>"+data[key]['name']+"</h4>";
                        saleBox +="<h5 class='font-weight-light'>"+data[key]['products']+"</h5>";
                        saleBox +="<h6 class='font-weight-bold'>"+"Total = "+data[key]['table_customer']+"</h6>";
                        saleBox +="<h6 class='font-weight-bold'>"+"Discount = "+data[key]['discount']+"</h6>";
                        saleBox +="<h6 class='font-weight-bold'>"+"Payment = "+data[key]['payment']+"</h6>";
                        saleBox +="<h6 class='due font-weight-bold'>"+"Due = "+data[key]['due']+"</h6>";
                        saleBox += "</div>";
                        saleBox += "<div class='float-right'>";
                        saleBox += "<p><button class='btn btn-sm btn-danger' id='del_id' del_id="+data[key]['id']+"><i class='fas fa-trash-alt'></i></button></p>";
                        saleBox += "<p><button class='btn btn-sm btn-primary' id='edit_due' edit_id="+data[key]['id']+"><i class='fas fa-edit'></i></button></p>";
                        saleBox += "</div>"
                        saleBox += "</div>";
                        saleBox +="</div>";
                      }
                      $('#sale_box').html(saleBox);
                      $('#totalBtn').html(customTotal);
                      
              }
            })
        

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
              console.log(actualDate)

              $.ajax({
              url:"<?php echo base_url()?>fetchDueDateWise",
              type:"post",
              dataType:"json",
              data:{
                created:actualDate
              },
              success: function(data){
                console.log(data);
               
                var saleBox = "";
                let todayTotal = 0;      
                      
                      for(var key in data){
                        todayTotal += parseInt(data[key]['due']);
                        saleBox +="<div class='card'>";
                        saleBox += "<div class='card-body'>";
                        saleBox += "<div class='float-left'>";
                        saleBox +="<h6 class='font-weight-light'>"+data[key]['created']+"</h6>";
                        saleBox +="<h4 class='font-weight-bold'>"+data[key]['name']+"</h4>";
                        saleBox +="<h5 class='font-weight-light'>"+data[key]['products']+"</h5>";
                        saleBox +="<h6 class='font-weight-bold'>"+"Total = "+data[key]['table_customer']+"</h6>";
                        saleBox +="<h6 class='font-weight-bold'>"+"Discount = "+data[key]['discount']+"</h6>";
                        saleBox +="<h6 class='font-weight-bold'>"+"Payment = "+data[key]['payment']+"</h6>";
                        saleBox +="<h6 class='due font-weight-bold'>"+"Due = "+data[key]['due']+"</h6>";
                        saleBox += "</div>";
                        saleBox += "<div class='float-right'>";
                        saleBox += "<p><button class='btn btn-sm btn-danger' id='del_id' del_id="+data[key]['id']+"><i class='fas fa-trash-alt'></i></button></p>";
                        saleBox += "<p><button class='btn btn-sm btn-primary' id='edit_due' edit_id="+data[key]['id']+"><i class='fas fa-edit'></i></button></p>";
                        saleBox += "</div>"
                        saleBox += "</div>";
                        saleBox +="</div>";
                      }
                      $('#sale_box').html(saleBox);
                      $('#totalBtn').html(todayTotal);
                      
              }
            })

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
              url:"<?php echo base_url()?>fetchDueDateWise",
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
                        thisMonthTotal += parseInt(data[key]['due']);
                        saleBox +="<div class='card'>";
                        saleBox += "<div class='card-body'>";
                        saleBox += "<div class='float-left'>";
                        saleBox +="<h6 class='font-weight-light'>"+data[key]['created']+"</h6>";
                        saleBox +="<h4 class='font-weight-bold'>"+data[key]['name']+"</h4>";
                        saleBox +="<h5 class='font-weight-light'>"+data[key]['products']+"</h5>";
                        saleBox +="<h6 class='font-weight-bold'>"+"Total = "+data[key]['table_customer']+"</h6>";
                        saleBox +="<h6 class='font-weight-bold'>"+"Discount = "+data[key]['discount']+"</h6>";
                        saleBox +="<h6 class='font-weight-bold'>"+"Payment = "+data[key]['payment']+"</h6>";
                        saleBox +="<h6 class='due font-weight-bold'>"+"Due = "+data[key]['due']+"</h6>";
                        saleBox += "</div>";
                        saleBox += "<div class='float-right'>";
                        saleBox += "<p><button class='btn btn-sm btn-danger' id='del_id' del_id="+data[key]['id']+"><i class='fas fa-trash-alt'></i></button></p>";
                        saleBox += "<p><button class='btn btn-sm btn-primary' id='edit_due' edit_id="+data[key]['id']+"><i class='fas fa-edit'></i></button></p>";
                        saleBox += "</div>"
                        saleBox += "</div>";
                        saleBox +="</div>";
                      }
                      $('#sale_box').html(saleBox);
                      $('#totalBtn').html(thisMonthTotal)
                      
              }
            })

        })

  </script>
</body>
</html>