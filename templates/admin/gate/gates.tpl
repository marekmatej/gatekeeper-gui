{if isset($extends) && $extends}{extends file=$extends}{/if}

{block name=content}
    <div class="container">

        <div class="float-end">
            <a class="modal-link" href="{$adminRoot}gates/?add=1">Pridať</a>
        </div>

        <h1 class="mt-5 mb-5 text-center">Brány</h1>

        <table class="table">
            <thead>
            <tr>
                <th></th>
                <th>Názov</th>
                <th>Príkaz pre otvorenie</th>
                <th>Príkaz pre zatvorenie</th>
                <th>Aktívna</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            {foreach $gates as $gate}
                <tr>
                    <td>{$gate@iteration}.</td>
                    <td>{$gate.name}</td>
                    <td>{$gate.open}</td>
                    <td>{$gate.close}</td>
                    <td>{$gate.active}</td>
                    <td class="text-end">
                        <a class="modal-link" href="{$adminRoot}gates/?edit={$gate.id}">Upraviť</a>
                        <a class="modal-link" href="{$adminRoot}gates/?delete={$gate.id}">Zmazať</a>
                    </td>
                </tr>
            {/foreach}
            </tbody>
        </table>

    </div>
{/block}
    

