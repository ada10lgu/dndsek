<form action="#" method="post"><input type="text" name="search" /><input type="submit" value=">" /></form>

<form action="#" method="post">
<h1>{$article->title}</h1>
<input type="hidden" value="{$article->title}" name="article" />
{if $self['admin']}
<div class="outer">
  <div class="inner"><textarea name="wiki">{$article->text}</textarea></div>
  <div class="divider"></div>
  <div class="inner"><textarea name="wikiadmin">{$article->adminText}</textarea></div>
</div>
{else}
<textarea name="wiki">{$article->text}</textarea>
{/if}
{if $self['admin']}
<p>
  Who can edit this article:
  <input type="radio" name="access" value="0" {if $article->access == 0}checked="checked"{/if}> All
  <input type="radio" name="access" value="1" {if $article->access == 1}checked="checked"{/if}> Only GMs
</p>
{/if}

<input type="submit" value="Save" />
</form>

{if $self['admin']}
<script src="script/Splitshot.js"></script>
{/if}