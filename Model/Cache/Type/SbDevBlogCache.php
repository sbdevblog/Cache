<?php

namespace SbDevBlog\Cache\Model\Cache\Type;

use Magento\Framework\App\Cache\Type\FrontendPool;
use Magento\Framework\Cache\Frontend\Decorator\TagScope;

class SbDevBlogCache extends TagScope
{
    /**
    * Cache type code unique among all cache types
    */
    const TYPE_IDENTIFIER = "sbdevblog_cache";

    /**
     * The tag name that limits the cache cleaning scope within a particular tag
     */
    const CACHE_TAG = "sbdevblog_cache_tag";

    /**
     * Constructor to initialize cache.
     *
     * @param FrontendPool $frontend
     * @param string $tag
     */
    public function __construct(FrontendPool $frontend)
    {
        parent::__construct($frontend->get(self::TYPE_IDENTIFIER), self::CACHE_TAG);
    }
}
