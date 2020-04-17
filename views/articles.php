<section class="medium-gap standard-home">
  <div class="container">
	<div class="row">
	  <div class="col-lg-8">
		<div class="standard-posts">
		  <div class="row">
              <?php
                if(Core::$user->status > 0){ ?>
                      <div class="col-lg-12">
                          <div class="standard-post">
                              <div class="add-article-button border-black-button">
                                <a href="articles/add_article/">Add Article</a>
                              </div>
                          </div>
                      </div>
              <?php } ?>
			<?php
				foreach($array['articles'] as $article){ ?>
						<div class="col-lg-12">
						  <div class="standard-post">
							<div class="post-image">
							  <a href="articles/view_article/<?= $article['id'] ?>"><img src="<?= $article['annonce_image']; ?>" alt=""></a>
							</div>
							<div class="down-content">
							  <div class="meta-category">
								<span>Lifestyle</span>
							  </div>
							  <a href="articles/view_article/<?= $article['id'] ?>"><h4><?= $article['name']; ?><em>cardigan bicycle</em></h4></a>
							  <ul class="post-info">
								<li><a href="#"><?= $article['created']; ?></a></li>
								<li><a href="#">Admin</a></li>
							  </ul>
							  <p><?php echo $article['description']; ?></p>
							  <div class="row">
								<div class="col-lg-6 col-md-6">
								  <div class="comments-info">
									<i class="fa fa-comment-o"></i>
									<span>8 comments</span>
								  </div>
								</div>
								<div class="col-lg-6 col-md-6">
								  <ul class="share-post">
									<li><i class="fa fa-share-alt"></i></li>
									<li><a href="#">Facebook</a>,</li>
									<li><a href="#">Twitter</a>,</li>
									<li><a href="#">Pinterest</a></li>
								  </ul>
								</div>
							  </div>
							</div>
						  </div>
						</div>
						<?php
				}
			?>

			<div class="col-lg-12">
			  <ul class="pagination">
                <?php  ?>
                <li style="display: <?= $array['page'] > 3 ? 'inline-block' : 'none' ?>"><a href="?c=main&m=index&page=1"><i class="fa fa-angle-left"></i></a></li>
				<li style="display: <?= $array['page'] > 2 ? 'inline-block' : 'none' ?>"><a href="?c=main&m=index&page=<?= $array['page'] - 2 ?>"> <?= $array['page'] - 2 ?></a></li>
                <li style="display: <?= $array['page'] > 1 ? 'inline-block' : 'none' ?>"><a href="?c=main&m=index&page=<?= $array['page'] - 1 ?>"> <?= $array['page'] - 1 ?></a></li>
				<li class="active"><a href="/?c=main&m=index&page=<?= $array['page'] ?>"><?= $array['page'] ?></a></li>
				<li style="display: <?= $array['pages_count'] > $array['page'] ? 'inline-block' : 'none' ?>"><a href="?c=main&m=index&page=<?= $array['page'] + 1 ?>"> <?= $array['page'] + 1 ?></a></li>
                <li style="display: <?= $array['pages_count'] - 1 > $array['page'] ? 'inline-block' : 'none' ?>"><a href="?c=main&m=index&page=<?= $array['page'] + 2 ?>"> <?= $array['page'] + 2 ?></a></li>
				<li style="display: <?= $array['pages_count'] - 2 > $array['page'] ? 'inline-block' : 'none' ?>"><a href="?c=main&m=index&page=<?= $array['pages_count'] ?>"><i class="fa fa-angle-right"></i></a></li>
			  </ul>
			</div>
		  </div>
	    </div>
      </div>
      <?php include(Core::$root."/views/sidebar.php") ?>
	</div>
  </div>
</section>
