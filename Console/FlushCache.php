<?php
/**
 * @copyright Copyright (c) sbdevblog (https://www.sbdevblog.com)
 */

namespace SbDevBlog\Cache\Console;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use SbDevBlog\Cache\Services\InvalidateAndFlushCustomCache;
use SbDevBlog\Cache\Model\Cache\Type\SbDevBlogCache;

class FlushCache extends Command
{
    private const  CACHE_TYPES = SbDevBlogCache::TYPE_IDENTIFIER;
    /**
     * @var InvalidateAndFlushCustomCache
     */
    private InvalidateAndFlushCustomCache $invalidateAndFlushCustomCache;

    /**
     * Constructor
     *
     * @param InvalidateAndFlushCustomCache $invalidateAndFlushCustomCache
     * @param string|null $name
     */
    public function __construct(
        InvalidateAndFlushCustomCache $invalidateAndFlushCustomCache,
        string                        $name = null
    )
    {
        $this->invalidateAndFlushCustomCache = $invalidateAndFlushCustomCache;
        parent::__construct($name);
    }

    /**
     * Configure command
     *
     * @return void
     */
    protected function configure()
    {
        $this->setName("sbdevblog:flushcache")
            ->setDescription("Example to flush cache");
        parent::configure();
    }

    /**
     * Resetting index by key
     *
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return void
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->invalidateAndFlushCustomCache->flushCache(self::CACHE_TYPES);
        $output->writeln("Cache Flushed");
        $output->writeln(self::CACHE_TYPES);
    }
}
