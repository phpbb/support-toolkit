<?php
/**
*
* @package Support Toolkit - MySQL Upgrader
* @copyright (c) 2009 phpBB Group
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*
*/

/**
* DO NOT CHANGE
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
// ’ » “ ” …
//

$lang = array_merge($lang, array(
	'MYSQL_UPGRADER'					=> 'MySQL Güncelleyici',
	'MYSQL_UPGRADER_BACKUP'				=> 'Bu araç potansiyel olarak tehlikelidir; işleme başlamadan önce veritabanınızın bir yedeğini aldığınıza emin olun!',
	'MYSQL_UPGRADER_EXPLAIN'			=> 'Bu araç phpBB kurulumunuz tarafından MySQL veritabanı kullanıldığı zaman neden olan bazı sorunları düzeltmek için geliştirilmiştir. Bu güncelleme yeni sürüm ile uyumsuz olan veritabanı şeması sorunları içindir. <em>Ayrıca “<a href="http://www.phpbb.com/kb/article/doesnt-have-a-default-value-errors">Doesn\'t have a default value errors</a>” KB makalesine bakın.</em>',
	'MYSQL_UPGRADER_DOWNLOAD'			=> 'İndir',
	'MYSQL_UPGRADER_DOWNLOAD_EXPLAIN'	=> 'Bu seçeneği işaretlediğiniz zaman, MySQL Güncelleyici sorgular oluşturacak ve size çıktıları gösterecektir, oradan sonuç dosyasını indirebilirsiniz.',
	'MYSQL_UPGRADER_RESULT'				=> 'Aşağıda, veritabanı şemasının doğru MySQL sürümüne güncellemek için çalıştırılması gereken sorgular yer almaktadır. Sorguları bir .sql dosyası şeklinde indirmek için <a href="%s">buraya</a> tıklayın.',
	'MYSQL_UPGRADER_RUN'				=> 'Çalıştır',
	'MYSQL_UPGRADER_RUN_EXPLAIN'		=> 'Bu seçeneği işaretlediğiniz zaman, MySQL Güncelleyici sorgular oluşturacak ve veritabanınız üzerindeki sonucu otomatik olarak çalıştıracaktır.<br />Bu biraz zaman alabilir, araç size hazır olduğunu bildirene kadar bu işlemi yarıda <strong>kesmeyin</strong>.',
	'MYSQL_UPGRADER_SCRIPT'				=> 'MySQL güncelleme yazılımı',
	'MYSQL_UPGRADER_SUCCESSFULL'		=> 'MySQL Güncelleyici başarıyla çalıştırıldı',
	
	'QUERY_FINISHED'	=> 'Çalışan %2$d sorgudan %1$d tanesi bitirildi , sonraki adıma devam ediliyor.',

	'TOOL_MYSQL_ONLY'	=> 'Bu araç sadece MySQL DBMS kullanıcıları için geçerlidir',
));
