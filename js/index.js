$(document).ready(function(){
  $('#fname').on('input', function () {
    const val = $(this).val().trim();
    if (val === "") {
      showError('#fname', 'First Name is required.');
    } 
    else if (!/^[a-zA-Z ]+$/.test(val)) {
        showError('#fname', 'Only alphabets allowed.');
    } 
    else {
        clearError('#fname');
    }
  });
  $('#lname').on('input', function () {
    const val = $(this).val().trim();
    if (val === "") {
      showError('#lname', 'Last Name is required.');
    } 
    else if (!/^[a-zA-Z ]+$/.test(val)) {
      showError('#lname', 'Only alphabets allowed.');
    } 
    else {
      clearError('#lname');
    }
  });
  $('#fname , #lname').keyup(function(){
    var fname = $('#fname').val();
    var lname = $('#lname').val();
    var fullname = fname + " " + lname;
    $('#fullname').val(fullname);
  });
  function showError(selector, message) {
    let el = $(selector).next('.error');
    if (el.length === 0) {
      $(selector).after('<span class="error"></span>');
      el = $(selector).next('.error');
    }
    el.text(message);
  }
  function clearError(selector) {
    let el = $(selector).next('.error');
    if (el.length > 0) {
      el.text('');
    }
  }
});
  