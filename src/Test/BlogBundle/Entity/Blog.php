<?php

namespace Test\BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Test\BlogBundle\Entity\Blog
 *
 * @ORM\Table(name="blog")
 * @ORM\Entity
 */
class Blog
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string $title
     *
     * @ORM\Column(name="title", type="string", length=255, nullable=false)
     */
    private $title;


}