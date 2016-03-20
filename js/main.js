window.onload = function onLoad() {
    var line = new ProgressBar.Line('#grade-progress', {
        color: '#67e889',
        duration: 2000,
        fill: 'rgba(0, 0, 0, 0.5)',
        easing: 'easeInOut',
        strokeWidth: 2,
    });

    line.animate(0.76);
};

$('.li-subject').click(function() {
  $(this).parent().find('.li-arrow').toggleClass('li-subject-open');
  $(this).parent().find('.li-subject-container').slideToggle();
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
  var data = {
    labels: ['0', '1', '2', '3', '4', '5'],
      series: [
      [32, 41, 38, 28, 18, 9]
    ]
  };

  var options = {
    seriesBarDistance: 15
  };

  var responsiveOptions = [
    ['screen and (min-width: 641px) and (max-width: 1024px)', {
      seriesBarDistance: 10,
      axisX: {
        labelInterpolationFnc: function (value) {
          return value;
        }
      }
    }],
    ['screen and (max-width: 640px)', {
      seriesBarDistance: 5,
      axisX: {
        labelInterpolationFnc: function (value) {
          return value[0];
        }
      }
    }]
  ];

  new Chartist.Bar('.ct-chart', data, options, responsiveOptions);
})

$('#ma2-e').click(function() {
  if (!$('.statistics').hasClass('statistics-open')) {
    $('.statistics').toggleClass('statistics-open');
  }

  if ($('.statistics').data('opener') == $(this).attr('id')) {
    $('.statistics').toggleClass('statistics-open');
    $('.statistics').data('opener', '');
  } else {
    $('.statistics').data("opener", $(this).attr('id'));
  }
  var data = {
    labels: ['0', '1', '2', '3', '4', '5'],
      series: [
      [6, 63, 12, 11, 8, 3]
    ]
  };

  var options = {
    seriesBarDistance: 15
  };

  var responsiveOptions = [
    ['screen and (min-width: 641px) and (max-width: 1024px)', {
      seriesBarDistance: 10,
      axisX: {
        labelInterpolationFnc: function (value) {
          return value;
        }
      }
    }],
    ['screen and (max-width: 640px)', {
      seriesBarDistance: 5,
      axisX: {
        labelInterpolationFnc: function (value) {
          return value[0];
        }
      }
    }]
  ];

  new Chartist.Bar('.ct-chart', data, options, responsiveOptions);
})

$('.icon-close').click(function() {
  $('.statistics').toggleClass('statistics-open');
})
