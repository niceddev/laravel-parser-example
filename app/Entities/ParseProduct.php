<?php

namespace App\Entities;

class ParseProduct
{
    private string $name;
    private int $price;
    private string $image_url;
    private ?string $description;
    private string $brand;
    private int $category_id;
    private string $original_id;
    private int $service;

    /**
     * @param string $name
     * @param int $price
     * @param string $image_url
     * @param string $brand
     * @param int $category_id
     * @param string $original_id
     * @param int $service
     * @param string|null $description
     */
    public function __construct(string $name, int $price, string $image_url, string $brand, int $category_id, string $original_id, int $service, string $description = null)
    {
        $this->name = $name;
        $this->price = $price;
        $this->image_url = $image_url;
        $this->brand = $brand;
        $this->category_id = $category_id;
        $this->original_id = $original_id;
        $this->service = $service;
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param  string  $name
     * @return ParseProduct
     */
    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return int
     */
    public function getPrice(): int
    {
        return $this->price;
    }

    /**
     * @param  int  $price
     * @return ParseProduct
     */
    public function setPrice(int $price): self
    {
        $this->price = $price;
        return $this;
    }

    /**
     * @return string
     */
    public function getImageUrl(): string
    {
        return $this->image_url;
    }

    /**
     * @param  string  $image_url
     * @return ParseProduct
     */
    public function setImageUrl(string $image_url): self
    {
        $this->image_url = $image_url;
        return $this;
    }

    /**
     * @return int
     */
    public function getCategoryId(): int
    {
        return $this->category_id;
    }

    /**
     * @param  int  $category_id
     * @return ParseProduct
     */
    public function setCategoryId(int $category_id): self
    {
        $this->category_id = $category_id;
        return $this;
    }

    /**
     * @return int
     */
    public function getOriginalId(): int
    {
        return $this->original_id;
    }

    /**
     * @param int $original_id
     * @return ParseProduct
     */
    public function setOriginalId(int $original_id): self
    {
        $this->original_id = $original_id;
        return $this;
    }

    /**
     * @return int
     */
    public function getService(): int
    {
        return $this->service;
    }

    /**
     * @param int $service
     * @return ParseProduct
     */
    public function setService(int $service): self
    {
        $this->service = $service;
        return $this;
    }

    /**
     * @return string
     */
    public function getBrand(): string
    {
        return $this->brand;
    }

    /**
     * @param string $brand
     * @return ParseProduct
     */
    public function setBrand(string $brand): self
    {
        $this->brand = $brand;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param string|null $description
     * @return ParseProduct
     */
    public function setDescription(?string $description): self
    {
        $this->description = $description;
        return $this;
    }

    public function toArray()
    {
        return [
            'name'        => $this->name,
            'price'       => $this->price,
            'image_url'   => $this->image_url,
            'brand'       => $this->brand,
            'category_id' => $this->category_id,
            'original_id' => $this->original_id,
            'service'     => $this->service,
            'description' => $this->description
        ];
    }
}
