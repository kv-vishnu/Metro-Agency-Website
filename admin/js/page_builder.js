const base_url = $("#base_url").val();//alert(base_url);
$(document).ready(function () {
    //#region Add Page Section
    $(document).on("click", ".add_page_section", function () {
        const page_id = $(this).data("page");//alert(page_id);
        $.post(
        base_url + "admin/ContentPageBuilder/contentAddSection",
        {
            page_id: $(this).data("page"),
        },
        function (response) {
            //alert(response);
            load_dynamic_contents(page_id);
        }
        );
  });

  //#region Load dynamic contents
    function load_dynamic_contents(page_id) {
            $.ajax({
            url: base_url + "admin/ContentPageBuilder/load_dynamic_contents", // Update with your controller/method
            type: "POST",
            data: { page_id: page_id },
            success: function (response) {
                //alert(response);
                $("#pageContent").html(response);
            },
            error: function (xhr) {
                console.error("Error:", xhr.responseText);
            },
            });
    }

    //#region Add element click
    $(document).on("click", ".addElement", function () {
    alert('element');
    let column_id = $(this).data("column");
    let section_id = $(this).data("section");
    let row_id = $(this).data("container");
    $("#selected_colomn_id").val(column_id);
    $("#selected_section_id").val(section_id);
    $("#selected_row_id").val(row_id);
    $("#elementType").val("select"); // Reset dropdown
    $("#elementContent input, #elementContent textarea").addClass("d-none"); // Hide inputs
    $("#addElementModal").modal("show");
  });

});
