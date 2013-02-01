<?php



/**
* Контролер
*/
class Company extends ActiveRecord
{



	function is_goverment_title()
	{
		if($this->get('is_goverment')){
			return 'Да';
		}
		return 'Нет';
	}
	
	function preview(){
		if($this->get('image')){
			return preview($this->get('image'));
		}
		return '/images/no.png';
	}



}

