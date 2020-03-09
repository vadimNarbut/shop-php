$( document ).ready(function() {
    $("#btn").click(
		function(){
			sendAjaxForm('result_form', 'ajax_form', 'action_ajax_update.php');
			return false; 
		}
	);
});

function sendAjaxForm(result_form, ajax_form, url){
    $.ajax({
        url: url,
        type:     "POST", 
        dataType: "html", 
        data: $("#"+ajax_form).serialize(),
        success: function(response) { 
        	result = $.parseJSON(response);
            $('#result_form').html('user_id: '+result.id+'<br>user_position: '+result.position);
    	},
    	error: function(response) { 
            $('#result_form').html('Ошибка. Данные не отправлены.');
    }
});
}

// $( document ).ready(function() {
//     $("#btn").click(
// 		function(){
// 			sendAjaxForm('result_form', 'ajax_form', 'action_ajax_form.php');
// 			return false; 
// 		}
// 	);
// });
 
// function sendAjaxForm(result_form, ajax_form, url) {
//     $.ajax({
//         url:     url, //url страницы (action_ajax_form.php)
//         type:     "POST", //метод отправки
//         dataType: "html", //формат данных
//         data: $("#"+ajax_form).serialize(),  // Сеарилизуем объект
//         success: function(response) { //Данные отправлены успешно
//         	result = $.parseJSON(response);
//         	$('#result_form').html('Имя: '+result.name+'<br>Телефон: '+result.phonenumber);
//     	},
//     	error: function(response) { // Данные не отправлены
//             $('#result_form').html('Ошибка. Данные не отправлены.');
//     	}
//  	});
// }