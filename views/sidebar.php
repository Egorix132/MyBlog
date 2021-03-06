<div class="col-lg-4">
    <div class="main-sidebar right-sidebar">
        <div class="row">

                  <?php
                    if(Core::$user->status == 0){ ?>
                        <div class="col-lg-12">
                          <div class="widget-sidebar about-me">
                              <div class="widget-header">
                                <h4>Login</h4>
                              </div>
                              <form action="./index.php" method="post">
                                  <div class="widget-content">
                                      <label>Login:</label>
                                      <p>
                                        <h4><input type="text" class="form-control" placeholder="Enter name" name="login"></h4>
                                      </p>
                                      <label>Password:</label>
                                      <p>
                                          <h4><input type="password" class="form-control" placeholder="Enter password" name="password"></h4>
                                      </p>

                                      <input type="hidden" class="form-control-file border" name="c" value="auth">
                                      <input type="hidden" class="form-control-file border" name="m" value="<?= 'login' ?>">

                                      <div class="add-article-button border-black-button">
                                        <button type="submit">Submit</button>
                                        <a href="auth/register/">Not registered?</a>
                                      </div>
                                  </div>
                              </form>
                            </div>
                          </div>
                    <?php } ?>

            <div class="col-lg-12">
              <div class="widget-sidebar about-me">
                <div class="widget-header">
                  <h4>About Me</h4>
                </div>
                <div class="widget-content">
                  <img src="assets/images/about-me-sidebar.jpg" alt="">
                  <p>Franzen tumeric sriracha and quinoa goard next level cold-pressed kinfolk.</p>
                  <h6>Shareen Robertson</h6>
                  <ul class="social-icons">
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                    <li><a href="#"><i class="fa fa-rss"></i></a></li>
                    <li><a href="#"><i class="fa fa-behance"></i></a></li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-lg-12">
              <div class="widget-sidebar promo-post">
                <div class="widget-header">
                  <h4>Promo Post</h4>
                </div>
                <div class="widget-content">
                  <div class="promo-image">
                    <img src="assets/images/promo-image-sidebar.jpg" alt="">
                    <div class="inner-content">
                      <p>Franzen tumeric sriracha and quinoa next level kinfolk cronut.</p>
                      <div class="normal-white-button">
                        <a href="#">Read More</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-12">
              <div class="widget-sidebar instagram-posts">
                <div class="widget-header">
                  <h4>Instagram</h4>
                </div>
                <div class="widget-content">
                  <div class="instagram-item left-item first-row">
                    <img src="assets/images/instagram-sidebar-01.jpg" alt="">
                  </div>
                  <div class="instagram-item first-row">
                    <img src="assets/images/instagram-sidebar-02.jpg" alt="">
                  </div>
                  <div class="instagram-item left-item">
                    <img src="assets/images/instagram-sidebar-03.jpg" alt="">
                  </div>
                  <div class="instagram-item">
                    <img src="assets/images/instagram-sidebar-04.jpg" alt="">
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-12">
              <div class="widget-sidebar latest-posts">
                <div class="widget-header">
                  <h4>Latest Posts</h4>
                </div>
                <div class="widget-content">
                  <ul class="latest-post-list">
                    <li>
                      <a href="single-standard-post.html">
                        <div class="left-image">
                          <img src="assets/images/latest-post-sidebar-01.jpg" alt="">
                          <span>9</span>
                        </div>
                        <div class="right-content">
                          <h6>croix flannel thundercats chicken</h6>
                          <span>January 14, 2020</span>
                        </div>
                      </a>
                    </li>
                    <li>
                      <a href="single-standard-post.html">
                        <div class="left-image">
                          <img src="assets/images/latest-post-sidebar-02.jpg" alt="">
                          <span>3</span>
                        </div>
                        <div class="right-content">
                          <h6>The Ultimate Women Guide Latest Fashion</h6>
                          <span>January 12, 2020</span>
                        </div>
                      </a>
                    </li>
                    <li>
                      <a href="single-standard-post.html">
                        <div class="left-image">
                          <img src="assets/images/latest-post-sidebar-03.jpg" alt="">
                          <span>7</span>
                        </div>
                        <div class="right-content">
                          <h6>wayfarers man braid marfa typewriter</h6>
                          <span>January 10, 2020</span>
                        </div>
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-lg-12">
              <div class="widget-sidebar categories">
                <div class="widget-header">
                  <h4>Categories</h4>
                </div>
                <div class="widget-content">
                  <ul class="categories">
                    <li><a href="#">Lifestyle <span>(12)</span></a></li>
                    <li><a href="#">Fashion <span>(9)</span></a></li>
                    <li><a href="#">Beauty <span>(7)</span></a></li>
                    <li><a href="#">Nature <span>(19)</span></a></li>
                    <li><a href="#">Nightlife <span>(4)</span></a></li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-lg-12">
              <div class="widget-sidebar tags-cloud">
                    <div class="widget-header">
                      <h4>Tags Cloud</h4>
                    </div>
                    <div class="widget-content">
                      <ul class="tags">
                        <li><a href="#">lifestyle</a></li>
                        <li><a href="#">beauty</a></li>
                        <li><a href="#">fashion</a></li>
                        <li><a href="#">js</a></li>
                        <li><a href="#">psd</a></li>
                        <li><a href="#">brand</a></li>
                        <li><a href="#">wordpress</a></li>
                        <li><a href="#">css</a></li>
                        <li><a href="#">nature</a></li>
                        <li><a href="#">inspiration</a></li>
                        <li><a href="#">motivation</a></li>
                      </ul>
                    </div>
                  </div>
            </div>
        </div>
      </div>
</div>
