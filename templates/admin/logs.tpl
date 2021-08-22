{if isset($extends) && $extends}{extends file=$extends}{/if}

{block name=content}
    <div class="container">
        <h1 class="mt-5 mb-5 text-center">Logy</h1>

        <table class="table">
            <thead>
            <tr>
                <th></th>
                <th>Užívateľ</th>
                <th>Brána</th>
                <th>Akcia</th>
                <th>Dátum a čas</th>
            </tr>
            </thead>
            <tbody>
            {foreach $logs as $log}
                <tr>
                    <td>{$log@iteration}.</td>
                    <td>{if $log.user_id}<a href="{$adminRoot}users/?id={$log.user_id}">{$log.user}</a>{/if}</td>
                    <td>{if $log.gate_id}<a href="{$adminRoot}gates/?id={$log.gate_id}">{$log.gate}</a>{/if}</td>
                    <td>{$log.action}</td>
                    <td>{$log.date_time}</td>
                </tr>
            {/foreach}
            </tbody>
        </table>


    </div>
{/block}
    

