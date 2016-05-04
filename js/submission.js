$('.li-subject').click(function() {
  $(this).parent().find('.li-arrow').toggleClass('li-subject-open');
  $(this).parent().find('.li-subject-container').slideToggle();
});
//
// $("#file-dropzone").dropzone({
//   url : "/upload"
// });

Dropzone.autoDiscover = true;
// or disable for specific dropzone:
// Dropzone.options.myDropzone = false;

// $(function() {
//   // Now that the DOM is fully loaded, create the dropzone, and setup the
//   // event listeners
//   var myDropzone = new Dropzone(".dropzone");
//   myDropzone.on("addedfile", function(file) {
//     console.log(file);
//   });
// })

$('.delete-submission').on('click', function() {
  if(!confirm('Kas oled kindel, et soovid esitatud töö kustutada?')) {
    e.preventDefault();
    return false;
  }
  $(this).closest('li').hide();
});
