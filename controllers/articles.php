<?php
	class Controller_articles
	{
		static $max_width = 770;
		static $max_height = 420;

		function view_article(){
			$model = Models::load('articles');
			$article = $model->getArticle(Core::$query->get('id'));

			if(empty($article))
				header('Location: '.'/blog');

			Views::show('header');

			Views::show('article', $array = array('article' => $article));

			Views::show('footer');
		}

		function add_article(){
			if(Core::$user->status > 0)
			{
				$result = null;
				if(Core::$query->getInput('method') == 'add_article'){
					$uploads_dir = 'uploads';
					$model = Models::load('articles');

					$result = $model->addArticle(Core::$query->getInput('name'), Core::$query->getInput('annonce_text'), Core::$query->getInput('description'), Core::$user->id);

					if($result['status']){
						$model = Models::load('images');

						$annonce_image = $model->handleImage($_FILES['annonce_img']['name'], $_FILES['annonce_img']['tmp_name'], $uploads_dir, self::$max_width, self::$max_height);

						$model->updateAnnonceImage($annonce_image, $result['id']);

						foreach ($_FILES["img"]["error"] as $key => $error) {
							$images[$key+1] = $model->handleImage($_FILES['img']['name'][$key], $_FILES['img']['tmp_name'][$key], $uploads_dir, self::$max_width, self::$max_height);
						}

						$model->addDescriptionImages($images, $result['id']);

						header('Location: '.'/blog');
						exit();
					}
				}
				$article = [
					'id' => -1,
					'name' => Core::$query->getInput('name'),
					'annonce' => Core::$query->getInput('annonce_text'),
					'description' => Core::$query->getInput('description')
				];

				Views::show('header');

				Views::show('addForm', $array = array('article' => $article, 'method' => 'add_article', 'result' => $result));

				Views::show('footer');
			}
			else
				header('Location: '.'/blog/auth/login');
		}

		function update_article(){
			$model = Models::load('articles');
			$article = $model->getArticle(Core::$query->getInput('id'));

			if(empty($article)){
				header('Location: '.'/blog');
			}

			if(Core::$user->status > 0  && Core::$user->id == $article['user_id'])
			{
				$result = null;
				if(Core::$query->getInput('method') == 'update_article'){
					$uploads_dir = 'uploads';

					$result = $model->updateArticle(Core::$query->post('name'), Core::$query->getInput('annonce_text'), Core::$query->getInput('description'), Core::$query->getInput('id'));

					if($result['status']){
						$model = Models::load('images');

						$annonce_image = $model->handleImage($_FILES['annonce_img']['name'], $_FILES['annonce_img']['tmp_name'], $uploads_dir, self::$max_width, self::$max_height);

						$model->updateAnnonceImage($annonce_image, Core::$query->getInput('id'));

						foreach ($_FILES["img"]["error"] as $key => $error) {
							$images[$key+1] = $model->handleImage($_FILES['img']['name'][$key], $_FILES['img']['tmp_name'][$key], $uploads_dir, self::$max_width, self::$max_height);
						}

						$model->addDescriptionImages($images, Core::$query->getInput('id'));

						header('Location: '.'/blog');
						exit();
					}
					$article = [
						'id' => Core::$query->getInput('id'),
						'name' => Core::$query->getInput('name'),
						'annonce' => Core::$query->getInput('annonce_text'),
						'description' => Core::$query->getInput('description')
					];
				}
				Views::show('header');

				Views::show('addForm', $array = array('article' => $article, 'method' => 'update_article', 'result' => $result));

				Views::show('footer');
			}
			else
				header('Location: '.'/blog/auth/login');
		}

		function delete_article(){
			$model = Models::load('articles');
			$article = $model->getArticle(Core::$query->getInput('id'));

			if(empty($article))
				header('Location: '.'/blog');

			if(Core::$user->status > 0 && Core::$user->id == $article['user_id'])
			{
				$model->deleteArticle(Core::$query->getInput('id'));

				header('Location: '.'/blog');
			}
			else
				header('Location: '.'/blog/auth/login');
		}
	}
?>
