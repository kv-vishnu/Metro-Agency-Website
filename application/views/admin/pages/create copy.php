<h2>Create a New Page</h2>

<form method="post" action="<?= base_url('admin/pages/create') ?>">
    <label>Page Title:</label>
    <input type="text" name="title" required>
    <button type="submit">Create Page</button>
</form>