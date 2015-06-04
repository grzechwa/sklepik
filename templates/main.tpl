<!doctype html>
<html lang="pl">
<head>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="{$page_description|default:"Opis domyślny"}">

    <title>{$page_title|default:"Tytuł domyślny"}</title>

	<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.4.2/pure.css">

    <!--[if lte IE 8]>
        <link rel="stylesheet" href="{$conf->app_url}/css/main-grid-old-ie.css">
    <![endif]-->
    <!--[if gt IE 8]><!-->
        <link rel="stylesheet" href="{$conf->app_url}/css/main-grid.css">
    <!--<![endif]-->
  
    <!--[if lte IE 8]>
        <link rel="stylesheet" href="{$conf->app_url}/css/layouts/marketing-old-ie.css">
    <![endif]-->
    <!--[if gt IE 8]><!-->
        <link rel="stylesheet" href="{$conf->app_url}/css/layouts/marketing.css">
    <!--<![endif]-->
    <!--[if lte IE 8]>
        <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/grids-responsive-old-ie-min.css">
    <![endif]-->
    <!--[if gt IE 8]><!-->
        <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/grids-responsive-min.css">
    <!--<![endif]-->

    <link rel="stylesheet" href="{$conf->app_url}/css/style.css">
{if $hide_intro }
    <link rel="stylesheet" href="{$conf->app_url}/css/style_hide_intro.css">
{/if}
	
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
        <a class="pure-menu-heading" href="{$conf->app_url}/index.php" action="{$conf->action_root}register" method="post">{$page_title|default:"Tytuł domyślny"}</a>
        <ul>
            {if  $hide_intro == FALSE }
            <li class="pure-menu-selected"><a href="#">Góra strony</a></li>
            {/if}
            <li><a href="{$conf->app_url}/index.php#app_content">Idż na zakupy</a></li>
            {if  $isLogged != TRUE }
            <li><a href="{$conf->app_url}/app/ctrl.php?action=doRegister" action="{$conf->action_root}doRegister">Rejestracja</a></li>
            <li><a href="{$conf->app_url}/app/ctrl.php?action=doLogin" action="{$conf->action_root}doLogin">Logowanie</a></li>
            {else}
            <li><a href="{$conf->app_url}/app/ctrl.php?action=doLogout" action="{$conf->action_root}doLogout">Wyloguj</a></li>
            {/if}
        </ul>
    </div>
</div>

<div class="splash-container">
    <div class="splash">
        <h1 class="splash-head">{$page_title|default:"Tytuł domyślny"}</h1>
        <p class="splash-subhead">
             {$page_description|default:"Opis domyślny"}
        </p>
        <p>
            <a href="#app_content" class="pure-button pure-button-primary">Idź na zakupy</a>
        </p>
    </div>
</div>

<div class="content-wrapper">

    <div id="app_content" class="content">
{block name=content} Domyślna treść zawartości .... {/block}

    </div>

    <div class="footer l-box is-center">
		<p>
{block name=footer} Domyślna treść stopki .... {/block}
		</p>
        <p>Widok oparty na stylach i szablonie <a href="http://purecss.io/" target="_blank">Pure CSS Yahoo!</a>.)</p>
    </div>

</div>


</body>
</html>
