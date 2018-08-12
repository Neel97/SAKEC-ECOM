$('form[name="loginForm"]').validate({
	rules:{
		uname:{
			required: true,
		},
		pass:{
			required: true,
			minlength: 8
		}
	},
	message:{
		uname:{
			required: 'Enter a username',
		},
		pass:{
			required: 'Enter a passowrd',
			minlength: 'Pasword must be of atleast 6 characters'
		}
	},
	errorElement: 'div',
	errorPlacement: function(error, element){
		var placement = $(element).data('error');
		if(placement)
			$(placement).append(error);
		else
			error.insertAfter(error);
	}
});