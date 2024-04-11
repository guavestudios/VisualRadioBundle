<?php

namespace Guave\VisualRadioBundle\Widget;

use Contao\Database\Result;
use Contao\Widget;
use Contao\Image;

class VisualRadio extends Widget
{
	/** @var string */
	protected $strTemplate = 'be_widget';

	protected $blnSubmitInput = true;

	public function validator($varInput) {
		return $varInput;
	}

    public function generate(): string
	{
        $html = '<div>';
		foreach ($this->options as $k => $option) {
			$id = $this->strName.'-'.$k;
			$image = $this->imagepath.'/'.$option['value'].$this->imageext;
			$active = $this->varValue === $option['value'];
            $name = $option['name'] ?? $option['value'];

			$html .= '<div style="width:25%;display: inline-block;text-align:center;margin-bottom:20px;">';
			$html .= '<input type="radio" id="'.$id.'" name="'.$this->strName.'" value="'.$option['value'].'" '.$this->getAttributes().( $active?'checked':'' ).' /> ';
			$html .= '<label for="'.$id.'">';
			$html .= Image::getHtml($image, $name, 'title="'.specialchars($name).'"');
			$html .= '</label>';
			$html .= '</div>';
		}

		$html .= '</div>';

		return '<div>'.$html.'</div>';
	}
}
