<div class="userList">
{foreach from=$users  item=u}
	{if $u->accepted || $self['admin']}
	<div class="userItem">
		<div class="userItemData"><b>{$u->username}</b></div>
		<div class="userItemData">{$u->email}</div>
		<div class="userItemData">{if $u->accepted}joined {$u->accepted}{/if}</div>
		<div class="userItemData">{if $u->admin}DM{/if}</div>
	</div>
	{/if}
{/foreach}


</div>
