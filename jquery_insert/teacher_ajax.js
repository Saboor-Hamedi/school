
// information 
// this file belongs to the teachers, where
// we insert, delete, update, view, and export the table
// 

$(document).ready(function(){
    $(document).on('click', '#insert_teacher_btn', function(e){
        e.preventDefault();
        let insert_teacher_id_input = $('#insert_teacher_id_input').val();
        let insert_teacher_name_input = $('#insert_teacher_name_input').val();
        let insert_teacher_lastname_input = $('#insert_teacher_lastname_input').val();
        let insert_teacher_address_input = $('#insert_teacher_address_input').val();
        let insert_teacher_country_input = $('#insert_teacher_country_input').val();
        let insert_teacher_professions_input = $('#insert_teacher_professions_input').val();
        let insert_teacher_pass_input = $('#insert_teacher_pass_input').val();
        let len = insert_teacher_id_input.length;
        if(insert_teacher_id_input == ""){
            $('#insert_teacher_id_input').focus();
            return false;
        }else if(len >=15){
            $('#insert_message_teacher').text('The length is: ' +len+ ' :Must be 14');
            $('#insert_teacher_id_input').focus();
             return false;
        }else if(len <=13){
            $('#insert_message_teacher').text('The length is: ' +len+ ": Must be 14");
            $('#insert_teacher_id_input').focus();
            return false;
        }
        if(insert_teacher_name_input == ""){
            $('#insert_teacher_name_input').focus();
            return false;
        }
        if(insert_teacher_name_input == ""){
            $('#insert_teacher_name_input').focus();
            return false;
        }
        if(insert_teacher_lastname_input == ""){
            $('#insert_teacher_lastname_input').focus();
            return false;
        }
        if(insert_teacher_address_input == ""){
            $('#insert_teacher_address_input').focus();
            return false;
        }
        if(insert_teacher_country_input == ""){
            $('#insert_teacher_country_input').focus();
            return false;
        }
        if(insert_teacher_professions_input == ""){
            $('#insert_teacher_professions_input').focus();
            return false;
        }
        if(insert_teacher_pass_input == ""){
            $('#insert_teacher_pass_input').focus();
            return false;
        }
        $.ajax({
            url: '../insert_teacher_data/insertteacher.php',
            method: "POST",
            data:{
            insert_teacher_id_input:insert_teacher_id_input, 
            insert_teacher_name_input:insert_teacher_name_input, 
            insert_teacher_lastname_input:insert_teacher_lastname_input,
            insert_teacher_address_input:insert_teacher_address_input, 
            insert_teacher_country_input:insert_teacher_country_input,
            insert_teacher_professions_input:insert_teacher_professions_input, 
            insert_teacher_pass_input:insert_teacher_pass_input
            },
            success:function(data){
                $('#insert_message_teacher').html(data);
                // $('form').trigger('reset');
            }
        });
        
    })
  
})

// this is for view data, where we can view teacher's data in the input,
// after we get the data inside the input, we update it.

$(function(){
    $(document).on('click', '.teacher_view', function () {
        var id = $(this).attr("id");
        $.ajax({
            url: "../insert_teacher_data/teacher_select.php",
            method: "POST",
            data: {
                id: id
            },
            dataType: "json",
            success: function (data) {
                $('#update_teacher_auto_id').val(data[0]);
                $('#update_teacher_main_id').val(data[1]);
                $('#update_teacher_name').val(data[2]);
                $('#update_teacher_lastname').val(data[3]);
                $('#update_teacher_address').val(data[4]);
                $('#update_teacher_country').val(data[5]);
                $('#update_teacher_professions').val(data[6]);
                $('#teacher_update_modal').modal('show');
            }
        });
    });

})



// this is update for teachers
 $(function(){
     $(document).on('click', '#teacher_update_bnt', function(e){
        e.preventDefault();
        let update_teacher_auto_id = $('#update_teacher_auto_id').val();
        let update_teacher_main_id = $('#update_teacher_main_id').val();
        let update_teacher_name = $('#update_teacher_name').val();
        let update_teacher_lastname = $('#update_teacher_lastname').val();
        let update_teacher_address = $('#update_teacher_address').val();
        let update_teacher_country = $('#update_teacher_country').val();
        let update_teacher_professions = $('#update_teacher_professions').val();
        $.ajax({
            url: '../insert_teacher_data/update_teacher.php',
            method: 'POST',
            data: {
                update_teacher_auto_id: update_teacher_auto_id,
                update_teacher_main_id: update_teacher_main_id,
                update_teacher_name: update_teacher_name,
                update_teacher_lastname: update_teacher_lastname,
                update_teacher_address: update_teacher_address,
                update_teacher_country: update_teacher_country,
                update_teacher_professions: update_teacher_professions
            },
            success: function (data) {
                $('#udpate_message').html(data);
            }
        });

    });
    
 });

// end update
   

// this is delete function for teacher
function delete_teacher(id){
    let con = confirm("Are you sure?");
    if(con === true){
        $.ajax({
            url: '../insert_teacher_data/teacher_delete.php',
            type: 'POST',
            data:'id='+id,
            success:function(data){
                $('#tr_'+id).hide(3000).css('background-color', 'red');
                $.LoadingOverlay("show");
                setTimeout(function(){
                window.location.reload();
                // Show full page LoadingOverlay
                $.LoadingOverlay("hide");
             
                },3000);
            }
        })
    }
  

}

// this is for exporting the table to excel
$(function(){
    $(document).ready(function(){
        $(document).on('click', '#TeacherExport', function(){
           
            $.ajax({
                url:'../insert_teacher_data/excel.php', 
                method: 'POST',
               
                contentType:false,  
                processData:false, 
                success:function(data){
                    window.open('../insert_teacher_data/excel.php','_blank' );
                   
                    
                }
            })
        })
        
    })
 });

// reuest for pdf 

