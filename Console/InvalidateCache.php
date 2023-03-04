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
use Magento\Eav\Model\Cache\Type;

class InvalidateCache extends Command
{
    private const  CACHE_TYPES = [
        SbDevBlogCache::TYPE_IDENTIFIER,
        Type::TYPE_IDENTIFIER
    ];

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
        $this->setName("sbdevblog:invalidatecache")
            ->setDescription("Example to invalidate cache");
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
        $this->invalidateAndFlushCustomCache->invalidateCache(self::CACHE_TYPES);
        $output->writeln("Following cache are invalidate");
        $output->writeln(implode(",", self::CACHE_TYPES));
    }
}
