<?php

namespace Chrisgeary92\Pagespeed;

class Response
{
    /**
     * PageSpeed API response data
     *
     * @var array
     */
    protected $attributes;

    /**
     * Create a new PageSpeed response
     *
     * @param array $attributes
     */
    public function __construct(array $attributes)
    {
        $this->attributes = $attributes;
    }

    /**
     * Return API response from PageSpeed Service
     *
     * @return array
     */
    public function getAttributes()
    {
        return $this->attributes;
    }

    /**
     * Allow public access of $attribute properties
     *
     * @param string $attribute
     * @return mixed
     */ 
    public function __get($attribute)
    {
        if (array_key_exists($attribute, $this->attributes)) {
            return $this->attributes[$attribute];
        }
    }

    /**
     * Convert $attributes to JSON if cast to a string
     *
     * @return string
     */
    public function __toString()
    {
        return json_encode($this->attributes);
    }

    /**
     * Return only the $attributes for var_dump()
     *
     * @return array
     */
    public function __debugInfo()
    {
        return $this->getAttributes();
    }
}
