{extends file="main.tpl"}

{block name=toptop}

<div class="container" style="padding: 2em">
    <h2>Rezerwacja pokoju</h2>

    <form action="{$conf->action_root}roomReservation" method="post">
        <input type="hidden" name="id" value="{$form->id}" />
    <div class="row">
        <div class="col-12 col-12-mobile">
            <h4>Pokój: {$form->name}</h4>
        </div>

        <div class="col-12 col-12-mobile">
            <strong>Cena:</strong> {$form->price} zł
        </div>

        <div class="col-12 col-12-mobile">
            <strong>Opis:</strong><br>
            <p>{$form->desc}</p>
        </div>

        <div class="col-4 col-12-mobile">
            <label for="date">Data rezerwacji:</label>
            <input type="date" id="date" name="date" value="{$form->date}" required>
        </div>

        <div class="col-4 col-12-mobile">
            <label for="voucher_code">Kod vouchera:</label>
            <input type="text" name="voucher_code" id="voucher_code" value="{$form->voucher_code|escape}" />
        </div>

        <div class="col-4 col-12-mobile">
            <label for="pay">Opcja zapłaty:</label>
            <select name="pay" id="pay">
                <option value="1">Gotówka</option>
                <option value="2">Karta</option>
            </select>
        </div>

        <div class="col-12 col-12-mobile">
            <input type="submit" value="Zarezerwuj">
        </div>

        <div class="col-12">
					{if $msgs->isError()}
						<ul>
						{foreach $msgs->getMessages() as $msg}
							<li>{$msg->text}</li>
						{/foreach}
						</ul>
					{/if}
				</div>

    </form>
</div>

{/block}