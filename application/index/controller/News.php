<?php
namespace app\index\controller;

use think\Controller;
use think\Request;

use app\index\model\News as NewsModel;
/**
* 
*/
class News extends Controller
{
	public function Publish(Request $request)
	{
		$publish_details = $request->param();
		$news = new NewsModel([
			'news_title' => $publish_details['news-title'],
			'author' => $publish_details['news-author'],
			'news_content' => $publish_details['news-content'],
		]);
		$news->created_time;
		$news->save();
		$this->redirect('dashboard/news');
	}

	public function Update(Request $request)
	{
		$update_details = $request->param();
		$news = NewsModel::where('author', $update_details['news-author'])->get();
		$this->redirect('dashboard/news');
	}
}