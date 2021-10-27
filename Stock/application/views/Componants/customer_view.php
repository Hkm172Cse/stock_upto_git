<?php echo $header_src;?> <body>
  <!--div id="preloader"><div class="loader"><svg class="circular" viewBox="25 25 50 50"><circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" /></svg></div></div -->
  <div id="main-wrapper"> <?php echo $header; ?> <?php echo $sidebar; ?>
    <!--Product Muster Main Panal -->
    <div class="content-body">
      <div class="container-fluid mt-3">
        <div class="row">
          <h2><?php echo $session_id2;?></h2>
          <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-validation">
                                    <form class="form-valide" action="#" method="post">
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-username">Customer Name <span class="text-danger"></span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="cutomer" value="<?php foreach($customertabledata as $val){echo $val->name;}?>">
                                                <input type="hidden" id="sessionId" value="<?php echo $session_id2;?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-email">Products <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="products" value="<?php foreach($selectData as $val){echo $val->product_name.", ";}?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-password">Total <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="number" class="form-control" id="totalPrice" value="<?php $total=0;
                                                 foreach($selectData as $val)
                                                 {$total += $val->sale_price;
                                                    
                                                 }echo $total;?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-confirm-password">Discount <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="number" class="form-control" id="discount" >
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-confirm-password">Due<span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="number" class="form-control" id="due" >
                                            </div>
                                        </div>
                                       
                                        <div class="form-group row">
                                            <div class="col-lg-8 ml-auto">
                                                <button id="discountBtn" class="btn btn-primary">Invoice</button>
                                              
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
        </div>
        
      </div>
      <!--  container -->
    </div>
    
    <div class="footer">
      <div class="copyright">
        <p>Copyright &copy; Designed & Developed by <a href="https://themeforest.net/user/quixlab">Quixlab</a> 2018 </p>
      </div>
    </div>
  </div>
  
  

  
  <?php echo $footer_src;?>
  
  
   <script>
		$(document).on("click", "#discountBtn", function(e){
			e.preventDefault();
        var products = $('#products').val();
        var total_price = $('#totalPrice').val();
			  var sessionId = $('#sessionId').val();
        var discount = $('#discount').val();
        var due = $('#due').val();
        var payment = total_price - discount;
        console.log(sessionId+" "+discount);
           
			

      $.ajax({
        url:"<?php echo base_url()?>discountSave",
        type: "post",
        dataType:"json",
        data: {
            customer_id:sessionId,
            products:products,
            total_amount:total_price,
            discount:discount,
            payment:payment,
            due:due
        },
        success: function(data){
          console.log(data);
          window.location.href = "invoice";
        }
      })

});


    




    

	</script>

  
</body>
</html>