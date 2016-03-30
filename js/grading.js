$('.li-subject').click(function() {
  $(this).parent().find('.li-arrow').toggleClass('li-subject-open');
  $(this).parent().find('.li-subject-container').slideToggle();
});

$('.delete-submission').on('click', function() {
  if(!confirm('Kas oled kindel, et soovid teadmistekontrolli kustutada?')) {
    e.preventDefault();
    return false;
  }
  $(this).closest('li').hide();
});

$('.icon-close').click(function() {
  $('.statistics').toggleClass('statistics-open');
  $('.statistics').data('opener', '');
});

$('#ma2-kt1').click(function() {
  if (!$('.statistics').hasClass('statistics-open')) {
    $('.statistics').toggleClass('statistics-open');

    $(function() {
      var inputText;
      var $matching = $();

      $(".name-container").mixItUp({
        animation: {
          enable: false
        },
        layout: {
          display: 'list-item',
          containerClass: 'list'
        },
        callbacks: {
          onMixStart: function(state, futureState) {},
          onMixFail: function() {},
          onMixLoad: function() {
            $(this).mixItUp('setOptions', {
              animation: {
                enable: true,
                animateResizeTargets: true, // Animate the width/height of targets as the layout changes
                effects: 'fade rotateX(-60deg) translateZ(-100px) stagger'
              }
            });
          }
        }
      });

      // Delay function
      var delay = (function() {
        var timer = 0;
        return function(callback, ms) {
          clearTimeout(timer);
          timer = setTimeout(callback, ms);
        };
      })();



      $("#name-filter").keyup(function() {
        delay(function() {
          inputText = $("#name-filter").val().toLowerCase();

          if ((inputText.length) > 0) {
            $('.mix').each(function() {
              if ($(this).find('.name-list-name').text().toLowerCase().match(inputText)) {
                $matching = $matching.add(this);
              } else {
                $matching = $matching.not(this);
              }
            });
            $(".name-container").mixItUp('filter', $matching);
          } else {
            $(".name-container").mixItUp('filter', 'all');
          }
        }, 200);
      });
    });
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
  $('.grades-input').keyup(function(e) {
    console.log(e.keyCode);
    if (e.keyCode === 13) {
      $('.btn-change').trigger('click');
    }
  });
  var name_list_grades,
    grade;

  if ($(this).hasClass('change-true')) {
    name_list_grades = $('.name-list-grades');

    name_list_grades.each(function(index) {
      grade = $(this).text();
      index++;
      $(this).html('<input type="text" tabindex="' + index + '" class="form-control grades-input" id="subject-work-input" placeholder="Hinne" value="' + grade + '">');
    });

    $('.grades-input').keyup(function(e) {
      if (e.keyCode === 13) {
        $('.btn-change').trigger('click');
      }
    });

    $(document).on("keydown", function (e) {
        if (e.which === 8 && !$(e.target).is("input, textarea")) {
          if(!confirm('Oled kindel, et soovid lehelt lahkuda? Andmed on salvestamata.')) {
            e.preventDefault();
            return false;
          }
        }
    });
  } else {
    name_list_grades = $('.grades-input');
    name_list_grades.each(function() {
      grade = $(this).val();
      $(this).parent().html(grade);
    });

    $(document).off("keydown");
  }
});
