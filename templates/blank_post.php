<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>new post</title>
</head>

<body>
    <form action="index.php?action=add_content" method="post">
        <div>
            <label for="author">Title</label><br />
            <input type="text" id="post_title" name="title" placeholder="Title" />
        </div>
        <div>
            <label for="comment">Post</label><br />
            <textarea id="post_body" name="post_body" placeholder="Type here..."></textarea>
        </div>
        <div>
            <input type="submit" />
        </div>
    </form>
</body>

</html>