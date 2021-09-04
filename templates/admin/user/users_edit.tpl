{if isset($extends) && $extends}{extends file=$extends}{/if}

{block name=content}
    <div class="container">

        <h1>Upraviť užívateľa</h1>

        {include file="admin/_forms/form_user.tpl"}

    </div>
{/block}
    

