<?php echo $header_src;?> 
<body>
  <!--div id="preloader"><div class="loader"><svg class="circular" viewBox="25 25 50 50"><circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" /></svg></div></div -->
  <div id="main-wrapper"> 
    <?php echo $header; ?> 
     <?php echo $sidebar; ?>
    <!--Product Muster Main Panal -->
    <div class="content-body">
      <div class="container-fluid mt-3">
        
        <!--second Row -->
        <!--Open Details DropDown -->
       <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">See All Expense & Sale</h4>
                                <p class="text-muted dropdown-header"></p>
                                <div class="basic-dropdown">
                                    <div class="dropdown">
                                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">See Informatin</button>
                                        <div class="dropdown-menu">
                                          <a class="dropdown-item" id="today" href="#">Today</a> 
                                          
                                          <a class="dropdown-item" id="thisMonth" href="#">This Mounth</a>
                                          <a class="dropdown-item"  href="#"><button class="btn-sm btn btn-danger" id="customDate">custom date</button><input id="custom_date_get" placeholder="yyyy-mm-dd" type="text" class="form-control"></a>
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
                                                
                                                <th class='text-center' scope="col">Sale</th>
                                                <th class='text-center' scope="col">Expense</th>
                                                
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

    //SEE ALL SALE EXPENSE YOUR DATE WISE OPEN FUNCTION
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
        url:"<?php echo base_url()?>fetchSaleExpense",
        type:"post",
        dataType:"json",
        data:{
          created:chooseData
        },
        success: function(data){
          console.log(data);
          
          let expense = data.expense
          let sale = data.sale
          if(expense.length > sale.length){
            console.log("Expense index is  = "+expense.length)
            console.log("Sale index is  = "+sale.length)
            var tbody = "";
            let totalexpense = 0;
            var totalSale = 0;
        
            var j = 0;
            var i = 0;
                for(var key in sale,expense){
                  tbody += "<tr>";
                  if(i<data.sale.length){
                    totalSale += parseInt(data.sale[i].sale_price);
                    tbody += "<td class='text-center bgsale'>"+data.sale[i].sale_price+"</td>";
                  }else {
                    tbody += "<td class='text-center bgsale'>0</td>";
                  }
                  if(j<data.expense.length){
                    totalexpense += parseInt(data.expense[j].amount);
                    tbody += "<td class='text-center bgexpense'>"+data.expense[j].amount+"</td>";
                  }else{
                    
                    tbody += "<td class='text-center bgexpense'>0</td>";
                  } 
                  tbody += "</tr>";
                
                  j++;
                  i++;
                  
                }
                tbody += "<tr>";
                tbody += "<td class='text-center'>"+"Total Sale = "+totalSale+"</td>";
                tbody += "<td class='text-center'>"+"Total Expence = "+totalexpense+"</td>";
                tbody += "</tr>";
                  
                $('#tbody').html(tbody);
          }else{
            console.log("Expense index is  = "+expense.length)
            console.log("Sale index is  = "+sale.length)
            var tbody = "";
            let totalexpense = 0;
            var totalSale = 0;
        
            var j = 0;
            var i = 0;
                for(var key in expense,sale){
                  tbody += "<tr>";
                  if(i<data.sale.length){
                    totalSale += parseInt(data.sale[i].sale_price);
                    tbody += "<td class='text-center bgsale'>"+data.sale[i].sale_price+"</td>";
                  }else {
                    tbody += "<td class='text-center bgsale'>0</td>";
                  }
                  if(j<data.expense.length){
                    totalexpense += parseInt(data.expense[j].amount);
                    tbody += "<td class='text-center bgexpense'>"+data.expense[j].amount+"</td>";
                  }else{
                    
                    tbody += "<td class='text-center bgexpense'>0</td>";
                  } 
                  tbody += "</tr>";
                
                  j++;
                  i++;
                  
                }
                tbody += "<tr>";
                tbody += "<td class='text-center'>"+"Total Sale = "+totalSale+"</td>";
                tbody += "<td class='text-center'>"+"Total Expence = "+totalexpense+"</td>";
                tbody += "</tr>"; 
                $('#tbody').html(tbody);
              }
          
          

            }
            })
          }

    })
    //SEE ALL SALE EXPENSE YOUR DATE WISE END FUNCTION

    //SEE TODAY SALE AND EXPENCE RECORD FUNCTION
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
        url:"<?php echo base_url()?>fetchSaleExpense",
        type:"post",
        dataType:"json",
        data:{
          created:actualDate
        },
        success: function(data){
          console.log(data);
          
          let expense = data.expense
          let sale = data.sale
          if(expense.length > sale.length){
            console.log("Expense index is  = "+expense.length)
            console.log("Sale index is  = "+sale.length)
            var tbody = "";
            let totalexpense = 0;
            var totalSale = 0;
         
            var j = 0;
            var i = 0;
                for(var key in sale,expense){
                  tbody += "<tr>";
                  if(i<data.sale.length){
                    totalSale += parseInt(data.sale[i].sale_price);
                    tbody += "<td class='text-center bgsale'>"+data.sale[i].sale_price+"</td>";
                  }else {
                    tbody += "<td class='text-center bgsale'>0</td>";
                  }
                  if(j<data.expense.length){
                    totalexpense += parseInt(data.expense[j].amount);
                    tbody += "<td class='text-center bgexpense'>"+data.expense[j].amount+"</td>";
                  }else{
                    
                    tbody += "<td class='text-center bgexpense'>0</td>";
                  } 
                  tbody += "</tr>";
                
                  j++;
                  i++;
                  
                }
                tbody += "<tr>";
                tbody += "<td class='text-center'>"+"Total Sale = "+totalSale+"</td>";
                tbody += "<td class='text-center'>"+"Total Expence = "+totalexpense+"</td>";
                tbody += "</tr>";
                  
                $('#tbody').html(tbody);
          }else{
            console.log("Expense index is  = "+expense.length)
            console.log("Sale index is  = "+sale.length)
            var tbody = "";
            let totalexpense = 0;
            var totalSale = 0;
         
            var j = 0;
            var i = 0;
                for(var key in expense,sale){
                  tbody += "<tr>";
                  if(i<data.sale.length){
                    totalSale += parseInt(data.sale[i].sale_price);
                    tbody += "<td class='text-center bgsale'>"+data.sale[i].sale_price+"</td>";
                  }else {
                    tbody += "<td class='text-center bgsale'>0</td>";
                  }
                  if(j<data.expense.length){
                    totalexpense += parseInt(data.expense[j].amount);
                    tbody += "<td class='text-center bgexpense'>"+data.expense[j].amount+"</td>";
                  }else{
                    
                    tbody += "<td class='text-center bgexpense'>0</td>";
                  } 
                  tbody += "</tr>";
                
                  j++;
                  i++;
                  
                }
                tbody += "<tr>";
                tbody += "<td class='text-center'>"+"Total Sale = "+totalSale+"</td>";
                tbody += "<td class='text-center'>"+"Total Expence = "+totalexpense+"</td>";
                tbody += "</tr>"; 
                $('#tbody').html(tbody);
          }
          
          
        
        }
      })

    })
    

    // SEE THIS MONTH SALE AND EXPENCE RECORD FUNCTION

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
        url:"<?php echo base_url()?>fetchSaleExpense",
        type:"post",
        dataType:"json",
        data:{
          created:actualMonth
        },
        success: function(data){
          console.log(data);
          
          let expense = data.expense
          let sale = data.sale
          if(expense.length > sale.length){
            console.log("Expense index is  = "+expense.length)
            console.log("Sale index is  = "+sale.length)
            var tbody = "";
            let totalexpense = 0;
            var totalSale = 0;
         
            var j = 0;
            var i = 0;
                for(var key in sale,expense){
                  tbody += "<tr>";
                  if(i<data.sale.length){
                    totalSale += parseInt(data.sale[i].sale_price);
                    tbody += "<td class='text-center bgsale'>"+data.sale[i].sale_price+"</td>";
                  }else {
                    tbody += "<td class='text-center bgsale'>0</td>";
                  }
                  if(j<data.expense.length){
                    totalexpense += parseInt(data.expense[j].amount);
                    tbody += "<td class='text-center bgexpense'>"+data.expense[j].amount+"</td>";
                  }else{
                    
                    tbody += "<td class='text-center bgexpense'>0</td>";
                  } 
                  tbody += "</tr>";
                
                  j++;
                  i++;
                  
                }
                tbody += "<tr>";
                tbody += "<td class='text-center'>"+"Total Sale = "+totalSale+"</td>";
                tbody += "<td class='text-center'>"+"Total Expence = "+totalexpense+"</td>";
                tbody += "</tr>";
                  
                $('#tbody').html(tbody);
          }else{
            console.log("Expense index is  = "+expense.length)
            console.log("Sale index is  = "+sale.length)
            var tbody = "";
            let totalexpense = 0;
            var totalSale = 0;
         
            var j = 0;
            var i = 0;
                for(var key in expense,sale){
                  tbody += "<tr>";
                  if(i<data.sale.length){
                    totalSale += parseInt(data.sale[i].sale_price);
                    tbody += "<td class='text-center bgsale'>"+data.sale[i].sale_price+"</td>";
                  }else {
                    tbody += "<td class='text-center bgsale'>0</td>";
                  }
                  if(j<data.expense.length){
                    totalexpense += parseInt(data.expense[j].amount);
                    tbody += "<td class='text-center bgexpense'>"+data.expense[j].amount+"</td>";
                  }else{
                    
                    tbody += "<td class='text-center bgexpense'>0</td>";
                  } 
                  tbody += "</tr>";
                
                  j++;
                  i++;
                  
                }
                tbody += "<tr>";
                tbody += "<td class='text-center'>"+"Total Sale = "+totalSale+"</td>";
                tbody += "<td class='text-center'>"+"Total Expence = "+totalexpense+"</td>";
                tbody += "</tr>"; 
                $('#tbody').html(tbody);
          }
          
          
        
        }
      })

    })

</script>

  
</body>
</html>