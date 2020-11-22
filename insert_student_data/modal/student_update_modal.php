<!-- Modal -->
<style>
    .default-btn {
    
   transform: translateX(-10px);
}
</style>
<div class="modal fade" id="student_update_modal" data-keyboard="false" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="update_student_form">
            <div class="alert alert-primary" role="alert" id="update_message_student"></div>
                <form id="update_student_form" method="POST">
                    <div class="form-box">
                        <input type="hidden" class="form-control" oninput="process(this)" id="update_student_auto_id"
                            name="update_teacher_auto_id" placeholder="Main ID" autocomplete="off">

                        <input type="hidden" class="form-control" oninput="process(this)" id="update_student_main_id"
                            name="update_student_main_id" placeholder="Student's ID" autocomplete="off">

                        <input type="text" class="form-control" id="update_student_name"
                            name="update_student_name" placeholder="Update Student Name" autocomplete="off">
                      
                            <input type="text" class="form-control" id="update_student_lastname"
                            name="update_student_lastname" placeholder="Update Student Last Name" autocomplete="off"> 

                        <input type="text" class="form-control" id="update_student_address"
                            name="update_student_address" placeholder="Update Student Address" autocomplete="off"> 

                        <input type="text" class="form-control" oninput="isEmail(this)" id="update_email_student"
                            name="update_email_student" placeholder="Update Student E-mail" autocomplete="off">
                           
                            <input type="text" class="form-control" oninput="process(this)" id="update_student_age"
                            name="update_student_age" placeholder="Update Student Age" autocomplete="off">

                            <input type="text" class="form-control" id="update_country_country"
                            name="update_country_country" placeholder="Update Student Country" autocomplete="off">

                       
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary default-btn" id="student_update_btn"
                    name="student_update_btn ">Update</button>
            </div>
        </div>
    </div>
</div>



<!--  -->


