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
                <h4 class="card-title">Product Information</h4>
                <hr class="bg-dark">
                <!-- /////////////////////////////////////////////// -->
                <!-- Button trigger modal -->
                <div class="row col-12">
                  <button type="button" class="btn btn-primary d-inline col-6" data-toggle="modal" data-target="#myModal">Product Add</button>
                  <input type="text" id="myInput" placeholder="Search" class="col-6 form-control d-inline">
                </div>
                
                <!-- Modal -->
                <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Product Add Form</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form action="" id="form" method="post">
                          <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" id="product_name" class="form-control">
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
                          <div class="form-group">
                            <label for="">Price</label>
                            <input type="number" id="product_price" class="form-control">
                          </div>
                          <div class="form-group">
                            <label for="">Stock</label>
                            <input type="number" id="stock" class="form-control">
                          </div>
                         
                         </form>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Censel</button>
                        <button id="save_product" class="btn btn-primary">Save</button>
                        
                      </div>
                    </div>
                  </div>
                </div>
                <!--//////////////////////////////////////////////-->
                <!--Edit Modal Open -->
                 <!-- Modal -->
                 <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Product Update Form</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form action="" id="form" method="post">
                          <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" id="product_EditName" class="form-control">
                            <input type="hidden" id="product_EditId" class="form-control">
                          </div>
                          <div class="form-group">
                            <label for="">Brand</label>
                            <input type="text" id="brand_Edit" class="form-control">
                            <input type="hidden" id="product_EditId" class="form-control">
                          </div>

                          <div class="form-group">
                            <label for="">Price</label>
                            <input type="number" id="product_EditPrice" class="form-control">
                          </div>
                          <div class="form-group">
                            <label for="">Stock</label>
                            <input type="number" id="product_EditStock" class="form-control">
                          </div>
                         
                         </form>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Censel</button>
                        <button id="ProductUpdateBtn" class="btn btn-primary">Update</button>
                        
                      </div>
                    </div>
                  </div>
                </div>
                <!--Edit Modal End -->
                
              </div>
            </div>

          </div>
        </div>
        <!--second Row -->
        <!--Open Details Table -->
            <div class="col-lg-6">
                            <div id="product_box" class="">
                                
                            </div>
            </div>
        <!-- End Details Table-->
        <!--second Row End -->
      </div>
      <!-- #/ container -->
    </div>
    <!--Product Muster Main Panal-->
    <div class="footer">
      <div class="copyright">
        <p>Copyright &copy; Designed & Developed by <a href="https://themeforest.net/user/quixlab">Soft Analyzer Engineer</a> 2018 </p>
      </div>
    </div>
  </div>
  
  

  
  <?php echo $footer_src;?>
  
  
   <script>
     //SEARCH PRODUCT TOP
     $(document).ready(function(){
        $("#myInput").on("keyup", function() {
          var value = $(this).val().toLowerCase();
          $("#product_box .card").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
          });
        });
      });
     //INSERT PRODUCT FUNCTION
		$(document).on("click", "#save_product", function(e){
			e.preventDefault();

			var name = $('#product_name').val();
      var brand = $('#brands').val();
			var price = $('#product_price').val();
      var stock = $('#stock').val();

      $.ajax({
        url:"<?php echo base_url()?>insert",
        type: "post",
        dataType:"json",
        data: {
          name:name,
          brand:brand,
          price:price,
          stock:stock
        },
        success: function(data){
          $('.modal').modal('hide');
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

                fetch();
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

 //SELECT PRODUCT FUNCTION
    function fetch(){
      $.ajax({
        url:"<?php echo base_url()?>fetch",
        type:"post",
        dataType:"json",
        success: function(data){
          console.log(data);
          
          var productBox = "";
          
           
          for(var key in data){
           
            

            productBox +="<div class='card'>";
            productBox += "<div class='card-body'>";
            productBox += "<div class='float-left'>";
            productBox +="<h4 class='font-weight-bold text-primary'>"+data[key]['name']+"</h4>";
            productBox +="<h4 class='font-weight-bold text-primary'>"+data[key]['brand']+"</h4>";
            productBox +="<h5 class='font-weight-light text-dark'>"+"Price_"+data[key]['price']+"</h5>";
            productBox +="<h6 class='font-weight-bold text-info'>"+"Stock_"+data[key]['stock']+"</h6>";
            productBox += "</div>";
            productBox += "<div class='float-right'>";
            productBox += "<p><button class='btn btn-sm btn-danger' id='del_id' del_id="+data[key]['id']+"><i class='fas fa-trash-alt'></i></button></p>";
            productBox += "<p><button class='btn btn-sm btn-primary' id='edit_product' edit_id="+data[key]['id']+"><i class='fas fa-edit'></i></button></p>";
            productBox += "</div>"
            productBox += "</div>";
            productBox +="</div>";
            
           
          
          }
           $('#product_box').html(productBox);
           
         
        }
      })
      
    }

    fetch();

    //DELETE PRODUCT FUNCTION

    $(document).on("click", "#del_id", function(e){
      e.preventDefault();

      var del_id = $(this).attr('del_id');
      if(del_id == ""){
        alert('Delete id not Found');
      }else{
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
              confirmButton: 'btn btn-success',
              cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
          })

          swalWithBootstrapButtons.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel!',
            reverseButtons: true
          }).then((result) => {
            if (result.isConfirmed) {
              $.ajax({
                  url:"<?php echo base_url()?>deleteProduct",
                  type:"post",
                  dataType:"json",
                  data:{
                    id:del_id
                  },
                  success: function(data){
                    console.log(data)
                    fetch();
                    if(data.responce == 'success'){
                      swalWithBootstrapButtons.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                      )
                    }
                  }
              });
              
            } else if (
              /* Read more about handling dismissals below */
              result.dismiss === Swal.DismissReason.cancel
            ) {
              swalWithBootstrapButtons.fire(
                'Cancelled',
                'Your imaginary file is safe :)',
                'error'
              )
            }
          })
      }
    })

    // EDIT PRODUCT FUNCTION
   $(document).on("click", "#edit_product", function(e){
    e.preventDefault();
     var editId = $(this).attr('edit_id');
     
     if(editId == ""){
       alert("Edit Id is Not Found");
     }else{
       $.ajax({
         url:"<?php echo base_url()?>edit_product",
         type:"post",
         dataType:"json",
         data:{
           id:editId
         },
         success:function(data){
           console.log(data);
           if(data.responce == "succsess"){
            $('#editModal').modal('show');
            $('#product_EditId').val(data.post.id);
            $('#product_EditName').val(data.post.name);
            $('#brand_Edit').val(data.post.brand);
            $('#product_EditPrice').val(data.post.price);
            $('#product_EditStock').val(data.post.stock);
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
     }
   })

   // PRODUCT UPDATE FUNCTION 
   $(document).on("click", "#ProductUpdateBtn", function(e){
     e.preventDefault();

     var updateId = $('#product_EditId').val();
     var updateName = $('#product_EditName').val();
     var updatePrice = $('#product_EditPrice').val();
     var updateStock = $('#product_EditStock').val();

     ///alert("Id = "+updateId + ", product Name = "+updateName + ", Price = "+updatePrice + ", Stock Value = "+updateStock);
     $.ajax({
       url:"<?php echo base_url()?>updateProduct",
       type:"post",
       dataType:"json",
       data:{
         id:updateId,
         name:updateName,
         price:updatePrice,
         stock:updateStock
       },
       success:function(data){
         console.log(data);
         $('#editModal').modal('hide');
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
            fetch();
         }
         
       },
       error:function(data){
         console.log(data);

       }
     })
   })

	</script>

  
</body>
</html>