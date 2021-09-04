{if isset($extends) && $extends}{extends file=$extends}{/if}

{block name=content}
    <div class="container">
        <h1 class="mt-5 mb-5 text-center">Prehľad</h1>

        <div class="row">
            <div class="col-4 text-center">
                <a class="h3" href="{$adminRoot}users/">Užívatelia</a>
            </div>
            <div class="col-4 text-center">
                <a class="h3" href="{$adminRoot}gates/">Brány</a>
            </div>
            <div class="col-4 text-center">
                <a class="h3" href="{$adminRoot}logs/">Logy</a>
            </div>
        </div>

    </div>
{/block}
    

