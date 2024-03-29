<?php

namespace app\system\logic\admin;

class SettingLogic extends Logic
{
    protected $settings = [];

    protected function initialize()
    {
        $this->static = \app\system\model\admin\SettingModel::class;
        parent::initialize();
    }

    protected function beforePaginate($query)
    {
        $query->where('user_id', get_admin()->id)->where('scene', 'admin');
    }

    public function postAdd($form = [])
    {
        $this->set($form['data'], get_admin()->id, $form['key']);
    }

    protected function beforeDelete($query)
    {
        $query->where('user_id', get_admin()->id)->where('scene', 'admin');
    }

    
    public function get($user_id, $key = 'default', $scene = 'admin')
    {
        if (!isset($this->settings[$scene][$key])) {
            $data = $this->static::where('scene', $scene)->where('user_id', $user_id)->where('key', $key)->first();
            $result = empty($data) ? [] : (array)json_decode($data['data'], true);
            $this->settings[$scene][$key] = $result;
        }
        return $this->settings[$scene][$key];
    }

    public function set($content, $user_id, $key = 'default', $scene = 'admin')
    {
        $data = $this->static::where('scene', $scene)->where('user_id', $user_id)->where('key', $key)->first();
        $content = is_string($content) || is_numeric($content) || is_bool($content) ? $content : htmlspecialchars_decode(json_encode($content, 1));
        if (empty($data)) {
            $this->static::create([
                'user_id' => $user_id,
                'key' => $key,
                'scene' => $scene,
                'data' => $content
            ]);
        } else {
            $data->update(['data' => $content]);
        }
    }
}