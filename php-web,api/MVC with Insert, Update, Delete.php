<!--  Implement functionality to insert, update, and delete comments.  -->

<?php

$conn = new mysqli('localhost','root','','comments_db');
if($conn->connect_error) die("DB error: ".$conn->connect_error);

if(isset($_POST['add'])){
    $name = $_POST['name'];
    $comment = $_POST['comment'];
    $conn->query("INSERT INTO comments (name, comment) VALUES ('$name', '$comment')");
    header("Location: ".$_SERVER['PHP_SELF']); exit;
}

if(isset($_POST['update'])){
    $id = $_POST['id'];
    $name = $_POST['name'];
    $comment = $_POST['comment'];
    $conn->query("UPDATE comments SET name='$name', comment='$comment' WHERE id=$id");
    header("Location: ".$_SERVER['PHP_SELF']); exit;
}

if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    $conn->query("DELETE FROM comments WHERE id=$id");
    header("Location: ".$_SERVER['PHP_SELF']); exit;
}

$comments = $conn->query("SELECT * FROM comments ORDER BY created_at DESC");

$edit = null;
if(isset($_GET['edit'])){
    $id = $_GET['edit'];
    $edit = $conn->query("SELECT * FROM comments WHERE id=$id")->fetch_assoc();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Simple Comments</title>
</head>
<body>

<h2><?php echo $edit ? "Edit Comment" : "Add Comment"; ?></h2>
<form method="post">
    <?php if($edit): ?>
        <input type="hidden" name="id" value="<?php echo $edit['id']; ?>">
    <?php endif; ?>
    Name: <input type="text" name="name" value="<?php echo $edit ? $edit['name'] : ''; ?>" required><br><br>
    Comment:<br>
    <textarea name="comment" required><?php echo $edit ? $edit['comment'] : ''; ?></textarea><br><br>
    <button type="submit" name="<?php echo $edit ? 'update' : 'add'; ?>">
        <?php echo $edit ? 'Update' : 'Add'; ?>
    </button>
</form>

<h2>Comments</h2>
<?php while($row = $comments->fetch_assoc()): ?>
    <p><strong><?php echo $row['name']; ?>:</strong> <?php echo $row['comment']; ?><br>
        <a href="?edit=<?php echo $row['id']; ?>">Edit</a> | 
        <a href="?delete=<?php echo $row['id']; ?>" onclick="return confirm('Delete?')">Delete</a>
    </p>
<?php endwhile; ?>

</body>
</html>
