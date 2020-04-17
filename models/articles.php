<?php
	class Model_Articles{

		private static $min_lengths = ['name' => 1, 'annonce_text' => 1, 'description' => 1];
		private static $max_lengths = ['name' => 50, 'annonce_text' => 200, 'description' => 10000];

		function getAllArticles(){
			$articles = Core::$db->select('articles');

			return $articles;
		}

		function getArticle($id){
			$article = Core::$db->select('articles', array("id = $id"));

			if(empty($article))
				return null;

			$article[0]['images'] = Core::$db->select('description_images', array("article_id = {$article[0]['id']}"));

			if(empty($article[0]['images'])) $article[0]['images'] = array();

			return $article[0];
		}

		function addArticle($name, $annonce_text, $description, $user_id){
			$name = Model_Articles::clean($name);
			$annonce_text = Model_Articles::clean($annonce_text);
			$description = Model_Articles::clean($description);

			$fields = ['name', 'annonce_text', 'description'];
			$result = ['status' => true];

			foreach($fields as $field){
				if(!Model_Articles::checkLength($$field, Model_Articles::$min_lengths[$field], Model_Articles::$max_lengths[$field])){
					$result['status'] = false;
					$result[$field] = 'incorrect length';
				}
			}

			if($result['status']) {
				$result['id'] = Core::$db->insert('articles',
				 	array('name', 'annonce', 'description', 'user_id', 'created'),
					array("'$name'", "'$annonce_text'", "'$description'", "'$user_id'", "now()"));

				if(!is_numeric($result['id']))
					$result['name'] = 'Статья с таким именем уже существует';
			}

			return $result;
		}

		function updateArticle($name, $annonce_text, $description, $id){
			$name = Model_Articles::clean($name);
			$annonce_text = Model_Articles::clean($annonce_text);
			$description = Model_Articles::clean($description);
			$id = Model_Articles::clean($id);

			$fields = ['name', 'annonce_text', 'description'];
			$result = ['status' => true];

			foreach($fields as $field){
				if(!Model_Articles::checkLength($$field, Model_Articles::$min_lengths[$field], Model_Articles::$max_lengths[$field])){
					$result['status'] = false;
					$result[$field] = 'incorrect length';
				}
			}

			if($result['status']) {
				$result['id'] = Core::$db->update('articles',
					array('name', 'annonce', 'description'),
					array("'$name'", "'$annonce_text'", "'$description'"),
					array("id = $id"));
					
				Core::$db->delete('description_images', array("article_id = $id"));

				if(!is_numeric($result['id']))
					$result['name'] = 'Ошибка';
			}

			return $result;
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
