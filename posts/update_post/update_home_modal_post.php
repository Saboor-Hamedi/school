<style>
    #update_modal_post {
        width: 100%;
    }

    .close:focus {
        outline: none;
    }
    
</style>

<div class="modal fade" id="update_home_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog" style="width: 100%;" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update post</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="post_modal_body" style="width: 100%;">
                <!-- edit -->
                <div class="edit-post-container">
                    <div class="edit-post">
                        <div id="post_message_update_home"></div>
                        <form method="post">
                            <input type="hidden" id="edit_post_id_home" name="edit_post_id_home"
                                class="form-control" placeholder="The post ID">
                            <input type="text" id="edit_post_title_home" name="edit_post_title_home"
                                 class="form-control" placeholder="Edit the post title">
                                
                            <textarea id="edit_post_content_home" name="edit_post_content_home" cols="30" rows="10"
                                class="form-control" placeholder="Update your contents"></textarea>
                        </form>
                    </div>
                </div>
                <!-- end edit -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="post_update_btn_home" name="post_update_btn_home">Save
                    changes</button>
            </div>
        </div>
    </div>
</div>

<script>
   
</script>