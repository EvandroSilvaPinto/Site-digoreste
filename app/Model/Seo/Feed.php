<?php

namespace App\Model\Seo;

use Illuminate\Database\Eloquent\Model;

class Feed extends Model
{
    protected function get() {

		$feeds = Config('feed');		
		$data  = array();

        foreach ($feeds['feed'] as $key => $itens) {

            $class = 'App\\'.$itens["model"];

            if(method_exists($class,  $itens['method']))
            {
                foreach ($class::$itens['method']() as $key => $value) {;

                    $item             = new \StdClass;
                    $item->title      = (isset($value->title)) ? $value->title : "";                     
                    if (isset($value->categories)) {
                        $item->url  = route($itens['nickname'], array(str_slug(!empty($value->categories->title) ? $value->categories->title : "categoria"), str_slug($value->title."-".$value->id)));
                    } else {
                       $item->url   = route($itens['nickname'], str_slug($value->title."-".$value->id));
                    }     
                    $item->created_at = (isset($value->created_at)) ? date('d-m-Y H:i', strtotime($value->created_at)) : "";
                    $item->text       = (isset($value->text)) ? $value->text : "";
                    $item->image      = (isset($value->image)) ? img_src($value->image, true) : "";

                    if(!empty($item->image))
                    {
                        $info               = getimagesize($item->image);
                        $item->image_length = $info['bits'];
                        $item->image_type   = $info['mime'];
                    }

                    $data[]           = $item;
                    unset($item);
                }
            }
        }

        return $data;
    }
}
