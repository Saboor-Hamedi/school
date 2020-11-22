

<!-- Modal -->
<div class="modal fade" id="student_details_update_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
    <div class="student_inputs">
      <div class="alert alert-primary" role="alert" id="update_student_profile"></div>
            <form method="POST" id="student_details_update_form">
              <input type="hidden" name="student_profile_id" id="student_profile_id">
              <textarea name="student_update_bio" id="student_update_bio" cols="30" rows="10" placeholder="Update your bio"></textarea>
              <input type="text"  name="student_facebook_update" class="form-control"  id="student_facebook_update"  placeholder="Update your facebook link"  autocomplete="off">
              <input type="text"  name="student_youtube_update"  class="form-control"  id="student_youtube_update"   placeholder="Update your youtube link"   autocomplete="off">
              <input type="text" name="student_instagram_update" class="form-control"  id="student_instagram_update" placeholder="Update your instagram link" autocomplete="off">
              <input type="text" name="student_twitter_update"   class="form-control"  id="student_twitter_update"   placeholder="Update your twitter link"   autocomplete="off">
              <input type="text" name="student_location_update"  class="form-control"  id="student_location_update"  placeholder="Update your location"       autocomplete="off">
        </form>
    </div>
      </div>
      <div class="modal-footer">
        <button type="button" id="student_update_profile_btn__" name="student_update_profile_btn__"  class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>