<form action="{$requestUri}" method="post">

    {if isset($gate.id)}
        <input type="hidden" name="gate[id]" value="{$gate.id}">
    {/if}

    <div class="mb-3">
        <label for="gateName" class="form-label">Názov</label>
        <input type="text" class="form-control" id="gateName" name="gate[name]" value="{if isset($gate.name)}{$gate.name|escape}{/if}">
    </div>

    <div class="mb-3">
        <label for="gateOpen" class="form-label">Príkaz pre otvorenie</label>
        <input type="text" class="form-control" id="gateOpen" name="gate[open]" value="{if isset($gate.open)}{$gate.open|escape}{/if}">
    </div>

    <div class="mb-3">
        <label for="gateClose" class="form-label">Príkaz pre zatvorenie</label>
        <input type="text" class="form-control" id="gateClose" name="gate[close]" value="{if isset($gate.close)}{$gate.close|escape}{/if}">
    </div>

    <div class="mb-3">
        <div>Aktívna</div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="gate[active]" id="gateActive" value="1"{if isset($gate.active) && $gate.active == '1'} checked{/if}>
            <label class="form-check-label" for="gateActive">aktívna</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="gate[active]" id="gateInactive" value="0"{if isset($gate.active) && $gate.active == '0'} checked{/if}>
            <label class="form-check-label" for="gateInactive">neaktívna</label>
        </div>
    </div>

    <div class="mb-3">
        <button type="submit" class="btn btn-primary">Uložiť</button>
    </div>

</form>