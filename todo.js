$(document).ready(function() {
    $('#button').click(function() {
        var toAdd = $('input[name=checkListItem]').val();
        $('.list').append('<div class="check"><input type="checkbox"/> ' + toAdd + '<br></div>');
        $('#input').val('');
    });
    $(document).keydown(function(e) {
        if(e.which == 13) {
            var toAdd = $('input[name=checkListItem]').val();
            $('.list').append('<div class="check"><input type="checkbox"/> ' + toAdd + '<br></div>');
            $('#input').val('');
        };
    }); 
    $(document).on('click', '.check', function() {
        $(this).toggle(500);
    });
    "use strict";
     var pattern = /^[a-z0-9][a-z0-9\._-]*[a-z0-9]*@([a-z0-9]+([a-z0-9-]*[a-z0-9]+)*\.)+[a-z]+/i;
     var mail = $('input[name=email]');
     mail.blur(function() {
		 if(mail.val() !=""){
			if(mail.val().search(pattern) == 0){
				 $('#valid_email_message').text('');
				 $('input[type=submit]').attr('disabled', false);
			}else{
				$('#valid_email_message').text('Введите ваш email');
			}
		});
	var password = $('input[name=password]');
	password.blur(function(){
		if(password.val() != ''){
			if(password.val().length < 6){
				$('#valid_password_message').text('Минимальная длина пароля -- 6 символов');
				$('input[type=submit]').attr('disabled', true);
			}else{
				$('#valid_password_message').text('');
				$('input[type=submit]').attr('disabled', false);
			}
		}else{
			$('#valid_password_message').text('Введите пароль');
		}
	});
		
});  


