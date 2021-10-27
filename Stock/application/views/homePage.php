<?php echo $header_src;?>
<body>
   <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    



    <div class="login-form-bg h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100">
                <div class="col-xl-6">
                    <div class="form-input-content">
                        <div class="card login-form mb-0">
                            <div class="card-body pt-5">
                                <a class="text-center"> <h4>Login</h4></a>
        
                                <form id="loginForm" action="" method="post" class="mt-5 mb-5 login-input">
                                    <div class="form-group">
                                        <input type="text" id ="username" class="form-control" placeholder="Username">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" id="password" class="form-control" placeholder="Password">
                                    </div>
                                    <button id="loginBtn" class="btn login-form__btn submit w-100">Sign In</button>
                                </form>
                                <p class="mt-5 login-form__footer">Dont have account? <a href="<?php echo base_url()?>registation" class="text-primary">Sign Up</a> now</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php echo $footer_src; ?>

<script>
    $(document).on("click", "#loginBtn", function(e){
        e.preventDefault();
        var username = $('#username').val();
        var password = $('#password').val();

        console.log(username+" "+password);
        $.ajax({
            url:"<?php echo base_url();?>loginRequest",
            type:"post",
            dataType:"json",
            data:{
                username:username,
                password:password
            },
            success: function(data){
                console.log(data);
                            
                            if(data.responce == 'success'){
                                Command: toastr["success"]("Login Successfull")
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

                                    window.location.href = "http://localhost/Stock/gohome"
                               
                                },2000)
                                    
                                
                                
                            }else{
                                Command: toastr["error"]("Login Failed")
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