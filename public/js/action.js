$(document).ready(function () {

    function getTodos() {
        $.ajax({
            type: "GET",
            url: "/get",
            success: function (data) {
                $("#list").html(data);
            }
        })
    }
    getTodos()

    $("#add-todos").on("click", function (e) {
        e.preventDefault();
        const name = $("#todo").val();
        const _token = $("#token").val();

        if (name == "") {
            show_message("error", "Fill all the field");

        } else {
            $.ajax({
                type: "POST",
                url: "/create",
                data: { name: name, _token: _token },
                success: function (data) {
                    if (data == 1) {
                        show_message("success", "Add successfully");

                        $("#form-data").trigger("reset");
                        getTodos();
                    } else if (data == 2) {
                        show_message("error", "Already Exist");
                    } else {
                        show_message("error", "Something wroing");

                    }
                }
            })
        }
    })

    $(document).on("click", "#delete", function () {
        const id = $(this).data("id");
        $.ajax({
            type: "GET",
            url: "/delete",
            dataType: "json",
            data: { id: id },
            success: function (data) {
                if (data == 1) {
                    show_message("success", "Delete successfully");

                    getTodos();
                } else {
                    show_message("error", "not delete successfully");
                }
            }
        })
    })

    function show_message(type, text) {
        if (type == "error") {
            $("#error").text(text);
            setTimeout(() => {
                $("#error").text("")
            }, 2000)
        } else {
            setTimeout(() => {
                $("#success").text("")
            }, 2000)
            $("#success").text(text);

        }
    }
})