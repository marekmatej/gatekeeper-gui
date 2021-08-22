{if isset($extends) && $extends}{extends file=$extends}{/if}

{block name=content}
    <div class="container">

        <h1>Zmazať užívateľa</h1>

        {include file="admin/_form_delete.tpl"}

    </div>
{/block}
    

