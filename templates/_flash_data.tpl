
{if isset($flashData) && $flashData}

    {foreach $flashData as $flash}
        <div class="alert alert-{$flash.type}">{$flash.message}</div>
    {/foreach}

{/if}