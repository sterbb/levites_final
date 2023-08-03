// npm package: flatpickr
// github link: https://github.com/flatpickr/flatpickr

$(function() {
  'use strict';

  // date picker 
  if($('.flatpickr-date').length) {
    flatpickr(".flatpickr-date", {
      minDate: "today",
      dateFormat: "Y-m-d",
    });
  }


  // time picker
  if($('.time-picker').length) {
    flatpickr(".time-picker", {
      enableTime: true,
      noCalendar: true,
      dateFormat: "H:i",
    });
  }

  if($('.date-range').length) {
    flatpickr(".date-range", {
      mode: 'range',
      dateFormat: 'Y-m-d'
    });
  }

  if($('.date-time-range').length) {
    flatpickr(".date-time-range", {
      enableTime: true,
      dateFormat: "Y-m-d H:i",
    });
  }



});