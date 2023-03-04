<?php
/**
 * @copyright Copyright (c) sbdevblog (https://www.sbdevblog.com)
 */

namespace SbDevBlog\Cache\Services;

use Magento\Framework\App\Cache\TypeListInterface;

class InvalidateAndFlushCustomCache
{
    /**
     * @var TypeListInterface
     */
    private TypeListInterface $typeList;

    public function __construct(
        TypeListInterface $typeList
    ){
        $this->typeList = $typeList;
    }

    /**
     * Invalidate cache
     *
     * @param array $type
     * @return void
     */
    public function invalidateCache(array $type):void
    {
        $this->typeList->invalidate($type);
    }

    /**
     * Flush cache by Type
     *
     * @param string $type
     * @return void
     */
    public function flushCache(string $type):void
    {
        $this->typeList->cleanType($type);
    }
}
