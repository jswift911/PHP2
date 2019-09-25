<?
/**
 * @var app\models\User $profile
 */
$page = (int)$_GET['id'];
?>

<h3><?=$profile->login?></h3>
<p>Пароль: <?=$profile->pass?></p>


<p><a href="/?c=user&a=user&page=<?=$page?>">Назад</a></p>
<p><a href="/">На главную</a></p>