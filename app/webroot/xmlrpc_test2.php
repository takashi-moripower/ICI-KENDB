<?php 

// Include the XML-RPC class 
require_once(dirname(__FILE__) . '/../vendors/xmlrpc.php'); 
//require_once(dirname(__FILE__) . '/../vendors/IXR_Library.php'); 

// Set here your XML-RPF control url 
$url = 'http://localhost/api'; 

// Create the client object 
$client = new IXR_Client($url); 

$exec_test = array(
	'test_検索で応答フィールドを指定なし多重階層_ANDあり4',
	'test_検索で応答フィールドを指定なし多重階層_ANDあり3',
	'test_検索で応答フィールドを指定なし多重階層_ANDあり2',
	'test_データベースと検索するとそれ以外も返ってくるバグ',
	'test_該当項目なし',
	'test_ANDの位置がどこでも良いこと',
	'test_不正な結果がかえってくる問題',
	'test_東工大連携IDで横断検索',
	'test_ID指定し応答フィールド指定なし',
	'test_ID指定しデータ取得応答フィールド指定あり',
	'test_単純検索応答フィールド指定あり',
	'test_単純検索応答フィールド指定なし',
	'test_検索で応答フィールドを指定なし多重階層_ANDあり',
	'test_検索で応答フィールドを指定なし多重階層_NOTあり',
	'test_教員検索で応答フィールド指定なし多重階層',
	'test_検索で応答フィールド指定なし条件多階層ソート順指定件数指定なし',
	'test_検索で応答フィールド指定なし条件多階層ソート順指定件数指定あり',
	'test_データ件数取得API',
	'test_全APIのdescribeを取得する',
	'test_指定APIのdescribeを取得する',
	'test_存在しないメソッド呼び出し',
);

for($i=0; $i<count($exec_test); $i++) {
	eval($exec_test[$i]."();");
//	break;
}

function test_検索で応答フィールドを指定なし多重階層_ANDあり4() {
	global $client;
	$search_cond = array(
		"AND" => true,
		"ITEMS" => array(
			array(
				"PROPERTY" => "subject",
				"WORD" => "研究題目: [SS] テストデータ 2011|23年度",
				"STRICT" => false,
			),
			array(
				"OR" => true,
				"ITEMS" => array(
					array(
						"PROPERTY" => "model_name_id",
						"STRICT" => true,
						"WORD" => 1,
					),
					array(
						"PROPERTY" => "model_name_id",
						"STRICT" => true,
						"WORD" => 3,
					),
				),
			),
			array(
				"OR" => true,
				"ITEMS" => array(
					array(
						"PROPERTY" => "model_name_id",
						"STRICT" => true,
						"WORD" => 2,
					),
					array(
						"PROPERTY" => "model_name_id",
						"STRICT" => true,
						"WORD" => 10,
					),
				),
			),
		),
	);

	if (!$client->query('kendb.search', array(), 'Data', $search_cond, array())) { 
		echo('Something went wrong - '.$client->getErrorCode().' : '.$client->getErrorMessage()); 
		echo "\n";
	} else {
		echo "\n---\n"; 
		echo "検索で応答フィールドを指定しないテスト.多重階層\n";
		print_r($client->getResponse()); 
		echo "\n---\n"; 
	}
}

function test_検索で応答フィールドを指定なし多重階層_ANDあり3() {
	global $client;
	$search_cond = array(
		"AND" => true,
		"ITEMS" => array(
			array(
				"PROPERTY" => "job_title",
				"WORD" => "教授",
				"STRICT" => true,
			),
			array(
				"PROPERTY" => "researcher_name",
				"WORD" => "久堀",
			),
			array(
				"OR" => true,
				"ITEMS" => array(
					array(
						"PROPERTY" => "model_name_id",
					"	STRICT" => true,
						"WORD" => 1,
					),
					array(
						"PROPERTY" => "model_name_id",
						"STRICT" => true,
						"WORD" => 2,
					),
					"AND" => true,
					"ITEMS" => array(
						array(
							"PROPERTY" => "model_name_id",
							"STRICT" => true,
							"WORD" => 3,
						),
						array(
							"PROPERTY" => "model_name_id",
							"STRICT" => true,
							"WORD" => 4,
						),
					),
				),
			),
		),
	);

	if (!$client->query('kendb.search', array(), 'Data', $search_cond, array())) { 
		echo('Something went wrong - '.$client->getErrorCode().' : '.$client->getErrorMessage()); 
		echo "\n";
	} else {
		echo "\n---\n"; 
		echo "検索で応答フィールドを指定しないテスト.多重階層\n";
		print_r($client->getResponse()); 
		echo "\n---\n"; 
	}
}

function test_検索で応答フィールドを指定なし多重階層_ANDあり2() {
	global $client;
	$search_cond = array(
		"AND" => true,
		"ITEMS" => array(
			array(
				"PROPERTY" => "job_title",
				"WORD" => "教授",
				"STRICT" => true,
			),
			array(
				"PROPERTY" => "researcher_name",
				"WORD" => "久堀",
			),
			array(
				"OR" => true,
				"ITEMS" => array(
					array(
						"PROPERTY" => "model_name_id",
						"STRICT" => true,
						"WORD" => 1,
					),
					array(
						"PROPERTY" => "model_name_id",
						"STRICT" => true,
						"WORD" => 2,
					),
				),
			),
		),
	);

	if (!$client->query('kendb.search', array(), 'Data', $search_cond, array())) { 
		echo('Something went wrong - '.$client->getErrorCode().' : '.$client->getErrorMessage()); 
		echo "\n";
	} else {
		echo "\n---\n"; 
		echo "検索で応答フィールドを指定しないテスト.多重階層\n";
		print_r($client->getResponse()); 
		echo "\n---\n"; 
	}
}

function test_データベースと検索するとそれ以外も返ってくるバグ() {
	global $client;
	$search_cond = array(
		"PROPERTY" => "department",
		"WORD" => "大学院理工学研究科工学系",
		"STRICT" => false,
	);

	if (!$client->query('kendb.search', array(), 'Data', $search_cond, array())) { 
		echo('Something went wrong - '.$client->getErrorCode().' : '.$client->getErrorMessage()); 
		echo "\n";
	} else {
		echo "\n---\n"; 
		echo "戻りデータ\n";
		print_r($client->getResponse()); 
		echo "\n---\n"; 
	}
}

function test_該当項目なし() {
	global $client;
	$search_cond = array(
		"AND" => true,
		"ITEMS" => array(
			array(
				"PROPERTY" => "job_title",
				"WORD" => "ほげ教授",
				"STRICT" => true,
			),
			array(
				"PROPERTY" => "researcher_name",
				"WORD" => "久堀",
			),
		),
	);

	if (!$client->query('kendb.search', array(), 'Data', $search_cond, array())) { 
		echo('Something went wrong - '.$client->getErrorCode().' : '.$client->getErrorMessage()); 
		echo "\n";
	} else {
		echo "\n---\n"; 
		echo "該当項目なし\n";
		print_r($client->getResponse()); 
		echo "\n---\n"; 
	}
}
function test_ANDの位置がどこでも良いこと() {

	global $client;
	$search_cond = array(
		"AND" => true,
		"ITEMS" => array(
			array(
				"PROPERTY" => "job_title",
				"WORD" => "教授",
				"STRICT" => true,
			),
			array(
				"PROPERTY" => "researcher_name",
				"WORD" => "久堀",
			),
		),
	);
	$search_cond2 = array(
		"ITEMS" => array(
			array(
				"PROPERTY" => "job_title",
				"WORD" => "教授",
				"STRICT" => true,
			),
			array(
				"PROPERTY" => "researcher_name",
				"WORD" => "久堀",
			),
		),
		"AND" => true,
	);

	if (!$client->query('kendb.search', array(), 'Data', $search_cond, array())) { 
		echo('Something went wrong cond1 - '.$client->getErrorCode().' : '.$client->getErrorMessage()); 
		echo "\n";
	} 
	$res1 = $client->getResponse(); 

	if (!$client->query('kendb.search', array(), 'Data', $search_cond2, array())) { 
		echo('Something went wrong cond2 - '.$client->getErrorCode().' : '.$client->getErrorMessage()); 
		echo "\n";
	} 
	$res2 = $client->getResponse(); 

	if($res1 == $res2) {
		echo "どちらの順でも正しい\n";
	} else {
		die("引数の構造体の並び順で答えが異なる");
	}

}

function test_不正な結果がかえってくる問題() {
	global $client;
	$search_cond = array(
		"ITEMS" => array(
			array(
				// "NOT" => true,
				"WORD" => "教授",
				"STRICT" => true,
				"PROPERTY" => "job_title",
			),
			"AND" => true,	// ANDの位置を変更するとファイル下部のコメントの不明な応答が返ります
						// 共通APIのエラーでもなく、結果を返すわけでもないためなんらかの対処が必要です。
		),
	);
	$order = array("job_title");

	if (!$client->query('kendb.search', array(), 'Data', $search_cond, array(), $order, 0, 20)) {
		echo('Something went wrong - '.$client->getErrorCode().' : '.$client->getErrorMessage());
		echo "\n";
	} else {
		echo "\n---\n";
		echo "検索で応答フィールドを指定しないテスト.多重階層.並び順指定あり件数指定あり\n";
		print_r($client->getResponse());
		echo "\n---\n";
	}
}



////////////////////////////////////////////////////////////////////////////////////////
function test_東工大連携IDで横断検索() {
	global $client;
	if (!$client->query('kendb.get', array(), 'Researcher', array("000001618-7", "000001186-X", "000000000-7", "000000001-S"), array())) { 
		echo('Something went wrong - '.$client->getErrorCode().' : '.$client->getErrorMessage()); 
		echo "\n";
}	else {
		echo "\n---\n"; 
		echo "IDを複数指定し、東工大連携IDで横断検索するテスト\n";
		print_r($client->getResponse()); 
		echo "\n---\n"; 
	}
}

////////////////////////////////////////////////////////////////////////////////////////
function test_ID指定し応答フィールド指定なし() {
	global $client;
	if (!$client->query('kendb.get', array(), 'Data', array(2151,2152,2153,2154), array())) { 
		echo('Something went wrong - '.$client->getErrorCode().' : '.$client->getErrorMessage()); 
		echo "\n";
	} else {
		echo "\n---\n"; 
		echo "IDを複数指定し、応答フィールドはデフォルトとしたテスト\n";
		print_r($client->getResponse()); 
		echo "\n---\n"; 
	}
}

////////////////////////////////////////////////////////////////////////////////////////
function test_ID指定しデータ取得応答フィールド指定あり() {
	global $client;
	if (!$client->query('kendb.get', array(), 'Data', array(2151,2152,2153,2154), array('id', 'year', 'amount'))) { 
		echo('Something went wrong - '.$client->getErrorCode().' : '.$client->getErrorMessage()); 
		echo "\n";
	} else {
		echo "\n---\n"; 
		echo "IDを複数指定し、応答フィールドを指定したテスト\n";
		print_r($client->getResponse()); 
		echo "\n---\n"; 
	}
}

////////////////////////////////////////////////////////////////////////////////////////


function test_単純検索応答フィールド指定あり() {
	global $client;
	$search_cond = array(
		//"PROPERTY" => "job_title",
		"PROPERTY" => "job_title",
		"WORD" => "教授",
		"STRICT" => true,
	);
	if (!$client->query('kendb.search', array(), 'Data', $search_cond, array('id', 'year', 'amount'))) { 
		echo('Something went wrong - '.$client->getErrorCode().' : '.$client->getErrorMessage()); 
		echo "\n";
	} else {
		echo "\n---\n"; 
		echo "検索で応答フィールドを指定したテスト\n";
		print_r($client->getResponse()); 
		echo "\n---\n"; 
	}
}

function test_単純検索応答フィールド指定なし() {
	global $client;
	$search_cond = array(
		//"PROPERTY" => "job_title",
		"PROPERTY" => "job_title",
		"WORD" => "教授",
		"STRICT" => true,
	);
	if (!$client->query('kendb.search', array(), 'Data', $search_cond, array())) { 
		echo('Something went wrong - '.$client->getErrorCode().' : '.$client->getErrorMessage()); 
		echo "\n";
	} else {
		echo "\n---\n"; 
		echo "検索で応答フィールドを指定しないテスト\n";
		print_r($client->getResponse()); 
		echo "\n---\n"; 
	}
}

function test_検索で応答フィールドを指定なし多重階層_ANDあり() {
	global $client;
	$search_cond = array(
		"PROPERTY" => "job_title",
		"WORD" => "教授",
		"STRICT" => true,
	);
	$search_cond = array(
		"AND" => true,
		"ITEMS" => array(
			array(
				"PROPERTY" => "job_title",
				"WORD" => "教授",
				"STRICT" => true,
			),
			array(
				"PROPERTY" => "researcher_name",
				"WORD" => "久堀",
			),
		),
	);

	if (!$client->query('kendb.search', array(), 'Data', $search_cond, array())) { 
		echo('Something went wrong - '.$client->getErrorCode().' : '.$client->getErrorMessage()); 
		echo "\n";
	} else {
		echo "\n---\n"; 
		echo "検索で応答フィールドを指定しないテスト.多重階層\n";
		print_r($client->getResponse()); 
		echo "\n---\n"; 
	}
}

function test_検索で応答フィールドを指定なし多重階層_NOTあり() {
	global $client;
	$search_cond = array(
		"AND" => true,
		"ITEMS" => array(
			array(
				"PROPERTY" => "job_title",
				"WORD" => "教授",
				"STRICT" => true,
			),
			array(
				"NOT" => true,
				"PROPERTY" => "researcher_name",
				"WORD" => "久堀",
			),
		),
	);

	if (!$client->query('kendb.search', array(), 'Data', $search_cond, array())) { 
		echo('Something went wrong - '.$client->getErrorCode().' : '.$client->getErrorMessage()); 
		echo "\n";
	} else {
		echo "\n---\n"; 
		echo "検索で応答フィールドを指定しないテスト.多重階層\n";
		print_r($client->getResponse()); 
		echo "\n---\n"; 
	}
}

function test_教員検索で応答フィールド指定なし多重階層() {
	global $client;
	$search_cond = array(
		"AND" => true,
		"ITEMS" => array(
			array(
				"PROPERTY" => "year",
				"WORD" => 2009,
				"STRICT" => true,
			),
			array(
				"NOT" => true,
				"PROPERTY" => "researcher_name",
				"WORD" => "久堀",
			),
		),
	);

	if (!$client->query('kendb.search', array(), 'Data', $search_cond, array())) { 
		echo('Something went wrong - '.$client->getErrorCode().' : '.$client->getErrorMessage()); 
		echo "\n";
	} else {
		echo "\n---\n"; 
		echo "検索で応答フィールドを指定しないテスト.多重階層\n";
		print_r($client->getResponse()); 
		echo "\n---\n"; 
	}
}

function test_検索で応答フィールド指定なし条件多階層ソート順指定件数指定なし() {
	global $client;
	$search_cond = array(
		"AND" => true,
		"ITEMS" => array(
			array(
				"PROPERTY" => "year",
				"WORD" => 2009,
				"STRICT" => true,
			),
			array(
				"NOT" => true,
				"PROPERTY" => "researcher_name",
				"WORD" => "久堀",
			),
		),
	);
	$order = array("department desc", "id desc");

	if (!$client->query('kendb.search', array(), 'Data', $search_cond, array(), $order)) { 
		echo('Something went wrong - '.$client->getErrorCode().' : '.$client->getErrorMessage()); 
		echo "\n";
	} else {
		echo "\n---\n"; 
		echo "検索で応答フィールドを指定しないテスト.多重階層.並び順指定あり\n";
		print_r($client->getResponse()); 
		echo "\n---\n"; 
	}
}

function test_検索で応答フィールド指定なし条件多階層ソート順指定件数指定あり() {
	global $client;
	$search_cond = array(
		"AND" => true,
		"ITEMS" => array(
			array(
				"PROPERTY" => "year",
				"WORD" => 2009,
				"STRICT" => true,
			),
			array(
				"NOT" => true,
				"PROPERTY" => "researcher_name",
				"WORD" => "久堀",
			),
		),
	);
	$order = array("researcher_name desc", "id desc");

	if (!$client->query('kendb.search', array(), 'Data', $search_cond, array(), $order, 0, 20)) { 
		echo('Something went wrong - '.$client->getErrorCode().' : '.$client->getErrorMessage()); 
		echo "\n";
	} else {
		echo "\n---\n"; 
		echo "検索で応答フィールドを指定しないテスト.多重階層.並び順指定あり件数指定あり\n";
		print_r($client->getResponse()); 
		echo "\n---\n"; 
	}
}

function test_データ件数取得API() {
	global $client;
	$search_cond = array(
		"AND" => true,
		"ITEMS" => array(
			array(
				"PROPERTY" => "year",
				"WORD" => 2009,
				"STRICT" => true,
			),
			array(
				"NOT" => true,
				"PROPERTY" => "researcher_name",
				"WORD" => "高木",
			),
		),
	);

	if (!$client->query('kendb.count', array(), 'Data', $search_cond)) { 
		echo('Something went wrong - '.$client->getErrorCode().' : '.$client->getErrorMessage()); 
		echo "\n";
	} else {
		echo "\n---\n"; 
		echo "count()のテスト\n";
		print_r($client->getResponse()); 
		echo "\n---\n"; 
	}
}

////////////////////////////////////////////////////////////////////////////////////////
function test_全APIのdescribeを取得する() {
	global $client;
	if (!$client->query('kendb.describe', array())) { 
		echo('Something went wrong - '.$client->getErrorCode().' : '.$client->getErrorMessage()); 
		echo "\n";
	} else {
		echo "\n---\n"; 
		$con = ($client->getResponse()); 
		print_r($con);
		echo "\n---\n"; 
	}
}

function test_指定APIのdescribeを取得する() {
	global $client;
	if (!$client->query('kendb.describe', array(), array("0"))) { 
		echo('Something went wrong - '.$client->getErrorCode().' : '.$client->getErrorMessage()); 
		echo "\n";
	} else {
		echo "\n---\n"; 
		print_r($client->getResponse()); 
		echo "\n---\n"; 
	}
}

////////////////////////////////////////////////////////////////////////////////////////
function test_存在しないメソッド呼び出し() {
	global $client;
	if (!$client->query('kendb.describeeeeee', array())) { 
		echo('Something went wrong - '.$client->getErrorCode().' : '.$client->getErrorMessage()); 
		echo "\n";
	} else {
		echo "\n---\n"; 
		$con = ($client->getResponse()); 
		print_r($con);
		echo "\n---\n"; 
	}
}
?>
