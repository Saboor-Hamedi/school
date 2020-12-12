<script src="../../bootstrap/bootstrap.min.js"></script>
<script src="../../bootstrap/bootstrap_query.js"></script>
<script src="../query_script/loadingoverlay.min.js"></script>
<script src="upload_file_query/insert_blog.js">
</script>
<script>
    $(function() {
        let val = $(".menu").hide();
        $(".toggle-dropdown").click(function(e) {
            e.preventDefault();
            if (!val.hide()) {
                $('.menu').hide();
            } else {
                $(this).next().toggle("fast");
            }
        });
    });
    //Hide dropdown on page click
    $(document).on('click', function(e) {
        if (!$(".toggle-dropdown").is(e.target) && !$(".toggle-dropdown").has(e.target).length) {
            $('.menu').slideUp("fast");
        }
    });
    // nav bar
    let nav = document.querySelector('.side-bar');
    let btnMenu = document.querySelector('#btnMenu');
    btnMenu.addEventListener('click', function() {
        if (!nav.style.display || nav.style.width === "250px") {
            nav.style.width = "0px";
            nav.style.display = "block";
            document.querySelector('.nav-header').style.marginLeft = "0px";
            document.querySelector('#main').style.marginLeft = "0px";
        } else {
            nav.style.width = "250px";
            document.querySelector('.nav-header').style.marginLeft = "250px";
            document.querySelector('#main').style.marginLeft = "250px";
        }
    })
</script>
<?php include('./upload_post/update_modal.php'); ?>
</body>

</html>