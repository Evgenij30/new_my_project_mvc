//подгружаем картинки
function readURL(input) {

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#image').attr('src', e.target.result);
            $('#modal_image').attr('src', e.target.result);

        };

        reader.readAsDataURL(input.files[0]);
    }
}

$("#imgInput").change(function () {
    readURL(this);

});

//подгружаем данные из формы
$(function () {
    $("#preview").click(function () {
        var name = $("input[name=name]").val();
        $('#modal_name').html(name);

        var email = $("input[name=email]").val();
        $('#modal_email').html(name);

        var task = $("textarea[name=task]").val();
        $('#modal_task').html(task);

    });


});

$("#send").click(function () {

    var $input = $("#imgInput");
    var fd = new FormData;

    fd.append('img', $input.prop('files')[0]);
    fd.append('name', $("input[name=name]").val());
    fd.append('email', $("input[name=email]").val());
    fd.append('task', $("textarea[name=task]").val());

    $.ajax({
        url: 'task/addtask',
        data: fd,
        processData: false,
        contentType: false,
        dataType: 'json',
        type: 'POST',
        success: function (data) {
            if (data.result == 'true') {
                $(".form_add_task").css("display", "none")
            }
            $("#message").html(data.message);
        }
    });

});

$("#add_icon_task").click(function () {
    $(".form_add_task").css("display", "block")

});




