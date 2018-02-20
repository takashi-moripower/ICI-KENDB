<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class KendbTestCase extends CakeTestCase
{

	var $dropTables = false;

	function login($controller, $user_id, $user_name)
	{
		$controller->Session->write("Auth.User", array(
			'id' => $user_id,
			'username' => $user_name,
			'displayname' => 'hoge',
			'admin' => 1,
			'role_id' => 1,
		));
	}

	/**
	 * 一覧ページのテーブルにtheadとtbodyが正しく指定されていること
	 *
	 * @param <type> $controller
	 * @param <type> $url
	 */
	function check_index_format($controller, $url)
	{
		Configure::write("debug", 0);
		$this->login($controller, 1, "test_user");
		$result = $this->testAction($url,
				array('return' => 'view', 'method' => 'get'));
		//var_dump($result);
		$this->assertPattern("/<thead>/", $result);
		$this->assertPattern("/<tbody>/", $result);
		$this->assertPattern("/<th width=\"60\" class=\"actions\">/", $result);
	}

	/**
	 * 数字の場合はクラスにnumが指定されていること
	 *
	 * @param <type> $controller
	 * @param <type> $url
	 */
	function check_number_format($controller, $url)
	{
		Configure::write("debug", 0);
		$this->login($controller, 1, "test_user");
		$result = $this->testAction($url,
				array('return' => 'view', 'method' => 'get'));
		// var_dump($result);
		$this->assertPattern("/<td class=\"num\">/", $result);
		// マイナスの数値チェック
		$this->assertPattern("/num minus/", $result);
	}

	/**
	 * 編集ページで教員検索できること
	 * 
	 * @param <type> $controller
	 * @param <type> $url
	 */
	function check_researcher_search($controller, $url)
	{
		$this->login($controller, 1, "test_user");
		$result = $this->testAction($url,
				array('return' => 'view', 'method' => 'get'));
		// 教員検索の検索結果エリアがあること
		$this->assertPattern("/<div id=\"r_search_result\"/", $result);
	}

	/**
	 * 過去履歴にページにアクセスできること、復元リンクがあることを確認
	 *
	 * @param <type> $controller
	 * @param <type> $url
	 */
	function check_history($controller, $url)
	{
		$this->login($controller, 1, "test_user");
		$result = $this->testAction($url,
				array('return' => 'view', 'method' => 'get'));
		// 教員検索の検索結果エリアがあること
		$this->assertPattern("/history_view/", $result);

		$url = str_replace("/view/", "/history_view/", $url);
		$result = $this->testAction($url, array('method' => 'get', 'return' => 'contents'));
		// var_dump($result);
		// 復元リンクの存在チェック
		$this->assertPattern("/restore\/1/", $result);
		// 値の変更チェック
		$this->assertPattern("/valuechanged/", $result);
	}

	/**
	 * コピー用のリンクがあること
	 *
	 * @param <type> $controller
	 * @param <type> $url
	 */
	function check_copyfunc_exists($controller, $url)
	{
		$this->login($controller, 1, "test_user");
		$result = $this->testAction($url,
				array('return' => 'view', 'method' => 'get'));
		// 教員検索の検索結果エリアがあること
		$this->assertPattern("/\/copy\/[0-9].*/", $result);
	}

}

App::import('Controller', 'Entrusts');

class TestEntrustsController extends EntrustsController
{

	var $dropTables = false;

	function redirect($url, $status = null, $exit = true)
	{
		$this->log($url . "にリダイレクトします", LOG_DEBUG);
		$this->redirectUrl = $url;
	}

}

App::import('Controller', 'EditStatuses');

class TestEditStatusesController extends EditStatusesController
{

	var $dropTables = false;

	function redirect($url, $status = null, $exit = true)
	{
		$this->redirectUrl = $url;
	}

}

App::import('Controller', 'NedoJstOthers');

class TestNedoJstOthersController extends NedoJstOthersController
{

//	var $autoRender = false;
	var $dropTables = false;

	function redirect($url, $status = null, $exit = true)
	{
		$this->redirectUrl = $url;
	}

}

App::import('Controller', 'Researchers');

class TestResearchersController extends ResearchersController
{

	// var $autoRender = false;
	var $dropTables = false;

	function redirect($url, $status = null, $exit = true)
	{
		$this->redirectUrl = $url;
	}

}

App::import('Controller', 'SelectableItems');

class TestSelectableItemsController extends SelectableItemsController
{

	// var $autoRender = false;
	var $dropTables = false;

	function redirect($url, $status = null, $exit = true)
	{
		$this->redirectUrl = $url;
	}

	function cakeError($return)
	{
		$this->error_status = $return;
	}

}

App::import('Controller', 'Users');

class TestUsersController extends UsersController
{

	// var $autoRender = false;
	var $dropTables = false;

	function redirect($url, $status = null, $exit = true)
	{
		$this->redirectUrl = $url;
	}

}

App::import('Controller', 'Roles');

class TestRolesController extends RolesController
{

	// var $autoRender = false;
	var $dropTables = false;

	function redirect($url, $status = null, $exit = true)
	{
		$this->redirectUrl = $url;
	}

}

App::import('Controller', 'Contracts');

class TestContractsController extends ContractsController
{

	var $dropTables = false;

	function redirect($url, $status = null, $exit = true)
	{
		$this->redirectUrl = $url;
	}

}

App::import('Controller', 'Grants');

class TestGrantsController extends GrantsController
{

	var $dropTables = false;

	function redirect($url, $status = null, $exit = true)
	{
		$this->redirectUrl = $url;
	}

}

App::import('Controller', 'Donations');

class TestDonationsController extends DonationsController
{

	var $dropTables = false;

	function redirect($url, $status = null, $exit = true)
	{
		$this->redirectUrl = $url;
	}

}

App::import('Controller', 'Encourages');

class TestEncouragesController extends EncouragesController
{

	var $dropTables = false;

	function redirect($url, $status = null, $exit = true)
	{
		$this->redirectUrl = $url;
	}

}

App::import('Controller', 'Obligations');

class TestObligationsController extends ObligationsController
{

	var $dropTables = false;

	function redirect($url, $status = null, $exit = true)
	{
		$this->redirectUrl = $url;
	}

}

App::import('Controller', 'Projects');

class TestProjectsController extends ProjectsController
{

	var $dropTables = false;

	function redirect($url, $status = null, $exit = true)
	{
		$this->redirectUrl = $url;
	}

}

App::import('Controller', 'OtherResearchGrants');

class TestOtherResearchGrantsController extends OtherResearchGrantsController
{

	var $dropTables = false;

	function redirect($url, $status = null, $exit = true)
	{
		$this->redirectUrl = $url;
	}

}

App::import('Controller', 'MhlwResearchGrants');

class TestMhlwResearchGrantsController extends MhlwResearchGrantsController
{

	var $dropTables = false;

	function redirect($url, $status = null, $exit = true)
	{
		$this->redirectUrl = $url;
	}

}

App::import('Controller', 'Adoptions');

class TestAdoptionsController extends AdoptionsController
{

	var $dropTables = false;

	function redirect($url, $status = null, $exit = true)
	{
		$this->redirectUrl = $url;
	}

}

App::import('Controller', 'AssessedContributions');

class TestAssessedContributionsController extends AssessedContributionsController
{

	var $dropTables = false;

	function redirect($url, $status = null, $exit = true)
	{
		$this->redirectUrl = $url;
	}

}

App::import('Controller', 'Information');

class TestInformationController extends InformationController
{

	var $dropTables = false;

	function redirect($url, $status = null, $exit = true)
	{
		$this->redirectUrl = $url;
	}

}

App::import('Controller', 'Summaries');

class TestSummariesController extends SummariesController
{
	var $dropTables = false;

	function redirect($url, $status = null, $exit = true)
	{
		$this->redirectUrl = $url;
	}
}

App::import('Controller', 'Api');
class TestApiController extends ApiController {
	var $dropTables = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

App::import('Model', 'NedoJstOther');
// データ保存の際にセッションに依存するのを排除するために利用する
class NedoJstOtherTest extends NedoJstOther {
	var $name = 'NedoJstOtherTest';
	var $useTable = 'nedo_jst_others';

	function setUserInfo() {
		$this->data["NedoJstOtherTest"]["created_by"] = "ryuzee";
		$this->data["NedoJstOtherTest"]["updated_by"] = "ryuzee";
		return true;
	}
}

App::import('Model', 'Summary');

?>
