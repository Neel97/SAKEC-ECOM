jQuery.validator.addMethod("re_pass_check", function(value, element, params, message){
	if($(params).val() === value)
		return true;
	return this.optional(element);
}, jQuery.validator.format("Passwords do not match"));

$('form[name="signup"]').validate({
	rules: {
		suname: {
			required: true
		},
		spass: {
			required: true,
			minlength: 8
		},
		re_pass: {
			required: true,
			re_pass_check: "#spass"
		},
		rec_email: {
			required: true,
			email: true
		},
		tc: {
			required: true
		}
	},
	message: {
		uname: {
			required: 'Enter a username.'
		},
		pass: {
			required: 'Enter a password.',
			minlength: 'password must contain only 8 characters.'
		},
		re_pass: {
			required: 'Enter the password again.',
			re_pass_check: 'Password does not matches.'
		},
		tc: {
			required: 'Please agree to terms and conditions.'
		}
	},
	errorElement: 'div',
	errorPlacement: function(error, element){
		var placement = $(element).data('error');
		if(placement)
			$(placement).append(error);
		else
			error.insertAfter(error);
	},
});