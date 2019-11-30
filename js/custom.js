$(document).ready(function(){

    var phones = [{ "mask": "(###) ###-####"}, { "mask": "(###) ###-####"}];
    $('#phone').inputmask({ 
         mask: phones, 
        greedy: false, 
        definitions: { '#': { validator: "[0-9]", cardinality: 1}} 
    });
   
    $('#contactform').submit(function(e) {
        e.preventDefault();
        $.ajax({
            url: 'process.php',
            method: 'POST',
            data: $(this).serialize(),
            dataType: 'JSON',
            cache: false,
            success: function(result) {  
                if (result.err_name == '' && result.err_phone == '' && result.err_captcha == '') {
                    var redirect_url = "thankyou.php";
                    $(location).attr('href', redirect_url);
                } else {
                    $('#err-name').text(result.err_name);
                    $('#err-phone').text(result.err_phone);
                    $('#err-captcha').text(result.err_captcha);
                }
                
            }
        });
    });

 
});

