<?php
/**
*
* @package Support Toolkit
* @version $Id: common.php 482 2010-07-05 10:07:42Z erikfrerejean $
* @copyright (c) 2009 phpBB Group
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
* Translated By: http://phpbbportugal.com/
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
	'BACK_TOOL'							=> 'Voltar para a última Ferramenta',
	'BOARD_FOUNDER_ONLY'				=> 'Só os Fundadores têm acesso ao Support Toolkit.',

	'CAT_ADMIN'							=> 'Ferramentas de Administração',
	'CAT_ADMIN_EXPLAIN'					=> 'Nesta categoria encontra ferramentas que podem ser utilizadas pelo Administrador para executar tarefas que não vêm com a instalação original do phpBB 3.0.x',
	'CAT_DEV'							=> 'Ferramentas de Desenvolvimento',
	'CAT_DEV_EXPLAIN'					=> 'As ferramentas de desenvolvimento são para serem usadas por quem desenvolve o phpBB.',
	'CAT_ERK'							=> 'Kit de reparação de emergência',
	'CAT_ERK_EXPLAIN'					=> 'O kit de reparação de emergência é um pacote separado do STK, que é construído para executar alguns testes que podem detectar problemas na sua instalação do phpBB que possam impedir a sua placa de trabalhar. Clique <a href="%s">aqui</a> para executar o kIT.',
	'CAT_MAIN'							=> 'Geral',
	'CAT_MAIN_EXPLAIN'					=> 'O Support Toolkit, ou STK, é uma ferramenta que pode ser usada para recuperar instalações de phpBB 3.0.x, ou corrigir problemas duma instalação em funcionamento. O stk é um segundo ACP que pode ser facilmente instalado em qualquer instalação de phpBB 3, e tem a aparência do ACP do phpBB 3, mas o Administrador tem acesso a todo um novo conjunto de ferramentas que podem ser utilizadas nos casos em que phpBB não funcione correctamente ou tenha deixado de funcionar totalmente.',
	'CAT_SUPPORT'						=> 'Ferramentas de Manutenção',
	'CAT_SUPPORT_EXPLAIN'				=> 'Ferramentas de manutenção são instrumentos de correcção e recuparação de partes de uma instalação phpBB 3.0.',
	'CAT_USERGROUP'						=> 'Ferramentas Utilizadores/Grupos',
	'CAT_USERGROUP_EXPLAIN'				=> 'Nesta Categoria tem disponíveis Ferramentas relaccionadas com Utilizadores e Grupos.',
	'CONFIG_NOT_FOUND'					=> 'O ficheiro de configuração do STK não pode ser lido. Por favor verifique a instalação.',

	'DOWNLOAD_PASS'						=> 'Transferir o ficheiro com a senha.',

	'EMERGENCY_LOGIN_NAME'				=> 'Login de emergência STK',
	'ERK'								=> 'Kit de reparação de emergência',

	'FAIL_REMOVE_PASSWD'				=> 'Não foi possível remover o ficheiro com a senha expirada. Remova o ficheiro manualmente!',

	'GEN_PASS_FAILED'					=> 'Algo correu mal durante a geração do ficheiro de senha. Por favor repita o processo.',
	'GEN_PASS_FILE'						=> 'Cria nova senha de acesso.',
	'GEN_PASS_FILE_EXPLAIN'				=> 'Se já não consegue entrar no phpBB pode usar o método de autenticação interna do STK. Para utilizar este método, deve <a href="%s">criar</a> uma nova senha de acesso.',

	'INCORRECT_CLASS'					=> 'Classe incorrecta: stk/tools/%1$s.%2$s',
	'INCORRECT_PASSWORD'				=> 'A senha está incorrecta.',
	'INCORRECT_PHPBB_VERSION'			=> 'A sua versão do phpBB não é compatível com o STK. Verifique se está a usar esta versão do phpBB: %1$s, de forma a poder utilizar esta ferramenta.',

	'LOGIN_STK_SUCCESS'					=> 'O seu Registo foi verificado com sucesso. Vai ser redireccionado para o Support Toolkit.',

	'NOTICE'							=> 'Atenção',
	'NO_VERSION_FILE'					=> 'O Support Toolkit (stk) não consegui verificar a última versão. Por favor vá à <a href="http://www.phpbb.com/support/stk/">página</a> do Support Toolkit (stk) e verifique se está a usar a última versão antes de continuar.',
	
	'PASS_GENERATED'					=> 'O ficheiro com a sua senha STK foi criado com sucesso!<br/>A senha que foi criada é: <em>%1$s</em><br />Esta senha expira em: <span style="text-decoration: underline;">%2$s</span>, depois desta data <strong>tem</strong> que criar um novo ficheiro para continuar a usar o login de emergência!<br /><br />Use o botão seguinte para fazer a transferência do ficheiro. Depois de transferido o ficheiro para o seu computador envie-o para a directoria "stk" do servidor',
	'PASS_GENERATED_REDIRECT'			=> 'Depois de enviar o ficheiro para o local correcto clique <a href="%s"><strong>aqui</strong></a> para ir para a página de acesso.',
	'PLUGIN_INCOMPATIBLE_PHPBB_VERSION'	=> 'Esta ferramenta não é compatível com sua a versão do phpBB',
	'PROCEED_TO_STK'					=> '%sIr para o Support Toolkit%s',

	'STK_FOUNDER_ONLY'					=> 'Deve voltar a autenticar-se para usar o Suporte Toolkit!',
	'STK_LOGIN'							=> 'Login STK',
	'STK_LOGIN_WAIT'					=> 'Só pode tentar uma vez a cada 3 segundos, tente de novo.',
	'STK_LOGOUT'						=> 'Sair do STK',
	'STK_LOGOUT_SUCCESS'				=> 'Saiu com sucesso do STK.',
	'STK_NON_LOGIN'						=> 'Entrar para aceder ao STK.',
	'STK_OUTDATED'						=> 'A sua instalação do STK parece estar desactualizada. A última versão é : <strong style="color: #008000;">%1$s</strong>, a versão instalada é <strong style="color: #FF0000;">%2$s</strong>.<br /><br />Devido ao grande impacto que esta ferramenta tem sobre a sua instalação do phpBB ela foi desactivada até que um update seja feito. Recomendamos que tenha sempre o software actualizado. Para mais informações sobre a actualização mais recente, consulte a <a href="%3$s">página do stk</a>.',
	'SUPPORT_TOOL_KIT'					=> 'Support Toolkit',
	'SUPPORT_TOOL_KIT_INDEX'			=> 'Índice do Support Toolkit',
	'SUPPORT_TOOL_KIT_PASSWORD'			=> 'Senha',
	'SUPPORT_TOOL_KIT_PASSWORD_EXPLAIN'	=> 'Como não está autenticado no phpBB3 terá de inserir a senha do STK.<br /><br /><strong>Os cookies têm que estar autorizador no seu navegador, caso contrário não conseguirá manter-se ligado.</strong>',

	'TOOL_INCLUTION_NOT_FOUND'			=> 'Esta ferramenta está a tentar carregar um ficheiro que não existe: %1$s',
	'TOOL_NAME'							=> 'Nome da Ferramenta',
	'TOOL_NOT_AVAILABLE'				=> 'A ferramenta solicitado não está disponível!',

	'USING_STK_LOGIN'					=> 'Está registado através do método de autenticação interno do STK. Aconselha-se a <strong>apenas</strong> usar este método quando é incapaz de usar o login do phpBB.<br />Para desativar este método de autenticação clique <a href="%1$s">aqui</a>.',
));

?>