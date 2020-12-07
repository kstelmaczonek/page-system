<?php

namespace App\Entity;

use App\Repository\PageStaticRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PageStaticRepository::class)
 */
class PageStatic extends Page
{
}
