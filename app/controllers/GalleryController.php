<?php
     
      class GalleryController extends BaseController {
            public function index(){
            	$files = Upload::orderBy('updated_at','desc')->get();
                return View::make("gallery")
                    ->with('files', $files); // will find app/views/gallery.blade.php
            }


            public function upload(){

            	if (Input::hasFile('file'))
				{
    				$file = Input::file('file');
    				
    				$destinationPath = public_path('upload');

    				$extension = $file->getClientOriginalExtension();		
					$fileName = md5(time()) . "." . $extension;

    				$file->move($destinationPath, $fileName);

    				// Save to database
    				$obj = new Upload();
    				$obj->filename = '/upload/' . $fileName;
    				$obj->save();
				}	

				Session::flash('message','Upload success');
				return View::make("gallery");	
            }
      }