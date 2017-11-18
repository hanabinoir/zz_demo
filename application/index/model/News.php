<?php
namespace app\index\model;

use think\Model;

/**
* 
*/
class News extends Model
{
    protected $autoWriteTimestamp = 'datetime';
	protected $createTime = 'publish_time';
	protected $updateTime = 'latest_update';
}