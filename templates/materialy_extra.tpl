
<b style="font-size:16px;">Dodatkowe:</b>

<div>
<table border="0" >
  <tr>
  	<td>Numer seryjny</td>
  	<td>Producent</td>
  </tr>
  <tr id="zab">
  	<td><input type="text" name="nr_seryjny_1" style="width: 200px; height: 29px; font-size: 20px;" value="{$nr_seryjny_1}"/></td>
  	<td><select name="producent_1" style="height: 40px; font-size: 20px;" onchange="this.form.producent_1_nazwa.value = this.options[this.selectedIndex].text">
  		<option value = "0"></option>
  		{section name=producent loop=$producenci}
  			<option value="{$producenci[producent].id}" {if $producenci[producent].id == $producent_1}selected{/if}>{$producenci[producent].nazwa}</option>
  		{/section}
  		</select></td>
  </tr>
  <tr id="zab">
  	<td><input type="text" name="nr_seryjny_2" style="width: 200px; height: 29px; font-size: 20px;" value="{$nr_seryjny_2}"/></td>
  	<td><select name="producent_2" style="height: 40px; font-size: 20px;" onchange="this.form.producent_2_nazwa.value = this.options[this.selectedIndex].text">
  		<option value = "0"></option>
  		{section name=producent loop=$producenci}
  			<option value="{$producenci[producent].id}" {if $producenci[producent].id == $producent_2}selected{/if}>{$producenci[producent].nazwa}</option>
  		{/section}
  		</select></td>
  </tr>
  <tr id="zab">
  	<td><input type="text" name="nr_seryjny_3" style="width: 200px; height: 29px; font-size: 20px;" value="{$nr_seryjny_3}"/></td>
  	<td><select name="producent_3" style="height: 40px; font-size: 20px;" onchange="this.form.producent_3_nazwa.value = this.options[this.selectedIndex].text">
  		<option value = "0"></option>
  		{section name=producent loop=$producenci}
  			<option value="{$producenci[producent].id}" {if $producenci[producent].id == $producent_3}selected{/if}>{$producenci[producent].nazwa}</option>
  		{/section}
  		</select></td>
  </tr>
  <tr id="zab">
  	<td><input type="text" name="nr_seryjny_4" style="width: 200px; height: 29px; font-size: 20px;" value="{$nr_seryjny_4}"/></td>
  	<td><select name="producent_4" style="height: 40px; font-size: 20px;" onchange="this.form.producent_4_nazwa.value = this.options[this.selectedIndex].text">
  		<option value = "0"></option>
  		{section name=producent loop=$producenci}
  			<option value="{$producenci[producent].id}" {if $producenci[producent].id == $producent_4}selected{/if}>{$producenci[producent].nazwa}</option>
  		{/section}
  		</select></td>
  </tr>
  <tr id="zab">
  	<td><input type="text" name="nr_seryjny_5" style="width: 200px; height: 29px; font-size: 20px;" value="{$nr_seryjny_5}"/></td>
  	<td><select name="producent_5" style="height: 40px; font-size: 20px;" onchange="this.form.producent_5_nazwa.value = this.options[this.selectedIndex].text">
  		<option value = "0"></option>
  		{section name=producent loop=$producenci}
  			<option value="{$producenci[producent].id}" {if $producenci[producent].id == $producent_5}selected{/if}>{$producenci[producent].nazwa}</option>
  		{/section}
  		</select></td>
  </tr>
  <input type="hidden" name="producent_1_nazwa" value="{$producent_1_nazwa}" />
  <input type="hidden" name="producent_2_nazwa" value="{$producent_2_nazwa}" />
  <input type="hidden" name="producent_3_nazwa" value="{$producent_3_nazwa}" />
  <input type="hidden" name="producent_4_nazwa" value="{$producent_4_nazwa}" />
  <input type="hidden" name="producent_5_nazwa" value="{$producent_5_nazwa}" />  
</table>
</div>
<hr style="width:100%;"/>
