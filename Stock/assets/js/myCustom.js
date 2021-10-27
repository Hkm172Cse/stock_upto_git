$(function(){
    $('#btnSubmit').on('click', function(){
        var postdata = $('#frm_product_data').serialize();
        $.post("<?php echo site_url('addproduct')?>", postdata,function(response){
            console.log(response)
        })
    })
})