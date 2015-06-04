<?php /* Smarty version Smarty-3.1.17, created on 2015-06-05 00:58:45
         compiled from "/home/greg/www_pv/sklepik/app/security/LoginView.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1066985045570d825782406-50884866%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ab6c442414310bab213b4aa6d8467d91af1a6bb0' => 
    array (
      0 => '/home/greg/www_pv/sklepik/app/security/LoginView.tpl',
      1 => 1433369629,
      2 => 'file',
    ),
    'a595b79be1e3062bf54653a5e3a2ee5094d9a1e5' => 
    array (
      0 => '/home/greg/www_pv/sklepik/templates/main.tpl',
      1 => 1433444677,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1066985045570d825782406-50884866',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'conf' => 0,
    'page_description' => 0,
    'page_title' => 0,
    'hide_intro' => 0,
    'isLogged' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_5570d8258234d4_37816540',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5570d8258234d4_37816540')) {function content_5570d8258234d4_37816540($_smarty_tpl) {?><!doctype html>
<html lang="pl">
<head>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['page_description']->value)===null||$tmp==='' ? "Opis domyślny" : $tmp);?>
">

    <title><?php echo (($tmp = @$_smarty_tpl->tpl_vars['page_title']->value)===null||$tmp==='' ? "Tytuł domyślny" : $tmp);?>
</title>

	<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.4.2/pure.css">

    <!--[if lte IE 8]>
        <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/css/main-grid-old-ie.css">
    <![endif]-->
    <!--[if gt IE 8]><!-->
        <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/css/main-grid.css">
    <!--<![endif]-->
  
    <!--[if lte IE 8]>
        <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/css/layouts/marketing-old-ie.css">
    <![endif]-->
    <!--[if gt IE 8]><!-->
        <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/css/layouts/marketing.css">
    <!--<![endif]-->
    <!--[if lte IE 8]>
        <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/grids-responsive-old-ie-min.css">
    <![endif]-->
    <!--[if gt IE 8]><!-->
        <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/grids-responsive-min.css">
    <!--<![endif]-->

    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/css/style.css">
<?php if ($_smarty_tpl->tpl_vars['hide_intro']->value) {?>
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/css/style_hide_intro.css">
<?php }?>
	
	<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">

      <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css">
    <script>
        $(function() {
           $( "#birthdate" ).datepicker({
           dateFormat:'yy-mm-dd'});
        });
    </script>
</head>
<body>

<div class="header">
    <div class="home-menu pure-menu pure-menu-open pure-menu-horizontal pure-menu-fixed">
        <a class="pure-menu-heading" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/index.php" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
register" method="post"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['page_title']->value)===null||$tmp==='' ? "Tytuł domyślny" : $tmp);?>
</a>
        <ul>
            <?php if ($_smarty_tpl->tpl_vars['hide_intro']->value==false) {?>
            <li class="pure-menu-selected"><a href="#">Góra strony</a></li>
            <?php }?>
            <li><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/index.php#app_content">Idż na zakupy</a></li>
            <?php if ($_smarty_tpl->tpl_vars['isLogged']->value!=true) {?>
            <li><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/app/ctrl.php?action=doRegister" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
doRegister">Rejestracja</a></li>
            <li><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/app/ctrl.php?action=doLogin" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
doLogin">Logowanie</a></li>
            <?php } else { ?>
            <li><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/app/ctrl.php?action=doLogout" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
doLogout">Wyloguj</a></li>
            <?php }?>
        </ul>
    </div>
</div>

<div class="splash-container">
    <div class="splash">
        <h1 class="splash-head"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['page_title']->value)===null||$tmp==='' ? "Tytuł domyślny" : $tmp);?>
</h1>
        <p class="splash-subhead">
             <?php echo (($tmp = @$_smarty_tpl->tpl_vars['page_description']->value)===null||$tmp==='' ? "Opis domyślny" : $tmp);?>

        </p>
        <p>
            <a href="#app_content" class="pure-button pure-button-primary">Idź na zakupy</a>
        </p>
    </div>
</div>

<div class="content-wrapper">

    <div id="app_content" class="content">


    <h2 class="content-head is-center">Zaloguj się</h2>
    <div class="l-box-lrg pure-u-1 pure-u-med-3-5">

    
    <?php if ($_smarty_tpl->tpl_vars['msgs']->value->isError()) {?>
            <h4>Wystąpiły błędy: </h4>
            <ol class="err">
            <?php  $_smarty_tpl->tpl_vars['err'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['err']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['msgs']->value->getErrors(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['err']->key => $_smarty_tpl->tpl_vars['err']->value) {
$_smarty_tpl->tpl_vars['err']->_loop = true;
?>
            <li><?php echo $_smarty_tpl->tpl_vars['err']->value;?>
</li>
            <?php } ?>
            </ol>
    <?php }?>

    
    <?php if ($_smarty_tpl->tpl_vars['msgs']->value->isInfo()) {?>
            <h4>Informacje: </h4>
            <ol class="inf">
            <?php  $_smarty_tpl->tpl_vars['inf'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['inf']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['msgs']->value->getInfos(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['inf']->key => $_smarty_tpl->tpl_vars['inf']->value) {
$_smarty_tpl->tpl_vars['inf']->_loop = true;
?>
            <li><?php echo $_smarty_tpl->tpl_vars['inf']->value;?>
</li>
            <?php } ?>
            </ol>
    <?php }?>
    </div>
    
    
<table width="40%" cellspacing="10" align="center">
    <thead>
        <tr>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td width="40%" valign="top">
                <form class="pure-form pure-form-stacked" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
doLogin" method="post">
                    <fieldset>
                        <label for="login">login</label>
                        <input id="login" type="text" placeholder="Wprowadź login" name="login" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->login;?>
">
                        <label for="password">hasło</label>
                        <input id="password" type="password" placeholder="Wprowadź hasło" name="password" >
                    </fieldset>
                    <button type="submit" class="pure-button">Loguj</button>
                </form>
            </td>
        </tr>
    </tbody>
</table>



    </div>

    <div class="footer l-box is-center">
		<p>
Dane kontaktowe: Sosnowiec, ul. Będzińska 
		</p>
        <p>Widok oparty na stylach i szablonie <a href="http://purecss.io/" target="_blank">Pure CSS Yahoo!</a>.)</p>
    </div>

</div>


</body>
</html>
<?php }} ?>
