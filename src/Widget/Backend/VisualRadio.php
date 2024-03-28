<?php

declare(strict_types=1);

namespace Guave\VisualRadioBundle\Widget\Backend;

use Contao\Image;
use Contao\RadioButton;
use Contao\StringUtil;

class VisualRadio extends RadioButton
{
    protected $strTemplate = 'be_widget';
    private string $imagePath;
    private string $imageExt;

    public function __construct(array $arrAttributes = null)
    {
        parent::__construct($arrAttributes);

        $this->preserveTags = true;
        $this->decodeEntities = true;
    }

    public function __set($strKey, $varValue): void
    {
        switch ($strKey) {
            case 'imagePath':
                $this->imagePath = $varValue;
                break;

            case 'imageExt':
                $this->imageExt = $varValue;
                break;

            default:
                parent::__set($strKey, $varValue);
                break;
        }
    }

    public function generate(): string
    {
        $arrOptions = [];
        $arrAllOptions = $this->arrOptions;

        if (isset($this->unknownOption[0])) {
            $arrAllOptions[] = [
                'value' => $this->unknownOption[0],
                'label' => sprintf($GLOBALS['TL_LANG']['MSC']['unknownOption'], $this->unknownOption[0]),
            ];
        }

        foreach ($arrAllOptions as $arrOption) {
            $id = $this->strId.'_'.$arrOption['value'];
            $image = $this->imagePath.'/'.$arrOption['value'].$this->imageExt;

            $arrOptions[] = sprintf(
                '<div class="visualradio"><input type="radio" name="%s" id="%s" value="%s"%s%s onfocus="Backend.getScrollOffset()"><label for="%s">%s</label></div>',
                $this->strName,
                $id,
                StringUtil::specialchars($arrOption['value'] ?? ''),
                $this->isChecked($arrOption),
                $this->getAttributes(),
                $id,
                Image::getHtml($image, $arrOption['value'])
            );
        }

        if (empty($arrOptions)) {
            $arrOptions[] = '<p class="tl_noopt">'.$GLOBALS['TL_LANG']['MSC']['noResult'].'</p>';
        }

        return sprintf(
            '<div class="visualradio-container%s" style="">%s</div>%s',
            ($this->strClass ? ' '.$this->strClass : ''),
            implode('', $arrOptions),
            $this->wizard
        );
    }
}
