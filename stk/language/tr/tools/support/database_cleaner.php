<?php
/**
*
* @package Support Toolkit - Database Cleaner
* @version $Id: database_cleaner.php 262 2009-11-10 14:58:25Z erikfrerejean $
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
	'BOARD_DISABLE_REASON'			=> 'Mesaj panosu şu anda bazı veritabanı bakımları nedeniyle kapalı. Lütfen kısa bir süre sonra tekrar kontrol edin!',
	'BOARD_DISABLE_SUCCESS'			=> 'Mesaj panosu başarıyla kapatıldı!',

	'COLUMNS'						=> 'Sütunlar',
	'CONFIG_SETTINGS'				=> 'Yapılandırma Ayarları',
	'CONFIG_UPDATE_SUCCESS'			=> 'Yapılandırma ayarları başarıyla güncellendi!',
	'CONTINUE'						=> 'Devam',

	'DATABASE_CLEANER'				=> 'Veritabanı Temizleyici',
	'DATABASE_CLEANER_EXTRA'		=> 'Modifikasyonlar tarafından eklenen diğer ekstra ögeler gösterilmektedir.  <strong>Eğer kutucuklar işaretlenirse onlar kaldırılacaktır</strong>.',
	'DATABASE_CLEANER_MISSING'		=> 'Kırmızı arkaplan ile gösterilmiş alanlarda eklenmesi gereken eksik ögeler verilmiştir.  <strong>Eğer kutucuklar işaretlenirse onlar eklenecektir/strong>.',
	'DATABASE_CLEANER_SUCCESS'		=> 'Veritabanı temizleyici tüm görevleri başarıyla bitirdi!<br /><br />Lütfen veritabanınızın tekrar yedeğini aldığınıza emin olun.',
	'DATABASE_CLEANER_WARNING'		=> 'Bu aracın hiç bir GARANTİSİ YOKTUR ve bu aracın kullanıcıları herhangi bir başarısızlık durumlarına karşılık veritabanlarının tümünün yedeğini almalıdırlar.<br /><br />Devam etmeden önce, veritabanının bir yedeğini aldığınıza emin olun!',
	'DATABASE_CLEANER_WELCOME'		=> 'Veritabanı Temizleyici aracına hoşgeldiniz!<br /><br />Bu araç varsayılan phpBB3 kurulumunda sunulmayan ekstra sütunları, satırları, ve tabloları veritabanından kaldırmak için dizayn edilmiştir, ve eksik veritabanı ögelerini eklemek için gerekebilir.<br /><br />Veritabanı Temizleyici aracını kullanmaya başlamaya hazır olduğunuz zaman devam etmek için Devam butonuna tıklayın (Not: Bu işlem bitene kadar mesaj panonuz kapalı olacaktır).',
	'DATABASE_COLUMNS_SUCCESS'		=> 'Veritabanı sütunları başarıyla güncellendi!',
	'DATABASE_TABLES'				=> 'Veritabanı Tabloları',
	'DATABASE_TABLES_SUCCESS'		=> 'Veritabanı tabloları başarıyla güncellendi!',
	'DATABASE_ROLE_DATA_SUCCESS'	=> 'phpBB sistem rolleri başarıyla yenilendi!',
	'DATABASE_ROLES_SUCCESS'		=> 'Roller başarıyla güncellendi!',	
	'DATAFILE_NOT_FOUND'			=> 'Support Toolkit phpBB sürümünüz için gereken veri-dosyasını bulamıyor!',

	'EMPTY_PREFIX'					=> 'Hiç bir tablo öneki yok',
	'EMPTY_PREFIX_CONFIRM'			=> 'Veritabanı temizleyici veritabanınızdaki tablolarda değişiklik yapmak ile ilgilidir, fakat boş bir tablo öneki kullanıyorsanız bu işlem phpBB ile alakalı olmayan tabloları da etkileyebilir. Devam etmek istediğinize emin misiniz?',
	'EMPTY_PREFIX_EXPLAIN'			=> 'Veritabanı temizleyici, phpBB veritabanı tabloları için bir tablo öneki ayarlamadığınızı belirledi. Bu nedenle veritabanı temizleyici veritabanındaki <strong>bütün</strong> tabloları kontrol edecektir. İşlem yapılırken ayrıca dikkatli olmalısınız ve seçeneklerden herhangi bir phpBB ile ilgili olmayan tabloları çıkardığınıza emin olun. Hata yapılırsa phpBB\'ye ait olmayan veritabanı tabloları zarar görecektir.<br />Eğer nasıl devam edeceğinizi bilmiyorsanız yardım için <a href="http://www.phpbb.com/community/viewforum.php?f=46">phpBB Destek Forumlarını</a> kullanabilirsiniz.',
	'ERROR'							=> 'Hata',
	'EXTRA'							=> 'Ekstra',
	'EXTENSION_GROUPS_SUCCESS'		=> 'Uzantı grupları başarıyla sıfırlandı',
	'EXTENSIONS_SUCCESS'			=> 'Uzantılar başarıyla sıfırlandı',	

	'FINAL_STEP'					=> 'Bu final aşamasıdır.<br /><br />Mesaj panonuzu yeniden açıp önbelleğini temizleyeceğiz.',

	'INSTRUCTIONS'					=> 'Açıklamalar',

	'MISSING'						=> 'Bulunamadı',
	'MODULE_UPDATE_SUCCESS'			=> 'Modüller başarıyla güncellendi!',

	'NO_BOT_GROUP'					=> 'Botlar sıfırlanamıyor, Bot grubu bulunamadı.',

	'PERMISSION_SETTINGS'			=> 'İzin Ayarları',
	'PERMISSION_UPDATE_SUCCESS'		=> 'İzin ayarları başarıyla güncellendi!',
	'PHPBB_VERSION_NOT_SUPPORTED'	=> 'Kullandığınız phpBB3 sürümü desteklenmiyor (ya da Support Toolkite ait bazı dosyalar eksik).<br />phpBB 3.0.0+ sürümleri desteklenmektedir, fakat bu aracın phpBB3ün yayınlanmış yeni bir sürümünü takip ederek güncellenmesi biraz zaman alabilir.',

	'QUIT'							=> 'Çıkış',

	'RESET_BOTS'					=> 'Botları Sıfırla',
	'RESET_BOTS_EXPLAIN'			=> 'Botlar listesini varsayılan phpBB3 bot listesine göre sıfırlamak istiyor musunuz?  Tüm varolan botlar silinecek ve varsayılan ayara göre yenilenecektir.',
	'RESET_BOTS_SKIP'				=> 'Bot sıfırlaması geçildi',	
	'RESET_BOT_SUCCESS'				=> 'Botlar başarıyla sıfırlandı!',
	'RESET_MODULES'					=> 'Modülleri Sıfırla',
	'RESET_MODULES_EXPLAIN'			=> 'Modülleri varsayılan phpBB3 modüllerine göre sıfırlamak istiyor musunuz?  Tüm varolan modüller silinecek ve varsayılanlara göre yenilenecektir.',
	'RESET_MODULES_SKIP'			=> 'Modül sıfırlaması geçildi',	
	'RESET_MODULE_SUCCESS'			=> 'Modüller başarıyla sıfırlandı!',
	'RESET_REPORT_REASONS'			=> 'Bildiri sebeplerini sıfırla',
	'RESET_REPORT_REASONS_EXPLAIN'	=> 'Bildiri sebeplerini varsayılana sıfırlamak istiyor musunuz? Bu işlem bütün eklenen bildiri sebeplerini kaldıracaktır!',
	'RESET_REPORT_REASONS_SKIP'		=> 'Bildiri sebepleri sıfırlandı',
	'RESET_REPORT_REASONS_SUCCESS'	=> 'Bildiri sebepleri başarıyla sıfırlandı!',
	'RESET_ROLE_DATA'				=> 'Rol verilerini sıfırla',
	'RESET_ROLE_DATA_EXPLAIN'		=> 'Bu adım phpBB sistem rollerini orijinal hallerine geri döndürecektir, eğer önceki adımda değişiklikler yaptıysanız bu işlemi yapmanız yüksek derecede tavsiye edilir.',	
	'ROLE_SETTINGS'					=> 'Rol Ayarları',
	'ROWS'							=> 'Satırlar',

	'SECTION_NOT_CHANGED_TITLE'		=> array(
		'tables'			=> 'Tablolar değiştirilmedi',
		'columns'			=> 'Sütunlar değiştirilmedi',
		'config'			=> 'Ayar değiştirilmedi',
		'extension_groups'	=> 'Uzantı grupları değiştirilmedi',
		'extensions'		=> 'Uzantılar değiştirilmedi',
		'permissions'		=> 'İzinler değiştirilmedi',
		'groups'			=> 'Gruplar değiştirilmedi',
		'roles'				=> 'Roller değiştirilmedi',
		'final_step'		=> 'Final aşaması',
	),
	'SECTION_NOT_CHANGED_EXPLAIN'	=> array(
		'tables'			=> 'Veritabanı tabloları değiştirilmedi',
		'columns'			=> 'Veritabanındaki sütunlar değiştirilmedi',
		'config'			=> 'Ayar tablosu herhangi yeni/kayıp değerlere sahip değil',
		'extension_groups'	=> 'Uzantı grupları tablosu yeni/kayıp değere sahip değil',
		'extensions'		=> 'Varsayılan uzantılar değiştirilmedi',		
		'permissions'		=> 'İzin tablolarında herhangi bir değişiklik yapılmadı',
		'groups'			=> 'phpBB sistem gruplarında herhangi bir değişiklik yapılmadı',
		'roles'				=> 'Hiç bir rol eklenmedi ya da kaldırılmadı',
		'final_step'		=> 'Bu son aşama önbelleği temizleyecek ve mesaj panosunu yeniden aktif hale getirecektir.',
	),
 	'SUCCESS'						=> 'Başarılı',
	'SYSTEM_GROUP_UPDATE_SUCCESS'	=> 'Sistem grupları başarıyla sıfırlandı',
 
 	'TYPE'							=> 'Tip',

	'UNSTABLE_DEBUG_ONLY'			=> 'Veritabanı temizleyici sadece <em>(dev, a, b, RC)</em> gibi kararsız phpBB sürümlerinde ve phpBB ayar dosyası içerisinden "DEBUG" aktif olduğu zaman çalıştırılabilir.',
));

?>