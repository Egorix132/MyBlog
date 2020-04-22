<?php
	class Controller_main
	{
		private static $max_articles_on_page = 5;
		function index(){

			if(!empty(Core::$query->get('page'))){
				$page = Core::$query->get('page');
			}
			else{
				$page = 1;
			}

			$model = Models::load('articles');
			$res = $model->getArticles(($page-1) * self::$max_articles_on_page.','.($page*self::$max_articles_on_page));
			$articles = $res['articles'];
			$count_of_all =$res['count'];

			Views::show('header');

			Views::show('articles', array('articles' => $articles, 'page' => $page, 'pages_count' => ceil($count / self::$max_articles_on_page)));

			Views::show('footer');
		}
	}
?>
