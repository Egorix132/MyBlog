<?php
	class Controller_articles
	{
		static $max_width = 770;
		static $max_height = 420;
		function view_article(){
			$model = Models::load('articles');
			$article = $model->getArticle(Core::$query->get('id'));

			Views::show('header', null);

			Views::show('article', $array = array('article' => $article));

			Views::show('footer', null);
		}

		function add_article(){
			if(Core::$user->status > 0)
			{
				if(Core::$query->getMethod() == 'GET'){
					Views::show('header', null);

					Views::show('addForm', $array = array('article' => array('id' => -1, 'name' => '', 'annonce' => '', 'description' => '') ,'method' => 'add_article'));

					Views::show('footer', null);
				}

				else{
						$uploads_dir = "uploads";
						$model = Models::load('images');

						$annonce_image = $model->handleImage($_FILES['annonce_img']['name'], $_FILES['annonce_img']['tmp_name'], $uploads_dir, $max_width, $max_height);
						foreach ($_FILES["img"]["error"] as $key => $error) {
							$images[$key+1] = $model->handleImage($_FILES['img']['name'][$key], $_FILES['img']['tmp_name'][$key], $uploads_dir, $max_width, $max_height);
						}

						$model = Models::load('articles');
						$status = $model->addArticle(Core::$query->post('name'), Core::$query->post('annonce_text'), Core::$query->post('description'),$annonce_image, $images, Core::$user->id);

						if(is_numeric($status))
							header("Location: http://dev.mailshark.ru/");
						else{
							Views::show('header', null);

							Views::show('addForm', $array = array('article' => array(
								'id' => -1, 'name' => Core::$query->post('name'),
								'annonce' => Core::$query->post('annonce_text'),
								'description' => Core::$query->post('description')),
							 	'method' => 'add_article', 'message' => $status));

							Views::show('footer', null);
						}
				}
			}
			else
				header("Location: http://dev.mailshark.ru/auth/login");
		}

		function update_article(){
			$model = Models::load('users');
			$article = $model->getArticle(Core::$query->getInput('id'));

			if(Core::$user->status > 0  && Core::$user->id == $article['user_id'])
			{
				$model = Models::load('articles');

				if(Core::$query->getMethod() == 'GET'){
					$article = $model->getArticle($_GET['id']);

					Views::show('header', null);

					Views::show('addForm', $array = array('article' => $article,'method' => 'update_article'));

					Views::show('footer', null);
				}

				else{
					$status = $model->updateArticle($_POST['name'], Core::$query->post('annonce_text'), Core::$query->post('description'), Core::$query->post('id'));
					if(is_numeric($status))
						header("Location: http://dev.mailshark.ru/");
					else{
						Views::show('header', null);

						Views::show('addForm', $array = array('article' => array(
							'id' => -1, 'name' => Core::$query->post('name'),
							'annonce' => Core::$query->post('annonce_text'),
							'description' => Core::$query->post('description')),
							'method' => 'update_article', 'message' => $status));

						Views::show('footer', null);
					}
				}
			}
			else
				header("Location: http://dev.mailshark.ru/auth/login");
		}

		function delete_article(){
			$model = Models::load('users');
			$article = $model->getArticle(Core::$query->getInput('id'));

			if(Core::$user->status > 0 && Core::$user->id == $article['user_id'])
			{
				$model = Models::load('articles');
				$model->deleteArticle($request_array['id']);

				header("Location: http://dev.mailshark.ru/");
			}
			else
				header("Location: http://dev.mailshark.ru/auth/login");
		}
	}
?>
