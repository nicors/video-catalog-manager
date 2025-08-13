<?php

namespace Tests\Unit\Domain\Entity;

use Core\Domain\Entity\Category;
use PHPUnit\Framework\TestCase;

class CategoryUnitTest extends TestCase
{
    public function testAttributes()
    {
        $category = new Category(
            id: '123546',
            name: 'Test Category',
            description: 'This is a test category',
            isActive: true,
        );

        $this->assertEquals('Test Category', $category->name);
        $this->assertEquals('This is a test category', $category->description);
        $this->assertEquals(true, $category->isActive);
    }

    public function testActivated()
    {
        $category = new Category(
            name: 'Test Category',
            isActive: false
        );

        $this->assertFalse($category->isActive);
        $category->activate();
        $this->assertTrue($category->isActive);
    }

    public function testDisabled()
    {
        $category = new Category(
            name: 'Test Category',
            isActive: true
        );

        $this->assertTrue($category->isActive);
        $category->disable();
        $this->assertFalse($category->isActive);
    }

    public function testCategoryUpdate()
    {
        $uuid = 'uuid-123456';
        $category = new Category(
            id: $uuid,
            name: 'Fake category',
            description: 'Initial Description',
            isActive: true
        );

        $category->update(
            name: 'Updated Name',
            description: 'Updated Description'
        );

        $this->assertEquals('Updated Name', $category->name);
        $this->assertEquals('Updated Description', $category->description);
    }
}
