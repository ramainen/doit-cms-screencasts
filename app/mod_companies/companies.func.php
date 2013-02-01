<?php



/**
* Контролер
*/
class CompaniesController
{


	/**
	* Список всех элементов
	*/	
	function index()
	{
		d()->companies_list = d()->Company;
		
		if(isset($_GET['s']) && $_GET['s']!=''){
			d()->companies_list->search('title','text',$_GET['s']);
		}
		
		if(isset($_GET['only_goverment']) && $_GET['only_goverment']=='1'){
			d()->companies_list->only('goverment');
			//is_goverment == 1
		}
		
		if(isset($_GET['with_image']) && $_GET['with_image']=='1'){
			d()->companies_list->where('image != ""');
		}
		
		if(isset($_GET['year_begin']) && $_GET['year_begin']!=''){
			d()->companies_list->where('year > ?',$_GET['year_begin']);
		}
		if(isset($_GET['year_end']) && $_GET['year_end']!=''){
			d()->companies_list->where('year < ?',$_GET['year_end']);
		}
		
		if(isset($_GET['station'])){
			$stations = array_keys($_GET['station']);
			d()->companies_list->where('station_id IN (?)', $stations);
		}
		
		if (isset($_GET['sort'])){
			d()->companies_list->order_by('year');
		}
		
		d()->companies_list->paginate(2);
		
		d()->paginator = d()->Paginator->bootstrap->generate(d()->companies_list);
		
		print d()->view();
	}


}

