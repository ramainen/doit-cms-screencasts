<?php



/**
* Контролер
*/
class PharmaciesController
{



	
	/**
	* Список всех элементов
	*/	
	function index()
	{
		d()->pharmacies_list = d()->Pharmacy;
		if(isset($_GET['s'])){
			d()->pharmacies_list->search('num','adress',$_GET['s']);
		}
		print d()->view();
	}



}

