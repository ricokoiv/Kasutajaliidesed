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
  seriesBarDistance: 15,  
  onlyInteger : true
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

function calculateStatistics(description, data) {

  var grades = [0, 0, 0, 0, 0, 0];
  for (var i = 0; i < data.length; i++) {
    grades[data[i].grade] = parseInt(data[i].CountOf);
  }
  console.log(grades);
  var object = {
    'name': description,
    'data': grades
  }
  
  return object;
}

$('.statistics-true').click(function() {
  var course_id = $(this).attr('class').replace(/^(\S*).*/, '$1');
  var statistics_id = $(this).attr('id');
  var description = $(this).find('.c-desc').text();

  $.ajax({
    url: "./gradestatistics.php",
    type: "POST",
    dataType: "json",
    //async: false,
    data: {
      course_id: course_id,
      description: description
    },
    success: function(data) {
      //calculateStatistics(description, data);

  if (!$('.statistics').hasClass('statistics-open')) {
    $('.statistics').toggleClass('statistics-open');
  } else {

  }

  if ($('.statistics').data('opener') == statistics_id) {
    $('.statistics').toggleClass('statistics-open');
    $('.statistics').data('opener', '');
  } else {
    $('.statistics').data("opener", statistics_id);
  }

  var data = {
    labels: ['0', '1', '2', '3', '4', '5'],
    series: [
      calculateStatistics(description, data)
    ]
  };

  $('#statistics-name').text(description);
  new Chartist.Bar('.ct-chart', data, options, responsiveOptions);
  
      }
  });
});

$('.icon-close').click(function() {
  $('.statistics').toggleClass('statistics-open');
});

var easeOutCubic = function(t, b, c, d) {
  if ((t /= d / 2) < 1) return c / 2 * t * t * t + b;
  return c / 2 * ((t -= 2) * t * t + 2) + b;
}
var options = {  
  easingFn: easeOutCubic,  
  axisY: {
    onlyInteger : true,
    labelInterpolationFnc: function(value) {
      return Math.abs(value);
    }
  }
};

var eap_total_anim = new CountUp("eap_total", 0, 137, 0, 0, options);
var eap_left_anim = new CountUp("eap_left", 0, 43, 0, 0, options);
eap_total_anim.start();
eap_left_anim.start();