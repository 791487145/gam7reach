<?php

namespace App\Console\Commands;

use App\Model\Area;
use Cache;
use Illuminate\Console\Command;
use App\Http\Controllers\Common\Common;

class AreaCache extends Command
{
    use Common;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'area:cache';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'table area has cache';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $areas = Area::select('area_id','area_parent_id','area_name')->get()->toArray();
        foreach ($areas as &$area){
            $area['value'] = $area['area_id'];
            $area['label'] = $area['area_name'];
            unset($area['area_id']);
            unset($area['area_name']);
        }
        $areas = $this->listToTree($areas,'value','area_parent_id','children');
        Cache::put('areas',$areas,60*24*7);
    }
}
