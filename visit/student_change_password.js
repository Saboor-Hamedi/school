// student change password 

$(document).ready(function () {
    $(document).on('click', '#change_visit_password_btn', function () {
        let student_change_password_id = $('#student_change_password_id').val();
        let new_student_password = $('#new_student_password').val();
        let confirm_student_password = $('#confirm_student_password').val();
        if (student_change_password_id == "") {
            $('#student_change_password_id').addClass('empty').focus();
            return false
        } else {
            $('#student_change_password_id').removeClass('empty');
        }
        if (new_student_password == "") {
            $('#new_student_password').addClass('empty').focus();
            return false;
        } else {
            $('#new_student_password').removeClass('empty');
        }
        if (confirm_student_password == "") {
            $('#confirm_student_password').addClass('empty').focus();
            return false;
        } else if (confirm_student_password != new_student_password) {
            $('#confirm_student_password').addClass('empty').focus();
            $('#message_change_student_password').text('Confirm password not matched');
            return false;
        } else {
            $('#confirm_student_password').removeClass('empty');
            $('#message_change_student_password').html('');
        }
        $.ajax({
            url: 'student_change_password.php',
            method: 'POST',
            data: {
                student_change_password_id: student_change_password_id,
                new_student_password: new_student_password,
                confirm_student_password: confirm_student_password
            },
            success: function (data) {
                $('#visit-change-message').html(data);
            }

        });
    });


});