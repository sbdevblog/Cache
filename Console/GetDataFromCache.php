<?php
/**
 * @copyright Copyright (c) sbdevblog (https://www.sbdevblog.com)
 */

namespace SbDevBlog\Cache\Console;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use SbDevBlog\Cache\Services\SaveDataToCustomCache;
use Magento\Framework\Serialize\SerializerInterface;

class GetDataFromCache extends Command
{
    /**
     * @var SaveDataToCustomCache
     */
    private SaveDataToCustomCache $saveDataToCustomCache;

    /**
     * @var SerializerInterface
     */
    private SerializerInterface $serializer;

    public function __construct(
        SaveDataToCustomCache $saveDataToCustomCache,
        SerializerInterface $serializer,
        string         $name = null
    )
    {
        $this->saveDataToCustomCache = $saveDataToCustomCache;
        $this->serializer = $serializer;
        parent::__construct($name);
    }

    /**
     * Configure command
     *
     * @return void
     */
    protected function configure()
    {
        $this->setName("sbdevblog:getdatafromcache")
            ->setDescription("Get Data From the cache");
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
        $data = $this->saveDataToCustomCache->getDataFromCache();
        $output->writeln("Fetched Data From Cache ");
        $output->writeln($this->serializer->serialize($data));
    }
}
