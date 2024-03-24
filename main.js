document.addEventListener("DOMContentLoaded", function() {
  // Select the password icon and password input elements
  const passIcon = document.querySelector('.pass-icon');
  const passwordInput = document.querySelector('#password');

  // Add click event listener to the password icon
  passIcon.addEventListener('click', function() {
    // Check the current type of the password input and toggle it
    if (passwordInput.type === 'password') {
      passwordInput.type = 'text';
    } else {
      passwordInput.type = 'password';
    }
  });
});

$(document).ready(function () {
		
			function validatePhoneNumber(phoneNumber) {
        		var phoneRegex = /^\+(?:[0-9] ?){6,14}[0-9]$/;
				if(phoneRegex.test(phoneNumber))
				{
					$('#resultPhone').html('');
					return true;
				}
				else 
				{
					$('#resultPhone').html('The phone number must be entered in international format starting with + ontaining min 9 digits');
					return false;
				}
    		}
			function validateEmail(email) {
        		var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
				if(emailRegex.test(email))
				{
					$('#resultEmail').html('');
					return true;
				}
				else 
				{
					$('#resultEmail').html('Enter the correct email');
					return false;
				}
        		
    		}
			function validateName(name) {
				var nameRegex = /^[a-zA-Zа-яА-ЯёЁ\s\-]+$/;
				if(nameRegex.test(name))
				{
					$('#resultName').html('');
					return true;
				}
				else 
				{
					$('#resultName').html('Enter the correct name');
					return false;
				}
			}
		    $('#contactForm').submit(function (e) {
				e.preventDefault();
				if (validatePhoneNumber($("#phone").val()) && validateName($("#name").val()) && validateEmail($("#email").val()))
				{
					
		        	var formData = $(this).serialize();

					$.ajax({
						type: "POST",
						url: $(this).attr('action'),
						data: formData,
						success: function (data) {
							data = JSON.parse(data);
							console.log(data.errors)
							if (data.errors && data.errors.length > 0) {
								$.each(data.errors, function(index, error) {
									alert(error)
								});
								
								
							} else if (data.success) {
								alert(data.success)
								
							}
						},
						error: function () {
							alert('There was a problem sending the email.');
						}
					});
				}
		        
		    });
		});
		