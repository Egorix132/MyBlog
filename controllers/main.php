<?php
	class Controller_main
	{
		private static $max_articles_on_page = 5;
		function index(){
			$model = Models::load('articles');
			$articles = $model->getAllArticles();

			if(!empty(Core::$query->get('page'))){
				$page = Core::$query->get('page');
			}
			else{
				$page = 1;
			}

			Views::show('header', null);

			Views::show('articles', array('articles' => array_slice($articles, ($page-1) * self::$max_articles_on_page, self::$max_articles_on_page), 'page' => $page, 'pages_count' => ceil(count($articles) / self::$max_articles_on_page)));

			Views::show('footer', null);
		}
	}
?>
