<?php

namespace backend\components;

use yii\base\Component;
use yii\base\ErrorHandler;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */



/**
 * Description of Git
 *
 * @author SINCE
 */
class Git extends Component {
   
    
    public $cmd='git';
    
    protected $_path;
    
    
    protected $_authorEmail;
    protected $_time;
    protected $_subject;
    protected $_message;
    protected $_notes;
    protected $_authorName;
    /**
    * Constructor.
    * @param string $path the path to the repository folder
    * @param boolean $createIfEmpty whether to create the repository folder if it doesn't exist
    * @param boolean $initialize whether to initialize git when creating a new repository
    */
    public function __construct($path=null,$createifempty=false, $initialize =false) {
        $this->setPath($path, $createifempty, $initialize);
    }
    
    public function setPath($path=null,$createifempty=false, $initialize =false){
        
        if(!($realPath=  realpath($path))){
            if(!$createifempty){
                //
            }
            mkdir($path);
            $realPath=  realpath($path);
        }
        
        $this->_path =$realPath;
        
        if(!file_exists($realPath."./git")){
            if($initialize){
                $this->initialize();
            }else{
               // 
            }
        } 
    }
    
    /**
    * Gets the path to the git repository folder
    * @return string the path to the git repository folder
    */
    public function getPath(){
        return $this->_path;
    }
    
    
    /**
    * Initializes git
    * @return string the response from git
    */
    public function initialize(){
        return $this->run(init);
        
    }
    
    public function testrun($command){
        $command=  trim($command);
        
        $status=1;
        $log = ''; 
        echo $this->cmd ." ". $command;
        exit;
        exec($this->cmd ." ". $command,$log , $status);
        
        var_dump($log);
        exit;
        return $status;
    }
    public function testcommand(){
        $command=' log ';
        $repo=$this->run($command);
        var_dump($repo);
    }
    public function run($command){
        $descriptor =[
            1=>['pipe','w'],
            2=>['pipe','w']
        ];
        $pipes=[];
       
        $resource= proc_open($this->cmd ." " . $command, $descriptor, $pipes, $this->getPath());
        //echo $this->cmd ." " . $command;
         
        $stdout = stream_get_contents($pipes[1]);
        $stderr = stream_get_contents($pipes[2]);
        foreach($pipes as $pipe){
            fclose($pipe);
        }
        if(trim(proc_close($resource)) && $stderr){
            return "git  grammar  is error"; 
            //throw new errorHandler($stderr);
        }   
        return trim($stdout);
    } 
    public function setQuotepath(){
        $this->run("config --global core.quotepath false");
    }
    
    
    /**
     * 
     */
    public function status(){
 
       
    }
    
    /**
     * 获取的某段数据内分支的hash值包括(hash source_hash  source_branch committer_name committer_email commiter_date)
     * @param type $begin
     * @param type $end
     * @param type $autho="xinting.zhang\|zhijie.ouyang"
     * @return boolean
     * @author K.ouyang
     */
    public function getHash($begin=null,$end=null,$author=null,$n=null,$param=null){
        
        $files=[];
        $this->setQuotepath();
        $delimiter="|=====|";
        if($begin<>null && $end<>null ){
           $command = ' log --after=" '.$begin.' "  --before="'.$end.' "  --author="'.$author.'" --pretty=format:"%H'.$delimiter.'%p'.$delimiter.'%f'.$delimiter.'%cn'.$delimiter.'%ce'.$delimiter.'%cd" ' ;
            
        }elseif($n!=null && !$author=null){
            //获取最新hash值
           $command = ' log -"'.$n.'" --author="'.$author.'" --pretty=format:"%H'.$delimiter.'%p'.$delimiter.'%f'.$delimiter.'%cn'.$delimiter.'%ce'.$delimiter.'%cd" ' ;
        }elseif($n!=null){
            //获取最新hash值
           $command = ' log -"'.$n.'" --author="'.$author.'" --pretty=format:"%H'.$delimiter.'%p'.$delimiter.'%f'.$delimiter.'%cn'.$delimiter.'%ce'.$delimiter.'%cd" ' ;
        }else{
           $command = ' log '.$param.' --pretty=format:"%H'.$delimiter.'%p'.$delimiter.'%f'.$delimiter.'%cn'.$delimiter.'%ce'.$delimiter.'%cd" ' ;
        }

        $response = $this->run($command);
       
        if(empty($response)){
            return false;
        }
        $parts = explode("\n",$response);
        foreach ($parts as $part){
            $files[]=explode($delimiter,$part);
        }
        return $files;
    }
    public function getlogspc($begin=null,$end=null,$tag=null){
        
        $files=[];
        // $this->setQuotepath();
        $delimiter="|=====|";
        $delimit="|+++++|";
        if($begin==null && $end=null){
            $begin=date("Y-m-d",strtotime('-10 day'));
            $end=date("Y-m-d");
        }
        
        $command=' log --after=" '.$begin.' "  --before="'.$end.' " --branches=Dev --pretty=format:"%H'.$delimiter.'%ai'.$delimiter.'%B'.$delimiter.'%s'.$delimiter.'%f'.$delimit;
        
        $response = $this->run($command);
        
        
        if(empty($response)){
            return false;
        }
        $parts = explode("$delimit",$response);
        
        $i=1;
        foreach ($parts as $part){
            $data=explode($delimiter,$part);
            $files[]=[
                'hash'=>$data[0]?$data[0]:null,
                'starttime'=>!empty($data[1])?$data[1]:null,
                'commit'=>!empty($data[2])?$i.": ".explode("\n",$data[2])[0]:null,
                'merge'=>!empty($data[3])?$data[3]:null,
                'tag'=>$tag
            ];
            $i++;
            
        }
        array_pop($files);
        return $files;
    }
    
    public function getlogs($begin=null,$end=null,$tag=null){
              
        $files=[];
       // $this->setQuotepath();
        $delimiter="|=====|";
        $delimit="|+++++|";
        if($begin==null && $end=null){
            $begin=date("Y-m-d",strtotime('-10 day'));
            $end=date("Y-m-d");
        }
        
        $command=' log --after=" '.$begin.' "  --before="'.$end.' " --first-parent --pretty=format:"%H'.$delimiter.'%ai'.$delimiter.'%b'.$delimiter.'%f'.$delimit;
     
        $response = $this->run($command);
        
        
        if(empty($response)){
            return false;
        }
        $parts = explode("$delimit",$response);
        
        $i=1;
        foreach ($parts as $part){
            $data=explode($delimiter,$part);
            $files[]=[
                'hash'=>$data[0]?$data[0]:null,
                'starttime'=>!empty($data[1])?$data[1]:null,
                'commit'=>!empty($data[2])?$i.": ".explode("\n",$data[2])[0]:null,
                'merge'=>!empty($data[3])?$data[3]:null,
                'tag'=>$tag
            ];
            $i++;
             
        }
        array_pop($files);
        return $files;
    }
    
    /**
     * 通过hash值获取版本hash的body
     * @param type $hash
     * @return type
     * @author K.ouyang
     */
    public function gethashBody($hash=null){
        $delimiter="|=====|";
        //$command='show --pretty=format:"%H '.$delimiter.'%B'.$delimiter.'%s"  --name-only  '. $hash;
        
        $command='show --pretty=format:"%B'.$delimiter.'%s"  --name-only  '. $hash;
        $response=$this->run($command);
 
        //$parts = explode($delimiter,$response);
        
        return  $response;
    }
    
    public function getCommitDiffFile($oldhash=null,$newhash=null,$difffilter='add'){
        
        if($oldhash==null || $newhash==null){
            return false;
        }
        $command=' diff  --name-only '.$oldhash.'  '.$newhash.'  --diff-filter=' .$difffilter;
        // echo $command;exit;
        // $commands=' archive -o  /e/servicezipfile/'.$name.'.zip '.$newhash.' $(git '.$command.')';
        $response=$this->run($command);
         
        $files=  explode("\n", $response);
        return $files;
        
    }
    
    public function getDiffFileZip($pathName=null,$oldhash=null,$newhash=null,$difffilter='add'){
        if($oldhash==null || $newhash==null){
            return false;
        }
        // echo $command;exit;
        $command=' diff  --name-only '.$oldhash.'  '.$newhash.'  --diff-filter=' .$difffilter;
        $commands='git archive -o  '.$pathName.'  '.$newhash.' $(git '.$command.')';
      
        
        return $commands;
    }
    
}
