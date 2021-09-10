<?php
declare(strict_types=1);

namespace App\Service;

use Knp\Bundle\MarkdownBundle\MarkdownParserInterface;
use Psr\Log\LoggerInterface;
use Symfony\Contracts\Cache\CacheInterface;

class MarkdownHelper
{
    private $markdownParser;
    private $cache;
    private $isDebug;
    private LoggerInterface $logger;

    public function __construct(MarkdownParserInterface $markdownParser,
                                CacheInterface $cache,
                                LoggerInterface $mdLogger,
                                bool $isDebug)
    {
        $this->markdownParser = $markdownParser;
        $this->cache = $cache;
        $this->isDebug = $isDebug;
        $this->logger = $mdLogger;
    }
    public function parse(string $source): string
    {
        if(stripos($source,'cat'))
        {
            $this->logger->info('Meow!');
        }
        if ($this->isDebug)
        {
            return $this->markdownParser->transformMarkdown($source);
        }
        return $this->cache->get('markdown_'.md5($source),function () use ($source)
        {
            return $this->markdownParser->transformMarkdown($source);
        }
        );
    }
}