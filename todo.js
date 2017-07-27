  

        

$(document).ready(function() {
    
	var toSave = 0;
	var check_count = 0;
    function add_item() {
        var list_name = "default";
        var toAdd = $('input[name=checkListItem]').val();
        $('.list').append('<div class="check"><input type="checkbox"/> ' + toAdd + '<br></div>');
        $('#input').val('');
        check_count++;
        if (toSave == 0) {
            $('.save').append('<input type="button" name="save" value="Save todo list" id="save_button">');
            toSave = 1;
        }
        $.post('lists.php', {list_name: list_name, content: toAdd}, function(data){
            alert(data.status);
        }, "json");
    }
	$('#button').click(function() {
		add_item();
    });
    $(document).keydown(function(e) {
        if(e.which == 13) {
            add_item();
        };
    }); 
    
    $(document).on('click', '.check', function() {
        $(this).toggle(500);
        setTimeout(function() {
			$(this).remove(); 
		}, 500);
        check_count--;
		if (check_count == 0) {
			$('#save_button').remove();
			toSave = 0;
		}
    });
    
    
	
    
    "use strict";
     var pattern = /^[a-z0-9][a-z0-9\._-]*[a-z0-9]*@([a-z0-9]+([a-z0-9-]*[a-z0-9]+)*\.)+[a-z]+$/i;
     var mail = $('input[name=email]');
     mail.blur(function() {
		 if(mail.val() !=""){
			if(mail.val().search(pattern) == 0){
				 $('#valid_email_message').text('');
				 $('input[type=submit]').attr('disabled', false);
			}else{
				$('#valid_email_message').text('Введите ваш email');
			}
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


