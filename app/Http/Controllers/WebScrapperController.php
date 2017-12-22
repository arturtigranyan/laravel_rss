<?php

namespace App\Http\Controller;


use Illuminate\Routing\Controller as BaseController;
use App\Http\Requests;
use Feeds, Image, File;
use App\Scrape;


class WebScrapperController extends BaseController{

    public function index(){        
        
        $scrapers = Scrape::orderBy('updated_at', 'desc')->paginate(5);       
        
        return view('scraper', ['scrapers' => $scrapers]);

    }
    
    public function collect_rss(){
        
        $count = 0;
        $limit = 1000;
        
        Scrape::truncate();
        
        $feed = Feeds::make('http://www.tert.am/am/news/rss');
        $path = 'images/';
        
        foreach ($feed->get_items() as $item){
            
            if($count == $limit){
                return redirect('/');
            }
            $count++;
                
            $file = uniqid().'.jpg';
            $img = Image::make($item->get_enclosure()->link);
            
            $img->resize(200, 200)->save($path.$file);            
            $data = [
                'title'       => $item->get_title(),
                'description' => trim(strip_tags($item->get_description())),
                'image_url'     => $item->get_enclosure()->link,
                'image_name'    => $file,
                'url'         => $item->get_link(),
                'created_at'  => date('Y-m-d H:i:s', strtotime($item->get_date()))
            ];
            
            Scrape::create($data);            
            
            
        }      
            return redirect('/');
        
    }
    
    public function edit($id){
        
        $model = Scrape::find($id);
        
        return view('edit', ['model' => $model]);        
        
        
    }
    
    public function update($id){
        $data = request()->except('_token');
        $data['updated_at'] = date('Y-m-d H:i:s');
        Scrape::find($id)->update($data);
        return redirect('/');
    }
    
    public function delete($id){
        
        $scrape = Scrape::find($id);
        
        $path = 'images/'.$scrape->image_name;
        if(File::exists($path)){            
            File::delete($path);
        }
        $scrape->delete();
        
        return redirect('/');
    }        
    
}