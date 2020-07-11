Stripe.setPublishableKey('pk_test_TqDoeqLOwG6l3exnXJ37kvUU00Zfem7XE9');
var $form = $('#payment-form');

	$form.submit(function(event) { 
		event.preventDefault();	
		$('#charge-error').addClass('hidden');
		$form.find('button').prop('disabled', true);

		Stripe.card.createToken(
				{
					name: $('#card-holder-name').val(),
					number: $('#card-number').val(),
					exp_month: $('#exp-month').val(),
					exp_year: $('#exp-year').val(),
					cvc: $('#card-cvc').val(),
				},
				stripeResponseHanler);
				return false;

	});
function stripeResponseHanler( status , response){

	if(response.error){
		$('#charge-error').removeClass('hidden');
		$('#charge-error').text(response.error.message);
		$form.find('button').prop('disabled', false);

	}else{
			var token = response.id;

			$form.append($('<input type="hidden" name="stripeToken" />').val(token) );
			alert('kam pane laga e ');
			// submit the form :
			$form.get(0).submit();

	}

}

