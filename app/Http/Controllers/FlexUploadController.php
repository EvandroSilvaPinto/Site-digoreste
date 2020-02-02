<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Gallery;


class FlexUploadController extends Controller
{
    private $entity;
    private $entityId;
    private $name;
    private $multiple;
    private $legend;
    private $credits;
    private $itemId;
    private $files;

    private $storage = "storage/";

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function get(Request $request)
    {
        try {
            $this->entity   = $request->input('entity');
            $this->entityId = $request->input('entityId');
            $this->name     = $request->input('name');
            $this->multiple = $request->input('multiple');

            if(empty($this->entity) 
                || empty($this->entityId) 
                || empty($this->name)
                || empty($this->multiple))
            {
                return  response('Não conseguimos recuperar os dados, verifique as configurações', 501);
            }

            if ($this->multiple == 'true') {                
                
                $data =  Gallery::where('entity', $this->entity)
                ->where('entity_id', $this->entityId)
                ->orderBy("gallery_id", "DESC")
                ->get();

                foreach ($data as $key => $value) {
                   $data[$key]->full_path = img_src($value->path,true);

                   $mime_content_type = explode("/", mime_content_type("storage/".$value->path));
                   $data[$key]->path  = ($mime_content_type[0] == 'image') ? img_src($value->path,300,250,true,true) : img_src($value->path,true);  
                   $data[$key]->id    = $value->gallery_id;                    
                }

                return $data;
                
            }else {
                
                $entity       = "App\Model\\".ucfirst($this->entity);
                $legend       = "{$this->name}_legend";
                $credits      = "{$this->name}_credits";
                $label        = "{$this->name}";
                $row          = $entity::find($this->entityId);
                $row->path    = (!empty($row->$label)) ? img_src($row->$label,true) : $row->$label;
                $row->id      = $this->entityId;
                $row->legend  = (isset($row->$legend)) ? $row->$legend : '';
                $row->credits = (isset($row->$credits)) ? $row->$credits : '';

                return $row;
            }
            
        } catch (Exception $e) {
           return response($e, 501);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        try {

            $this->files    = $request->file();
            $this->entity   = $request->input('entity');
            $this->entityId = $request->input('entityId');
            $this->name     = $request->input('name');
            $this->multiple = $request->input('multiple');

            if(empty($this->files) 
                || empty($this->entity) 
                || empty($this->entityId) 
                || empty($this->name)
                || empty($this->multiple))
            {
                return  response('Upload não autorizado, verifique as configurações', 501);
            }

            foreach ($this->files as $key => $value) {            

                if(!is_dir($this->storage.$this->entity."/".$this->entityId)) {
                    mkdir($this->storage.$this->entity."/".$this->entityId, 0777, true);
                }

                $file = uniqid().".".$value->getClientOriginalExtension();

                while (file_exists($this->storage.$this->entity."/".$this->entityId."/".$file)) {
                    $file = uniqid().".".$value->getClientOriginalExtension();
                }

                $this->files[$key]->newName =  $file;

                $value->move($this->storage.$this->entity."/".$this->entityId, $file);


                if ($this->multiple == 'true') {                
                    $gallery            = new Gallery();
                    $gallery->entity    = $this->entity;
                    $gallery->entity_id = $this->entityId;
                    $gallery->path      = $this->entity."/".$this->entityId."/".$file;
                    $gallery->save();
                    
                }else {
                    
                    $entity      = "App\Model\\".ucfirst($this->entity);
                    $label       = "{$this->name}";
                    $row         = $entity::find($this->entityId);

                    if(!empty($row->$label) && file_exists($this->storage.$row->$label))
                    {
                        unlink($this->storage.$row->$label);
                    }

                    $row->$label = $this->entity."/".$this->entityId."/".$file;
                    
                    $row->save();
                }
            }

            return response('Upload realizado com sucesso', 200);
            
        } catch (Exception $e) {
           return response($e, 501);
        }
    }
   

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        try {

            $this->entity   = $request->input('entity');
            $this->entityId = $request->input('entityId');
            $this->name     = $request->input('name');
            $this->multiple = $request->input('multiple');
            $this->legend   = $request->input('legend');
            $this->credits  = $request->input('credits');
            $this->itemId   = $request->input('itemId');

            if(empty($this->entity) 
                || empty($this->entityId) 
                || empty($this->name)
                || empty($this->multiple)
                || empty($this->itemId))
            {
                return  response('Edição não autorizada, verifique as configurações', 501);
            }

            if($this->multiple == 'true') {

                $gallery           =  Gallery::where('entity', $this->entity)
                ->where('entity_id', $this->entityId)
                ->find($this->itemId);

                $gallery->title    = $this->legend;
                $gallery->subtitle = $this->credits;
                $gallery->save();

            }else {

                $entity        = "App\Model\\".ucfirst($this->entity);
                $legend        = "{$this->name}_legend";
                $credits       = "{$this->name}_credits";
                $row           = $entity::find($this->entityId);
                
                @$row->$legend  = $this->legend;
                
                @$row->$credits = $this->credits;    
                
                $row->save();
            }

            return response('Edição realizada com sucesso', 200);

        } catch (Exception $e) {
           return response($e, 501);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        try {

            $this->entity   = $request->input('entity');
            $this->entityId = $request->input('entityId');
            $this->name     = $request->input('name');
            $this->multiple = $request->input('multiple');
            $this->itemId   = $request->input('itemId');

            if(empty($this->entity) 
                || empty($this->entityId) 
                || empty($this->name)
                || empty($this->multiple)
                || empty($this->itemId))
            {
                return  response('Exclusão não autorizada, verifique as configurações', 501);
            }

            if($this->multiple == 'true') {

                $gallery           =  Gallery::where('entity', $this->entity)
                ->where('entity_id', $this->entityId)
                ->find($this->itemId);

                if(!empty($gallery->path) && file_exists($this->storage.$gallery->path))
                {
                    unlink($this->storage.$gallery->path);
                }

                $gallery->delete();

            }else {

                $entity      = "App\Model\\".ucfirst($this->entity);
                $label       = "{$this->name}";
                $row         = $entity::find($this->entityId);

                if(!empty($row->$label) && file_exists($this->storage.$row->$label))
                {
                    unlink($this->storage.$row->$label);
                }

                $row->$label = '';
                $row->save();
            }

            return response('Exclusão realizada com sucesso', 200);

        } catch (Exception $e) {
           return response($e, 501);
        }
    }
}
