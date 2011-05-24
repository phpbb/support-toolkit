<?php
/**
 *
 * @package Support Toolkit
 * @version $Id$
 * @copyright (c) 2010 phpBB Group
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License
 * @Traduzido por: http://phpbbportugal.com - segundo as normas do Acordo Ortográfico
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
	'COMPILED_TEMPLATE_EXPLAIN'		=> 'Em baixo existe um modelo para pedido de Suporte. Clique para copiá-lo para a área de transferência e, com esta informação, abrir um novo Tópico no <a href="http://www.phpbb.com/community/viewforum.php?f=46">Fórum de Suporte</a>. Se já existe um Tópico sobre o seu problema, em vez de abrir um novo, use-o para colocar o seu pedido de suporte.',
	'COULDNT_LOAD_SRT_ANSWERS'		=> 'O Gerador de Pedido de Suporte não carregou as respostas. Verifique se que iniciou a ferramenta corretamente.',
	'SRT_GENERATOR'					=> 'Gerador de Pedido de Suporte',
	'SRT_GENERATOR_LANDING'			=> 'Gerador de Pedido de Suporte',
	'SRT_GENERATOR_LANDING_CONFIRM'	=> 'Bem-vindo ao Gerador de Pedido de Suporte da Equipa de Suporte. Este é o processo mais rápido e eficiente de preenchimento do modelo de Pedido de Suporte. Este gerador fará, entre oito a dez perguntas que são as mais indicadas, para diagnosticar a maioria dos problemas. As respostas são compiladas numa lista que deve ser copiada e colada no seu Tópico de Pedido de Suporte. <br /> Esta ferramenta STK faz o mesmo que o <a href="http://www.phpbb.com/support/stk/">Gerador SRT em www.phpbb.com</a>, no entanto, este acrescenta tentativas de pré-preencher certas em algumas questões. <br /><br /> Deseja executar o gerador SRT?',
	'SRT_NO_CACHE'					=> 'O Gerador de Pedido de Suporte, usa o sistema de cache do phpBB, para armazenar informações durante as sucessivas etapas. A cache do seu phpBB está desativada, o que não é compatível com esta ferramenta. Por favor, mude para um modo de cache, para ou use o <a href="http://www.phpbb.com/support/srt/">Gerador online SRT</a>',
	'START_OVER'					=> 'Recomeçar',
));

// Step 1 strings
$lang = array_merge($lang, array(
//	'STEP1_CONVERT'			=> '',
//	'STEP1_CONVERT_EXPLAIN'	=> '',
	'STEP1_MOD'				=> 'O problema relaciona-se com Modificações?',
	'STEP1_MOD_EXPLAIN'		=> 'O problema começou depois de instalar ou desinstalar uma modificação?',
	'STEP1_MOD_ERROR'		=> 'Questões relacionadas com suporte a Modificações (por exemplo, se instalou uma Modificação e agora tem mensagens de erros) devem ser colocadas no Tópico de onde transferiu a Modificação. Se a Modificação foi transferida de outro site, terá que procurar Suporte lá. <br /><br /> <a href="http://www.phpbb.com/community/viewforum.php?f=81">Ir para o Fórum de Modificações</a>',
	'STEP1_HACKED'			=> 'O seu Fórum foi invadido (hackeado)',
	'STEP1_HACKED_EXPLAIN'	=> 'Nesta opção selecione "Sim" se procura Suporte porque o seu Fórum está desconfigurado.',
	'STEP1_HACKED_ERROR'	=> 'Se o seu Fórum foi invadido (hackeado), envie um relatório com o Incident Investigation Tracker, em vez de pedir suporte no Fórum, para que nenhuma informação privada seja divulgada. <br /><br /> Leia <a href="http://www.phpbb.com/community/viewtopic.php?f=46&t=543171#iit">este post</a> para obter mais instruções sobre o fazer.',
));

// The questions
$lang = array_merge($lang, array(
	'SRT_QUESTIONS'			=> array(
		'step2'	=> array(
			'phpbb_version'		=> 'Qual versão do phpBB que está a usar?',
			'board_url'			=> 'Qual é o URL do seu Fórum?',
			'dbms'				=> 'Que tipo de Base de Dados e versão está a usar?',
			'php'				=> 'Qual é a versão do PHP que está a usar?',
			'host_name'			=> 'Quem aloja o seu Fórum?',
			'install_type'		=> 'Como instalou o seu Fórum phpBB',
			'inst_converse'		=> 'O seu Fórum phpBB é uma nova instalação ou uma conversão?',
			'mods_installed'	=> 'Tem alguma Modificação instalada?',
			'registration_req'	=> 'O problema só se manifesta depois do Acesso?',
		),
		'step3'	=> array(
			'installed_styles'		=> 'Quais os estilos que tem instalados?',
			'installed_languages'	=> 'Qual o idioma que está a usar no seu Fórum phpBB?',
			'xp_level'				=> 'Qual o seu nível de experiência?',
			'problem_started'		=> 'Quando é que o seu problema começou?',
			'problem_description'	=> 'Descreva o seu problema.',
			'installed_mods'		=> 'Quais as Modificações que tem instaladas?',
			'test_username'			=> 'Que Utilizador pode ser usado para ver este problema?',
			'test_password'			=> 'Qual a Senha deste Utilizador?',
		),
	),
));

// Explain lines for the questions
$lang = array_merge($lang, array(
	'SRT_QUESTIONS_EXPLAIN'	=> array(
		'step2'	=> array(
			'phpbb_version'		=> 'O Gerador de SRT não determinou que versão do phpBB está a usar, selecione a versão correta. Para a encontrar, entre no "Painel de Administração" e clique no separador "Sistema".',
			'board_url'			=> 'O URL é o endereço que usa para entrar no seu Fórum. A maioria dos problemas resolve-se mais facilmente quando se pode ver o Fórum. Se não deseja dar essa informação, por favor, digite "n / a".',
			'dbms'				=> 'Para determinar a versão e tipo de Base de Dados entre no Painel de Administração. No separador "Geral", localize "Servidor da Base de Dados" na Tabela Estatísticas do Fórum.',
			'php'				=> 'Para determinar a versão do PHP, entre no Painel de Administração. No separador "Geral", clique no menu "Informação PHP" e encontrará a informação "PHP Version xyz".',
			'host_name'			=> 'Alguns dos problemas com Fóruns phpBB podem ser atribuídos aos servidores anfitriões. Neste campo deve indicar a empresa que fornece o serviço de hospedagem web (como o GoDaddy, Yahoo, 1 & 1, etc.) Se o Fórum é hospedando por si mesmo, ou não sabe quem faz, por favor indique-o.',
			'install_type'		=> 'Se, para instalar o seu Fórum, transferiu os ficheiros do phpBB, enviou-os para o Servidor, e de seguida correu o instalador, selecione " Usei o pacote de transferência do phpBB.com" Se alguém fez a instalação por si, selecione "Alguém me instalou por mim o phpBB" Se usou uma ferramenta automática como o Fantastico, selecione "Usei uma ferramenta disponibilizada pelo meu fornecedor de alojamento".',
			'inst_converse'		=> 'Se o seu Fórum é uma instalação nova, significa que não existia antes de instalar o phpBB. Se atualizou recentemente o seu Fórum de uma versão anterior ao phpBB3 antes do início problema, então, selecione “Atualização de versão anterior à phpBB3”. Se é uma conversão, significa que o phpBB foi instalado anteriormente usando outro software, mais tarde convertido para phpBB.',
			'mods_installed'	=> 'As Modificações são uma a causa frequente de problemas no phpBB. Esta informação pode ajudar a determinar a causa exata do problema.',
			'registration_req'	=> 'Selecione "Sim" se é preciso estar registrado e logado para ver o problema.',
		),
		'step3'	=> array(
			'installed_styles'		=> 'Um estilo desatualizado é causa de muitos problemas. Se não sabe quais os estilos que tem instalados, vá ao Painel de Administração, e procure o separador "Estilo".',
			'installed_languages'	=> 'Se não sabe que pacotes de idiomas que tem instalados, vá ao Painel de Administração, e procure o separador "Sistema". Clique no menu "Pacotes de Idiomas".',
			'xp_level'				=> 'Por favor, selecione a opção que melhor o descreve.',
			'problem_started'		=> 'Por favor, descreva as suas ações (atualização do phpBB, instalação de uma Modificação, etc) antes deste problema se tornar visível.',
			'problem_description'	=> 'Tente descrever o problema o mais detalhadamente possível. Inclua informações sobre quando o começou, os passos necessários para o reproduzir, e quaisquer outras informações que julgue úteis.',
			'installed_mods'		=> 'Tente ser o mais detalhado possível na lista de Modificações instaladas. Esta informação ajuda muito na determinação da causa do problema.',
			'test_username'			=> 'Forneça o nome de um Utilizador de uma conta de teste para este problema possa ser observado. Por favor <strong>Não</strong> dê esta informação se o Utilizador precisar de Permissões superiores à Permissões de Utilizador comum.',
			'test_password'			=> 'Forneça uma Senha da conta de teste para este problema possa ser observado. Por favor <strong>Não</strong> dê esta informação se o Utilizador precisar de Permissões superiores à Permissões de Utilizador comum.',
		),
	),
));

// Langauge strings that are used for building dropdown boxes
$lang = array_merge($lang, array(
	'SRT_DROPDOWN_OPTIONS'	=> array(
		'step2'	=> array(
			'install_type'	=> array(
				'myself'		=> 'Usei o pacote de transferência do phpBB.com',
				'third'			=> 'Usei o pacote de transferência de outro site',
				'someone_else'	=> 'Alguém me instalou por mim o phpBB',
				'automated'		=> 'Usei uma ferramenta disponibilizada pelo meu fornecedor de alojamento',
			),
			'inst_converse'	=> array(
				'fresh'				=> 'Instalação nova',
				'phpbb_update'		=> 'Atualização de versão anterior à phpBB3',
				'convert_phpbb2'	=> 'Conversão do phpBB2',
				'convert_other'		=> 'Conversão de outro software',
			)
		),
		'step3'	=> array(
			'xp_level'		=> array(
				'new_both'		=> 'Iniciado em PHP e phpBB',
				'new_phpbb'		=> 'Iniciado em phpBB mas não PHP',
				'new_php'		=> 'Iniciado em PHP mas não phpBB',
				'comfort'		=> 'Confortável com PHP e phpBB',
				'experienced'	=> 'Experiente em PHP e phpBB',
			),
		),
	),
));
?>