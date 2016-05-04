$(function() {

  $('input.cb').on('change', function() {
    $('input.cb').not(this).prop('checked', false);
  });

  $('#login-form-link').on('click', function(e) {
    $('#register-username').attr('name', 'username').attr("id", "username");
    $('#register-password').attr('name', 'password').attr("id", "password");
    //$('#register-submit').attr('name', 'login-submit').attr('id', 'login-submit').attr('value', 'Logi sisse');
    $('#login-submit').removeClass('hide');
    $('#register-submit').addClass('hide');
    $('#confirm-password, #fullname').removeAttr('required');
    $(".register-form").slideUp();
    $('.alert-error').text("");
    $('#register-form-link').removeClass('active');
    $(this).addClass('active');
    e.preventDefault();
  });
  $('#register-form-link').on('click', function(e) {
    $('#username').attr('name', 'register-username').attr("id", "register-username");
    $('#password').attr('name', 'register-password').attr("id", "register-password");
    //$('#login-submit').attr('name', 'register-submit').attr('id', 'register-submit').attr('value', 'Registreeru');
    $('#register-submit').removeClass('hide');
    $('#login-submit').addClass('hide');
    $('#confirm-password, #fullname').attr('required', '');
    $(".register-form").slideDown();
    $('.alert-error').text("");
    $('#login-form-link').removeClass('active');
    $(this).addClass('active');
    e.preventDefault();
  });

  function checkUsername(username) {
    var student,
        teacher;

    if (localStorage.getItem('studentEntity') !== null) {
      student = JSON.parse(localStorage.getItem('studentEntity')).username;
    }

    if (localStorage.getItem('teacherEntity') !== null) {
      teacher = JSON.parse(localStorage.getItem('teacherEntity')).username;
    }

    if (student === username || teacher === username) {
      return false;
    } else {
      return true;
    }
  }

  // kui klikitakse register
  $('#register-submit').on('click', function(e) {

    if ($("#confirm-password").val() !== $("#register-password").val()) {
      $('.alert-error').text("Paroolid peavad ühtima!");
      $('#register-password').val('').focus();
      $('#confirm-password').val('');
      return false;
    } else if ($("#register-username").val() === "") {
      $('.alert-error').text("Meil on vaja Sinu kasutajanime!");
      $('#register-username').focus();
      return false;
    } else if ($("#fullname").val() === "") {
      $('.alert-error').text("Meil on vaja Sinu täisnime!");
      $('#fullname').focus();
      return false;
    } else if ($("#register-password").val() === "") {
      $('.alert-error').text("Parooliväli ei tohi jääda tühjaks!");
      $('#register-password').focus();
      return false;
    } else if ($("#confirm-password").val() === "") {
      $('.alert-error').text("Parooliväli ei tohi jääda tühjaks!");
      $('#confirm-password').focus();
      return false;
    } else {
      if (!checkUsername($("#register-username").val())) {
        $('.alert-error').text("Kasutajanimi '" + $("#register-username").val() + "' on juba olemas!");
        $('#register-username').focus();
        e.preventDefault();
        return false;
      }

      if ($("#student-cb").is(':checked')) {
        var studentEntity = {
          'username': $("#register-username").val(),
          'password': $("#confirm-password").val(),
          'fullname': $("#fullname").val()
        };
        localStorage.setItem('studentEntity', JSON.stringify(studentEntity));
        window.location = "studentindex.html";
        return false;
      } else {
        var teacherEntity = {
          'username': $("#register-username").val(),
          'password': $("#confirm-password").val(),
          'fullname': $("#fullname").val()
        };
        localStorage.setItem('teacherEntity', JSON.stringify(teacherEntity));
        window.location = "teacherindex.html";
        return false;
      }
    }
  });

  // kui klikitakse login
  $('#login-submit').on('click', function(event) {
    event.preventDefault();

    if (localStorage.getItem('studentEntity') !== null) {
      var studentObject = localStorage.getItem('studentEntity');
    }

    if (localStorage.getItem('teacherEntity') !== null) {
      var teacherObject = localStorage.getItem('teacherEntity');
    }

    if (studentObject) {
      if ($("#username").val() == JSON.parse(studentObject).username &&
        $("#password").val() == JSON.parse(studentObject).password) {
        window.location = "studentindex.html";
        return false;
      }
    }

    if (teacherObject) {
      if ($("#username").val() == JSON.parse(teacherObject).username &&
        $("#password").val() == JSON.parse(teacherObject).password) {
        window.location = "teacherindex.html";
        return false;
      }
    }
    $('.alert-error').text("Vale kasutajanimi või parool!");
    $('#password').val('').focus();
    return false;

  });

});
