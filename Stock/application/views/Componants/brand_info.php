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
                <h4 class="card-title">Brand Information</h4>
                <hr class="bg-dark">
                <!-- /////////////////////////////////////////////// -->
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Brand Add</button>
                <!-- Modal -->
                <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Brand Add Form</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form action="" id="form" method="post">
                          <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" id="brand_name" class="form-control">
                          </div>
                         
                         </form>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Censel</button>
                        <button id="save_brand" class="btn btn-primary">Save</button>
                        
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
        <!--Open Details Table -->
        <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-title">
                                    <h4>Product_List</h4>
                                </div>
                                <div class="table-responsive">
                                    <table id="BrandTable" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Name</th>
                                                
                                                <!--th>Action</th-->
                                            </tr>
                                        </thead>
                                        <tbody id="tbody">
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
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
        <p>Copyright &copy; Designed & Developed by <a href="https://themeforest.net/user/quixlab">Quixlab</a> 2018 </p>
      </div>
    </div>
  </div>
  
  

  
  <?php echo $footer_src;?>
  
  
   <script>
		$(document).on("click", "#save_brand", function(e){
			e.preventDefault();

			var name = $('#brand_name').val();
           
			

      $.ajax({
        url:"<?php echo base_url()?>brandInsert",
        type: "post",
        dataType:"json",
        data: {
          name:name
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


    function fetch(){
      $.ajax({
        url:"<?php echo base_url()?>fetchBrand",
        type:"post",
        dataType:"json",
        success: function(data){
          console.log(data);
          var tbody = "";
           
          for(var key in data){
            tbody +="<tr>";
           // tbody +="<td>"+data[key]['id']+"</td>";
            tbody +="<td>"+data[key]['brand']+"</td>";
            tbody +="</tr>";
          
          }

          $('#tbody').html(tbody);
          // $('#BrandTable').DataTable();
          // $('.dataTables_length').addClass('bs-select');
        }
      })
    
    }




    fetch();

	</script>

  
</body>
</html>