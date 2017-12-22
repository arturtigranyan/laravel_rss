<?php

namespace App\Http\Controller;


use Illuminate\Routing\Controller as BaseController;
use App\Http\Requests;
use Feeds;
use App\Scrape;

class WebScrapperController extends BaseController{

    public function index(){
        $feed = Feeds::make('http://www.tert.am/am/news/rss');
        
        
        
        foreach ($feed->get_items() as $item){
            $data = [
                'title'       => $item->get_title(),
                'description' => $item->get_description(),
                'img_url'     => $item->get_enclosure()->link,
                'img_name'    => uniqid(),
                'url'         => $item->get_link(),
                'created_at'  => date('Y-m-d H:i:s', strtotime($item->get_date()))
            ];
            

            Scrape::create($data);
//            $scrape = new Scrape();
//            $scrape->create($data);
            dd($data);
        }      
        
        
        return view('scraper', ['items' => $feed->get_items()]);

    }
    
    public function edit($id){
        
        $model = Scrape::findById($id);
        return view('edit', ['model' => $model]);
        
        dd($id);
        
    }
    
    public function update($id){
        dd($id);
    }
    
    public function delete($id){
        dd($id);
    }        
    
}