<?php namespace PKleindienst\GithubProjects\Tests;

use PKleindienst\GithubProjects\Plugin;
use PluginTestCase;

class PluginTest extends PluginTestCase
{
    protected $plugin;

    public function setUp()
    {
        parent::setUp();
        $this->plugin = new Plugin($this->app);
    }

    public function testPluginDetails()
    {
        $details = $this->plugin->pluginDetails();
        $this->assertTrue(is_array($details));
        $this->assertCount(3, $details);
    }

    /**
     * @dependsOn testPluginDetails
     */
    public function testPluginDetailsKeys()
    {
        $details = $this->plugin->pluginDetails();
        $this->assertArrayHasKey('name', $details);
        $this->assertArrayHasKey('description', $details);
        $this->assertArrayHasKey('author', $details);
    }

    public function testRegisterComponents()
    {
        $components = $this->plugin->registerComponents();
        $this->assertTrue(is_array($components));
        $this->assertArrayHasKey('PKleindienst\GithubProjects\Components\Item', $components);
        $this->assertArrayHasKey('PKleindienst\GithubProjects\Components\RepoList', $components);
    }
    
    public function testRegisterMarkupTagsNotEmpty()
    {
        $tags = $this->plugin->registerMarkupTags();
        $this->assertTrue(is_array($tags));
        $this->assertArrayHasKey('filters', $tags);
        $this->assertArrayHasKey('_', $tags['filters']);
        $this->assertArrayHasKey('__', $tags['filters']);
    }
}
