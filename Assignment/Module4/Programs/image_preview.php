<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image preview</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="row g-0">
                    <div class="col-xl-8">
                        <h3 class="mb-5 text-center">Image preview</h3>
                        <input type="file" class="form-control" id="uploadInput" accept="image/*" onchange="previewImage(event)" />
                        <img id="previewImage" src="#" alt="Preview" width="243px" height="243px" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
<script type="text/javascript">
    function previewImage(event) {
        var input = event.target;
        var reader = new FileReader();

        reader.onload = function() {
            var dataURL = reader.result;
            var preview = document.getElementById("previewImage");

            preview.src = dataURL;
            preview.style.display = "block";
        };

        reader.readAsDataURL(input.files[0]);
    }
</script>