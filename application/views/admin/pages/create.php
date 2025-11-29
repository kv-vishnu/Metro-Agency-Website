<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Builder</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>

    <div class="container mt-4">
        <button class="btn btn-primary" id="addRow">Add Row</button>
        <div id="pageContent"></div>
    </div>

    <script>
    $(document).ready(function() {
        $('#addRow').click(function() {
            $.post("<?= base_url('PageBuilder/addRow') ?>", {
                page_id: 1
            }, function(response) {
                let row = `<div class="row mb-3" id="row_${response.row_id}">
                    <div class="col-md-12">
                        <select class="form-select column-count" data-row="${response.row_id}">
                            <option value="1">1 Column</option>
                            <option value="2">2 Columns</option>
                            <option value="3">3 Columns</option>
                            <option value="4">4 Columns</option>
                        </select>
                        <button class="btn btn-success addColumn" data-row="${response.row_id}">Add Columns</button>
                    </div>
                </div>`;
                $('#pageContent').append(row);
            }, 'json');
        });

        $(document).on('click', '.addColumn', function() {
            let row_id = $(this).data('row');
            let col_count = $(`.column-count[data-row="${row_id}"]`).val();

            for (let i = 0; i < col_count; i++) {
                $.post("<?= base_url('PageBuilder/addColumn') ?>", {
                    row_id: row_id
                }, function(response) {
                    let column = `<div class="col-md-${12 / col_count} border p-3" id="column_${response.column_id}">
                        <button class="btn btn-warning addElement" data-column="${response.column_id}">Add Element</button>
                    </div>`;
                    $(`#row_${row_id}`).append(column);
                }, 'json');
            }
        });

        $(document).on('click', '.addElement', function() {
            let column_id = $(this).data('column');
            $.post("<?= base_url('PageBuilder/addElement') ?>", {
                column_id: column_id,
                type: 'text'
            }, function(response) {
                let element = `<div class="element border p-2 mt-2">
                    <input type="text" class="form-control" value="New Text Element">
                </div>`;
                $(`#column_${column_id}`).append(element);
            }, 'json');
        });
    });
    </script>

</body>

</html>