// information 
// this file belongs to the student, where
// we insert, delete, update, view, and export the table
// 
$(document).ready(function () {

    $(document).on('click', '#insert_sudent_btn', function (e) {
        e.preventDefault();
        let insert_student_id_input = $('#insert_student_id_input').val();
        let insert_student_name_input = $('#insert_student_name_input').val();
        let insert_student_lastname_input = $('#insert_student_lastname_input').val();
        let insert_student_address_input = $('#insert_student_address_input').val();
        let insert_student_email_input = $('#insert_student_email_input').val();
        let insert_student_age_input = $('#insert_student_age_input').val();
        let insert_student_country_input = $('#insert_student_country_input').val();
        let insert_student_pass_input = $('#insert_student_pass_input').val();
        let insert_student_conpass_input = $('#insert_student_conpass_input').val();
        let len = insert_student_id_input.length;
        if (insert_student_id_input == "") {
            $('#insert_student_id_input').addClass('empty').focus();
            return false;
        } else if (len >= 15) {
            $('#insert_message_student').text('Must be 14, its: ' + len);
        } else if (len <= 13) {
            $('#insert_message_student').text('Must be 14, its: ' + len);
        } else {
            $('#insert_student_id_input').removeClass('empty');
            $('#insert_message_student').html("");
        }
        if (insert_student_name_input == '') {
            $('#insert_student_name_input').addClass('empty').focus();
            return false;
        } else {
            $('#insert_student_name_input').removeClass('empty');
        }
        if (insert_student_lastname_input == '') {
            $('#insert_student_lastname_input').addClass('empty').focus();
            return false;
        } else {
            $('#insert_student_lastname_input').removeClass('empty');

        }
        if (insert_student_address_input == '') {
            $('#insert_student_address_input').addClass('empty').focus();
            return false;
        } else {
            $('#insert_student_address_input').removeClass('empty');

        }
        if (insert_student_email_input == '') {
            $('#insert_student_email_input').addClass('empty').focus();
            return false;
        } else if (isEmail(insert_student_email_input) == false) {
            $('#insert_student_email_input').addClass('empty').focus();
            $('#insert_message_student').text('Invalida E-mail address');
            return false;
        } else {
            $('#insert_student_email_input').removeClass('empty');
            $('#insert_message_student').html('');
        }
        let age = insert_student_age_input;
        if (insert_student_age_input == '') {
            $('#insert_student_age_input').addClass('empty').focus();;
            return false;
        } else if (age >= 20) {
            $('#insert_student_age_input').addClass('empty').focus();
            $('#insert_message_student').text('Age is too old...');
            return false;
        } else if (age <= 4) {
            $('#insert_student_age_input').addClass('empty').focus();
            $('#insert_message_student').text('Age is too small');
            return false;
        } else {
            $('#insert_student_age_input').removeClass('empty');
            $('#insert_message_student').html('');
        }
        if (insert_student_country_input == '') {
            $('#insert_student_country_input').addClass('empty').focus();;
            return false;
        } else {
            $('#insert_student_country_input').removeClass('empty');
        }
        if (insert_student_pass_input == '') {
            $('#insert_student_pass_input').addClass('empty').focus();;
            return false;
        } else {
            $('#insert_student_pass_input').removeClass('empty');
        }
        if (insert_student_conpass_input == '') {
            $('#insert_student_conpass_input').addClass('empty').focus();;
            return false;
        } else if (insert_student_conpass_input != insert_student_pass_input) {
            $('#insert_student_conpass_input').addClass('empty').focus();
            $('#insert_message_student').text('Password not matched');
            return false;
        } else {
            $('#insert_student_conpass_input').removeClass('empty');
            $('#insert_message_student').html('');
        }
        $.ajax({
            url: '../insert_student_data/insertstudent.php',
            method: 'post',
            data: {
                insert_student_id_input: insert_student_id_input,
                insert_student_name_input: insert_student_name_input,
                insert_student_lastname_input: insert_student_lastname_input,
                insert_student_address_input: insert_student_address_input,
                insert_student_email_input: insert_student_email_input,
                insert_student_age_input: insert_student_age_input,
                insert_student_country_input: insert_student_country_input,
                insert_student_pass_input: insert_student_pass_input,
                insert_student_conpass_input: insert_student_conpass_input
            },
            success: function (data) {
                $('#insert_message_student').html(data);
                // $('form').trigger('reset');
            }
        });
    });
    //   student fetch on input
    $(document).on('click', '.student_view', function () {
        let id = $(this).attr('id');
        $.ajax({
            url: "../insert_student_data/student_select.php",
            method: "POST",
            data: { id: id },
            dataType: 'json',
            success: function (data) {
                update_student_auto_id = $('#update_student_auto_id').val(data[0]);
                update_student_main_id = $('#update_student_main_id').val(data[1]);
                update_student_name = $('#update_student_name').val(data[2]);
                update_student_lastname = $('#update_student_lastname').val(data[3]);
                update_student_address = $('#update_student_address').val(data[4]);
                update_email_student = $('#update_email_student').val(data[5]);
                update_student_age = $('#update_student_age').val(data[6]);
                update_country_country = $('#update_country_country').val(data[7]);
            }
        });
    })
    // update student
});
$(function () {
    $(document).on('click', '#student_update_btn', function (e) {
        e.preventDefault();
        let update_student_auto_id = $('#update_student_auto_id').val();
        let update_student_main_id = $('#update_student_main_id').val();
        let update_student_name = $('#update_student_name').val();
        let update_student_lastname = $('#update_student_lastname').val();
        let update_student_address = $('#update_student_address').val();
        let update_email_student = $('#update_email_student').val();
        let update_student_age = $('#update_student_age').val();
        let update_country_country = $('#update_country_country').val();
        if (update_student_auto_id == "") {
            $('#update_student_auto_id').addClass('empty').focus();
            return false;
        } else {
            $('#update_student_auto_id').removeClass('empty');

        }
        if (update_student_main_id == '') {
            $('#update_student_main_id').addClass('empty').focus();
            return false;
        } else {
            $('#update_student_main_id').removeClass('empty');
        }
        if (update_student_name == '') {
            $('#update_student_name').addClass('empty').focus();
            return false;
        } else {
            $('#update_student_name').removeClass('empty');

        }
        if (update_student_lastname == '') {
            $('#update_student_lastname').addClass('empty').focus();
            return false;
        } else {
            $('#update_student_lastname').removeClass('empty');
        }
        if (update_student_address == '') {
            $('#update_student_address').addClass('empty').focus();
            return false;
        } else  {
            $('#update_student_address').removeClass('empty');
        }
        if (update_email_student == '') {
            $('#update_email_student').addClass('empty').focus();
            return false;
        } else if (isEmail(update_email_student) == false) {
            $('#update_email_student').addClass('empty').focus();
            $('#update_message_student').text('Invalida E-mail address');
            return false;
        } else {
            $('#update_email_student').removeClass('empty');
            $('#update_message_student').html('');
        }

        let age = update_student_age;
        if (update_student_age == '') {
            $('#update_student_age').addClass('empty').focus();;
            return false;
        } else if (age >= 20) {
            $('#update_student_age').addClass('empty').focus();
            $('#update_message_student').text('Age is too old...');
            return false;
        } else if (age <= 4) {
            $('#update_student_age').addClass('empty').focus();
            $('#update_message_student').text('Age is too small');
            return false;
        } else {
            $('#update_student_age').removeClass('empty');
            $('#update_message_student').html('');

        }
        if (update_country_country == '') {
            $('#update_country_country').addClass('empty').focus();;
            return false;
        } else {
            $('#update_country_country').removeClass('empty');
        }
        $.ajax({
            url: "../insert_student_data/update_student.php",
            method: 'POST',
            data: {
                update_student_auto_id: update_student_auto_id,
                update_student_main_id: update_student_main_id,
                update_student_name: update_student_name,
                update_student_lastname: update_student_lastname,
                update_student_address: update_student_address,
                update_email_student: update_email_student,
                update_student_age: update_student_age,
                update_country_country: update_country_country
            },
            success: function (data) {
                $('#update_message_student').html(data);
            }

        });
    });
});
// this is for exporting the table to excel
$(function () {
    $(document).ready(function () {
        $(document).on('click', '#btnExport', function () {
            $.ajax({
                url: '../insert_student_data/excel.php',
                method: 'POST',
                contentType: false,
                processData: false,
                success: function (data) {
                    window.open('../insert_student_data/excel.php', '_blank');
                }
            })
        })

    })
})

// delete student
function delete_student(id) {
    let con = confirm("Are you sure?");
    if (con === true) {
        $.ajax({
            url: '../insert_student_data/studentdelete.php',
            type: 'POST',
            data: 'id=' + id,
            success: function (data) {
                $('#tr_' + id).hide(3000).css('background-color', 'red');
                $.LoadingOverlay("show");
                setTimeout(function () {
                    window.location.reload();
                    // Show full page LoadingOverlay
                    $.LoadingOverlay("hide");
                }, 3000);
            }
        })
    }
}


// limit the student


// just number
function process(input) {
    let value = input.value;
    let numbers = value.replace(/[^0-9]/g, "");
    input.value = numbers;
}

// email valdation
function isEmail(email) {

    var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if (!regex.test(email)) {
        return false;
    } else {
        return true;
    }
}