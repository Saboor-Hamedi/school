<!-- Modal -->
<div class="modal fade" id="update_home_modal" tabindex="-1" role="dialog" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="edit-post">
                    <div id="post_message_update"></div>
                    <form id="edit_post_form" method="post">
                        <div class="input-group">
                            <input type="hidden" id="edit_post_id" name="edit_post_id" class="form-control" placeholder="The post ID">
                        </div>
                        <div class="input-group">
                            <input type="text" id="edit_post_title" name="edit_post_title" class="form-control" placeholder="Edit the post title">
                        </div>
                        <br>
                        <div class="input-group">
                            <textarea id="edit_post_content" name="edit_post_content" cols="30" rows="10" class="form-control" placeholder="Update your contents"></textarea>
                        </div>

                        <script>
                            // function onLoad() {
                            //     CKEDITOR.replace('edit_post_content');
                            // }
                        </script>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="post_update_btn" name="post_update_btn">Save
                    changes
                </button>
            </div>
        </div>
    </div>
</div>