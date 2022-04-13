<?php

namespace App\Entities;

class ParseProduct
{
    private string $name;
    private int $price;
    private string $image_url;
    private int $category_id;

    /**
     * @param  string  $name
     * @param  int  $price
     * @param  string  $image_url
     * @param  int  $category_id
     */
    public function __construct(string $name, int $price, string $image_url, int $category_id)
    {
        $this->name = $name;
        $this->price = $price;
        $this->image_url = $image_url;
        $this->category_id = $category_id;
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

    public function toArray()
    {
        return [
            'name'        => $this->name,
            'price'       => $this->price,
            'image_url'   => $this->image_url,
            'category_id' => $this->category_id
        ];
    }
}