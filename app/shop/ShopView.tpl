{extends file=$conf->root_path|cat:"/templates/main.tpl"}

{block name=footer}Dane kontaktowe: Sosnowiec, ul. Będzińska {/block}

{block name=content}

<h2 class="content-head is-center">Zapraszamy na zakupy</h2>
	
<table width="30%">
    <tr>
        <td>
            <form class="pure-form pure-form-stacked"    action="{$conf->action_root}shopSearch" method="post">
                <fieldset>
                    <label for="name">Nazwa</label>
                    <input id="name" type="text" placeholder="Wpisz nazwę.." name="name" value="{$form->name}">
                    <label for="category">Kategoria</label>
                    <select id="category" name="category" value="{$form->category}">
                        <option value="-1">Wszystkie</option>
                        {foreach $categories as $cat}
                        {strip}
                            <option value={$cat.id_kategoria} {if $form->category == {$cat.id_kategoria}} selected{/if}>{$cat.nazwa}</option>
                        {/strip}
                        {/foreach}
                    </select>
                    <button type="submit" class="pure-button">Szukaj</button>
                </fieldset>
            </form>
        </td>
    </tr>

</table>
<div>
    
{if $products->num_rows > 0}
<table class="pure-table pure-table-horizontal" align="center">
        <thead>
            <tr>
                <th>Nazwa</th>
                <th>Opis</th>
                <th>Cena</th>
                <th>Kategoria</th>
                {if $isLogged == TRUE}
                <th></th>
                {/if}
            </tr>
        </thead>
        <tbody>
            {foreach $products as $prod}
            {strip}
                <tr>
                    <td>{$prod.nazwaTowaru}</td>
                    <td>{$prod.opisTowaru}</td>
                    <td>{$prod.cenaTowaru}</td>
                    <td>{$prod.kategoriaTowaru}</td>
                    {if $isLogged == 'isLogged'}
                        <td><button>zamów</button></td>
                    {/if}
                </tr> 
            {/strip}
            {/foreach}
        </tbody>
    </table>
{/if}
{if ! $products->num_rows > 0}
	<h4 class="err">Brak produktów do wyświetlenia</h4> 
{/if}
</div>
{/block}