<?
include 'database/news.php'
?>
<section class="news">
    <article>
        <h2><? echo $news[$_GET['id']]['title'];?></h2>
        <p><?=$news[$_GET['id']]['description'];?></p>
    </article>

</section>
