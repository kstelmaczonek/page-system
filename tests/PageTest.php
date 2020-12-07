<?php

namespace App\Tests;

use App\Util\Calculator;
use PHPUnit\Framework\TestCase;
use App\Entity\PageArticle;
use App\Entity\PageStatic;

class PageTest extends TestCase
{
    public function testArticleProperties()
    {
        $article = new PageArticle();
        $article->setImage('fobar.png');
        $article->setTitle('fobar title');
        $article->setContent('Lorem ipsum dolor sit amet');
        
        $this->assertEquals($article->getImage(), 'fobar.png');
        $this->assertEquals($article->getTitle(), 'fobar title');
        $this->assertEquals($article->getContent(), 'Lorem ipsum dolor sit amet');
    }

    public function testStaticNoImage()
    {
        $this->assertFalse(method_exists(PageStatic::class, 'getImage'));
    }

    public function testStaticProperties()
    {
        $static = new PageStatic();
        $static->setContent('Lorem ipsum dolor sit amet');

        $this->assertEquals($static->getContent(), 'Lorem ipsum dolor sit amet');
    }
}