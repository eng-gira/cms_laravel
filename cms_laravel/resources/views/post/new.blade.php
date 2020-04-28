<?php
    include('C:\xampp\htdocs\cms_laravel\cms_laravel\resources\inc\header.php');
?>

<h3> New Post </h3>

<form action="/cms_laravel/cms_laravel/public/post/store" method="POST">
 @csrf   
    Title: <input type = "text" name="post_title" required/>
    Body: <input type = "textarea" name="post_body" required/>
    <button> Submit </button>

</form>

<?php
    include('C:\xampp\htdocs\cms_laravel\cms_laravel\resources\inc\footer.php');
?>