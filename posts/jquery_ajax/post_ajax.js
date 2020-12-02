

// insert post
$(document).ready(function () {
    $(document).on('click', '#insert_post_btn', function () {
        let post_title = $('#post_title').val();
        let post_content = $('#post_content').val();
        let post_author_id = $('#post_author_id').val();
        if (post_title == "") {
            $('#post_title').focus();
            return false;
        } else {
            $('#post_title');

        }
        if (post_content == "") {
            $('#post_content').focus();
            return false;
        } else {
            $('#post_content');

        }
        $.ajax({
            url: "update_post/insert_post.php",
            method: 'POST',
            data: {
                post_title: post_title,
                post_content: post_content,
                post_author_id: post_author_id

            },
            success: function (data) {
                $('#insert_message').html(data);
                 window.localStorage.clear();

            }
        });

    });
});
// keep text after refresh on input and textarea
document.getElementById("post_title").value = getSavedValue("post_title");    // set the value to this input
document.getElementById("post_content").value = getSavedValue("post_content");   // set the value to this input
/* Here you can add more inputs to set value. if it's saved */

//Save the value function - save it to localStorage as (ID, VALUE)
function saveValue(e) {
    var id = e.id;  // get the sender's id to save it . 
    var val = e.value; // get the value. 
    localStorage.setItem(id, val);// Every time user writing something, the localStorage's value will override . 
}

//get the saved value function - return the value of "v" from localStorage. 
function getSavedValue(v) {
    if (!localStorage.getItem(v)) {
        return "";// You can change this to your defualt value. 
    }
    return localStorage.getItem(v);
}

// set height for form
$(document).ready(function () {
    $(document).on('click', '#post_title', function () {
        $('#post-card').animate({ height: "450px" });
    })
})




 

// update post
$(document).ready(function () {
    $(document).on('click', '#post_update_btn', function () {
        let edit_post_id = $('#edit_post_id').val();
        let edit_post_title = $('#edit_post_title').val();
        let edit_post_content = $('#edit_post_content').val();
        if (edit_post_id == "") {
            $('#edit_post_id').addClass('empty').focus();
            return false;
        } else {
            $('#edit_post_id').removeClass('empty');

        }
        if (edit_post_title == "") {
            $('#edit_post_title').addClass('empty').focus();
            return false;
        } else {
            $('#edit_post_title').removeClass('empty');

        }
        if (edit_post_content == "") {
            $('#edit_post_content').addClass('empty').focus();
            return false;
        } else {
            $('#edit_post_content').removeClass('empty');

        }
        $.ajax({
            url: "update_post/update_post.php",
            method: "POST",
            data: {
                edit_post_id: edit_post_id,
                edit_post_title: edit_post_title,
                edit_post_content: edit_post_content
            },
            success: function (data) {
                $('#post_message_update').html(data);
            }
        });
    })
    $(document).on('click', '.edit_post_btn', function (e) {
        e.preventDefault();
        let id = $(this).attr('id');
        $.ajax({
            url: 'update_post/fetch_post.php',
            method: 'POST',
            data: { id: id },
            dataType: 'json',
            success: function (data) {
                edit_post_id = $('#edit_post_id').val(data[0]);
                edit_post_title = $('#edit_post_title').val(data[1]);
                edit_post_content = $('#edit_post_content').val(data[2]);

            }
        });
    });
});

// this is for homepost update, 
$(document).ready(function () {
    $(document).on('click', '#post_update_btn_home', function () {
        let edit_post_id_home = $('#edit_post_id_home').val();
        let edit_post_title_home = $('#edit_post_title_home').val();
        let edit_post_content_home = $('#edit_post_content_home').val();
        if (edit_post_id_home == "") {
            $('#edit_post_id_home').addClass('empty').focus();
            return false;
        } else {
            $('#edit_post_id_home').removeClass('empty');
        }
        if (edit_post_title_home == "") {
            $('#edit_post_title_home').addClass('empty').focus();
            return false;
        } else {
            $('#edit_post_title_home').removeClass('empty');
        }
        if (edit_post_content_home == "") {
            $('#edit_post_content_home').addClass('empty').focus();
            return false;
        } else {
            $('#edit_post_content_home').removeClass('empty');
        }
        $.ajax({
            url: "update_post/update_homepost.php",
            method: "POST",
            data: {
                edit_post_id_home: edit_post_id_home,
                edit_post_title_home: edit_post_title_home,
                edit_post_content_home: edit_post_content_home
            },
            success: function (data) {
                $('#post_message_update').html(data);
              
            }
        });
    })
    $(document).on('click', '.edit_post_btn_home', function (e) {
        e.preventDefault();
        let id = $(this).attr('id');
        $.ajax({
            url: 'update_post/fetch_post.php',
            method: 'POST',
            data: { id: id },
            dataType: 'json',
            success: function (data) {
                edit_post_id_home = $('#edit_post_id_home').val(data[0]);
                edit_post_title_home = $('#edit_post_title_home').val(data[1]);
                edit_post_content_home = $('#edit_post_content_home').val(data[2]);

            }
        });
    });
});


// delete post

function delete_home_post_function(id) {
    let con = confirm("Are you sure?");
    if (con === true) {
        $.ajax({
            url: 'update_post/delete_post.php',
            type: 'POST',
            data: 'id=' + id,
            success: function (data) {

                $.LoadingOverlay("show");
                setTimeout(function () {
                    window.location.reload();
                    // Show full page LoadingOverlay
                    $.LoadingOverlay("hide");
                }, 3000);
            }
        })
    }
}



