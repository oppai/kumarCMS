<!-- Modal -->
<div id="loginModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
			×
		</button>
		<h3 id="myModalLabel">ログイン</h3>
	</div>
	<form method="post" action="./data/admin/login.php" class="form-horizontal">
		<div class="control-group">
			<label class="control-label" for="inputUserId">ユーザID</label>
			<div class="controls">
				<input type="text" name="userid" id="inputUserId" />
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="inputPassword">パスワード</label>
			<div class="controls">
				<input type="password" name="password" id="inputPassword"/>
			</div>
		</div>
		<hr />
		<div class="control-group">
			<div class="controls">
				<input class="btn" type="submit" value="ログイン" />
			</div>
		</div>
	</form>
	<?php
	require_once dirname(__FILE__) . '/../connect-db.php';
	if(isRootExists() && canRegister()) {
		echo '<a href="?admin=add-user" class="ajax" data-dismiss="modal">新規登録</a>';
	}
	?>
</div>