<form action="{$requestUri}" method="post">

    {if isset($user.id)}
        <input type="hidden" name="user[id]" value="{$user.id}">
    {/if}

    <div class="mb-3">
        <label for="userName" class="form-label">Meno</label>
        <input type="text" class="form-control" id="userName" name="user[name]" value="{if isset($user.name)}{$user.name|escape}{/if}">
    </div>

    <div class="mb-3">
        <label for="userPin" class="form-label">PIN</label>
        <input type="text" class="form-control" id="userPin" name="user[pin]" value="{if isset($user.pin)}{$user.pin|escape}{/if}">
    </div>

    <div class="mb-3">
        <div>Aktívny</div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="user[active]" id="userActive" value="1"{if isset($user.active) && $user.active == '1'} checked{/if}>
            <label class="form-check-label" for="userActive">aktívny</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="user[active]" id="userInactive" value="0"{if isset($user.active) && $user.active == '0'} checked{/if}>
            <label class="form-check-label" for="userInactive">neaktívny</label>
        </div>
    </div>

    <div class="mb-3">
        <button type="submit" class="btn btn-primary">Uložiť</button>
    </div>

</form>