// fetch student details into model

$(document).ready(function(){
    $(document).on('click', '.student_view_profile_btn', function(){
        let id = $(this).attr('id');
        $.ajax({
            url: "../student/student_select_profile.php", 
           method: "POST",
           data:{id:id},
            dataType: "json",
            success: function (data) {
                $('#student_profile_id').val(data[0])
                $('#student_update_bio').val(data[1]);
                $('#student_facebook_update').val(data[2]);
                $('#student_youtube_update').val(data[3]);
                $('#student_instagram_update').val(data[4]);
                $('#student_twitter_update').val(data[5]);
                $('#student_location_update').val(data[6]);
               

            }
        });
    });
});

// update student details
$(document).ready(function () {
    $(document).on('click', '#student_update_profile_btn__', function () {
        let student_profile_id = $('#student_profile_id').val();
        let student_update_bio = $('#student_update_bio').val();
        let student_facebook_update = $('#student_facebook_update').val();
        let student_youtube_update = $('#student_youtube_update').val();
        let student_instagram_update = $('#student_instagram_update').val();
        let student_twitter_update = $('#student_twitter_update').val();
        let insert_student_country_input = $('#insert_student_country_input').val();
        let student_location_update = $('#student_location_update').val();
        $.ajax({
            url: "../student/update_student_profile.php",
            method: 'POST',
            data: {
                student_profile_id: student_profile_id,
                student_update_bio: student_update_bio,
                student_facebook_update: student_facebook_update,
                student_youtube_update: student_youtube_update,
                student_instagram_update: student_instagram_update,
                student_twitter_update: student_twitter_update,
                insert_student_country_input: insert_student_country_input,
                student_location_update: student_location_update
            },
            success: function (data) {
                $('#update_student_profile').html(data);
            }

        });
    });
});
// student change password 

$(document).ready(function () {
    $(document).on('click', '#change_astudent_password_btn', function () {
        let old_student_password = $('#old_student_password').val();
        let new_student_password = $('#new_student_password').val();
        let confirm_student_password = $('#confirm_student_password').val();
        if (old_student_password == "") {
            $('#old_student_password').addClass('empty').focus();
            return false
        } else {
            $('#old_student_password').removeClass('empty');
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
            url: '../student/student_update_password.php',
            method: 'POST',
            data: {
                old_student_password: old_student_password,
                new_student_password: new_student_password,
                confirm_student_password: confirm_student_password
            },
            success: function (data) {
                $('#message_change_student_password').html(data);
            }

        });
    });


});