{if isset($extends) && $extends}{extends file=$extends}{/if}

{block name=content}
    <div class="container">

        <h1>Pridať bránu</h1>

        {include file="admin/_form_gate.tpl"}

    </div>
{/block}
    

