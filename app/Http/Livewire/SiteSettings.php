<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Config;

class SiteSettings extends Component
{
    public $site;

    public function mount(Config $config)
    {
        $info = Config::find('site_info');
        $this->site = $info?$info->value:null;
    }

    public function render()
    {
        return view('livewire.site-settings');
    }

    public function saveSiteSettings()
    {
        Config::updateOrCreate(['key'=>'site_info'],[
            'group' => 'site_settings',
            'key' => 'site_info',
            'value' => $this->site,
        ]);
        $this->emit('swal:alert', [
            'type'    => 'success',
            'title'   => 'Site Information successfully saved!!',
            'timeout' => 3000,
            'icon' => 'success'
        ]);
        /*         sample sweet alert messages use from here  */

        // $this->emit('swal:modal', [
        //     'icon' => 'success',
        //     'type'  => 'success',
        //     'title' => 'Success!!',
        //     'text'  => "This is a success message",
        // ]);
        // $this->emit("swal:confirm", [
        //     'type'        => 'warning',
        //     'title'       => 'Are you sure?',
        //     'text'        => "You won't be able to revert this!",
        //     'confirmText' => 'Yes, delete!',
        //     'method'      => 'appointments:delete',
        //     'params'      => [], // optional, send params to success confirmation
        //     'callback'    => '', // optional, fire event if no confirmed
        // ]);
    }
}
