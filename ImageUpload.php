<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Image</title>
</head>
<body>
    <form action="ImageProcess.php" method="POST" enctype="multipart/form-data">
        <input type="file" name="image" id="" required>
        <button name="submit"> Submit</button>
    </form>
    
</body>
</html>