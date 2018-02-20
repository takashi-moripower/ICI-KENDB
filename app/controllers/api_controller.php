<?php

/**
 * KenDB
 *
 * PHP versions 5
 *
 * @category  None
 * @package   Kendb
 * @author	ryuzee <ryuzee@i-c-i.jp>
 * @copyright 2010 Tokyo Institute of Technology
 * @license   private http://www.titech.ac.jp/
 * @link	  none
 */

/**
 * ApiController
 *
 * XML-RPCサービスプロバイダ
 *
 * @category  None
 * @package   Kendb
 * @author	ryuzee <ryuzee@i-c-i.jp>
 * @copyright 2010 Tokyo Institute of Technology
 * @license   http://www.titech.ac.jp Private
 * @link	  None
 */
// Import the app/vendor/xmlrpc.php library 
App::import('Vendor', 'xmlrpc');

class ApiController extends AppController
{

	/**
	 * 利用するモデル
	 *
	 * @var array
	 */
	var $uses = array("Api", "Summary");
	const API_VERSION = "1.1.0";

	/**
	 * XMLRPCオブジェクト
	 *
	 * @var null
	 */
	var $server = null;

	/**
	 * 応答結果のスケルトン
	 *
	 * @var array
	 */
	var $result_skelton = array();

	/**
	 * アクセスを許可するIPアドレス
	 */
	var $allowed_ip = array(
		"124.155.58.52",		// 2017-08-02 for MP
		"131.112.245.8",
		"131.112.245.13",
		"131.112.245.10",
                "131.112.10.160",		
		"131.112.10.239",		// 2017-04-18
		"172.20.23.20",
		"172.20.23.21",
		"172.20.23.22",
		"172.20.23.23",
		"172.20.23.30",
		"172.20.23.31",
		"172.20.23.32",
		"172.20.23.33",
		"172.20.23.60",
		"172.20.23.61",
		"192.168.1.60",
		"192.168.1.61",
	);

	var $valid_DataType = array(
		"Researcher", "Data"
	);

	/**
	 * beforeFilter
	 *
	 * @return None
	 */
	function beforeFilter()
	{
		parent::beforeFilter();
		$this->Auth->allow('*');
	}

	/**
	 * XML-RPC応答処理
	 *
	 * @return None
	 */
	function index()
	{
		$ip = isset($_SERVER["REMOTE_ADDR"])? $_SERVER["REMOTE_ADDR"] : null;
		if (Configure::read('debug') == 0) {
			$canAccess = false;
			foreach($this->allowed_ip as $aip) {
				if ($aip === $ip) {
					$canAccess = true;
				}
			}
			if(!$canAccess) {
				return $this->cakeError("error404");
			}
		}

		// デバッグモード無効
		Configure::write('debug', 0);

		// エラーが画面に出力されないように抑止
		error_reporting(0);

		// Avoids render() call 
		$this->autoRender = false;

		$this->result_skelton = array(
			'Version' => self::API_VERSION,
			'MaxCacheTime' => 86400,
			'Result' => null,
		);

		$callbacks = array();
		$callbacks['kendb.search'] = array(&$this, '_search');
		$callbacks['kendb.count'] = array(&$this, '_count');
		$callbacks['kendb.get'] = array(&$this, '_get');
		$callbacks['kendb.describe'] = array(&$this, '_describe');

		$this->server = new IXR_Server($callbacks);
	}

	/**
	 * 検索する
	 *
	 * @param array  $authinfo		認証情報(未使用)
	 * @param string $datatype		データ種別
	 * @param array  $searchCondition 検索条件
	 * @param array  $targetAttribute 応答フィールド
	 * @param array  $sortCondition   ソート条件
	 * @param int	$start		   開始レコード位置
	 * @param int	$limit		   取得レコード件数
	 *
	 * @return array
	 */
	function _search($authinfo, $datatype, $searchCondition, $targetAttribute = array(), $sortCondition = array(), $start = null, $limit = null)
	{
		if (!$this->_checkDataType($datatype)) {
			return new IXR_Error(-32001,'Invalid parameter error. please confirm your request'); 
		}

		if ($datatype == "Researcher") {
			return $this->result_skelton;
		}

		$rec = $this->Summary->findAllForApi($searchCondition, $targetAttribute, $sortCondition, $start, $limit);

		if($rec === false) {
			return new IXR_Error(-32001,'Invalid parameter error. please confirm your request'); 
		}

		$this->result_skelton["Result"] = $rec;
		return $this->result_skelton;
	}

	/**
	 * 件数を取得する
	 *
	 * @param array  $authinfo		認証情報(未使用)
	 * @param string $datatype		データ種別
	 * @param array  $searchCondition 検索条件
	 *
	 * @return int
	 */
	function _count($authinfo, $datatype, $searchCondition)
	{
		if (!$this->_checkDataType($datatype)) {
			return new IXR_Error(-32001,'Invalid parameter error. please confirm your request'); 
		}

		if ($datatype == "Researcher") {
			return 0;
		}

		$count = $this->Summary->countAllForApi($searchCondition);

		if(!$count) {
			return 0;
		} else {
			return $count;
		}
	}

	/**
	 * データを取得する
	 *
	 * @param array  $authinfo		認証情報(未使用)
	 * @param string $datatype		応答するデータ種別
	 * @param array  $targetIdSet	 検索対象のID
	 * @param array  $targetAttribute 応答するフィールド
	 *
	 * @return array
	 */
	function _get($authinfo, $datatype, $targetIdSet = array(), $targetAttribute = array())
	{
		if (!is_array($targetIdSet) || count($targetIdSet) == 0) {
			return new IXR_Error(-32001,'Invalid parameter error. please confirm your request'); 
		}

		if (!$this->_checkDataType($datatype)) {
			return new IXR_Error(-32001,'Invalid parameter error. please confirm your request'); 
		}

		// 教員を指定した場合のみ特殊検索
		if ($datatype == "Researcher") {
			$return_array = $this->Summary->findAllForApiByCooperateNo($targetIdSet, $targetAttribute);
			$this->result_skelton["Result"] = $return_array;
			return $this->result_skelton;
		}

		$condition = array();
		foreach ($targetIdSet as $id) {
			if (is_numeric($id)) {
				$condition[] = $id;
			}
		}
		if (count($condition) == 0) {
			return $this->result_skelton;
		}
		$return_array = $this->Summary->findAllForApiById($condition);

		$this->result_skelton["Result"] = $return_array;
		return $this->result_skelton;
	}

	/**
	 * 利用方法を応答する
	 *
	 * @param array $authinfo 認証情報(未使用)
	 * @param array $target   取得するデータ種別の配列。未設定の場合全てを返す
	 *
	 * @return array
	 */
	function _describe($authinfo, $target = array())
	{
		$return = array();

		$datatype_array = array("Data" => "Data", "Researcher" => "Researcher");

		foreach ($datatype_array as $k => $v) {
			$dataType = (String)$k;

			if(!empty ($target) && is_array($target)) {
				if(!in_array($dataType, $target)) {
					continue;
				}
			}

			// 応答可能なメソッド
			$method = array("search", "count", "get");

			// IDフィールド
			$id_property = "id";

			// デフォルトのリミット
			$default_limit = Summary::DEFAULT_LIMIT;
			$maximum_limit = Summary::MAXIMUM_LIMIT;

			// サポートしている機能
			$supported_function = array("AND", "OR", "NOT", "NEST");

			// 応答可能なフィールド
			$columns = $this->Summary->columns;
			
			// プロパティ
			$property = $this->Summary->makeResponseProperty();

			// ソート可能なフィールド
			$sort_target = array();
			foreach($columns as $kk => $vv) {
				if(strcmp($vv, "is_project_record") !== 0) {
					$sort_target[] = $vv;
				}
			}
			$default_sort_field = $sort_target;

			// 検索可能なフィールド
			$search_target = array();
			foreach($columns as $kk => $vv) {
				if(!is_null($vv) && strcmp($vv, "is_project_record") !== 0) {
					$index = count($search_target);
					$search_target[$index]["Property"] = $vv;
					$search_target[$index]["SearchType"] = "Word";
					$desc = @$this->Api->column_description[$vv];
					$search_target[$index]["Description"] = $desc;
				}
			}

			// 教員検索の場合GETしか出来ないので無効にする
			if ($dataType === "Researcher") {
				$search_target = null;
				$id_property = "cooperate_no";
				$supported_function = null;
				$method = array("get");
				$default_sort_field = null;
				$default_limit = null;
				$maximum_limit = null;
				$columns = $this->Summary->columns;
				$property = $this->Summary->makeResponseProperty();
			}

			// デフォルトで応答するフィールド名の列挙
			$default_response_field = array();
			foreach($property as $item) {
				$default_response_field[] = $item["Property"];
			}

			$result = array(
				"DataType" => $dataType,
				"Method" => $method,
				"Properties" => $property,
				"SearchTargets" => $search_target,
				"SortTargets" => $default_sort_field,
				"DefaultProperties" => $default_response_field,
				"IDProperty" => $id_property,
				"SupportedFunction" => $supported_function,
				"DefaultLimit" => $default_limit,
				"MaximumLimit" => $maximum_limit,
				"Errors" => array(
					array(
						'ErrorCode' => "-32001",
						"Description" => "引数が適切でないかデータが取得できませんでした"
					),
					array(
						'ErrorCode' => "-32700",
						"Description" => "パーサーエラー：XMLがWell formedではありません"
					),
					array(
						'ErrorCode' => "-32600",
						"Description" => "正しいXMLRPCの要求形式ではありません",
					),
					array(
						'ErrorCode' => "-32601",
						"Description" => "要求したメソッドは存在しません",
					),
					array(
						"ErrorCode" => "-32602",
						"Description" => "メソッドの引数が不足しています",
					),
					array(
						"ErrorCode" => "-32300",
						"Description" => "ソケットをオープンすることが出来ません",
					),
				),
			);
			$return[] = $result;
		}
		return $return;
	}

	function _checkDataType($datatype) {
		return in_array($datatype, $this->valid_DataType);
	}
}
?>
