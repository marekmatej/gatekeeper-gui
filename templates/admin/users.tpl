{if isset($extends) && $extends}{extends file=$extends}{/if}

{block name=content}
    <div class="container">

        <div class="float-end">
            <a class="modal-link" href="{$adminRoot}users/?add=1">Pridať</a>
        </div>

        <h1 class="mt-5 mb-5 text-center">Užívatelia</h1>

        <table class="table">
            <thead>
            <tr>
                <th></th>
                <th>Meno</th>
                <th>PIN</th>
                <th>Aktívny</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            {foreach $users as $user}
                <tr>
                    <td>{$user@iteration}.</td>
                    <td>{$user.name}</td>
                    <td>{$user.pin}</td>
                    <td>{$user.active}</td>
                    <td class="text-end">
                        <a class="modal-link" href="{$adminRoot}users/?edit={$user.id}">Upraviť</a>
                        <a class="modal-link" href="{$adminRoot}users/?delete={$user.id}">Zmazať</a>
                    </td>
                </tr>
            {/foreach}
            </tbody>
        </table>

    </div>
{/block}
    

