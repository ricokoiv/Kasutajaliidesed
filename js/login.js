$(function() {

    $('#login-form-link').click(function(e) {
		$("#login-form").delay(100).fadeIn(100);
 		$("#register-form").fadeOut(100);
		$('#register-form-link').removeClass('active');
		$(this).addClass('active');
		e.preventDefault();
	});
	$('#register-form-link').click(function(e) {
		$("#register-form").delay(100).fadeIn(100);
 		$("#login-form").fadeOut(100);
		$('#login-form-link').removeClass('active');
		$(this).addClass('active');
		e.preventDefault();
	});

    // kui klikitakse register
    $('#register-submit').click( function() {

       if ($("#register-username").val() === '') {
           alert('You must enter a username.');
           return false;
       } else if($("#email").val() === '') {
           alert('You must enter an email.');
           return false;
       } else if ($("#register-password").val() === '') {
           alert('Password field cant be empty.');
           return false;
       } else if($("#confirm-password").val() !== $("#register-password").val()) {
           alert('Passwords need to match.');
           return false;
       } else {
           localStorage.setItem('username', $("#register-username").val());
           localStorage.password=$("#confirm-password").val();
           localStorage.email=$("#email").val();
           alert('Registering successful.');
           location.reload();
           return false;
       }

    });

    // kui klikitakse login
    $('#login-submit').click( function() {

        if ($("#username").val() == localStorage.username && $("#password").val() == localStorage.password) {
            console.log(localStorage.username);
            console.log(localStorage.password);
            window.location = "index.html";
            return false;
        } else {
            alert('Wrong username or password');
            console.log(localStorage.username);
            console.log(localStorage.password);
            return false;
        }

    });

});
