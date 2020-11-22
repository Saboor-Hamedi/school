<!-- Modal -->
<style>
    .default-btn {
    
   transform: translateX(-10px);
}
</style>
<div class="modal fade" id="teacher_update_modal" data-keyboard="false" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="update_insert_form">
            <div class="alert alert-primary" role="alert" id="udpate_message"></div>
                <form id="update_insert_form" method="POST">
                    <div class="form-box">
                        <input type="hidden" class="form-control" id="update_teacher_auto_id"
                            name="update_teacher_auto_id" placeholder="Main ID" autocomplete="off">

                        <input type="hidden" class="form-control" id="update_teacher_main_id"
                            name="update_teacher_main_id" placeholder="Teacher's ID" autocomplete="off">

                        <input type="text" class="form-control" id="update_teacher_name"
                            name="update_teacher_name" placeholder="Update Teacher Name" autocomplete="off">
                      
                            <input type="text" class="form-control" id="update_teacher_lastname"
                            name="update_teacher_lastname" placeholder="Update Teacher Last Name" autocomplete="off"> 

                        <input type="text" class="form-control" id="update_teacher_address"
                            name="update_teacher_address" placeholder="Update Teacher Address" autocomplete="off"> 

                        <input type="text" class="form-control" id="update_teacher_country"
                            name="update_teacher_country" placeholder="Update Teacher Country" autocomplete="off">
                            <input type="text" class="form-control" id="update_teacher_professions"
                            name="update_teacher_professions" placeholder="Update Teacher Professions" autocomplete="off">

                       
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary default-btn" id="teacher_update_bnt"
                    name="tacher_update_btn ">Update</button>
            </div>
        </div>
    </div>
</div>



<!--  -->


