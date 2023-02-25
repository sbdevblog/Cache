<?php
/**
 * @copyright Copyright (c) sbdevblog (https://www.sbdevblog.com)
 */

namespace SbDevBlog\Cache\Console;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use SbDevBlog\Cache\Services\SaveDataToCustomCache;

class SaveDataToCache extends Command
{
    /**
     * @var SaveDataToCustomCache
     */
    private SaveDataToCustomCache $saveDataToCustomCache;

    public function __construct(
        SaveDataToCustomCache $saveDataToCustomCache,
        string         $name = null
    )
    {
        $this->saveDataToCustomCache = $saveDataToCustomCache;
        parent::__construct($name);
    }

    /**
     * Configure command
     *
     * @return void
     */
    protected function configure()
    {
        $this->setName("sbdevblog:savedatacache")
            ->setDescription("Save Data to the cache");
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
        $data = [
            "topic" => "Save and Get Data From Cache",
            "module" => "SbDevBlog",
            "website" => "https://sbdevblog.com"
        ];

        $this->saveDataToCustomCache->saveDataToCache($data);
        $output->writeln("Saved data to the cache ");
    }
}
