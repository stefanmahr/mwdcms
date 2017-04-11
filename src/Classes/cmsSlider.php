<?php

namespace Stefanmahr\Mwdcms\Classes;

use Stefanmahr\Mwdcms\Models\Sliders\Slider;

class cmsSlider {
	
	private $cmsKey;
	
	public function __construct() {
		
		$this->cmsKey = config('cms.key');
		
	}
	
	public function isEnabled() {
		
		if (Slider::where('cmskey', $this->cmsKey)->count() > 0) {
			return true;
		}
		else {
			return false;
		}
		
	}
	
	public function jsinit() {
		
		if ($this->isEnabled()) {
			
			$slider = Slider::where('cmskey', $this->cmsKey)->firstorfail();
			
			$return	 = '<script>';
			
			$return .= '$(document).ready(function() {';
			$return .= '$("' . $this->cmsKey . '-carousel").carousel({';
			$return .= 'interval:' . $slider->interval;
			$return .= '});';
			$return .= '});';
			
			$return	.= '</script>';
			
			return $return;
			
		}
		
	}
	
    public function render() {
		
		if ($this->isEnabled()) {
		
			$slider = Slider::where('cmskey', $this->cmsKey)->firstorfail();

			$return  = '<div class="' . ($slider->fullwidth ? 'container-fluid' : 'container') . '">';
			$return .= '<div id="' . $this->cmsKey . '-carousel" class="carousel slide" data-ride="carousel">';

			if ($slider->indicators == true) {

				$return .= '<ol class="carousel-indicators">';

				for ($i = 0; $i <= count($slides); $i++) {

					if ($i == 0) {

						$return .= '<li data-target="#' . $this->cmsKey . '-carousel" data-slide-to="0" class="active"></li>';

					}
					else {

						$return .= '<li data-target="#' . $this->cmsKey . '-carousel" data-slide-to="' . $i . '"></li>';

					}

				}

				$return .= '</ol>';

			}

			$return .= '<div class="carousel-inner" role="listbox">';

			for ($i = 0; $i <= count($slider->slides); $i++) {

				if ($i == 0) {

					$slide	 = '<div class="item active">';

				}
				else {

					$slide	 = '<div class="item">';

				}

				$slideImages = unserialize($slider->slides[$i]->images);

				if (empty($slideImages->mobile)) {

					$slide	.= '<img src="' . $sliderImages->desktop . '">';

				}
				else {

					$slide	.= '<img src="' . $sliderImages->desktop . '" class="hidden-xs">';
					$slide	.= '<img src="' . $sliderImages->mobile . '" class="visible-xs">';

				}

				if ($slider->caption == true) {

					$slide	.= '<div class="carousel-caption">';
					$slide	.= '<h3>' . $slides[$i]->title . '</h3>';
					$slide	.= '<p>' . $slides[$i]->desc . '</p>';
					$slide	.= '</div>';

				}

				$return	.= $slide;

			}

			if ($slider->controls == true) {

				$return	.= '<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
								<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
								<span class="sr-only">Previous</span>
							</a>
							<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
								<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
								<span class="sr-only">Next</span>
							</a>';

			}

			$return .= '</div>';

			return $return;
			
		}
        
    }
	
}