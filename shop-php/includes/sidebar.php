<div class="block">
<h3>Мы_знаем</h3>
<div class="block__content">
  <script type="text/javascript" src="//ra.revolvermaps.com/0/0/6.js?i=02op3nb0crr&amp;m=7&amp;s=320&amp;c=e63100&amp;cr1=ffffff&amp;f=arial&amp;l=0&amp;bv=90&amp;lx=-420&amp;ly=420&amp;hi=20&amp;he=7&amp;hc=a8ddff&amp;rs=80" async="async"></script>
</div>
</div>

<div class="block">
<h3>Топ покупаемых товаров</h3>
<div class="block__content">
  <div class="articles articles__vertical">

  <?php
    $products = mysqli_query($connection, "SELECT * FROM `products`  ORDER BY `orders_count` DESC LIMIT 5");
   ?>

    <?php
      while($prod = mysqli_fetch_assoc($products))
      {
      ?>
        <article class="article">
        <div class="article__image" style="background-image: url(/static/images/<?php echo $prod['image'] ?>);"></div>
        <div class="article__info">
          <a href="/article.php?id=<?php echo $prod['id']; ?>"><?php echo $prod['name']; ?></a>
          <div class="article__info__meta">
            <?php
            $prod_cat = false;
            foreach($categories as $cat)
            {
              if( $cat['id'] == $prod['categorie_id'])
              {
                $prod_cat = $cat;
                break;
              }
            }
            ?>
          <small>Категория: <a href="/article.php?categorie=<?php echo $prod_cat['id']; ?>"><?php echo $prod_cat['name']; ?></a></small>
          </div>
          <div class="article__info__preview"><?php echo mb_substr($prod['description'], 0,50, 'utf-8'); ?></div>
          </div>
        </article>
      <?php
      }
    ?>    
  </div>
</div>
</div>

<!-- <div class="block">
  <h3>Комментарии</h3>
  <div class="block__content">
    <div class="articles articles__vertical">

    <?php
      $comments = mysqli_query($connection, "SELECT * FROM `comments`  ORDER BY `id` DESC LIMIT 5");
    ?>

    <?php
      while($comment = mysqli_fetch_assoc($comments)) 
      {
      ?>
        <article class="article">
        <div class="article__image" style="background-image: url(https://www.gravatar.com/avatar/<?php echo md5($comment['email']); ?>?s=125);"></div>
        <div class="article__info">
          <a href="/atricle.php?id=<?php echo $comment['articles_id']; ?>"><?php echo $comment['author'] ?></a>
          <div class="article__info__meta"></div>
          <div class="article__info__preview"><?php echo mb_substr($comment['text'], 0,50, 'utf-8'); ?></div>
          </div>
        </article>
      <?php
      }
    ?>   

  </div>
</div>
</div> -->
