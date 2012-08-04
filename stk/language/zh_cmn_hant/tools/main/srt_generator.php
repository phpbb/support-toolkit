<?php
/**
 *
 * @package Support Toolkit
 * @version $Id$
 * @copyright (c) 2010 phpBB-TW (心靈捕手) http://phpbb-tw.net/phpbb/
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License
 *
 */

/**
 * @ignore
 */
if (!defined('IN_PHPBB'))
{
   exit;
}

if (empty($lang) || !is_array($lang))
{
   $lang = array();
}

// DEVELOPERS PLEASE NOTE
//
// All language files should use UTF-8 as their encoding and the files must not contain a BOM.
//
// Placeholders can now contain order information, e.g. instead of
// 'Page %s of %s' you can (and should) write 'Page %1$s of %2$s', this allows
// translators to re-order the output of data while ensuring it remains correct
//
// You do not need this where single placeholders are used, e.g. 'Message %d' is fine
// equally where a string contains only two placeholders which are used to wrap text
// in a url you again do not need to specify an order e.g., 'Click %sHERE%s' is fine
//
// Some characters you may want to copy&paste:
// ’ » " " …
//

$lang = array_merge($lang, array(
	'COMPILED_TEMPLATE_EXPLAIN'		=> '以下是您支援請求樣式的副本。點擊下面以複製到剪貼簿，然後建立一篇包含這個資訊之新的文章在 <a href="http://www.phpbb.com/community/viewforum.php?f=46">Support forum</a>。如果您已經有發表過相關問題的主題，那麼請複製這個樣式資訊，以回覆該主題，不必再建立新的主題。',
	'COULDNT_LOAD_SRT_ANSWERS'		=> '支援請求樣式產生器不能負荷的答案。請確認您已經正確地啟用此工具。',
	'SRT_GENERATOR'					=> 'SRT 產生器',
	'SRT_GENERATOR_LANDING'			=> '支援請求樣式產生器',
	'SRT_GENERATOR_LANDING_CONFIRM'	=> '歡迎使用支援請求樣式產生器。這是個得以完成支援請求樣式之快速且有效的方式。它將問您一系列八到十個問題，用以診斷大多數的問題。然後它會編譯您的答案成列表，方便您複製與貼上到您請求支援的主題。<br />這 STK 工具與 <a href="http://www.phpbb.com/support/stk/">SRT Generator on www.phpbb.com</a> 做同樣的事情，只要嘗試預填一些問題。<br /><br />您想要運行支援請求樣式產生器嗎？',
	'SRT_NO_CACHE'					=> '當經歷所有的步驟時，支援請求樣式產生器使用 phpBB 快取系統儲存資訊。您正在使用 phpBB 空快取系統，它與這個工具不相容。請切換到其他快取系統來使用這個工具，或者使用 <a href="http://www.phpbb.com/support/srt/">線上 SRT 產生器</a>。',
	'START_OVER'					=> '重新開始',
));

// Step 1 strings
$lang = array_merge($lang, array(
//	'STEP1_CONVERT'			=> '',
//	'STEP1_CONVERT_EXPLAIN'	=> '',
	'STEP1_MOD'				=> '您的問題與哪個外掛有關？',
	'STEP1_MOD_EXPLAIN'		=> '這個問題是發生在您安裝外掛之時，或者是移除外掛之時？',
	'STEP1_MOD_ERROR'		=> '外掛相關問題（例如：安裝外掛獲得錯誤）的支援，請發文在您所下載的外掛主題內。如果外掛是下載自作者的網站，那麼您應該到那裡去尋求支援。<br /><br /><a href="http://www.phpbb.com/community/viewforum.php?f=81">回到 MOD Forums</a>',
	'STEP1_HACKED'			=> '您的論壇被駭了嗎？',
	'STEP1_HACKED_EXPLAIN'	=> '選擇「是」，如果您尋求支援是因為您的論壇被塗污或者是被危害。',
	'STEP1_HACKED_ERROR'	=> '如果您的論壇被駭，那麼我們要求您提交 Incident Investigation Tracker（事故調查追踪）報告，而不是發文在 Support forum（支援論壇）。<br /><br />參考 <a href="http://www.phpbb.com/community/viewtopic.php?f=46&t=543171#iit">此文</a> 以朝這個方向來做。',
));

// The questions
$lang = array_merge($lang, array(
	'SRT_QUESTIONS'			=> array(
		'step2'	=> array(
			'phpbb_version'		=> '您使用的 phpBB 版本為何？',
			'board_url'			=> '您論壇的網址是？',
			'dbms'				=> '您正在使用哪一種資料庫型式/版本？',
			'php'				=> '您正在使用哪一個 PHP 版本？',
			'host_name'			=> '您的論壇之主機名稱是？',
			'install_type'		=> '您如何安裝您的論壇？',
			'inst_converse'		=> '您的論壇是全新安裝或轉換而來？',
			'mods_installed'	=> '您有安裝任何的外掛嗎？',
			'registration_req'	=> '需要註冊去體驗這個問題嗎？',
		),
		'step3'	=> array(
			'installed_styles'		=> '您目前有安裝過什麼風格嗎？',
			'installed_languages'	=> '您的論壇目前正在使用什麼語言？',
			'xp_level'				=> '您的經驗等級為何？',
			'problem_started'		=> '您的問題是何時發生的？',
			'problem_description'	=> '請描述你的問題。',
			'installed_mods'		=> '您有安裝過什麼外掛嗎？',
			'test_username'			=> '什麼帳號（會員名稱）可用來檢視這個問題？',
			'test_password'			=> '什麼密碼可用來檢視這個問題？',
		),
	),
));

// Explain lines for the questions
$lang = array_merge($lang, array(
	'SRT_QUESTIONS_EXPLAIN'	=> array(
		'step2'	=> array(
			'phpbb_version'		=> '支援請求樣式產生器無法確定您正在使用的 phpBB 版本，請選擇正確的版本。要找到這項資訊，請登入您的論壇，以及登入管理員控制台，然後點擊「系統」標籤。',
			'board_url'			=> '您的論壇網址是用來進入您論壇的位址。當可以檢視您的論壇時，大多數的問題都很容易被解決。如果您不想要公佈這個資訊，請輸入「n/a」。',
			'dbms'					=> '要確定您正在使用的資料庫版本與型式，那麼請進入管理員控制台，然後在「一般」標籤下，瀏覽統計表格中的「資料庫伺服器」。',
			'php'				=> '要確定您正在使用哪一個 PHP 版本，那麼請進入管理員控制台，然後在「一般」標籤下，點選「PHP 資訊」。在此，您將找到「PHP Version x.y.z」。',
			'host_name'			=> '某些 phpBB 論壇經常遇到的問題可以歸因於特定的主機。這個欄位應該要填入提供您論壇的主機之公司名稱 (像是 GoDaddy、Yahoo!、1&1...等)。如果論壇是架在您個人的主機上，那麼請在此表明。同樣地，如果您不知道論壇的主機名稱，那麼也請在此表明。',
			'install_type'		=> '如果您安裝論壇是下載 phpBB 檔案，再上傳到您的主機，然後瀏覽安裝，那麼請選擇「我自己安裝了論壇」。如果有某人幫您安裝，那麼請選擇「某人幫我安裝我的論壇」。如果您使用自動化工具，像是 Fantastico，那麼請選擇「我使用我的主機所提供的工具」。',
			'inst_converse'		=> '如果您的論壇是全新安裝，那麼就表示在安裝 phpBB 之前，您的論壇是不存在的。如果在您的問題開始之前，您最近從舊版本更新了您的論壇，那麼請選擇「由之前的 phpBB3 版本升級」。如果是轉換，那麼就表示您的論壇是由之前另外一個軟體的修補，後來才轉換為 phpBB。',
			'mods_installed'	=> '外掛往往會造成許多 phpBB 的問題。這個資訊有助於確定您的問題之具體原因。',
			'registration_req'	=> '選擇「是」，如果必須要註冊以及登入，才可以體驗這個問題的話。',
		),
		'step3'	=> array(
			'installed_styles'		=> '一個過時的風格是造成許多問題的原因。如果您不知道您有安裝過哪些風格，那麼請進入管理員控制台，然後瀏覽「風格」標籤。',
			'installed_languages'	=> '一個過時的語言是造成許多問題的原因。如果您不知道您有安裝過哪些語言，那麼請進入管理員控制台，然後瀏覽「系統」標籤。接著，從左邊的列表，點選「語言包」。',
			'xp_level'				=> '請選擇選項中，關於您的最佳描述。',
			'problem_started'		=> '請描述在此問題越來越明顯之前，您曾經做過的動作 (例如：升級論壇、安裝外掛等)。',
			'problem_description'	=> '當描述您的問題時，請試著盡量詳盡。包含的資訊有：問題何時發生、重現問題的步驟、以及任何其他您認為有幫助的資訊。',
			'installed_mods'		=> '當表列您安裝過的外掛時，請試著盡可能詳細。這資訊對我們確定您的問題之原因有極大的幫助。',
			'test_username'			=> '請提供測試者帳號，以便於檢視這個問題。<strong>不要</strong>提供需要超過「註冊會員」權限的資訊。',
			'test_password'			=> '請提供測試者密碼，以便於檢視這個問題。<strong>不要</strong>提供需要超過「註冊會員」權限的資訊。',
		),
	),
));

// Langauge strings that are used for building dropdown boxes
$lang = array_merge($lang, array(
	'SRT_DROPDOWN_OPTIONS'	=> array(
		'step2'	=> array(
			'install_type'	=> array(
				'myself'		=> '我使用下載自 phpBB.com 的套件',
				'third'			=> '我使用的下載套件來自另外的網站',
				'someone_else'	=> '某人幫我安裝我的論壇',
				'automated'		=> '我使用我的主機所提供的工具',
			),
			'inst_converse'	=> array(
				'fresh'				=> '全新安裝',
				'phpbb_update'		=> '由之前的 phpBB3 版本升級',
				'convert_phpbb2'	=> '轉換自 phpBB2',
				'convert_other'		=> '轉換自另外的軟體',
			)
		),
		'step3'	=> array(
			'xp_level'		=> array(
				'new_both'		=> '對 PHP 以及 phpBB 沒經驗',
				'new_phpbb'		=> '對 phpBB 沒經驗，但對 PHP 有經驗',
				'new_php'		=> '對 PHP 沒經驗，但對 phpBB 有經驗',
				'comfort'		=> '對 PHP 以及 phpBB 很有經驗',
				'experienced'	=> '對 PHP 以及 phpBB 有經驗',
			),
		),
	),
));

?>