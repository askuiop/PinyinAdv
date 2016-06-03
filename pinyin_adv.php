<?php
namespace pinyinadv;

class PinyinAdv {
	static $data;
	public function __construct(){
		parent::__construct();
	}
	static function get($hz,$first = false){
		//echo $hz;
		$hz = trim($hz);
		$len = strlen($hz);
		//echo 'length:'.$len.'<br>';
		if($len < 3) return $hz;
 		//echo '<p2>';
		if(empty(self::$data)){
			//echo '<read!>';
			$data = file_get_contents('./lib/pinyin_class.txt');
	
			preg_match_all('/([^:|]+):([a-z]+)/',$data,$hz_py);
			if(!empty($hz_py)){
				foreach ($hz_py[1] as $k=>$v){
					self::$data[$v] = $hz_py[2][$k];
				}
				
			}else{
				return false;
			}
			//print_r(self::$data);
		}else{
			;
		}
		$pinyin = '';
		$first_py = '';
		if(preg_match_all('/./u',$hz,$match)){
			//print_r($match);
			if(empty($match)){return false;}
			$match = $match[0];
			foreach($match as $m){
				if(isset(self::$data[$m])){
					$pinyin .= self::$data[$m];
					if($first){$first_py .= self::$data[$m][0];}
				}else{
					$pinyin .=$m;
				}
			}
		}else{
			return false;
		}
		return ($first)?$pinyin.'|'.$first_py:$pinyin;

		
	}
	
	
	
}