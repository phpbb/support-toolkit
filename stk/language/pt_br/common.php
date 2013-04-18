<?php
/**
*
* @package Support Toolkit
* @version $Id$
* @copyright (c) 2009 phpBB Group
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
* @Tradução: Suporte phpBB - http://www.suportephpbb.com.br/
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
   'BACK_TOOL'							=> 'Voltar à última ferramenta',
   'BOARD_FOUNDER_ONLY'					=> 'Apenas os fundadores do painel podem acessar o Support Toolkit.',

   'CAT_ADMIN'							=> 'Ferramentas Administrativas',
   'CAT_ADMIN_EXPLAIN'					=> 'Ferramentas Administrativas podem ser utilizadas por um administrador para gerenciar aspectos particulares de seu fórum e resolver problemas comuns.',
   'CAT_DEV'							=> 'Ferramentas de Desenvolvedores',
   'CAT_DEV_EXPLAIN'					=> 'Ferramentas de Desenvolvedores podem ser utilizadas por desenvolvedores e modders phpBB para executar tarefas comuns.',
   'CAT_ERK'							=> 'Kit de Reparo de Emergência',
   'CAT_ERK_EXPLAIN'					=> 'O Kit de Reparação de Emergência é um pacote separado do STK, que é construído para executar alguns testes que podem detectar problemas na sua instalação do phpBB que possam impedir o funcionamento de seu fórum. Clique <a href="%s">aqui</a> para executar o ERK.',
   'CAT_MAIN'							=> 'Principal',
   'CAT_MAIN_EXPLAIN'					=> 'O Support Toolkit (STK) pode ser usado para corrigir problemas comuns dentro de uma instalação funcional do phpBB 3.0.x. Ele serve como um segundo painel de controle da Administração, proporcionando ao administrador um conjunto de ferramentas para resolver problemas comuns que podem impedir que uma instalação do phpBB3 funcione corretamente.',
   'CAT_SUPPORT'						=> 'Ferramentas de Suporte',
   'CAT_SUPPORT_EXPLAIN'				=> 'As Ferramentas de Suporte podem ser usadas para consertar uma instalação do phpBB 3.0.x que não está funcionando corretamente.',
   'CAT_USERGROUP'						=> 'Ferramentas de Usuário/Grupo',
   'CAT_USERGROUP_EXPLAIN'				=> 'As Ferramentas de Usuário e Grupos devem ser usadas para gerenciar usuários e grupos, que no phpBB padrão não está disponível.',
   'CONFIG_NOT_FOUND'					=> 'O arquivo de configuração STK não pôde ser carregado. Por favor, verifique a sua instalação.',

   'DOWNLOAD_PASS'						=> 'Baixar arquivo de senha.',

   'EMERGENCY_LOGIN_NAME'				=> 'Login de Emergência STK',
   'ERK'								=> 'Kit de Reparo de Emergência',

   'FAIL_REMOVE_PASSWD'					=> 'Não foi possível remover o arquivo de senha expirado. Por favor, remova este arquivo manualmente!',

   'GEN_PASS_FAILED'					=> 'O Suppo Toolkit está impossibilitado para gerar uma nova senha. Por favor, tente novamente.',
   'GEN_PASS_FILE'						=> 'Criar arquivo de senha.',
   'GEN_PASS_FILE_EXPLAIN'				=> 'Caso não consiga efetuar o login em seu phpBB, você poderá usar o método de autenticação interna do Support Toolkit. Para usar este método você deve <a href="%s"><strong>criar</strong></a> um novo arquivo de senha.',

   'INCORRECT_CLASS'					=> 'Classe incorreta em: stk/tools/%1$s.%2$s',
   'INCORRECT_PASSWORD'					=> 'A senha está incorreta',
   'INCORRECT_PHPBB_VERSION'			=> 'A sua versão do phpBB não é compatível com esta ferramenta. Certifique-se de estar utilizando a versão do phpBB %1$s para que possa executar esta ferramenta.',

   'LOGIN_STK_SUCCESS'					=> 'O seu login foi efetuado com sucesso e você será redirecionado agora ao Support Toolkit.',

   'NOTICE'								=> 'Advertência',
   'NO_VERSION_FILE'					=> 'O Support Toolkit (STK) não pôde checar a última versão do pacote. Por favor, visite à <a href="http://phpbb.com/support/stk">página do STK</a> e certifique-se de estar usando a sua versão atualizada antes de prosseguir com suas operações.',

   'REQUEST_PHPBB_VERSION'				=> 'Defina a versão do phpBB',
   'REQUEST_PHPBB_VERSION_EXPLAIN'		=> 'O Support Toolkit foi incapaz de identificar corretamente qual versão do phpBB você está usando, por favor selecione a versão correta neste formulário antes de prosseguir.<br />Isso indica que os arquivos e a versão do fórum são inconsistentes, provavelmente devido a uma atualização incompleta. Por favor visite o <a href="https://www.phpbb.com/community/viewforum.php?f=46">fórum de suporte</a> ou o <a href="http://www.suportephpbb.com.br/">Suporte phpBB</a> para obter ajuda para resolver este problema.',

   'PASS_GENERATED'						=> 'O seu arquivo de senha do STK foi criado com sucesso!<br/>A senha a qual foi gerada para você é a seguinte: <em>%1$s</em><br />Esta senha possui um prazo de expiração até: <span style="text-decoration: underline;">%2$s</span>. Após este período você <strong>deve</strong> criar um novo arquivo para que possa continuar usando o login de emergência do STK!<br /><br />Use o seguinte botão para baixar o arquivo. Uma vez que você tenha baixado este arquivo, você deve enviá-lo para dentro do diretório "stk" em seu servidor',
   'PASS_GENERATED_REDIRECT'			=> 'Uma vez que você tenha enviado o seu arquivo de senha ao destino correto, clique <a href="%s">aqui</a> para voltar à página de login.',
   'PLUGIN_INCOMPATIBLE_PHPBB_VERSION'	=> 'Esta ferramenta não é compatível com a versão do phpBB que você está executando.',
   'PROCEED_TO_STK'						=> '%sProsseguir ao Support Toolkit%s',

   'STK_FOUNDER_ONLY'					=> 'Você deve efetuar uma reautenticação antes de prosseguir com a utilização do Support Toolkit.',
   'STK_LOGIN'							=> 'Entrar no Support Toolkit',
   'STK_LOGIN_WAIT'						=> 'Você possui apenas uma tentativa de login a cada 3 segundos, por favor, tente novamente.',
   'STK_LOGOUT'							=> 'Sair do STK',
   'STK_LOGOUT_SUCCESS'					=> 'O seu logout do Support Toolkit foi efetuado com sucesso.',
   'STK_NON_LOGIN'						=> 'Login de acesso ao STK.',
   'STK_OUTDATED'						=> 'A sua instalação do Support Toolkit encontra-se desatualizada. A versão mais recente é a <strong style="color: #008000;">%1$s</strong>, enquanto que a versão que você tem instalada é <strong style="color: #FF0000;">%2$s</strong>.<br /><br />Considerando o largo impacto desta ferramenta em sua instalação do phpBB, ela foi desativada até que uma atualização seja executada. Nós recomendamos fortemente que você mantenha todos os softwares que estejam sendo executados em seu servidor atualizados. Para maiores informações sobre a última atualização, por favor leia o <a href="%3$s">tópico de lançamento</a>.<br /><br /><em>Se você ver esse alerta após uma atualização do Support Toolkit, clique <a href="%4$s">aqui</a> para limpar o cache da verificação de versão.</em>',
   'SUPPORT_TOOL_KIT'					=> 'Support Toolkit',
   'SUPPORT_TOOL_KIT_INDEX'				=> 'Índice do Support Toolkit',
   'SUPPORT_TOOL_KIT_PASSWORD'			=> 'Senha',
   'SUPPORT_TOOL_KIT_PASSWORD_EXPLAIN'	=> 'Desde que não esteja logado no phpBB3 você deve checar a sua autenticidade enquanto fundador do painel acessando o Support Toolkit com a senha correta.<br /><br /><strong>Os cookies DEVEM estar autorizados em seu navegador ou você não poderá permanecer logado.</strong>',

   'TOOL_INCLUTION_NOT_FOUND'			=> 'Esta ferramenta está tentando carregar um arquivo (%1$s) que não existe.',
   'TOOL_NAME'							=> 'Nome da Ferramenta',
   'TOOL_NOT_AVAILABLE'					=> 'A ferramenta solicitada não encontra-se disponível.',

   'USING_STK_LOGIN'					=> 'Você está logado a partir do método de autenticação interna do STK. É recomendável que você <strong>apenas</strong> use este método quando estiver impossibilitado de logar com o phpBB.<br />Para desativar este método de autenticação clique <a href="%1$s">aqui</a>.',
));
