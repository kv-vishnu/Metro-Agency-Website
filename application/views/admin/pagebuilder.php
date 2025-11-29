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
                    <label for="loopCount">Loop Count:</label>
                    <input type="number" id="loopCount" class="form-control" value="1" min="1">
                    <label for="elementType">Select Element:</label>
                    <select id="elementType" class="form-select">
                        <option value="select">select</option>
                        <option value="text">Text</option>
                        <option value="textarea">Textarea</option>
                        <option value="image">Image</option>
                        <option value="link">Link Button</option>
                    </select>
                    <div id="elementContent" class="mt-3"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="saveElement">Save</button>
                </div>
            </div>
        </div>
    </div>