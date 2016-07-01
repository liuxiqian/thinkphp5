<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:77:"G:\xampp\htdocs\thinkphp5\public/../application/index\view\student\index.html";i:1467294513;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>student</title>
</head>
<body>
    <table action="<?php echo url('insert'); ?>" method="post">
        <tr>
            <th>index</th>
            <th>num</th>
            <th>name</th>
            <th>sex</th>
            <th>email</th>
            <th>klass</th>
            <th>teacher</th>
            <th>createDate</th>
        </tr>
        <?php if(is_array($students) || $students instanceof \think\Collection): $key = 0; $__LIST__ = $students;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$student): $mod = ($key % 2 );++$key;?>
            <tr>
                <td><?php echo $key; ?></td>
                <td><?php echo $student->num; ?></td>
                <td><?php echo $student->name; ?></td>
                <td><?php echo $student->sex; ?></td>
                <td><?php echo $student->email; ?></td>
                <td><?php echo $student->Klass->name; ?></td>
                <td><?php echo $student->Klass->User->name; ?></td>
                <td><?php echo $student->getData('create_time'); ?></td>
            </tr>
        <?php endforeach; endif; else: echo "" ;endif; ?>
    </table>
    <?php echo $students->render(); ?>
</body>
</html>