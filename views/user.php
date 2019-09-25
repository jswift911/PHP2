<h3>Пользователи</h3>
<?foreach ($user as $item):?>
    <a href="/?c=user&a=profile&id=<?=$item['id']?>"><h3><?=$item['login']?></h3></a>
    <p>Пароль: <?=$item['pass']?></p>
<?endforeach;?>

<p><a href="?c=user&a=user&page=<?=$page?>">Показать еще</a></p>
<p><a href="/">На главную</a></p>