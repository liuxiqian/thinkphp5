<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:74:"G:\xampp\htdocs\thinkphp5\public/../application/index\view\user\index.html";i:1467030883;s:68:"G:\xampp\htdocs\thinkphp5\public/../application/index\view\base.html";i:1465531728;}*/ ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>welcome</title>
    <link rel="stylesheet" type="text/css" href="__ROOT__/lib/bootstrap/css/bootstrap.min.css">
</head>

<body>
    

<body>
    <div class="form-group row">
        <div class="col-md-12 text-right">
            <a href="<?php echo url('Login/logout'); ?>">logout</a>
        </div>
    </div>
    <a class="btn btn-sm btn-success" href="<?php echo url('add'); ?>">添加</a>
    <form action="" method="get">
        <input type="text" placeholder="Search..." name="keywords" value="<?php echo input('get.keywords'); ?>">
        <button type="submit">搜索</button>
    </form>
    <table class="table">
        <tr>
            <th>序号</th>
            <th>姓名</th>
            <th>性别</th>
            <th>Email</th>
            <th>操作</th>
        </tr>
        <?php if(is_array($users) || $users instanceof \think\Collection): $key = 0; $__LIST__ = $users;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$user): $mod = ($key % 2 );++$key;?>
        <tr>
            <td><?php echo $key; ?></td>
            <td><?php echo $user->getData('name'); ?></td>
            <td><?php if($user->getData('sex') == '0'): ?>男<?php else: ?>女<?php endif; ?></td>
            <td><?php echo $user->getData('email'); ?></td>
            <td><a class="btn btn-sm btn-danger" href="<?php echo url('delete?id=' . $user->getData('id')); ?>">删除</a>
                <a class="btn btn-sm btn-primary" href="<?php echo url('edit?id=' . $user->getData('id')); ?>">编辑</a></td>
        </tr>
        <?php endforeach; endif; else: echo "" ;endif; ?>
    </table>
</body>
<?php echo $users->render(); ?>

</body>

</html>
