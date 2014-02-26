<?php
/**
 * © 2013-2015 GreekTurtle
 *
 * LICENSE:
 *
 * This file is part of GTMVC (http://www.greekturtle.com).
 *
 * The contents of this file cannot be copied, distributed or modified without prior
 * consent of the author. 
 *
 * Project : GTMVC
 * File :  
 * Description : GT MVC Framework Builder
 *
 * @author Pranjal Goswami <pranjal[at]weblength[dot]co[dot]in> 
 * 
 * BADesigns | GreekTurtle | Weblength Infonet Pvt. Ltd. 
 *
 * Created : Wed Feb 26 2014 12:44:31 GMT+0530 (India Standard Time)
 */
class CreateController extends GtmvcController{
	var $file;
	var $location_prefix;
	
	var $project_name;
	var $project_url;
	var $app_keyword;
	
	
	public function control()
	{
		$this->disableCaching();
		$this->view_mgr->force_compile = true;
		
		if(!isset($_POST['app_keyword']) || strlen($_POST['app_keyword'])==0) 
			return $this->throwError("APP Keyword not supplied");
		$app_keyword = str_replace(" ","_",strtoupper($_POST['app_keyword']));
		$this->app_keyword= $app_keyword;
		
		$this->location_prefix = "data/payload/".$app_keyword.'/';
		if(!is_dir($this->location_prefix)) $this->createDirectory($this->location_prefix);
		
		$this->project_name = $_POST['app_name'];
		$this->project_url = $_POST['app_url'];
		
		$this->createProject();
		return $this->generateView();
	}
	
	protected function openFile($filename, $type = "a") {
		$filename=$this->location_prefix.$filename;
        if (array_search($type, array('w', 'a')) < 0) {
            $type = 'w';
        }
        $filehandle = null;
        if (is_writable($filename) || is_writable(dirname($filename))) {
            $filehandle = fopen($filename, $type);// or die("can't open file $filename");
        } else {
            $this->throwError("Unable to write log file: " . $filename);
        }
        return $filehandle;
    }
	protected function output($message) {
        if (isset($this->file)) {
            return fwrite($this->file, $message);
        } else {
            echo $message.'
';
            @flush();
        }
    }
	
	protected function closeFile($filehandle) {
        if (isset($filehandle)) {
            return fclose($filehandle);
        }
    }
	
    protected function deleteFile($filename) {
        return unlink($filename);
    }
	public function createDirectory($path)
	{
		if(!is_dir($path))	return mkdir($path);
		return false;
	}
	public function throwError($error= "Missing Params in Throw-Error Call")
	{
		$prefix = "<strong>CreateCntroller says</strong>";
		$error = $prefix." : ".$error;
		$this->setViewTemplate('error.tpl');
		$this->addToView('error',$error);
		return $this->generateView();
	}
	public function make($file_name,$template)
	{
		if(file_exists($this->location_prefix.$file_name)) 
			$this->deleteFile($this->location_prefix.$file_name);
		if(file_exists("data/templates/".$template))
			$content = file_get_contents("data/templates/".$template);
		
		//preparing docblock
		$this->file = $this->openFile($file_name);
		$docblock = file_get_contents("data/templates/docblock.txt");
		$docblock = preg_replace("/#project_name#/",$this->project_name,$docblock);
		$docblock = preg_replace("/#project_url#/",$this->project_url,$docblock);
		$docblock = preg_replace("/#file_name#/",$file_name,$docblock);
		$docblock = preg_replace("/#full_time#/",date('r'),$docblock);
		
		$this->output($docblock.PHP_EOL);
		
		$content = preg_replace("/#project_name#/",$this->project_name,$content);
		$content = preg_replace("/#project_url#/",$this->project_url,$content);
		$content = preg_replace("/#file_name#/",$file_name,$content);
		$content = preg_replace("/#full_time#/",date('r'),$content);
		$content = preg_replace("/#app_keyword#/",$this->app_keyword,$content);
		$content = preg_replace("/#app_controller_keyword#/",ucwords(strtolower($this->app_keyword)),$content);
		
		$this->output($content);
	}
	
	public function createProject(){
		$this->createDirectory($this->location_prefix."_lib");
		$this->createDirectory($this->location_prefix."_lib/controller");
		$this->createDirectory($this->location_prefix."_lib/model");
		$this->createDirectory($this->location_prefix."_lib/view");
		echo copy(GTMVC_WEBAPP_ROOT."/data/templates/extlib",$this->location_prefix."_lib");
		$this->createDirectory($this->location_prefix."assets");
		$this->createDirectory($this->location_prefix."plugins");
		$this->createDirectory($this->location_prefix."data");
		$this->createDirectory($this->location_prefix."data/compiled_view");
		
		$this->make('_lib/init.php','init.php.txt');
		$this->make('_lib/class.ViewManager.php','class.ViewManager.php.txt');
		$this->make('_lib/class.Loader.php','class.Loader.php.txt');
		$this->make('_lib/class.Logger.php','class.Logger.php.txt');
		$this->make('_lib/class.DAOFactory.php','class.DAOFactory.php.txt');
		$this->make('_lib/class.Session.php','class.Session.php.txt');
		$this->make('_lib/class.SessionCache.php','class.SessionCache.php.txt');
		$this->make('_lib/class.Utils.php','class.Utils.php.txt');
		$this->make('_lib/app.config.php','app.config.php.txt');
		
		$this->make('_lib/controller/class.'.ucwords(strtolower($this->app_keyword)).'Controller.php','class.MainController.txt');
	}
}