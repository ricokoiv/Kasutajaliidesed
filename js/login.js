$(function() {

    $('input.cb').on('change', function() {
    $('input.cb').not(this).prop('checked', false);
    });

    $('#login-form-link').click(function(e) {
		$("#login-form").delay(100).fadeIn(100);
 		$("#register-form").fadeOut(100);
        $('#alert').html("");
		$('#register-form-link').removeClass('active');
		$(this).addClass('active');
		e.preventDefault();
	});
	$('#register-form-link').click(function(e) {
		$("#register-form").delay(100).fadeIn(100);
 		$("#login-form").fadeOut(100);
        $('#alert').html("");
		$('#login-form-link').removeClass('active');
		$(this).addClass('active');
		e.preventDefault();
	});

    // kui klikitakse register
    $('#register-submit').click( function() {

       if($("#confirm-password").val() !== $("#register-password").val()) {
           $('#alert').html("Paroolid peavad klappima!");
           $('#alert').fadeIn().delay(2000);
           return false;
       } else if ($("#register-username").val() === "") {
           $('#alert').html("Meil on vaja Su kasutajanime!");
           $('#alert').fadeIn().delay(2000);
           return false;
       } else if ($("#fullname").val() === "") {
           $('#alert').html("Meil on vaja Su täisnime!");
           $('#alert').fadeIn().delay(2000);
           return false;
       } else if ($("#confirm-password").val() === "" || $("#register-password").val() === "") {
           $('#alert').html("Parooliväli ei tohi jääda tühjaks!");
           $('#alert').fadeIn().delay(2000);
           return false;
       } else {
           if($("#student-cb").is(':checked')) {
               var studentEntity = { 'username': $("#register-username").val(),
                                  'password': $("#confirm-password").val(),
                                  'fullname': $("#fullname").val()};
               localStorage.setItem('studentEntity', JSON.stringify(studentEntity));
           } else {
               var teacherEntity = { 'username': $("#register-username").val(),
                                  'password': $("#confirm-password").val(),
                                  'fullname': $("#fullname").val()};
               localStorage.setItem('teacherEntity', JSON.stringify(teacherEntity));
           }
           $('#alert').html("");
           $('#alert-success').html("Registreerimine õnnestus!");
           $('#alert-success').fadeIn().delay(2000);
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
            $('#alert').html("Vale kasutajanimi või parool!");
            $('#alert').fadeIn().delay(2000);
            return false;
        }

    });

});
