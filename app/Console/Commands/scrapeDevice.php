<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Device;
use Goutte\Client;
use GuzzleHttp\Client as GuzzleClient;
use DB;

class scrapeDevice extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'scrape:device';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $goutteClient = new Client();
        $guzzleClient = new GuzzleClient(array(
            'timeout' => 60,
        ));
        $goutteClient->setClient($guzzleClient);
        $crawler = $goutteClient->request('GET', 'https://www.thegioididong.com/phu-kien');
        $devices = $crawler->filter('.cate li')->each(function ($node) {
            $data = [
                'id' => $this->getId($node->filter('.botbtn')->attr('href')),
                'title' => $node->filter('a h3')->text(),
                'price' => $node->filter('a strong')->text(),
                'promotion' => $node->filter('a span')->text(),
                'discountpercent' => $node->filter('a label.discountpercent')->text(),
                'image' => $this->getImage($node)
            ];
                $device = Device::Create($data);
                print("thanh cong" . "\n");
        });
    }

    function getId($url){
        $arr = [];
        parse_str(parse_url($url, PHP_URL_QUERY), $arr);
        
        return $arr['productid'];
    }

    function getImage($node)
    {
        $urlImage = $node->filter('a img')->attr('src');
        if (filter_var($urlImage, FILTER_VALIDATE_URL)) {
            return $urlImage;
        } else {
            $urlImage = $node->filter('a img')->attr('data-original');
            return $urlImage;
        }
    }
}
