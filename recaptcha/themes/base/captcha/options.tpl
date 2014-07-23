<table class="forum" cellpadding="0" cellspacing="{page:cellspacing}" style="width:{page:width}">
  <tr>
      <td class="headb">{lang:mod_name} - {lang:options}</td>
   </tr>
   <tr>
      <td class="leftb">{lang:manage_options}</td>
   </tr>
</table>
<br />

<form method="post" id="users_options" action="{url:captcha_options}" enctype="multipart/form-data">
  <table class="forum" cellpadding="0" cellspacing="{page:cellspacing}" style="width:{page:width}">

     <tr>
        <td class="leftc">{icon:groupevent} {lang:publickey}</td>
        <td class="leftb"><input type="text" name="public_key" value="{options:public_key}" maxlength="50" size="50" /></td>
     </tr>
      <tr>
          <td class="leftc">{icon:personal} {lang:privatekey}</td>
          <td class="leftb"><input type="text" name="private_key" value="{options:private_key}" maxlength="50" size="50" /></td>
      </tr>
     <tr>
        <td class="leftc">{icon:kedit} {lang:methode}</td>
        <td class="leftb">
            <select name="method">
                <option value="standard"{setted:standard}>{lang:standard}</option>
                <option value="recaptcha"{setted:recaptcha}>{lang:recaptcha}</option>
            </select>
        </td>
     </tr>
     <tr>
       <td class="leftc">{icon:ksysguard} {lang:options}</td>
        <td class="leftb"><input type="submit" name="submit" value="{lang:edit}" /></td>
     </tr>
  </table>
</form>