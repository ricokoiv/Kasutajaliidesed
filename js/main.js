localStorage.setItem('grades', JSON.stringify({
  'ma2-kt1': {
    'subject': 'Matemaatiline Analüüs II',
    'name': 'Kontrolltöö I',
    'data': [
      32, 41, 38, 28, 18, 9
    ]
  },
  'ma2-e': {
    'subject': 'Matemaatiline Analüüs II',
    'name': 'Eksam',
    'data': [
      6, 63, 12, 11, 8, 3
    ]
  }
}));

var options = {
  seriesBarDistance: 15
};

var responsiveOptions = [
  ['screen and (min-width: 641px) and (max-width: 1024px)', {
    seriesBarDistance: 10,
    axisX: {
      labelInterpolationFnc: function(value) {
        return value;
      }
    }
  }],
  ['screen and (max-width: 640px)', {
    seriesBarDistance: 5,
    axisX: {
      labelInterpolationFnc: function(value) {
        return value[0];
      }
    }
  }]
];

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

$('.statistics-true').click(function() {
  if (!$('.statistics').hasClass('statistics-open')) {
    $('.statistics').toggleClass('statistics-open');
  }

  if ($('.statistics').data('opener') == $(this).attr('id')) {
    $('.statistics').toggleClass('statistics-open');
    $('.statistics').data('opener', '');
  } else {
    $('.statistics').data("opener", $(this).attr('id'));
  }

  var grade_name = $(this).attr('id'),
    grades = localStorage.getItem('grades'),
    grades_parsed = JSON.parse(grades),
    grades_parsed_name = grades_parsed[grade_name].name,
    grades_parsed_data = grades_parsed[grade_name].data;

  var data = {
    labels: ['0', '1', '2', '3', '4', '5'],
    series: [
      grades_parsed_data
    ]
  };

  $('#statistics-name').text(grades_parsed_name);
  new Chartist.Bar('.ct-chart', data, options, responsiveOptions);
});

$('.icon-close').click(function() {
  $('.statistics').toggleClass('statistics-open');
});

var easeOutCubic = function(t, b, c, d) {
  if ((t /= d / 2) < 1) return c / 2 * t * t * t + b;
  return c / 2 * ((t -= 2) * t * t + 2) + b;
}
var options = {  
  easingFn: easeOutCubic
};

var eap_total_anim = new CountUp("eap_total", 0, 137, 0, 0, options);
var eap_left_anim = new CountUp("eap_left", 0, 43, 0, 0, options);
eap_total_anim.start();
eap_left_anim.start();