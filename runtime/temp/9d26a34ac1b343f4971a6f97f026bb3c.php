<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:75:"G:\xampp\htdocs\thinkphp5\public/../application/index\view\login\index.html";i:1466080689;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
<form action="<?php echo url('login'); ?>" method="post">
<label>用户名  </label><input name="username" type="text" />
<label>密码</label><input type="password" name="password" />
<button type="submit">登录</button>
</form>
</body>
</html>