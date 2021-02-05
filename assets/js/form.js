$(document).ready(function(){




    $('#contact-form').validate({
     rules: {
      user_name: {
         required: true,
         minlength: 4
      },
      user_email: {
         required: true,
         email:true
      },
      user_subject: {
         required: false,
      },
      user_message: {
         required: true,
      },
     },
     messages: {
      user_name: {
         required: "Come on, you have a name don't you?",
         minlength: "Your name must consist of at least 2 characters"
      },
      user_email: {
         required: "Please put your email address",
      },
      user_message: {
         required: "Put some messages here?",
         minlength: "Your name must consist of at least 2 characters"
      },

     },
     submitHandler: function(form) {
      $(form).ajaxSubmit({
         type:"POST",
         data: $(form).serialize(),
         url:"sendmail.php",
         success: function() {
            $('#contact-form #success').fadeIn();
            document.contact-form.reset();
         },
         error: function() {

            $('#contact-form #error').fadeIn();
         }
      });
   }});

});