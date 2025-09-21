<!--  Validate and store uploaded files securely. -->

<?php
$message = '';

if(isset($_POST['submit']) && isset($_FILES['file'])){
    $file = $_FILES['file'];
    $allowed = ['image/jpeg','image/png','image/gif'];

    if(!in_array($file['type'], $allowed)){
        $message = "Only JPG, PNG, GIF allowed.";
    } elseif($file['size'] > 2*1024*1024){
        $message = "File too large (max 2MB).";
    } else {
        if(!is_dir('uploads')) mkdir('uploads', 0755);
        $filename = uniqid() . '_' . $file['name'];
        if(move_uploaded_file($file['tmp_name'], 'uploads/' . $filename)){
            $message = "Uploaded successfully: <a href='uploads/$filename'>$filename</a>";
        } else {
            $message = "Upload failed.";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Simple File Upload</title>
</head>
<body>

<h2>Upload Image</h2>
<?php if($message) echo "<p>$message</p>"; ?>

<form method="post" enctype="multipart/form-data">
    <input type="file" name="file" required>
    <button type="submit" name="submit">Upload</button>
</form>

</body>
</html>
