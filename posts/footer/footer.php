<script>
  if (window.history.replaceState) {
    window.history.replaceState(null, null, window.location.href);
  }
</script>
</div>
<script src="assets/plugins/jquery-3.4.1.min.js"></script>
<script src="assets/plugins/popper.min.js"></script>
<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="../../query_script/loadingoverlay.min.js"></script>
<script src="jquery_ajax/post_ajax.js"></script>

<!-- tinymce bootstrap -->
<!-- <script src="../../query_script/tiny.js"></script> -->

<script src="https://cdn.tiny.cloud/1/xpxdyct7yd33uqtfja8hvc4mftvswkpl2icypf84mm91yghy/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>
  tinymce.init({
    selector: "textarea",
    theme_advanced_toolbar_location: "top",
    branding: false,
    mode: "exact",
    setup: function(editor) {
      editor.on('change', function() {
        editor.save();
      });
    }
  });
</script>

<script>
  $("#post_content").blur(function(e) {
    $(this).html($(this).text());
  });
</script>
<script type="text/javascript">
  setTimeout(function() {
    location.reload();
  }, 60 * 1000);
</script>

<script>
  $('.toggle-dropdown').click(function() {
    if ($('.dropdown').hide()) {
      $(this).next('.dropdown').toggle('fast');
      false;
    }

  });
  //Hide dropdown on page click
  $(document).on('click', function(e) {
    if (!$(".toggle-dropdown").is(e.target) && !$(".toggle-dropdown").has(e.target).length) {
      $('.dropdown').slideUp("fast");
    }
  });
</script>
<?php include('update_post/update_modal.php'); ?>
<?php include('update_post/update_home_modal_post.php'); ?>

</body>

</html>