<?php

namespace Stefanmahr\Mwdcms\Models\Sliders;

use Illuminate\Database\Eloquent\Model;

class Slides extends Model
{
  	
	protected $connection;
	protected $table 		= "slides";
	
	public function __construct() {
		
		$this->connection = config('cms.database.connection');
		
	}
	
}
