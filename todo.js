  

        

$(document).ready(function() {
    
	var toSave = 0;
	var check_count = 0;
    var toAdd = '';
    var item_id = 0;
    var item_values = [];
    var list_name = '';
    function add_item() {
        toAdd = $('input[name=checkListItem]').val();
        item_values[item_id] = toAdd;
        item_id++;
        $('.list').append('<div class="check" id="' + item_id + '"><input type="checkbox"/> ' + toAdd + '<br></div>');
        $('#input').val('');
        check_count++;
        if (toSave == 0) {
            $('.save').append('<input type="button" name="save" value="Save todo list" id="save_button">');
            toSave = 1;
            $('.save').prepend('<input type="text" name="list_name" placeholder="enter list name" class="list_name"/>');
            
        }
        
    }
	$('#button').click(function() {
		add_item();
    });
    $(document).keydown(function(e) {
        if(e.which == 13) {
            add_item();
        };
    }); 
    $(document).on('click', '#save_button', function() {
        if (toSave == 1) {
            list_name = $('input[name=list_name]').val();
            $.post('lists.php', {list_name: list_name, 'content[]': item_values}, function(data){
                alert(data.status);
            }, "json");
            
            
        }
    });
    $(document).on('click', '.check', function() {
        delete item_values[$(this).prop("id")];
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


