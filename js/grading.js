$('.li-subject').click(function() {
  $(this).parent().find('.li-arrow').toggleClass('li-subject-open');
  $(this).parent().find('.li-subject-container').slideToggle();
});

$('.icon-close').click(function() {
  $('.statistics').toggleClass('statistics-open');
  $('.statistics').data('opener', '');
});

$('#ma2-kt1').click(function() {
  if (!$('.statistics').hasClass('statistics-open')) {
    $('.statistics').toggleClass('statistics-open');
  }

  if ($('.statistics').data('opener') == $(this).attr('id')) {
    $('.statistics').toggleClass('statistics-open');
    $('.statistics').data('opener', '');
  } else {
    $('.statistics').data("opener", $(this).attr('id'));
  }
});

$('.subject-add-work').click(function() {
  if (!$('.subject-work-input-true').length) {
    var button = $(this);
    button.addClass('btn-disabled');
    button.parent().find('.subject-grouping').after('<li><div class="row"><div class="col-xs-11 subject-work-input"><input type="text" tabindex="1" class="form-control" placeholder="Sisesta töö nimi" value="" required></div></div></li>');

    $('.subject-work-input input').focus();

    $('.subject-work-input input').keyup(function(e) {
      if (e.keyCode === 13) {
        var subject_work_name = $(this).val();

        if ($(this).val() === "") {
          $(this).closest('li').remove();
        } else {
          $(this).closest('.col-xs-11').addClass('col-xs-10').removeClass('col-xs-11').removeClass('subject-work-input').text(subject_work_name).closest('.row');
          // .append('<div class="col-xs-1"><i class="ion-ios-color-wand-outline icon-stats"></i></div>');
        }
        
        button.removeClass('btn-disabled');
      }
    });
  }
});

$('.btn-change').on('click', function() {
  $(this).toggleClass('change-true');

  if ($(this).hasClass('change-true')) {
    let name_list_grades = $('.name-list-grades');

    name_list_grades.each(function(index) {
      let grade = $(this).text();
      index++;
      $(this).html('<input type="text" tabindex="' + index + '" class="form-control grades-input" id="subject-work-input" placeholder="Hinne" value="' + grade + '">');
    });
  } else {
    let name_list_grades = $('.grades-input');
    //console.log(name_list_grades);
    name_list_grades.each(function() {
      let grade = $(this).val();
      $(this).parent().html(grade);
    });
  }
});
