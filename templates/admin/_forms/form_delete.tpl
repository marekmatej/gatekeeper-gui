<form action="{$requestUri}" method="post">

    {if isset($item.id)}
        <input type="hidden" name="item[id]" value="{$item.id}">
    {/if}

    <div class="mb-3">
        <input type="checkbox" id="deleteCheckbox" name="item[really]" value="1">
        <label for="deleteCheckbox" class="form-label">Naozaj chcete zmazať položku?</label>
    </div>

    <div class="mb-3">
        <button type="submit" class="btn btn-danger">Zmazať</button>
    </div>

</form>