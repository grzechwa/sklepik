{extends file=$conf->root_path|cat:"/templates/main.tpl"}

{block name=footer}Dane kontaktowe: Sosnowiec, ul. Będzińska {/block}

{block name=content}

    <h2 class="content-head is-center">Zaloguj się</h2>
    <div class="l-box-lrg pure-u-1 pure-u-med-3-5">

    {* wyświeltenie listy błędów, jeśli istnieją *}
    {if $msgs->isError()}
            <h4>Wystąpiły błędy: </h4>
            <ol class="err">
            {foreach $msgs->getErrors() as $err}
            {strip}
                    <li>{$err}</li>
            {/strip}
            {/foreach}
            </ol>
    {/if}

    {* wyświeltenie listy informacji, jeśli istnieją *}
    {if $msgs->isInfo()}
            <h4>Informacje: </h4>
            <ol class="inf">
            {foreach $msgs->getInfos() as $inf}
            {strip}
                    <li>{$inf}</li>
            {/strip}
            {/foreach}
            </ol>
    {/if}
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
                <form class="pure-form pure-form-stacked" action="{$conf->action_root}doLogin" method="post">
                    <fieldset>
                        <label for="login">login</label>
                        <input id="login" type="text" placeholder="Wprowadź login" name="login" value="{$form->login}">
                        <label for="password">hasło</label>
                        <input id="password" type="password" placeholder="Wprowadź hasło" name="password" >
                    </fieldset>
                    <button type="submit" class="pure-button">Loguj</button>
                </form>
            </td>
        </tr>
    </tbody>
</table>

{/block}