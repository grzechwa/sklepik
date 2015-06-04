<?php /* Smarty version Smarty-3.1.17, created on 2015-06-04 21:06:11
         compiled from "C:\xampp\htdocs\sklepik\app\shop\ShopView.tpl" */ ?>
<?php /*%%SmartyHeaderCode:9298555fca98b1bab9-69012503%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dc1ff588aa9c4413a4dc8f86d70fc179940dd4ae' => 
    array (
      0 => 'C:\\xampp\\htdocs\\sklepik\\app\\shop\\ShopView.tpl',
      1 => 1433444692,
      2 => 'file',
    ),
    '6b6c826dffe74d999e542a1a55d0781143d8ec7d' => 
    array (
      0 => 'C:\\xampp\\htdocs\\sklepik\\templates\\main.tpl',
      1 => 1433444677,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9298555fca98b1bab9-69012503',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_555fca98c96985_39448228',
  'variables' => 
  array (
    'conf' => 0,
    'page_description' => 0,
    'page_title' => 0,
    'hide_intro' => 0,
    'isLogged' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_555fca98c96985_39448228')) {function content_555fca98c96985_39448228($_smarty_tpl) {?><!doctype html>
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


<h2 class="content-head is-center">Zapraszamy na zakupy</h2>
	
<table width="30%">
    <tr>
        <td>
            <form class="pure-form pure-form-stacked"    action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
shopSearch" method="post">
                <fieldset>
                    <label for="name">Nazwa</label>
                    <input id="name" type="text" placeholder="Wpisz nazwę.." name="name" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->name;?>
">
                    <label for="category">Kategoria</label>
                    <select id="category" name="category" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->category;?>
">
                        <option value="-1">Wszystkie</option>
                        <?php  $_smarty_tpl->tpl_vars['cat'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['cat']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['categories']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['cat']->key => $_smarty_tpl->tpl_vars['cat']->value) {
$_smarty_tpl->tpl_vars['cat']->_loop = true;
?>
                        <option value=<?php echo $_smarty_tpl->tpl_vars['cat']->value['id_kategoria'];?>
 <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['cat']->value['id_kategoria'];?>
<?php $_tmp1=ob_get_clean();?><?php if ($_smarty_tpl->tpl_vars['form']->value->category==$_tmp1) {?> selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['cat']->value['nazwa'];?>
</option>
                        <?php } ?>
                    </select>
                    <button type="submit" class="pure-button">Szukaj</button>
                </fieldset>
            </form>
        </td>
    </tr>

</table>
<div>
    
<?php if ($_smarty_tpl->tpl_vars['products']->value->num_rows>0) {?>
<table class="pure-table pure-table-horizontal" align="center">
        <thead>
            <tr>
                <th>Nazwa</th>
                <th>Opis</th>
                <th>Cena</th>
                <th>Kategoria</th>
                <?php if ($_smarty_tpl->tpl_vars['isLogged']->value==true) {?>
                <th></th>
                <?php }?>
            </tr>
        </thead>
        <tbody>
            <?php  $_smarty_tpl->tpl_vars['prod'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['prod']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['products']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['prod']->key => $_smarty_tpl->tpl_vars['prod']->value) {
$_smarty_tpl->tpl_vars['prod']->_loop = true;
?>
            <tr><td><?php echo $_smarty_tpl->tpl_vars['prod']->value['nazwaTowaru'];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['prod']->value['opisTowaru'];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['prod']->value['cenaTowaru'];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['prod']->value['kategoriaTowaru'];?>
</td><?php if ($_smarty_tpl->tpl_vars['isLogged']->value=='isLogged') {?><td><button>zamów</button></td><?php }?></tr>
            <?php } ?>
        </tbody>
    </table>
<?php }?>
<?php if (!$_smarty_tpl->tpl_vars['products']->value->num_rows>0) {?>
	<h4 class="err">Brak produktów do wyświetlenia</h4> 
<?php }?>
</div>


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
