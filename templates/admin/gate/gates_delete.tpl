{if isset($extends) && $extends}{extends file=$extends}{/if}

{block name=content}
    <div class="container">

        <h1>Zmazať bránu</h1>

        {include file="admin/_forms/form_delete.tpl"}

    </div>
{/block}
    

