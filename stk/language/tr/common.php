<?php
/**
*
* @package Support Toolkit
* @version $Id: common.php 282 2010-01-21 06:37:46Z iwisdom $
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
   'BACK_TOOL'							=> 'Son araca geri dön',
   'BOARD_FOUNDER_ONLY'					=> 'Sadece Mesaj Panosu sahipleri Support Toolkit’e erişebilir.',

   'CAT_ADMIN'							=> 'Yönetim Araçları',
   'CAT_ADMIN_EXPLAIN'					=> 'Yönetim Araçları bir yönetici tarafından forumlarındaki belirli kısımları yönetmek ve genel problemleri çözmek için kullanılabilir.',
   'CAT_DEV'							=> 'Geliştirici Araçları',
   'CAT_DEV_EXPLAIN'					=> 'Geliştirici Araçları phpBB Geliştiricileri ve MOD yapımcıları tarafından genel görevleri gerçekleştirmek için kullanılabilir.',
   'CAT_ERK'							=> 'Acil Onarım Kiti',
   'CAT_ERK_EXPLAIN'					=> 'Acil onarım kiti, phpBB kurulumunuz içerisindeki mesaj panonuzun çalışmasını engelleyebilecek bazı kontrol yaparak sorunları tespit edebilen Support Toolkit’ten ayrı bir pakettir. Acil Onarım Kitini çalıştırmak için <a href="%s">buraya</a> tıklayın.',   
   'CAT_MAIN'							=> 'Ana',
   'CAT_MAIN_EXPLAIN'					=> 'Support Toolkit (STK) çalışan bir phpBB 3.0.x kurulumundaki genel sorunları düzeltmek için kullanılabilir. Saniyelik bir Yönetim Kontrol Paneliyle, phpBB3 kurulumundaki düzgün çalışan fonksiyonları engelleyen genel problemlerin çözümü için araçların ayarlanmasıyla bir yönetici hizmeti sağlar.',
   'CAT_SUPPORT'						=> 'Destek Araçları',
   'CAT_SUPPORT_EXPLAIN'				=> 'Destek Araçları phpBB 3.0.x kurulumunda meydana gelen düzgün çalışmayan fonksiyonları kurtarmaya yardımcı olmak için kullanılabilir.',
   'CAT_USERGROUP'						=> 'Kullanıcı/Grup Araçları',
   'CAT_USERGROUP_EXPLAIN'				=> 'Kullanıcı ve Grup Araçları varsayılan phpBB 3.0.x kurulumunda mevcut olmayan yollarla kullanıcıları ve grupları yönetmek için kullanılabilir.',
   'CONFIG_NOT_FOUND'					=> 'STK yapılandırma dosyası yüklenemedi. Lütfen kurulumunuzu kontrol edin',

   'DOWNLOAD_PASS'						=> 'Şifre dosyasını indir.',

   'EMERGENCY_LOGIN_NAME'				=> 'STK Acil giriş',
   'ERK'								=> 'Acil Onarım Kiti',

   'FAIL_REMOVE_PASSWD'					=> 'Süresi dolmuş şifre dosyası silinemiyor. Lütfen bu dosyayı elle silin!',

   'GEN_PASS_FAILED'					=> 'Support Toolkit yeni bir şifre oluşturamayacak duruma geldi. Lütfen tekrar deneyin.',
   'GEN_PASS_FILE'						=> 'Şifre dosyası oluştur.',
   'GEN_PASS_FILE_EXPLAIN'				=> 'Eğer phpBB’ye hiç bir şekilde giriş yapamıyorsanız Support Toolkit’in dahili kimlik doğrulama metodunu kullanabilirsiniz. Bu metodu kullanmak için yeni bir şifre dosyası <a href="%s"><strong>oluşturmalısınız</strong></a>.',

   'INCORRECT_CLASS'					=> 'Hatalı sınıf: stk/tools/%1$s.%2$s',
   'INCORRECT_PASSWORD'					=> 'Şifre hatalı',
   'INCORRECT_PHPBB_VERSION'			=> 'phpBB sürümünüz bu araç ile uyumlu değil. Bu aracı çalıştırmak için phpBB kurulumunuzun sürümü %1$s ya da üzeri olmalıdır.',

   'LOGIN_STK_SUCCESS'					=> 'Başarıyla doğrulandınız ve şimdi Support Toolkit’e yönlendirileceksiniz.',

   'NOTICE'								=> 'Not',
   'NO_VERSION_FILE'					=> 'Support Toolkit (STK) son sürümü saptayamıyor. Lütfen <a href="http://phpbb.com/support/stk">phpBB.com’un Support Toolkit alanına gidin</a> ve STK’i kullanmadan önce kullandığınız son sürümü doğrulayın.',
   
   'REQUEST_PHPBB_VERSION'				=> 'phpBB sürümü belirleme',
   'REQUEST_PHPBB_VERSION_EXPLAIN'		=> 'Support Toolkit, hangi phpBB sürümünü çalıştırdığınızı doğru şekilde belirleyemedi, lütfen devam etmeden önce bu form içerisindeki uygun sürümü seçin.<br /> Bu durum mesaj panosu dosyalarınız ve mesaj panosu sürümünüzün uyuşmaz olduğunu gösterir, bu sorun büyük olasılıkla eksik bir güncelleme işlemi nedeniyle meydana gelmiştir. Lütfen bu sorunun nasıl çözüleceğine dair yardım almak için <a href="http://www.phpbb.com/community/viewforum.php?f=46">destek forumlarını</a> ziyaret edin.', 

   'PASS_GENERATED'						=> 'STK şifre dosyanız başarıyla oluşturuldu!<br/>Sizin için oluşturulan şifre: <em>%1$s</em><br />Bu şifrenin süresinin dolacağı tarih: <span style="text-decoration: underline;">%2$s</span>. Bu tarihten sonra acil giriş özelliğini kullanmaya devam edebilmek için yeni bir şifre <strong>oluşturmalısınız</strong>!<br /><br />Dosyayı indirmek için alttaki butonu kullanın. Bu dosyayı indirdikten sonra sunucunuzdaki "stk" dizinine yüklemelisiniz',
   'PASS_GENERATED_REDIRECT'			=> 'Şifre dosyasını doğru yere yükledikten sonra, giriş sayfasına geri dönmek için <a href="%s">buraya</a> tıklayın.',
   'PLUGIN_INCOMPATIBLE_PHPBB_VERSION'	=> 'Bu araç çalışan phpBB sürümünüz ile uyumlu değil',
   'PROCEED_TO_STK'						=> '%sSupport Toolkit’e ilerle%s',

   'STK_FOUNDER_ONLY'					=> 'Support Toolkit’i kullanabilmek için önce kendinizi yeniden doğrulamalısınız.',
   'STK_LOGIN'							=> 'Support Toolkit Giriş',
   'STK_LOGIN_WAIT'						=> 'Yeniden giriş denemesi yapmadan önce üç saniye beklemelisiniz. Lütfen tekrar deneyin.',
   'STK_LOGOUT'							=> 'STK Çıkış',
   'STK_LOGOUT_SUCCESS'					=> 'Support Toolkit’ten başarıyla çıkış yaptınız.',
   'STK_NON_LOGIN'						=> 'STK erişimi için giriş yapın.',
   'STK_OUTDATED'						=> 'Support Toolkit kurulumunuzun güncel olmadığı görülüyor. Son mevcut sürüm <strong style="color: #008000;">%1$s</strong>, buna karşın kurduğunuz sürüm <strong style="color: #FF0000;">%2$s</strong>.<br /><br />Bu aracın phpBB kurulumunuzda geniş etkisi olacağından dolayı, bir güncelleme işlemi gerçekleştirilene kadar kapatıldı. Sunucunuzda tüm çalıştırılan yazılımların güncel tutulmasını kesinlikle öneriyoruz. Son güncelleme ile ilgili daha fazla bilgi için, lütfen <a href="%3$s">yayınlanma başlığına</a> bakın.<br /><br /><em>Eğer Support Toolkit’i güncellemenize rağmen hala bu notu görüyorsanız, sürüm kontrolü önbelleğini temizlemek için <a href="%4$s">buraya</a> tıklayın.</em>',
   'SUPPORT_TOOL_KIT'					=> 'Support Toolkit',
   'SUPPORT_TOOL_KIT_INDEX'				=> 'Support Toolkit Ana Sayfa',
   'SUPPORT_TOOL_KIT_PASSWORD'			=> 'Şifre',
   'SUPPORT_TOOL_KIT_PASSWORD_EXPLAIN'	=> 'phpBB3’e giriş yapmadan önce Support Toolkit Şifresini girerek mesaj panosu sahibi olduğunuzu doğrulamalısınız.<br /><br /><strong>Tarayıcınız tarafından çerezlere İZİN verilmelidir yoksa giriş yapamadan kalırsınız.</strong>',

   'TOOL_INCLUTION_NOT_FOUND'			=> 'Bu aracın yüklemeye çalıştığı bir dosya (%1$s) bulunamadı.',
   'TOOL_NAME'							=> 'Araç Adı',
   'TOOL_NOT_AVAILABLE'					=> 'İstenilen araç mevcut değil!',

   'USING_STK_LOGIN'					=> 'Dahili STK kimlik doğrulama metodunu kullanarak giriş yaptınız. Bu metodun <strong>sadece</strong> phpBB’ye giriş yapamadığınız zaman kullanılması önerilir.<br />Bu kimlik doğrulama metodunu kapatmak için <a href="%1$s">buraya</a> tıklayın.',
));
