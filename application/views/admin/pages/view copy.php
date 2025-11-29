<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Preview</title>
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"> -->
    <style>
    body {
        font-family: 'Arial';
    }

    .btn {
        background: #0093ff;
        padding: 15px 25px;
        color: white;
        text-decoration: none;
        display: inline-block;
        border-radius: 5px;
    }

    @media only screen and (min-width:1200px) {
        .container {
            width: 1000px;
            margin-left: auto;
            margin-right: auto;
            text-align: center;
        }
    }
    </style>
</head>

<body>
    <div class="content-section vishnu">
        <div class="container mt-4">

        <?php echo $section_html; ?>

        </div>
    </div>
</body>

</html>
</html>