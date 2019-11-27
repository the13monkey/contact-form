$(document).ready(function(){

   $('#contactform').on('submit', function(event){
       event.preventDefault();
       $.ajax({
           url: 'process.php',
           method: 'POST',
           data: $(this).serialize(),
           dataType: 'json',
           beforeSend: function(){
               $('#submit').attr({
                   disabled: 'disabled',
                   style: 'cursor:not-allowed'
               });
           },
           success: function(data){
                $('#submit').attr('disabled', false);
                if (data.success) {
                    $('#contactform')[0].reset();
                    $('.error').text('');
                    grecaptcha.reset();
                   
                } else {
                    $('#error').text('Something went wrong, please try again');
                }
           }
       });
   });

});