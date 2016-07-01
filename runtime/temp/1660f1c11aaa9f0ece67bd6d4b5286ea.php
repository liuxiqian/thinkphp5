<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:75:"G:\xampp\htdocs\thinkphp5\public/../application/index\view\klass\index.html";i:1467291064;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>klass</title>
</head>
<body>
<table>
<tr>
    <th>index</th>
    <th>name</th>
    <th>teacher name</th>
    <th>edit</th>
</tr>
<?php if(is_array($Klasses) || $Klasses instanceof \think\Collection): $key = 0; $__LIST__ = $Klasses;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$klass): $mod = ($key % 2 );++$key;?>
<tr>
    <td><?php echo $key; ?></td>
    <td><?php echo $klass->getData('name'); ?></td>
    <td><?php echo $klass->User->name; ?></td>
    <td>
        <a href="<?php echo url('edit?id=' . $klass->id); ?>">edit</a>&nbsp;
        <a href="<?php echo url('delete?id=' . $klass->id); ?>">delete</a>
    </td>
</tr>
<?php endforeach; endif; else: echo "" ;endif; ?>
</table>
</body>
</html>