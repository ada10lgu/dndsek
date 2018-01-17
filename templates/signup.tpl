<h1>Signup</h1>
<form action="#" method="post">
<p>Username<br>
<input type="text" name="username"></p>
<p>Password<br>
<input type="password" name="password"></p>
<p>Repeat password<br>
<input type="password" name="password2"></p>
<p>Email<br>
<input type="text" name="email"></p>
<p><input type="submit" value="Create"></p>
{if isset($error)}
<p>{$error}</p>
{/if}
</form>
