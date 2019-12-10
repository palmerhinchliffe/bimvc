<?php

namespace Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="blogs")
 */
class Blog
{
    /** 
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    protected $id;

    public function getId()
    {
        return $this->id;
    }

    /** 
     * @ORM\Title
     * @ORM\Column(type="string")
     */
    protected $title;

    public function getTitle()
    {
        return $this->title;
    }
}