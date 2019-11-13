<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="css/site.css">
</head>
<body>
    <nav>
        <? include 'blocks/menu.php';?>
    </nav>
    <?
    $news = [
        [
            'url' => 'news1.php',
            'title' => 'News 1',
            'description' => '111 Description  Description  Description  Description  Description  Description  Description  Description  Description  Description  Description  Description '
        ],
        [
            'url' => 'news2.php',
            'title' => 'News 2',
            'description' => '222 Description  Description  Description  Description  Description  Description  Description  Description  Description  Description  Description  Description '
        ],
        [
            'url' => 'news3.php',
            'title' => 'News 3',
            'description' => '333 Description  Description  Description  Description  Description  Description  Description  Description  Description  Description  Description  Description '
        ]
    ];


    ?>
    <section class="news">
      <?
      foreach ($news as $item) {?>
        <article>
          <h2><? echo $item['title'];?></h2>
          <p><?=$item['description'];?></p>
          <a href="<?=$item['url'];?>">more</a>
        </article>
      <?}
      ?>

    </section>
</body>
</html>
