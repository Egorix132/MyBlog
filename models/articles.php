<?php
	class Model_Articles{

		function __construct(){

		}

		function getAllArticles(){
			$articles = Core::$db->select('articles');

			return $articles;
		}

		function getArticle($id){
			$article = Core::$db->select('articles', array("id = $id"));
			$article[0]['images'] = Core::$db->select('description_images', array("article_id = {$article[0][id]}"));

			return $article[0];
		}

		function addArticle($name, $annonce_text, $description, $annonce_image, $images, $user_id){
			$name = Model_Articles::clean($name);
			$annonce_text = Model_Articles::clean($annonce_text);
			$description = Model_Articles::clean($description);
			
			if(!empty($name) && !empty($annonce_text) && !empty($description)) {
				if(Model_Articles::checkLength($name, 1, 50) && Model_Articles::checkLength($annonce_text, 1, 200) && Model_Articles::checkLength($description, 1, 2000)) {
					$id = Core::$db->insert('articles', array('name', 'annonce', 'description', 'annonce_image', 'user_id', 'created'), array("'$name'", "'$annonce_text'", "'$description'", "'$annonce_image'", "'$user_id'", "now()"));

					foreach ($images as $image) {
						Core::$db->insert('description_images', array('article_id', 'img_path'), array("'$id'", "'$image'"));
					}
				}
				else {
					return "Введенные данные некорректны";
				}
			}
			else {
				return "Заполните пустые поля";
			}
			return $id;
		}

		function updateArticle($name, $annonce_text, $description, $annonce_image, $images, $id){
			$name = Model_Articles::clean($name);
			$annonce_text = Model_Articles::clean($annonce_text);
			$description = Model_Articles::clean($description);
			$id = Model_Articles::clean($id);

			if(!empty($name) && !empty($annonce_text) && !empty($description)) {
				if(Model_Articles::checkLength($name, 1, 50) && Model_Articles::checkLength($annonce_text, 1, 200) && Model_Articles::checkLength($description, 1, 2000)) {
					Core::$db->update('articles', array('name', 'annonce', 'description', 'annonce_image'), array("'$name'", "'$annonce_text'", "'$description'", "'$annonce_image'"), array("id = $id"));

					Core::$db->delete('description_images', array("article_id = $id"));

					foreach ($images as $image) {
						Core::$db->insert('description_images', array('article_id', 'img_path'), array("'$id'", "'$image'"));
					}
				}
				else {
					return "Введенные данные некорректны";
				}
			}
			else {
				return "Заполните пустые поля";
			}
			return $id;
		}

		function deleteArticle($id){
			$id = Model_Articles::clean($id);

			Core::$db->delete('articles', array("id = $id"));
		}

		private static function checkLength($value = "", $min, $max) {
			$result = (mb_strlen($value) < $min || mb_strlen($value) > $max);
			return !$result;
		}

		private static function clean($value = "") {
			$value = trim($value);
			$value = stripslashes($value);
			$value = strip_tags($value);
			$value = htmlspecialchars($value);

			return $value;
		}
	}
?>
