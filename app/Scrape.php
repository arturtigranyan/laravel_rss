<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Scrape extends Model
{
    protected $table = 'scrapes';
    protected $connection = 'mysql';

    protected $fillable = ['title', 'description', 'image_url', 'image_name', 'url', 'created_at', 'updated_at'];


}
