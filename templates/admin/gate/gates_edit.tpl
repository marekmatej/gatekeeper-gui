{if isset($extends) && $extends}{extends file=$extends}{/if}

{block name=content}
    <div class="container">

        <h1>Upraviť bránu</h1>

        {include file="admin/_forms/form_gate.tpl"}

    </div>
{/block}
    

