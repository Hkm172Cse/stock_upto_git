<?php echo $header_src;?> 
<body>
  <!--div id="preloader"><div class="loader"><svg class="circular" viewBox="25 25 50 50"><circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" /></svg></div></div -->
  <div id="main-wrapper"> 
    <?php echo $header; ?> 
     <?php echo $sidebar; ?>
    <!--Product Muster Main Panal -->
    <div class="content-body">
      <div class="container-fluid mt-3">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Expense Information</h4>
                <hr class="bg-dark">
                <!-- /////////////////////////////////////////////// -->
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Expense Add</button>
                <!-- Modal -->
                <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Expense Add Form</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form action="" id="form" method="post">
                          <div class="form-group">
                            <label for="">Expense For</label>
                            <input type="text" id="expense_name" class="form-control">
                          </div>
                          <div class="form-group">
                            <label for="">Amount</label>
                            <input type="number" id="expense_amount" class="form-control">
                          </div>
                          <div class="form-group">
                            <label for="">Date</label>
                            <input type="date" id="date" class="form-control">
                          </div>
                         
                         </form>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Censel</button>
                        <button id="saveExpenseBtn" class="btn btn-primary">Save</button>
                        
                      </div>
                    </div>
                  </div>
                </div>
                <!--//////////////////////////////////////////////-->
                
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
                                        <div class="dropdown-menu">
                                          <a class="dropdown-item" id="today" href="#">Today</a> 
                                          
                                          <a class="dropdown-item" id="thisMonth" href="#">This Month</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
          </div>
        <!-- End Details DropDown-->
        <!--Second Row End -->
        <!--Third Row Open-->
        <!--Expense Table Open -->
        <div class="row">
        <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table header-border">
                                        <thead>
                                            <tr>
                                                <th scope="col">id</th>
                                                <th scope="col">Expense</th>
                                                <th scope="col">Amount</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody id="tbody">
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
        </div>
        <!--Expense Table End-->
        <!--Third Row End-->
        
      </div>
      <!--container -->
    </div>
    <!--Product Muster Main Panal-->
    <div class="footer">
      <div class="copyright">
        <p>Copyright &copy; Designed & Developed by <a href="https://www.softanalyzer.com/">Soft Analyzer Engineer</a> 2021 </p>
      </div>
    </div>
  </div>

  
  

  
  <?php echo $footer_src;?>
  
  
   <script>

     //EXPENCE INSERT FUNCTION
		$(document).on("click", "#saveExpenseBtn", function(e){
			e.preventDefault();

			var expense_name = $('#expense_name').val();
			var expense_amount = $('#expense_amount').val();
            var date = $('#date').val();

            console.log(expense_name+expense_amount+date)

      $.ajax({
        url:"<?php echo base_url()?>insert_expense",
        type: "post",
        dataType:"json",
        data: {
            expense_for:expense_name,
            amount:expense_amount,
            dateTime:date
        },
        success: function(data){
          $('.modal').modal('hide');
          console.log(data);
          if(data.message == "Insert is Successfull"){
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

              
          }else{
            Command: toastr["error"](data.message);

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

			
		});

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
        url:"<?php echo base_url()?>fetchExpense",
        type:"post",
        dataType:"json",
        data:{
          created:actualDate
        },
        success: function(data){
          console.log(data);
          // $('#productTable').empty();
          // $('#productTable').DataTable().destroy();


          var tbody = "";
          var total = 0;
          
          for(var key in data){
            total += parseInt(data[key]['amount'])
            tbody += "<tr>";
            tbody += "<td>"+data[key]['id']+"</td>";
            tbody += "<td>"+data[key]['expense_for']+"</td>";
            tbody += "<td>"+data[key]['amount']+"</td>";
            tbody += "</tr>";

          }
            console.log(total);
            tbody += "<tr>";
            tbody += "<td></td>"
            tbody += "<td class='font-weight-bold'>Total Expense</td>";
            tbody += "<td class='font-weight-bold'>"+total+"</td>";
            tbody += "</tr>"
           $('#tbody').html(tbody);
           
         
        }
      })

    })

    // SEE THIS MONTH EXPENCE RECORD FUNCTION

    $(document).on("click", "#thisMonth", function(e){

      $(this).addClass('active');
      $('#today').removeClass('active');
      $('.dropdown-toggle').html("This Month")
        let today = new Date();
        let date = today.getDate();
        
        let month = today.getMonth();
        let currentM = month + 1;
        let year =today.getFullYear();
        
        
        var actualMonth = `${year}-${currentM < 10 ?'0':''}${currentM}`
        console.log(actualMonth)

        $.ajax({
        url:"<?php echo base_url()?>fetchExpenseMonthly",
        type:"post",
        dataType:"json",
        data:{
          created:actualMonth
        },
        success: function(data){
          console.log(data);
          // $('#productTable').empty();
          // $('#productTable').DataTable().destroy();


          var tbody = "";
          var total = 0;
          
          for(var key in data){
            total += parseInt(data[key]['amount'])
            tbody += "<tr>";
            tbody += "<td>"+data[key]['id']+"</td>";
            tbody += "<td>"+data[key]['expense_for']+"</td>";
            tbody += "<td>"+data[key]['amount']+"</td>";
            tbody += "</tr>";

          }
            console.log(total);
            tbody += "<tr>";
            tbody += "<td></td>"
            tbody += "<td class='font-weight-bold'>Total Expense</td>";
            tbody += "<td class='font-weight-bold'>"+total+"</td>";
            tbody += "</tr>"
          $('#tbody').html(tbody);
          
        
        }
      })

    })



    

	</script>

  
</body>
</html>