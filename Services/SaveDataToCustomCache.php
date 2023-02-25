<?php
/**
 * @copyright Copyright (c) sbdevblog (https://www.sbdevblog.com)
 */

namespace SbDevBlog\Cache\Services;

use Magento\Framework\App\CacheInterface;
use Magento\Framework\Serialize\SerializerInterface;
use SbDevBlog\Cache\Model\Cache\Type\SbDevBlogCache;
class SaveDataToCustomCache
{
    private const CACHE_LIFE_TIME = 86400;
    /**
     * @var CacheInterface
     */
    private CacheInterface $cache;

    /**
     * @var SerializerInterface
     */
    private SerializerInterface $serializer;

    public function __construct(
        CacheInterface $cache,
        SerializerInterface $serializer
    ){
        $this->cache = $cache;
        $this->serializer = $serializer;
    }

    /**
     * Save data to the cache
     *
     * @param array $data
     * @param int $cacheLifeTime
     * @return void
     */
    public function saveDataToCache(array $data = [], int $cacheLifeTime = 86400): void
    {
        $this->cache->save(
            $this->serializer->serialize($data),
            SbDevBlogCache::TYPE_IDENTIFIER,
            [SbDevBlogCache::CACHE_TAG],
            $cacheLifeTime
        );
    }

    /**
     * Get Data From Cache
     *
     * @return array|bool|float|int|string|null
     */
    public function getDataFromCache(): float|int|bool|array|string|null
    {
        if($this->cache->load(SbDevBlogCache::TYPE_IDENTIFIER)) {
           return $this->serializer->unserialize(
                $this->cache->load(SbDevBlogCache::TYPE_IDENTIFIER)
            );
        }
        return [];
    }
}
