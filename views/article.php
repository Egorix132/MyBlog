<section class="medium-gap single-post">
  <div class="container">
    <div class="row">
      <div class="col-lg-8">
        <div class="single-posts">
          <div class="row">
            <div class="col-lg-12">
              <div class="single-post gallery-post">

                      <div class="post-image">
                        <div class="meta-category">
                          <span>Fashion</span>
                        </div>
                        <div class="owl-post-banner owl-carousel">
                          <div class="item">
                            <div class="overlay"></div>
                            <img src="<?= $array['article']['annonce_image'] ?>" alt="">
                          </div>
                          <?php foreach($array['article']['images'] as $img){ ?>
                              <div class="item">
                                <div class="overlay"></div>
                                <img src="<?= $img['img_path'] ?>" alt="">
                              </div>
                        <?php } ?>
                        </div>
                      </div>

						<div class="down-content">
                            <h4><?= $array['article']['name'] ?></h4>

                          <ul class="post-info">
                            <li><a href="#"><?= $array['article']['created']; ?></a></li>
                            <li><a href="#">Admin</a></li>
                            <li><a href="#">3 Comments</a></li>
                          </ul>
                          <p class="first-paragraph"><?= $array['article']['description'] ?><br><br></p>

                          <div class="row">
                            <div class="col-lg-7 col-md-6">
                              <div class="tags">
                                <ul class="tags">
                                  <li><i class="fa fa-tag"></i></li>
                                  <li><a href="#">Beauty</a>,</li>
                                  <li><a href="#">Fashion</a>,</li>
                                  <li><a href="#">Lifestyle</a></li>
                                </ul>
                              </div>
                            </div>
                            <div class="col-lg-5 col-md-6">
                              <ul class="share-post">
                                <li><i class="fa fa-share-alt"></i></li>
                                <li><a href="#">Facebook</a>,</li>
                                <li><a href="#">Twitter</a>,</li>
                                <li><a href="#">Pinterest</a></li>
                              </ul>
                            </div>
                          </div>

                          <?php
                            if(Core::$user->status > 0 && Core::$user->id == $array['article']['user_id']){ ?>
                                <div class="col-lg-12">
                                    <a class="article-change" href="articles/delete_article/<?= $array['article']['id'] ?>">Delete</a>
                                    <a class="article-change" href="articles/update_article/<?= $array['article']['id']  ?>">Update</a>
                                </div>
                          <?php } ?>

    					</div>

				</div>
			   </div>
            <div class="col-lg-12">
                 <ul class="post-nav">
                   <li><a href="articles/view_article/<?= $array['article']['id'] - 1 ?>">Prev Post</a></li>
                   <li><a href="articles/view_article/<?= $array['article']['id'] + 1 ?>">Next Post</a></li>
                 </ul>
            </div>

            <div class="col-lg-12">
              <div class="widget-post comments">
                <div class="widget-header">
                  <h4>3 Comments</h4>
                </div>
                <div class="widget-content">
                  <ul class="comments">
                    <li>
                      <div class="comment-author-image">
                        <img src="assets/images/comment-author-01.jpg" alt="">
                      </div>
                      <div class="right-content">
                        <h6>Robert Imeri <span>January 10, 2020</span></h6>
                        <a href="#" class="reply-button">Reply</a>
                        <p>Franzen tumeric sriracha and quinoa goard next level. Cold-pressed kinfolk cronut short ditch freegan kistrater selfies.</p>
                      </div>
                    </li>
                    <li class="replied">
                      <div class="comment-author-image">
                        <img src="assets/images/comment-author-03.jpg" alt="">
                      </div>
                      <div class="right-content">
                        <h6>Kate Luise <span>January 11, 2020</span></h6>
                        <a href="#" class="reply-button">Reply</a>
                        <p>Franzen tumeric sriracha and quinoa goard next level. Cold-pressed kinfolk cronut short ditch freegan kistrater selfies.</p>
                      </div>
                    </li>
                    <li>
                      <div class="comment-author-image">
                        <img src="assets/images/comment-author-02.jpg" alt="">
                      </div>
                      <div class="right-content">
                        <h6>Antonio Matters <span>January 09, 2020</span></h6>
                        <a href="#" class="reply-button">Reply</a>
                        <p>Franzen tumeric sriracha and quinoa goard next level. Cold-pressed kinfolk cronut short ditch freegan kistrater selfies.</p>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
            </div>

            <?php
              if(Core::$user->status > 0){ ?>

                  <div class="col-lg-12">
                    <div class="widget-post leave-comment">
                      <div class="widget-header">
                        <h4>Leave a comment</h4>
                      </div>
                      <div class="widget-content">
                        <div class="contact-form">
                          <form id="contact" action="#" method="post">
                            <div class="row">
                              <div class="col-lg-6 col-md-12 col-sm-12">
                                <fieldset>
                                  <input name="name" type="text" class="form-control" id="name" placeholder="Your name..." required="">
                                </fieldset>
                              </div>
                              <div class="col-lg-6 col-md-12 col-sm-12">
                                <fieldset>
                                  <input name="email" type="text" class="form-control" id="email" pattern="[^ @]*@[^ @]*" placeholder="Your email..." required="">
                                </fieldset>
                              </div>
                              <div class="col-lg-12">
                                <fieldset>
                                  <textarea name="message" rows="6" class="form-control" id="message" placeholder="Your comment..." required=""></textarea>
                                </fieldset>
                              </div>
                              <div class="col-lg-12">
                                <fieldset>
                                  <button type="submit" id="form-submit" class="filled-button">Post Comment</button>
                                </fieldset>
                              </div>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>

            <?php } ?>
		  </div>
	    </div>
      </div>
      <?php include(Core::$root."/views/sidebar.php") ?>
    </div>
  </div>
</section>
