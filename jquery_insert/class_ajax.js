// live search for student id
$(document).ready(function () {
	$("#search_box").keyup(function () {
		$.ajax({
			type: "POST",
			url: "../insert_classes/select_student_class.php",
			data: 'keyword=' + $(this).val(),
			beforeSend: function () {
				$("#search_box").css("background", "#FFF");
			},
			success: function (data) {
				$("#suggesstion-box").show();
				$("#suggesstion-box").html(data);
				$("#search_box").css("background", "#FFF");
			}
		});
	});
});

function selectCountry(val) {
	$("#search_box").val(val);
	$("#suggesstion-box").hide();
}

// insert class details

$(document).ready(function () {
	$('#insert_class_btn').on('click', function () {
		let insert_grade_class = $('select#insert_grade_class').val();
		let insert_class_code = $('input#insert_class_code').val();
		let insert_class_name = $('input#insert_class_name').val();
		let insert_days_of_weeks_class = $('select#insert_days_of_weeks_class').val();
		let insert_class_year_name = $('select#insert_class_year_name').val();
		let insert_class_start_time = $('#insert_class_start_time').val();
		let insert_class_subject = $('select#insert_class_subject').val();
		let insert_class_teacher = $('select#insert_class_teacher').val();
		let search_box = $('#search_box').val();
		if (insert_grade_class == 0) {
			$('#insert_grade_class').addClass('empty').focus();
			$('#insert_message_classes').text('Select class grade');
			return false;
		} else {
			$('#insert_grade_class').removeClass('empty');
			$('#insert_message_classes').html('');
		}

		let class_len = insert_class_code.length;
		if (insert_class_code == "") {
			$('#insert_class_code').addClass('empty').focus();
			$('#insert_message_classes').text('What is the class code...?');
			return false;
		} else if (class_len >= 6) {
			$('#insert_message_classes').text('Class code must be 5 No. its ' + class_len);
			$('#insert_class_code').addClass('empty').focus();
			return false;

		} else if (class_len <= 4) {
			$('#insert_message_classes').text('Class code must be 5 No. its ' + class_len);
			$('#insert_class_code').addClass('empty').focus();
			return false;
		} else {
			$('#insert_class_code').removeClass('empty');
			$('#insert_message_classes').html('');

		}
		let class_name_len = insert_class_name.length;
		if (insert_class_name == "") {
			$('#insert_class_name').addClass('empty').focus();
			return false;
		} else if (class_name_len >= 5) {
			$('#insert_message_classes').text('Class code must be 4 apla-numirc. its ' + class_name_len);
			$('#insert_class_name').addClass('empty').focus();
			return false;
		} else if (class_name_len <= 3) {
			$('#insert_message_classes').text('Class code must be 4 apla-numirc. its ' + class_name_len);
			$('#insert_class_name').addClass('empty').focus();
			return false;
		} else {
			$('#insert_class_name').removeClass('empty');
			$('#insert_message_classes').html('');

		}
		if (insert_days_of_weeks_class == 0) {
			$('#insert_days_of_weeks_class').addClass('empty').focus();
			$('#insert_message_classes').text('Select a day...');
			return false;
		} else {
			$('#insert_days_of_weeks_class').removeClass('empty');
			$('#insert_message_classes').html('');

		}
		if (insert_class_year_name == 0) {
			$('#insert_class_year_name').addClass('empty').focus();
			$('#insert_message_classes').text('Select Academic year...');
			return false;
		} else {
			$('#insert_class_year_name').removeClass('empty');
			$('#insert_message_classes').html('');
		}
		if (insert_class_start_time == "") {
			$('#insert_class_start_time').addClass('empty').focus();
			$('#insert_message_classes').text('What is the class time... ?');
			return false;
		} else {
			$('#insert_class_start_time').removeClass('empty');
			$('#insert_message_classes').html('');
		}
		if (insert_class_subject == 0) {
			$('#insert_class_subject').addClass('empty').focus();
			$('#insert_message_classes').text('Select subject');
			return false;
		} else {
			$('#insert_class_subject').removeClass('empty');
			$('#insert_message_classes').html('');
		}
		if (insert_class_teacher == 0) {
			$('#insert_class_teacher').addClass('empty').focus();
			$('#insert_message_classes').text('Who is teacher... ?');
			return false;
		} else {
			$('#insert_class_teacher').removeClass('empty');
			$('#insert_message_classes').html('');
		}
		if (search_box == "") {
			$('#search_box').addClass('empty').focus();
			$('#insert_message_classes').text('What is the student ID... ?');
			return false;
		} else {
			$('#search_box').removeClass('empty').focus();
			$('#insert_message_classes').html('');
		}
		$.ajax({
			url: "../insert_classes/insert_class.php",
			type: "POST",
			data: {
				insert_grade_class: insert_grade_class,
				insert_class_code: insert_class_code,
				insert_class_name: insert_class_name,
				insert_days_of_weeks_class: insert_days_of_weeks_class,
				insert_class_year_name: insert_class_year_name,
				insert_class_start_time: insert_class_start_time,
				insert_class_subject: insert_class_subject,
				insert_class_teacher: insert_class_teacher,
				search_box:search_box,
				
			},
			success:function(data){
				$('#insert_message_classes').html(data);
				// $('form').trigger('reset');
			}
		});
	});
});

