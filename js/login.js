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

  //kontrollib iga poole sekundi tagant kasutajanime saadavalolekut
  var checkTimer;
  $("#username").keyup(function(e) {
    clearTimeout(checkTimer);
    var username = $(this).val();
    checkTimer = setTimeout(function() { 
      {
          $.ajax({
          url: "./check_username.php",
          type: "POST",
          data: {
            username: $("#register-username").val()
          },
          success: function(data) {
            if (data == 1) {
              $('.alert-error').text("Selline kasutajanimi on juba olemas!");
              $('#register-username').focus();
              return false;
            } else if (data == 0) {
              $('.alert-error').text("");
              return false;
            }
          }
        });
      }
    }, 500);
  });

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
    }

  });

     /*
    // kui klikitakse login
    $('#login-submit').on('click', function(event) {
      
      event.preventDefault();

      $('.alert-error').text("Vale kasutajanimi või parool!");
      $('#password').val('').focus();
      return false;
      
    });
    */
});