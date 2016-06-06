<?php
namespace Askuiop\Pinyinadv;

class PinyinAdv {
	static $data;
	public function __construct(){
	}
	static function get($hz,$first = false){
		$hz = trim($hz);
		$len = strlen($hz);

		if($len < 3) return $hz;

		if(empty(self::$data)){
			$data = file_get_contents(__DIR__.'/../lib/pinyin_class.txt');
	
			preg_match_all('/([^:|]+):([a-z]+)/',$data,$hz_py);
			if(!empty($hz_py)){
				foreach ($hz_py[1] as $k=>$v){
					self::$data[$v] = $hz_py[2][$k];
				}
				
			}else{
				return false;
			}

		}else{
			;
		}
		$pinyin = '';
		$first_py = '';
		if(preg_match_all('/./u',$hz,$match)){
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