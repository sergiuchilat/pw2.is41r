<?
include 'database/news.php'
?>
<section class="news">
    <?
    foreach ($news as $item) {?>
        <article>
            <h2><? echo $item['title'];?></h2>
            <p><?=$item['description'];?></p>
            <a href="index.php?page=news-details&id=<?=$item['id'];?>">more</a>
        </article>
    <?}
    ?>

</section>
