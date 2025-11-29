<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Builder</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</head>

<body>

    <div class="container mt-4">
        <button class="btn btn-primary" id="addRow">Add Row</button>
        <div id="pageContent"></div>
    </div>






    <!-- Add Element Modal -->
    <div class="modal fade" id="addElementModal" tabindex="-1" aria-labelledby="addElementModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Element</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="selectedColumnId">
                    <label for="elementType">Select Element:</label>
                    <select id="elementType" class="form-select">
                        <option value="select">select</option>
                        <option value="text">Text</option>
                        <option value="textarea">Textarea</option>
                        <option value="image">Image</option>
                        <option value="link">Link Button</option>
                    </select>
                    <div id="elementContent" class="mt-3">
                        <input type="text" id="textInput" class="form-control d-none" placeholder="Enter text">
                        <textarea id="textareaInput" class="form-control d-none"
                            placeholder="Enter description"></textarea>
                        <input type="file" id="imageInput" class="form-control d-none">

                        <!-- Button Fields -->
                        <input type="text" id="buttonText" class="form-control d-none mt-2" placeholder="Button Text">
                        <input type="text" id="buttonLink" class="form-control d-none mt-2" placeholder="Button Link">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="saveElement">Save</button>
                </div>
            </div>
        </div>
    </div>

    <script>
    $(document).ready(function() {
        // Open modal to select element type
        $(document).on('click', '.addElement', function() {
            let column_id = $(this).data('column');
            $('#selectedColumnId').val(column_id);
            $('#elementContent input, #elementContent textarea').addClass('d-none');
            $('#addElementModal').modal('show');
        });

        // Show input field based on selection
        $('#elementType').change(function() {
            $('#elementContent input, #elementContent textarea').addClass('d-none');
            let selectedType = $(this).val();
            if (selectedType === 'text') {
                $('#textInput').removeClass('d-none');
            } else if (selectedType === 'textarea') {
                $('#textareaInput').removeClass('d-none');
            } else if (selectedType === 'image') {
                $('#imageInput').removeClass('d-none');
            } else if (selectedType === 'link') {
                $('#buttonText, #buttonLink').removeClass('d-none');
            }
        });


        // Save Element to Database
        $('#saveElement').click(function() {
            let column_id = $('#selectedColumnId').val();
            let type = $('#elementType').val();
            let formData = new FormData();
            formData.append('column_id', column_id);
            formData.append('type', type);

            if (type === 'text') {
                formData.append('content', $('#textInput').val());
            } else if (type === 'textarea') {
                formData.append('content', $('#textareaInput').val());
            } else if (type === 'image') {
                let imageFile = $('#imageInput')[0].files[0];
                if (imageFile) {
                    formData.append('image', imageFile);
                }
            } else if (type === 'link') {
                formData.append('button_text', $('#buttonText').val());
                formData.append('button_link', $('#buttonLink').val());
            }

            $.ajax({
                url: "<?= base_url('admin/PageBuilder/addElement') ?>",
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                dataType: 'json',
                success: function(response) {
                    let elementHTML = '';
                    if (response.type === 'text' || response.type === 'textarea') {
                        elementHTML = `<div class="element border p-2 mt-2">
                        <p>${response.content}</p>
                    </div>`;
                    } else if (response.type === 'image') {
                        elementHTML = `<div class="element border p-2 mt-2">
                        <img src="<?= base_url() ?>${response.content}" width="100">
                    </div>`;
                    } else if (response.type === 'link') {
                        elementHTML = `<div class="element border p-2 mt-2">
                        <a href="${response.button_link}" class="btn btn-primary">${response.button_text}</a>
                    </div>`;
                    }
                    $(`#column_${column_id} .elements`).append(elementHTML);
                    $('#addElementModal').modal('hide');
                }
            });
        });
    });
    </script>







    <script>
    $(document).ready(function() {
        // Add Row
        $('#addRow').click(function() {
            $.post("<?= base_url('admin/PageBuilder/addRow') ?>", {
                page_id: 1
            }, function(response) {
                let row = `<div class="row mb-3 border p-3" id="row_${response.row_id}">
                    <div class="col-md-12">
                        <button class="btn btn-success addColumn" data-row="${response.row_id}">Add Column</button>
                    </div>
                </div>`;
                $('#pageContent').append(row);
            }, 'json');
        });

        // Add Column
        $(document).on('click', '.addColumn', function() {
            let row_id = $(this).data('row');
            $.post("<?= base_url('admin/PageBuilder/addColumn') ?>", {
                row_id: row_id
            }, function(response) {
                let column = `<div class="col-md-6 border p-3 mt-2" id="column_${response.column_id}">
                    <button class="btn btn-warning addElement" data-column="${response.column_id}">Add Elementqqq</button>
                    <div class="elements mt-2"></div>
                </div>`;
                $(`#row_${row_id}`).append(column);
            }, 'json');
        });

        // Remove Element
        $(document).on('click', '.remove-element', function() {
            let element_id = $(this).data('id');
            $(`#element_${element_id}`).remove();
        });
    });
    </script>

</body>

</html>