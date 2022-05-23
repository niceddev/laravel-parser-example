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
    private int $bought;
    private int $boughtJmart;
    private int $boughtMechta;
    private int $boughtTechnodom;
    private float $rating;
    private int $astana;
    private int $almaty;
    private int $shymkent;
    private int $karaganda;

    /**
     * @param string $name
     * @param int $price
     * @param string $image_url
     * @param string $brand
     * @param int $category_id
     * @param string $original_id
     * @param int $service
     * @param int $bought
     * @param int $boughtJmart
     * @param int $boughtMechta
     * @param int $boughtTechnodom
     * @param float $rating
     * @param int $astana
     * @param int $almaty
     * @param int $shymkent
     * @param int $karaganda
     * @param string|null $description
     */
    public function __construct(string $name, int $price, string $image_url, string $brand, int $category_id, string $original_id, int $service, int $bought, int $boughtJmart, int $boughtMechta, int $boughtTechnodom, float $rating, int $astana, int $almaty, int $shymkent, int $karaganda, string $description = null)
    {
        $this->name = $name;
        $this->price = $price;
        $this->image_url = $image_url;
        $this->brand = $brand;
        $this->category_id = $category_id;
        $this->original_id = $original_id;
        $this->service = $service;
        $this->bought = $bought;
        $this->boughtJmart = $boughtJmart;
        $this->boughtMechta = $boughtMechta;
        $this->boughtTechnodom = $boughtTechnodom;
        $this->rating = $rating;
        $this->astana = $astana;
        $this->almaty = $almaty;
        $this->shymkent = $shymkent;
        $this->karaganda = $karaganda;
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
     * @return int
     */
    public function getBought(): int
    {
        return $this->bought;
    }

    /**
     * @param int $bought
     * @return ParseProduct
     */
    public function setBought(int $bought): self
    {
        $this->bought = $bought;
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

    /**
     * @return int
     */
    public function getBoughtJmart(): int
    {
        return $this->boughtJmart;
    }

    /**
     * @param int $boughtJmart
     * @return ParseProduct
     */
    public function setBoughtJmart(int $boughtJmart): self
    {
        $this->boughtJmart = $boughtJmart;
        return $this;
    }

    /**
     * @return int
     */
    public function getBoughtMechta(): int
    {
        return $this->boughtMechta;
    }

    /**
     * @param int $boughtMechta
     * @return ParseProduct
     */
    public function setBoughtMechta(int $boughtMechta): self
    {
        $this->boughtMechta = $boughtMechta;
        return $this;
    }

    /**
     * @return int
     */
    public function getBoughtTechnodom(): int
    {
        return $this->boughtTechnodom;
    }

    /**
     * @param int $boughtTechnodom
     * @return ParseProduct
     */
    public function setBoughtTechnodom(int $boughtTechnodom): self
    {
        $this->boughtTechnodom = $boughtTechnodom;
        return $this;
    }

    /**
     * @return float
     */
    public function getRating(): float
    {
        return $this->rating;
    }

    /**
     * @param float $rating
     * @return ParseProduct
     */
    public function setRating(float $rating): self
    {
        $this->rating = $rating;
        return $this;
    }

    /**
     * @return int
     */
    public function getAstana(): int
    {
        return $this->astana;
    }

    /**
     * @param int $astana
     * @return ParseProduct
     */
    public function setAstana(int $astana): self
    {
        $this->astana = $astana;
        return $this;
    }

    /**
     * @return int
     */
    public function getAlmaty(): int
    {
        return $this->almaty;
    }

    /**
     * @param int $almaty
     * @return ParseProduct
     */
    public function setAlmaty(int $almaty): self
    {
        $this->almaty = $almaty;
        return $this;
    }

    /**
     * @return int
     */
    public function getShymkent(): int
    {
        return $this->shymkent;
    }

    /**
     * @param int $shymkent
     * @return ParseProduct
     */
    public function setShymkent(int $shymkent): self
    {
        $this->shymkent = $shymkent;
        return $this;
    }

    /**
     * @return int
     */
    public function getKaraganda(): int
    {
        return $this->karaganda;
    }

    /**
     * @param int $karaganda
     * @return ParseProduct
     */
    public function setKaraganda(int $karaganda): self
    {
        $this->karaganda = $karaganda;
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
            'bought'      => $this->bought,
            'boughtJmart' => $this->boughtJmart,
            'boughtMechta'=> $this->boughtMechta,
            'boughtTechnodom'=> $this->boughtTechnodom,
            'rating'      => $this->rating,
            'astana'      => $this->astana,
            'almaty'      => $this->almaty,
            'shymkent'    => $this->shymkent,
            'karaganda'   => $this->karaganda,
            'description' => $this->description
        ];
    }
}
