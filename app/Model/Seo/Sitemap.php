<?php

namespace App\Model\Seo;

use Illuminate\Database\Eloquent\Model;

class Sitemap extends Model
{
    protected function get()
    {
		$sitemap = Config('sitemap');
		$data    = array();

        foreach ($sitemap['static'] as $key => $value) {
            $item           = new \StdClass;
            $item->url      = url('/')."/".$value;
            $item->priority = 1;
            $data[]         = $item;
            unset($item);
        }

        foreach ($sitemap['dinamic'] as $key => $itens) {

            $class = 'App\\'.$itens["model"];

            if(class_exists($class,  $itens['method']))
            {
                foreach ($class::$itens['method']() as $key => $value) {
                    
                    $item           = new \StdClass;
                    
                    if (isset($value->categories)) {
                        $item->url  = route($itens['nickname'], array(str_slug(!empty($value->categories->title) ? $value->categories->title : "categoria"), str_slug($value->title."-".$value->id)));
                    } else {
                       $item->url   = route($itens['nickname'], str_slug($value->title."-".$value->id));
                    }                    
                    
                    $item->priority = 0.8;

                    if(isset($value->image) && !empty($value->image) && file_exists(asset($value->image)))
                    {
                        $item->image = img_src($value->image, true);
                    }
                    
                    $data[]         = $item;
                    unset($item);
                }
            }
        }      

        return $data;
    }
}
