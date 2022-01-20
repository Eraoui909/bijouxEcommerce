(function($) {

	"use strict";


  // Form
	var contactForm = function() {
		if ($('#contactForm').length > 0 ) {
			$( "#contactForm" ).validate( {
				rules: {
					name: "required",
					subject: "required",
					email: {
						required: true,
						email: true
					},
					message: {
						required: true,
						minlength: 5
					}
				},
				messages: {
					name: "Please enter your name",
					subject: "Please enter your subject",
					email: "Please enter a valid email address",
					message: "Please enter a message"
				},
				/* submit via ajax */

				submitHandler: function(form) {
					var $submit = $('.submitting'),
						waitText = 'Submitting...';

					$.ajax({
				      type: "POST",
				      url: "/contact",
				      data: $(form).serialize(),

				      beforeSend: function() {
				      	$submit.css('display', 'block').text(waitText);
				      },
				      success: function(msg) {
                        if (msg === "ok") {
                            contact_absolute.classList.toggle("active-contact");
                            $(".message-sent").fadeIn();
                            $submit.css('display', 'none');
                            setTimeout(()=>{$(".message-sent").fadeOut()}, 3000);
                       } else {
                            $('#form-message-warning').html(msg);
                            $('#form-message-warning').fadeIn();
                            $submit.css('display', 'none');
                       }
                    },
                    error: function() {
                        $('#form-message-warning').html("Something went wrong. Please try again.");
                        $('#form-message-warning').fadeIn();
                        $submit.css('display', 'none');
                    }
			      });
		  		} // end submitHandler

			});
		}
	};
	contactForm();

})(jQuery);
