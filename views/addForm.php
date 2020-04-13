<section class="medium-gap single-post">
  <div class="container">
    <div class="row">
      <div class="col-lg-8">
        <div class="single-posts">
          <div class="row">

            <div class="col-lg-12">
              <div class="single-post">

					<form action="./index.php" method="post" enctype="multipart/form-data">

                        <div class="post-image">
                          <label>Annonce Image:</label>
                          <p>
                              <input type="file" class="form-control-file border" name="annonce_img">
                              <br><br>
                          </p>
                        </div>

						<div class="down-content">

						  <label>Article Name:</label>
						  <p>
    					  	<h4><input type="text" class="form-control" placeholder="Enter name" name="name" value="<?= $array['article']['name'] ?>"></h4>
						  </p>

						  <label>Article Annonce:</label>
						  <p>
							  <input type="text" class="form-control" placeholder="Enter annonce text" name="annonce_text" value="<?= $array['article']['annonce'] ?>">
                              <br><br>
						  </p>

						  <label>Article Description:</label>
                          <p>
							  <textarea class="form-control" rows="5" name="description"><?= $array['article']['description'] ?></textarea>
                              <br><br>
                          </p>

                          <label>Images:</label>
    					  <p class="last-paragraph">
    				            <input type="file" class="form-control-file border" name="img[]" multiple>
    					  </p>

						  <input type="hidden" class="form-control-file border" name="c" value="articles">
						  <input type="hidden" class="form-control-file border" name="m" value="<?= $array['method'] ?>">
						  <input type="hidden" class="form-control-file border" name="id" value="<?= $array['article']['id'] ?>">

						  <button type="submit" class="btn btn-primary">Submit</button>

    					</div>
					</form>



				</div>
			   </div>

		  </div>
	    </div>
      </div>
	  <?php include(Core::$root."/views/sidebar.php") ?>
	</div>
  </div>
</section>

<?php if(isset($array['message'])){ ?>
    <script>alert("<?= $array['message']?>")</script>
<?php }?>
