<?php
namespace Aht\Featured\Model\featuredPro\Source;

use Magento\Framework\Data\OptionSourceInterface;

class IsFeatured implements OptionSourceInterface
{

    protected $featuredPro;

    public function __construct(\Aht\Featured\Model\featuredPro $featuredPro)
    {
        $this->featuredPro = $featuredPro;
    }

    public function toOptionArray()
    {
        $availableOptions = $this->featuredPro->getAvailableIsFeatured();
        $options = [];
        foreach ($availableOptions as $key => $value) {
            $options[] = [
                'label' => $value,
                'value' => $key,
            ];
        }
        return $options;
    }
}
