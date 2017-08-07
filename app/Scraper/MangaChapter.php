<?
namespace App\Scraper;

class MangaChapter
{
    private $url;

    public function __construct(string $url)
    {   
        $url = parse_url($url);
    }

    public function guardar()
    {
        $host = $this->url['host'];
    }
}