"use strict";

$(document).ready(function () {
  $('#submit_bnt_admin').on('click', function (e) {
    e.preventDefault();
    var admin_nim = $("input#admin_nim").val();
    var admin_name = $("input#admin_name").val();
    var admin_lastname = $("input#admin_lastname").val();
    var admin_email = $("input#admin_email").val();
    var admin_pass = $('input#admin_pass').val();
    var admin_conpass = $('input#admin_conpass').val();
    var len = admin_nim.length;

    if (admin_nim == "") {
      $('input#admin_nim').focus();
      return false;
    } else if (len >= 15) {
      $('input#admin_nim').focus();
      $('#admin_error').text('Must be 14, its: ' + len);
      return false;
    } else if (len <= 13) {
      $('input#admin_nim').focus();
      $('#admin_error').text('Must be 14, its: ' + len);
      return false;
    } else {
      $('#admin_error').html('');
    }

    if (admin_name == "") {
      $('input#admin_name').focus();
      return false;
    }

    if (admin_lastname == "") {
      $('input#admin_lastname').focus();
      return false;
    }

    if (admin_email == "") {
      $('input#admin_email').focus();
      return false;
    } else if (isEmail(admin_email) == false) {
      $('input#admin_email').focus();
      $('#admin_error').text('Email is not valid: ' + isEmail());
      return false;
    } else {
      $('#admin_error').html('');
    }

    if (admin_pass == "") {
      $('input#admin_pass').focus();
      return false;
    }

    if (admin_conpass == "") {
      $('input#admin_conpass').focus();
      return false;
    } else if (admin_pass != admin_conpass) {
      $('#admin_error').text("Opps password not matched...");
      $('input#admin_conpass').focus();
      return false;
    } else {
      $('#admin_error').html('');
    }

    $.ajax({
      // ../admin_insert/admin_insert.php
      url: '../insert_admin/insert_admin.php',
      type: "post",
      data: new FormData(this.form),
      processData: false,
      contentType: false,
      cache: false,
      async: false,
      beforeSend: function beforeSend() {
        $('#submit_bnt_admin').val('Inserting');
      },
      success: function success(data) {
        // $('#admin_form')[0].reset();
        $('#admin_error').html(data);
      }
    });
  });
});

function process(input) {
  var value = input.value;
  var numbers = value.replace(/[^0-9]/g, "");
  input.value = numbers;
}

function isEmail(email) {
  var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

  if (!regex.test(email)) {
    return false;
  } else {
    return true;
  }
}