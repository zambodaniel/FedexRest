<?php

namespace FedexRest\Services\Ship\Entity;

class CustomsClearanceDetail
{

    /**
     * @var Commodity[]
     */
    protected array $commodities;

    public function getCommodities(): array
    {
        return $this->commodities;
    }

    /**
     * @param Commodity[] $commodities
     * @return $this
     */
    public function setCommodities(array $commodities): CustomsClearanceDetail
    {
        $this->commodities = $commodities;
        return $this;
    }

    public function prepare(): array
    {
        $data = [];
        if (!empty($this->commodities)) {
            foreach ($this->commodities as $commodity) {
                $data['commodities'][] = $commodity->prepare();
            }
        }
        return $data;
    }
}