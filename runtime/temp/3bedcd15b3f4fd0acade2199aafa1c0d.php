<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:73:"G:\xampp\htdocs\thinkphp5\public/../application/index\view\user\edit.html";i:1466687470;s:68:"G:\xampp\htdocs\thinkphp5\public/../application/index\view\base.html";i:1465531728;}*/ ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>welcome</title>
    <link rel="stylesheet" type="text/css" href="__ROOT__/lib/bootstrap/css/bootstrap.min.css">
</head>

<body>
    
<form action="<?php echo url('update'); ?>" method="post">
<input type="hidden" name="id" value="<?php echo $user->getData('id'); ?>" />

    <label>姓名:</label><input type="text" name="name" value="<?php echo $user->getData('name'); ?>"/>
    <label>性别:</label><input type="text" name="sex" value="<?php echo $user->getData('sex'); ?>"/>
    <label>Email:</label><input type="text" name="email" value="<?php echo $user->getData('email'); ?>"/>
    <button type="submit">Submit</button>
</form>

</body>

</html>
