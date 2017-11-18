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
			'news_author' => $publish_details['news-author'],
			'news_content' => $publish_details['news-content'],
		]);
		$news->save();
		$this->redirect('dashboard/news');
	}

	public function EditNews(Request $request)
	{
		$news_details = $request->param();
		$news = NewsModel::where([
			'news_author' => $news_details['author'], 
			'publish_time' => $news_details['publish_time']
		])->find();

		return view('index/editnews', [
			'news' => $news,
		]);
	}

	public function Update(Request $request)
	{
		$update_details = $request->param();
		$news = new NewsModel;
		$news->save([
			'news_title' => $update_details['news-title'], 
			'news_author' => $update_details['news-author'], 
			'news_content' => $update_details['news-content'],
		], [
			'news_author' => $update_details['author'], 
			'publish_time' => $update_details['publish_time'], 
		]);
		$this->redirect('dashboard/news');
	}
}