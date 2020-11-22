
// send file for students 
$(document).ready(function(){
    $(document).on('click', '#send_file_for_student_btn',function(){
        let student_insert_id_file = $("#student_insert_id_file").val();
        let teacher_insert_id_file = $('#teacher_insert_id_file').val();
        let file_insert_title = $('#file_insert_title').val();
        let file_description = $('#file_description').val();
     
        if(student_insert_id_file === ""){
            $('#student_insert_id_file').addClass('empty').focus();
            $('#send_file_message').text('Please add student ID');
            return false;
        }else{
            $('#student_insert_id_file').removeClass('empty');
            $('#send_file_message').html('');
        }
        if (teacher_insert_id_file === ""){
            $('#teacher_insert_id_file').addClass('empty').focus();
            $('#send_file_message').text('Please add teacher ID');
             return false;
        }else{
            $('#teacher_insert_id_file').removeClass('empty');
            $('#send_file_message').html('');
        }
        if (file_insert_title === "") {
            $('#file_insert_title').addClass('empty').focus();
            $('#send_file_message').text('What is the title... ?');
            return false;
        } else {
            $('#file_insert_title').removeClass('empty');
            $('#send_file_message').html('');
        }
        if (file_description === "") {
            $('#file_description').addClass('empty').focus();
            $('#send_file_message').text('Write a breif description');
            return false;
        } else {
            $('#file_description').removeClass('empty');
            $('#send_file_message').html('');
        }
      
        $.ajax({
                url: '../insert_file/insert_file.php',
                method: 'POST',
                data: new FormData(this.form),
                processData: false,
                contentType: false, 
                cache: false,
                async: false,
                success: function(data)
                {
                    $('#send_file_message').html(data);
                }       
        });
    });
});


// just number
function process(input) {
    let value = input.value;
    let numbers = value.replace(/[^0-9]/g, "");
    input.value = numbers;
}