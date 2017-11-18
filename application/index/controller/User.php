<?php

namespace app\index\controller;

use think\Controller;
use think\Request;

use app\index\model\User as UserModel;

/**
* 
*/
class User extends Controller
{
	
	public function Login(Request $request)
	{
		$login_info = $request->param();
		$user = UserModel::where('username', $login_info['username'])->find();
		$status = 0;
		$msg = '';

		if (count($user) == 0) {
			$status = 1;
			$msg = 'User not existing';
		}
		elseif ($login_info['password'] != $user['password']) {
			$status = 2;
			$msg = 'Password not matching';
		}

		if ($status) {
			$this->redirect('/');
		}
		
		$this->redirect('dashboard/news');
	}

	public function Registration()
	{
		return view('index/registration');
	}

	public function Create(Request $request)
	{
		$new_user = $request->param();
		$user = new UserModel([
			'username' => $new_user['username'], 
			'password' => $new_user['password'],
		]);
		$user->save();
		$this->redirect('/');
	}
}