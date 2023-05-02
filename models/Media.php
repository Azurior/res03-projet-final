<?php
/**
 * @author : Gaellan
 * @link : https://github.com/Gaellan
 */

class Media {
    private ?int $id;
    private string $name;
    private string $url;

    public function __construct(string $name, string $url)
    {
        $this->id = null;
        $this->name = $name;
        $this->url = $url;
    }

    public function getId() : ?int
    {
        return $this->id;
    }

    public function setId(?int $id) : void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @param string $url
     */
    public function setUrl(string $url): void
    {
        $this->url = $url;
    }
}