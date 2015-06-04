{extends file=$conf->root_path|cat:"/templates/main.tpl"}

{block name=footer}Dane kontaktowe: Sosnowiec, ul. Będzińska {/block}

{block name=content}

    <h2 class="content-head is-center">Zarejestruj się</h2>
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
                <form class="pure-form pure-form-stacked"  action="{$conf->action_root}doRegister" method="post">
                    <fieldset>
                        <label for="login">login</label>
                        <input id="login" type="text" placeholder="Wybierz sobie login" name="login" value="{$form->login}" required>
                        <label for="password">hasło</label>
                        <input id="password" type="password" placeholder="Wprowadź hasło" name="password" value="{$form->password}" required>
                        <label for="name">imię</label>
                        <input id="name" type="text" placeholder="Podaj imię" name="name" value="{$form->name}" >
                        <label for="surname">nazwisko</label>
                        <input id="surname" type="text" placeholder="Podaj nazwisko" name="surname" value="{$form->surname}" required>
                        <label for="postcode">kod pocztowy</label>
                        <input id="postcode" type="text" placeholder="Podaj kod pocztowy w formacie: XX-XXX" name="postcode" value="{$form->postcode}" required>
                        <label for="city">miejscowość</label>
                        <input id="city" type="text" placeholder="Podaj miejscowość zamieszkania" name="city" value="{$form->city}" required>
                        <label for="street">ulica</label>
                        <input id="street" type="text" placeholder="Podaj ulicę zamieszkania" name="street" value="{$form->street}" required>
                        <label for="streetNo">nr domu</label>
                        <input id="streetNo" type="text" placeholder="Podaj nr domu" name="streetNo" value="{$form->streetNo}" required>
                        <label for="appartmentNo">nr mieszkania</label>
                        <input id="appartmentNo" type="text" placeholder="Podaj nr mieszkania" name="appartmentNo" value="{$form->appartmentNo}" required>
                        <label for="email">e-mail</label>
                        <input id="email" type="email" placeholder="Podaj adres e-mail" name="email" value="{$form->email}" required>
                        <label for="birthdate">data urodzenia</label>
                        <input id="birthdate" type="text" placeholder="Podaj datę w formacie RRRR-MM-DD" name="birthdate" value="{$form->birthdate}" requierd>
                    </fieldset>
                    <button type="submit" class="pure-button">Rejestruj</button>
                </form>
            </td>
        </tr>
    </tbody>
</table>

{/block}