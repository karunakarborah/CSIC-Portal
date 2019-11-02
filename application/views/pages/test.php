<label>
<input type="checkbox" onclick="document.getElementById('select1').disabled=!this.checked;
								document.getElementById('text1').disabled=!this.checked">
Select this checkbox to enable the inputs below
</label>
</br>
<select class="custom-select" id='select1' disabled>
  <option>Option 1</option>
  <option>Option 2</option>
  <option>Option 3</option>
</select>
</br>
<input type="text" id='text1' disabled>