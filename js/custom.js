$(document).ready(function(){

    var phones = [{ "mask": "(###) ###-####"}, { "mask": "(###) ###-####"}];
    $('#phone').inputmask({ 
        mask: phones, 
        greedy: false, 
        definitions: { '#': { validator: "[0-9]", cardinality: 1}} 
    });
    
    $('#contactform').submit(function(e) {
        e.preventDefault();
        $('.error').text('');
        var name = $('#name').val();
        if (name == '') {
            $('#err-name').text('Name is required.');
        }
        var phone = $('#phone').val();
        if (phone == '') {
            $('#err-phone').text('Phone is required.');
        }
        var g_response = grecaptcha.getResponse();
        if (g_response.length == 0) {
            $('#err-captcha').text('Please verify you\'re a human.');
        } 
        var upload_file = document.getElementById('file').files[0];
        if (typeof upload_file !== 'undefined') {
            var file_name = upload_file.name;
            var file_ext = file_name.split('.').pop().toLowerCase();
            if (jQuery.inArray(file_ext, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
                $('#err-file').text('Your file format is invalid. Please try again.');
            } 
            var file_size = upload_file.size; 
            if (file_size > 2000000) { // >2MB
                $('#err-file').text('Your file is too large. The upload limit is 2MB.');
            } else {
            var formData = new FormData();
                formData.append('name', name);
                formData.append('phone', phone);
                formData.append('file', upload_file);
                formData.append('gcaptcha', g_response);
                $.ajax({
                    url: 'process.php',
                    method: 'POST',
                    data: formData,
                    cache: false,
                    contentType: false, 
                    processData: false,
                    success: function(response) {  
                        //console.log(response);
                        if (response == 'success') {
                            var redirect_url = "thankyou.php";
                            $(location).attr('href', redirect_url);
                        }

                        if (response == 'fail') {
                            $('#err-captcha').text('Please verify you\'re a human.');
                        }

                        if (response == 'file') {
                            $('#err-file').text('Something went wrong. Please upload again.');
                        }
                        
                    } 
                });
            }
        } else {
            $('#err-file').text('Please upload file.');
        }
    });
});

