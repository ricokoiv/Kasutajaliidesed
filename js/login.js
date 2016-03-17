$(function() {

    $('input.cb').on('change', function() {
    $('input.cb').not(this).prop('checked', false);
    });

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
           if($("#student-cb").is(':checked')) {
               var studentEntity = { 'username': $("#register-username").val(),
                                  'password': $("#confirm-password").val(),
                                  'email': $("#email").val()};
               localStorage.setItem('studentEntity', JSON.stringify(studentEntity));
           } else {
               var teacherEntity = { 'username': $("#register-username").val(),
                                  'password': $("#confirm-password").val(),
                                  'email': $("#email").val()};
               localStorage.setItem('teacherEntity', JSON.stringify(teacherEntity));
           }
           alert('Registering successful.');
           location.reload();
           return false;
       }

    });

    // kui klikitakse login
    $('#login-submit').click( function() {
        var studentObject = localStorage.getItem('studentEntity');
        var teacherObject = localStorage.getItem('teacherEntity');

        if ($("#username").val() == JSON.parse(studentObject).username &&
            $("#password").val() == JSON.parse(studentObject).password) {
            window.location = "index.html";
            return false;
        } else if ($("#username").val() == JSON.parse(teacherObject).username &&
                   $("#password").val() == JSON.parse(teacherObject).password) {
            window.location = "teacherindex.html";
            return false;
        } else {
            alert('Wrong username or password');
            return false;
        }

    });

});
