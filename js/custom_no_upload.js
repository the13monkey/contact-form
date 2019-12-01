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
            success: function(response) {  
                if (response.err_name == '' && response.err_phone == '' && response.err_captcha == '') {
                    var redirect_url = "thankyou.php";
                    $(location).attr('href', redirect_url);
                } else {
                    $('#err-name').text(response.err_name);
                    $('#err-phone').text(response.err_phone);
                    $('#err-captcha').text(response.err_captcha);
                }
                
            }
        });
    });

 
});

