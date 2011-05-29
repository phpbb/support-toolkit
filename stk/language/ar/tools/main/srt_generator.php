<?php
/**
 *
 * @package Support Toolkit
 * @version $Id$
 * @copyright (c) 2010 phpBB Group
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License
 * @translated by phpBBArabia http://www.phpbbarabia.com
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
	'COMPILED_TEMPLATE_EXPLAIN'		=> 'هذه نسخة من استمارة الدعم الفني. اضغط بأسفل لنسخها، ثم قم بعمل موضوع جديد في <a href="http://www.phpbbarabia.com/community/viewforum.php?f=32">منتدى الدعم الفني</a> بهذه المعلومات. إذا قمت بالفعل بكتابة موضوع في الدعم بخصوص مشكلتك، يرجى نسخ هذه الاستمارة في رد على موضوعك بدلا من إنشاء موضوع جديد.',
	'COULDNT_LOAD_SRT_ANSWERS'		=> 'أداة توليد استمارة الدعم الفني لم تستطع إنشاء إجاباتك. قم بالتأكد أنك قمت باستخدام الأداة بشكل صحيح.',
	'SRT_GENERATOR'					=> 'أداة توليد استمارة الدعم الفني',
	'SRT_GENERATOR_LANDING'			=> 'أداة توليد استمارة الدعم الفني',
	'SRT_GENERATOR_LANDING_CONFIRM'	=> 'أهلا بك في أداة توليد استمارة الدعم الفني. أسرع وأفضل طريقة لملء استمارة الدعم الفني. أداة التوليد ستسألك من ثمان إلى عشرة أسئلة والتي تفيد في تحديد معظم المشاكل. ثم بعد ذلك ستقوم بوضع إجاباتك في قائمة والتي يمكنك بعد ذلك نسخها ولصقها في موضوعك للدعم الفني.<br />هذه الأداة تقوم بنفس الوظيفة كـ <a href="http://www.phpbbarabia.com/srt.php">أداة توليد استمارة الدعم الفني على www.phpbbarabia.com</a> لكنها تحاول ملء بعض الإجابات مسبقا.<br /><br />هل تريد تشغيل أداة توليد استمارة الدعم الفني?',
	'SRT_NO_CACHE'					=> 'أداة توليد استمارة الدعم الفني تستخدم نظام الكاش المستخدم في منتداك. أنت تستخدم نظام null للكاش وهو غير متوافق مع هذه الأداة. يرجى التحويل لنظام كاش آخر لاستخدام هذه الأداة أو قم باستخدام <a href="http://www.phpbbarabia.com/srt.php">أداة توليد استمارة الدعم الفني على الموقع</a>',
	'START_OVER'					=> 'البدأ من جديد',
));

// Step 1 strings
$lang = array_merge($lang, array(
//	'STEP1_CONVERT'			=> '',
//	'STEP1_CONVERT_EXPLAIN'	=> '',
	'STEP1_MOD'				=> 'هل تتعلق مشكلتك بالهاكات؟',
	'STEP1_MOD_EXPLAIN'		=> 'هل بدأت هذه المشكلة بعد تثبيت أو إزالة أحد الهاكات؟',
	'STEP1_MOD_ERROR'		=> 'الأسئلة المتعلقة بالهاكات (مثلا، إن قمت بتثبيت هاك جديد وحصل عطل ما) يجب أن تكتب في الموضوع الذي أنزلت منه الهاك. إن قمت بتنزيل الهاك من موقع آخر فيجب عليك أن تذهب إليهم للدعم.<br /><br /><a href="http://www.phpbbarabia.com/community/viewforum.php?f=43">الذهاب إلى منتديات الهاكات</a>',
	'STEP1_HACKED'			=> 'هل تم اختراق منتداك؟',
	'STEP1_HACKED_EXPLAIN'	=> 'اختر "نعم" في هذا السؤال إن كنت تبحث عن دعم لأن منتداك تم اختراقه وتشويهه.',
	'STEP1_HACKED_ERROR'	=> 'إذا تم اختراق منتداك، من الأفضل لك أن تبلغ في أداة تبليغ الحوادث بدلا من الكتابة في منتدى الدعم حتى لا يتم كشف أي معلومات خاصة.<br /><br />أنظر <a href="http://www.phpbb.com/community/viewtopic.php?f=46&t=543171#iit">هذه المشاركة</a> لمعرفة كيف تقوم بالتبليغ.',
));

// The questions
$lang = array_merge($lang, array(
	'SRT_QUESTIONS'			=> array(
		'step2'	=> array(
			'phpbb_version'		=> 'ما نسخة phpBB التي تستخدمها؟',
			'board_url'			=> 'ما هو رابط منتداك؟',
			'dbms'				=> 'ما نوع ونسخة قاعدة البيانات التي تستخدمها؟',
			'php'				=> 'ما نسخة PHP التي تستخدمها؟',
			'host_name'			=> 'من هو مستضيف منتداك؟',
			'install_type'		=> 'كيف قمت بتثبيت نسخة منتداك؟',
			'inst_converse'		=> 'هل منتداك تثبيت جديد أو تحويل من منتدى آخر؟',
			'mods_installed'	=> 'هل لديك هاكات مثبتة؟',
			'registration_req'	=> 'هل لابد من التسجيل لرؤية المشكلة؟',
		),
		'step3'	=> array(
			'installed_styles'		=> 'ما الستايلات المثبتة لديك حاليا؟',
			'installed_languages'	=> 'ما اللغات التي يستخدمها منتداك حاليا؟',
			'xp_level'				=> 'ما هو مستوى خبرتك؟',
			'problem_started'		=> 'متى بدأت مشكلتك؟',
			'problem_description'	=> 'يرجى شرح المشكلة.',
			'installed_mods'		=> 'ما الهاكات المثبتة لديك حاليا؟',
			'test_username'			=> 'هل هناك حساب تجريبي يمكن استخدامه لرؤية المشكلة؟',
			'test_password'			=> 'ما هي كلمة المرور الخاصة بالحساب التجريبي؟',
		),
	),
));

// Explain lines for the questions
$lang = array_merge($lang, array(
	'SRT_QUESTIONS_EXPLAIN'	=> array(
		'step2'	=> array(
			'phpbb_version'		=> 'أداة توليد استمارة الدعم لا تستطيع تحديد نسخة المنتدى المستخدمة لديك، يرجى اختيار النسخة الصحيحة. لمعرفة رقم النسخة، قم بالدخول إلى لوحة التحكم الرئيسي واضغط على تبويب النظام.',
			'board_url'			=> 'رابط منتداك هو العنوان الذي تستخدمه للوصول إلى منتداك. معظم المشكلات تكون من السهل حلها عندما يطلع أحد على منتداك. إذا لا تريد أن توفر هذه المعلومة يرجى كتابة "غير متوفر".',
			'dbms'				=> 'لتحديد نوع ونسخة قاعدة البيانات التي تستخدمها، قم بالدخول إلى لوحة التحكم الرئيسية. في تبويب "عام" ستجد "خادم قاعدة البيانات:" في جدول إحصائيات المنتدى.',
			'php'				=> 'لتحديد نسخة PHP التي تستخدمها، قم بالذهاب إلى لوحة التحكم الرئيسية. في تبويب "عام" اضغط على "معلومات PHP"، فيها ستجد "PHP Version x.y.z"',
			'host_name'			=> 'بعض المشكلات في phpBB من الممكن أن يكون سببها هو المستضيف. هذا الحقل يجب كتابة اسم الشركة التي توفر الاسضافة لك فيه (مثلا GoDaddy، Yahoo!، 1&1، إلخ). إذا كنت مستضيف المنتدى على استضافة خاصة، يرجى توضيح ذلك. أيضا، إذا كنت لا تعرف من مستضيف موقعك، يرجى توضيح هذا أيضا.',
			'install_type'		=> 'إن قمت بتثبيت منتداك عن طريق تحميل الملفات، رفعهم إلى موقعك، وفتح صفحة التثبيت في متصفحك، اختر "قمت بتثبيت المنتدى بنفسي." إذا قام شخص بثبيتها لك فاختر "شخص آخر قام بتثبيت المنتدى لأجلي" إذا قمت باستخدام أداة مثل Fantastico، فاختر "قمت باستخدام أداة يوفرها مستضيفي."',
			'inst_converse'		=> 'إذا كان منتداك تثبيت جديد، هذا يعني أن منتداك لم يكون موجودا قبل تثبيت phpBB. إذا قمت بتحديث منتداك من نسخة أقدم من phpBB3 قبل أن تبدأ مشكلتك، فاختر "تحديث من نسخة أقدم من phpBB3". إذا كانت عبارة عن تحويل، فهذا يعني أن منتداك كان موجودا من قبل بسكربت آخر ثم قمت بتحويله إلى phpBB.',
			'mods_installed'	=> 'الهاكات غالبا ما تكون مصدر للعديد من المشاكل في phpBB. هذه المعلومات قد تساعدنا في معرفة السبب الحقيقي لمشكلتك.',
			'registration_req'	=> 'اختر "نعم" إذا كان لابد من تسجيل الدخول لرؤية هذه المشكلة.',
		),
		'step3'	=> array(
			'installed_styles'		=> 'إذا كان الستايل قديما وغير محدث لآخر نسخة فقد يسبب مشاكل عديدة. إذا كنت لا تعرف ما هي الستايلات التي قمت بتركيبها، فاذهب إلى لوحة التحكم الرئيسية، واضغط على تبويب "الاستايلات".',
			'installed_languages'	=> 'إذا كانت حزمة اللغة قديمة وغير محدثة لآخر نسخة فقد تسبب مشاكل عديدة. إذا كنت لا تعرف ما هي اللغات التي قمت بتركيبها، فاذهب إلى لوحة التحكم الرئيسية، واضغط على تبويب "النظام". ثم اختر "حزم اللغات" من القائمة على اليمين.',
			'xp_level'				=> 'يرجى اختيار أفضل إجابة تنطبق عليك.',
			'problem_started'		=> 'يرجى كتابة الفعل الذي قمت به (تحديث المنتدى، تثبيت هاك، إلخ.) قبل أن تظهر هذه المشكلة.',
			'problem_description'	=> 'عند شرحك للمشكلة، يرجى أن تكون مفصلا بأقصى ما يمكنك. قم بكتابة معلومات عن متى ظهرت المشكلة، كيف يمكن إظهارها، وأي تفاصيل أخرى قد تراها مفيدة.',
			'installed_mods'		=> 'يرجى أن تكون مفصلا بأقصى ما يمكنك عند كتابة قائمة الهاكات المثبتة لديك. هذه المعلومات تساعد كثيرا في تحديد السبب الفعلي لمشكلتك.',
			'test_username'			=> 'يرجى توفير اسم المستخدم للحساب التجريبي الذي يمكن استخدامه لرؤية المشكلة. <strong>لا تقوم</strong> بتوفير هذه المعلومات إذا كان المستخدم يتطلب صلاحيات أكثر من "المستخدم العادي".',
			'test_password'			=> 'يرجى توفير كلمة المرور للحساب التجريبي الذي يمكن استخدامه لرؤية المشكلة. <strong>لا تقوم</strong> بتوفير هذه المعلومات إذا كان المستخدم يتطلب صلاحيات أكثر من "المستخدم العادي".',
		),
	),
));

// Langauge strings that are used for building dropdown boxes
$lang = array_merge($lang, array(
	'SRT_DROPDOWN_OPTIONS'	=> array(
		'step2'	=> array(
			'install_type'	=> array(
				'myself'		=> 'قمت بتثبيت المنتدى بنفسي.',
				'third'			=> 'قمت بتحميل النسخة من موقع آخر',
				'someone_else'	=> 'شخص آخر قام بتثبيت المنتدى لأجلي',
				'automated'		=> 'قمت باستخدام أداة يوفرها مستضيفي',
			),
			'inst_converse'	=> array(
				'fresh'				=> 'تثبيت جديد',
				'phpbb_update'		=> 'تحديث من نسخة أقدم من phpBB3',
				'convert_phpbb2'	=> 'تحويل من phpBB2',
				'convert_other'		=> 'تحويل من سكربت منتديات آخر',
			)
		),
		'step3'	=> array(
			'xp_level'		=> array(
				'new_both'		=> 'مبتدئ في PHP و phpBB',
				'new_phpbb'		=> 'مبتدئ في phpBB لكن ليس في PHP',
				'new_php'		=> 'مبتدئ في PHP لكن ليس في phpBB',
				'comfort'		=> 'متوسط في PHP و phpBB',
				'experienced'	=> 'خبير في PHP و phpBB',
			),
		),
	),
));
