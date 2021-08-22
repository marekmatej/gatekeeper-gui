{extends file="front/layout.tpl"}

{block name=content}
    <div class="container">

        <h1 class="mt-5 mb-5">Brány</h1>

        {foreach $gates as $gate}
            <h3>{$gate.name}</h3>
            <a class="btn btn-success" href="{$wwwRoot}?id={$gate.id}&a=open">Otvoriť</a>
            <a class="btn btn-danger" href="{$wwwRoot}?id={$gate.id}&a=close">Zatvoriť</a>

            {if isset($gate.output)}
                {$gate.output}
            {/if}
            <hr>
        {/foreach}

    </div>
{/block}