function delete_student_file(id) {
    var con = confirm("Are you sure?");

    if (con === true) {
        $.ajax({
            url: 'delete_file/delete_file.php',
            type: 'POST',
            data: 'id=' + id,
            success: function success(data) {
                $('#delete_student_file_message').html(data);
                // $.LoadingOverlay("show");
                // setTimeout(function () {
                //     window.location.reload(); // Show full page LoadingOverlay
                //     $.LoadingOverlay("hide");
                // }, 3000);
            }
        });
    }
}
// 83789553791438
// 92254794233844