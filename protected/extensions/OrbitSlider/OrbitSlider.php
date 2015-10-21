<?php
/**
 * Description of OrbitSlider
 *
 * @author Perochak  <me@perochak.com> <me@perochak.com>
 * @uses Yii v.1.1.5
 *  Ver : 1.3.1
 */
 
class OrbitSlider extends CWidget {
 
    public $name = 'orbit';
    public $content=array();
    public $width = '400';
    public $height = '250';
    public $slider_options=array();
    public $default_options=array(
        'timer'=>true,
        'bullets'=>true,
        'animation'=>'fade',
        'opacity'=>'0.5',
        'animationSpeed'=>'1500',
        'advanceSpeed'=>'8000',
        'startClockOnMouseOut'=>true,
        'startClockOnMouseOutAfter'=>'5000',
        'directionalNav'=>true,
		'captionAnimation'=>'fade',
    );
    public function init() {
        parent::init();
    }
 
    public function makeContent() {
        $html = '<div id="' . $this->name . '">' . "\n";
        $i=0;
        $caption='';
		foreach ($this->content as $item) {
			$captiontag = '';
			if(isset($item['caption'])){ 
				$caption .= '<span class="orbit-caption" id="htmlCaption'.$i.'">' . $item['caption'] . '</span>' . "\n";
				$captiontag = ' data-caption="#htmlCaption'.$i.'"';
			}
			
			$width = ($this->width > 0) ? 'width:' . $this->width . 'px;' : '';
			$height = ($this->height > 0) ? 'height:' . $this->height . 'px;' : '';
			
			// Handle some defaults to avoid fault checking later
			//if (!isset($item['image'])) { $item['image'] = false; }
			if (isset($item['class'])) { $item['class'] = ' class="' . $item['class'] . '"'; } else { $item['class'] = ''; }
			if (isset($item['style'])) { $item['style'] = ' style="' . $item['style'] . $width . $height . '"'; } else { $item['style'] = ''; }
			
			
			$html .= '<div' . $item['class'] . $item['style'] . $captiontag . '>';
			
			if ($item['image']) {
				$image = '<img src="' . $item['file'] . '" />';
	 
				if(isset($item['url']))
				{
					if(is_array($item['url'])) {
						$image = '<a href="'.Yii::app()->createUrl($img['url'][0]).'">'.$image.'</a>';
					} else {
						$image = '<a href="'.$item['url'].'">'.$image.'</a>';
					}
				}
				$html .= $image;
			} elseif (isset($item['content'])) {
				$html .= $item['content'];
			}
			
			$html .= '</div>' . "\n";
			$i++;
		}
        $html .= '</div>' . "\n";
        $html .= $caption;
        return $html;
    }
 
    /**
     * Run the widget, including the js files.
     */
    public function run() {
        $cs = Yii::app()->clientScript;
 
        $dir = dirname(__FILE__) . DIRECTORY_SEPARATOR;
        $baseUrl = Yii::app()->getAssetManager()->publish($dir . 'assets');
 
        foreach($this->slider_options as $key=>$val){
            $this->default_options[$key]=$val;
        }
        $this->default_options = CJavaScript::encode($this->default_options);
 
        $clientScript = Yii::app()->getClientScript();
 
        $clientScript->registerCssFile($baseUrl . '/css/orbit-1.2.3.css'); //http_build_query($cssparams)
 
        $clientScript->registerCoreScript('jquery');
 		
        $clientScript->registerScriptFile($baseUrl . '/js/jquery.orbit-1.2.3.js');
 
        $js =  "$(window).load(function() {
            $('#{$this->name}').orbit(
        $this->default_options
            );
        });";
 
        $cs->registerScript('Yii.Orbit' . $this->name, $js);
        echo $this->makeContent();
    }
 
}
?>