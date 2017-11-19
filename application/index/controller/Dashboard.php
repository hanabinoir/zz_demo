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
	private $result = 'Results found: ';
	
	public function News()
	{
		$news = News::all();
		$this->result .= count($news);

		return view('index/news', [
			'result' => $this->result, 
			'news' => $news,
		]);
	}

	public function SearchNews(Request $request)
	{
		$keywords = $request->param();
		$title = $keywords['news_title'];

		$news = News::where('news_title', 'like', $title.'%')
		->select();

		$this->result .= count($news);

		return view('index/news', [
			'result' => $this->result, 
			'news' => $news,
		]);
	}

	public function Publish()
	{
		return view('index/publish');
	}

	public function ReadNews(Request $request)
	{
		$news_details = $request->param();
		$news = News::where([
			'news_author' => $news_details['author'], 
			'publish_time' => $news_details['publish_time']
		])->find();

		return view('index/readnews', [
			'news' => $news,
		]);
	}

	public function Edit($author, $publish_time)
	{
		$this->redirect('news/edit/', [
			'author' => $author, 
			'publish_time' => $publish_time,
		]);
	}
}