<?php

namespace Stefanmahr\Mwdcms\Models\Sliders;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    
	protected $connection;
	protected $table 		= "sliders";
	
	public function __construct() {
		
		$this->connection = config('cms.database.connection');
		
	}
	
	public function slides() {
		
		return $this->hasMany('Stefanmahr\Mwdcms\Models\Sliders\Slides', 'slider_id', 'id');
		
	}
	
}
