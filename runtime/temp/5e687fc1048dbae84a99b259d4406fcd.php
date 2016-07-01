<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:74:"G:\xampp\htdocs\thinkphp5\public/../application/index\view\klass\edit.html";i:1467086660;s:68:"G:\xampp\htdocs\thinkphp5\public/../application/index\view\base.html";i:1465531728;}*/ ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>welcome</title>
    <link rel="stylesheet" type="text/css" href="__ROOT__/lib/bootstrap/css/bootstrap.min.css">
</head>

<body>
    
<form action="<?php echo url('update'); ?>" method="post">
    <input type="hidden" name="id" value="<?php echo $Klass->id; ?>">
    <label>name:</label><input type="text" name="name" value="<?php echo $Klass->name; ?>"/>
    <label>teacher:</label>
    <select name="user_id" id="user">
    <?php if(is_array($users) || $users instanceof \think\Collection): $i = 0; $__LIST__ = $users;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$user): $mod = ($i % 2 );++$i;?>
        <option value="<?php echo $user->id; ?>" <?php if($user->id == $Klass->getData('user_id')): ?>selected="selected"<?php endif; ?>><?php echo $user->name; ?></option>
    <?php endforeach; endif; else: echo "" ;endif; ?>
    </select>
    <button type="submit">Submit</button>
</form>

</body>

</html>
