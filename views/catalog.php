<h3>Каталог</h3>
<?foreach ($catalog as $item):?>
    <a href="/?c=product&a=card&id=<?=$item['id']?>"><h3><?=$item['name']?></h3></a>
    <p>Цена: <?=$item['price']?></p>
<?endforeach;?>

<p><a href="?c=product&a=catalog&page=<?=$page?>">Показать еще</a></p>
<p><a href="/">На главную</a></p>
