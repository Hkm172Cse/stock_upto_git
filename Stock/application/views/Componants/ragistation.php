<?php echo $header_src;?>
<body>
<div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
</div>
<div class="main-wrapper">
    <div class="content-body">
        <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-validation">
                                    <form class="form-valide" action="#" method="post">
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-username">Username <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="username"  placeholder="Enter a username..">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-email">Email <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="email" placeholder="Type Your email">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-password">Password <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="password" class="form-control" id="password" placeholder="Choose a safe one..">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-confirm-password">Confirm Password <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="password" class="form-control" id="cnfrm_password" placeholder="..and confirm it!">
                                            </div>
                                        </div>
                                       
                                        <div class="form-group row">
                                            <div class="col-lg-8 ml-auto">
                                                <button id="regi_Btn" class="btn btn-primary">Submit</button>
                                               <a href="<?php echo base_url()?>">Login</a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    </div>
        <?php echo $footer_src;?>
        <script>
            $(document).on("click", "#regi_Btn", function(e){
                e.preventDefault();

                var username = $('#username').val();
                var email = $('#email').val();
                var password = $('#password').val();
                var cnfrm_password = $('#cnfrm_password').val();

                console.log(username+" "+password+" "+email+" "+cnfrm_password);

                if(password != cnfrm_password){
                    Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Confirm Password Not Match!'
                  })

                }else if(username == ''){
                    Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'User name is Required!'
                  })
                }else{
                    $.ajax({
                        url:"<?php echo base_url()?>register",
                        type:"post",
                        dataType:"json",
                        data:{
                            username:username,
                            email:email,
                            password:password
                        },
                        success:function(data){
                            console.log(data);
                            
                            if(data.responce == 'success'){
                                Command: toastr["success"]("Registation Successfull")
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
                                setTimeout(function(){
                                    window.location.href = "http://localhost/Stock/home"
                                },2000)
                                
                                
                                
                            }
                        }
                    })
                }

            })
        </script>
    </body>
</html> 
            