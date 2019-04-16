<?php
namespace  App\Models\Traits;

use Redis;
use Carbon\Carbon;

trait LastActivedAtHelper
{
    protected $hash_prefix='larabbs_last_actived_at_';
    protected  $field_prefix = 'user_';

    public function recordlastActivedAt()
    {

        $hash=$this->getHashFromDateString(Carbon::now()->toDateString());
        $field=$this->getHashField();

        $now=Carbon::now()->toDateTimeString();

        Redis::hSet($hash,$field,$now);
    }
    public function syncUserActivedAt()
    {


        // Redis 哈希表的命名，如：larabbs_last_actived_at_2017-10-21
        $hash=$this->getHashFromDateString(Carbon::now()->toDateString());

        // 从 Redis 中获取所有哈希表里的数据
        $dates = Redis::hGetAll($hash);

        // 遍历，并同步到数据库中
        foreach ($dates as $user_id => $actived_at) {
            // 会将 `user_1` 转换为 1
            $user_id = str_replace($this->field_prefix, '', $user_id);

            // 只有当用户存在时才更新到数据库中
            if ($user = $this->find($user_id)) {
                $user->last_actived_at = $actived_at;
                $user->save();
            }
        }

        // 以数据库为中心的存储，既已同步，即可删除
        Redis::del($hash);
    }
    public function getLastActivedAtAttribute($value)
    {
        $hash=$this->getHashFromDateString(Carbon::now()->toDateString());
        $field=$this->getHashField();

        $datetime=Redis::hGet($hash,$field)?:$value;

        if($datetime){
            return new Carbon($datetime);
        }else{
            return $this->create_at;
        }
    }
    public function getHashFromDateString($date){
        return $this->hash_prefix.$date;
    }
    public function getHashField()
    {
        return $this->field_prefix.$this->id;
    }
}
