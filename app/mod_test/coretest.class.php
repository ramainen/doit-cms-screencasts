<?php
function stuff_for_test()
{
	return 'result';
}

class CoreTest extends Test
{
	function test_coverage(){
		$this->assertCoverage('cms/cms.php');
		//����������
		d()->test_var='test value';
		$this->assertEquals(d()->test_var,'test value');
		$this->assertEquals(doit()->test_var,'test value');
		
		
		 
		
		$this->assertEquals(d()->url(),url());
		
		$this->assertEquals(d()->stuff_for_test(), 'result');
		$this->assertEquals(d()->render('stuff_for_test'), 'result');
		d()->stuff_for_test = 'another result';
		$this->assertEquals(d()->render('stuff_for_test'), 'another result');
		
		
		$dummy = new PDODummy();
		$this->assertEquals($dummy, $dummy->someUnusualFunc());
		
		$this->assertEquals(get_class(d()->SomeAnyStuff), 'SomeAnyStuff');
		
	}
	
	/*
	Issue #27
	���������������� ���������:

		{{helper client 'user' admin user => list }}
		� ���������
		{{helper d()->client, 'user', d()->admin,'user'=> d()->list }}
	
	*/
	function test_simple_syntaxis()
	{
	
		//������������� �����
		$this->assertEquals(d()->shablonize('{test}'),'<?php print  $doit->test; ?>');
		$this->assertEquals(d()->shablonize('{{test}}'),'<?php print $doit->call("test"); ?>');
		$this->assertEquals(d()->shablonize('{{test "user"}}'),'<?php print $doit->call("test",array(array("user"))); ?>');
		
		/*
		$this->assertEquals(d()->shablonize('{{test user admin les}}'),'<?php print $doit->call("test",array(array(user, admin,	 les))); ?>');
		*/
		
		
	}
}
 
?>