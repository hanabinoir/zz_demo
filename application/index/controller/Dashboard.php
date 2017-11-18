<?php

namespace app\index\controller;

use think\Controller;
use think\Request;

use app\index\model\News;
/**
* 
*/
class Dashboard extends Controller
{
	
	public function News()
	{
		$news = News::all();
		return view('index/news');
	}

	public function Publish()
	{
		return view('index/publish');
	}

	public function Edit($author, $publish_time)
	{
		$this->redirect('news/edit/', [
			'author' => $author, 
			'publish_time' => $publish_time,
		]);
	}
}