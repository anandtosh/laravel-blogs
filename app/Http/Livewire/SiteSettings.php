<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Config;

class SiteSettings extends Component
{
    public $name;
    public $email;

    public function mount(Config $config)
    {
        $this->name = $config->where('key','site_info')->first()?$config->where('key','site_info')->first()->value['name']:'';
        $this->email = $config->where('key','site_info')->first()?$config->where('key','site_info')->first()->value['email']:'';
    }

    public function render()
    {
        return view('livewire.site-settings');
    }

    public function saveSiteSettings()
    {
        $inputs = array('name'=>$this->name,'email'=>$this->email);
        Config::updateOrCreate(['key'=>'site_info'],[
            'group' => 'site_settings',
            'key' => 'site_info',
            'value' => $inputs,
        ]);
    }
}
