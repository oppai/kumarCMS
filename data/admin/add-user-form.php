<meta charset="UTF-8" />
<h3>新規登録</h3>
<form method="post" action="./data/admin/add-user.php" class="form-horizontal ajaxform">
	<hr />
	<div class="control-group">
		<label class="control-label" for="inputUserId">ユーザID</label>
		<div class="controls">
			<input type="text" name="userid" id="inputUserId" value="<?php echo($row['userid']) ?>" />
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
		<label class="control-label" for="inputName">名前</label>
		<div class="controls">
			<input type="text" name="name" id="inputName" value="<?php echo($row['name']) ?>" />
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="inputEmail">メールアドレス</label>
		<div class="controls">
			<input type="text" name="email" id="inputEmail" value="<?php echo($row['email']) ?>" />
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="inputWebsite">自分のサイト</label>
		<div class="controls">
			<input type="text" name="website" id="inputWebsite" value="<?php echo($row['website']) ?>" />
		</div>
	</div>
	<hr />
	<div class="control-group">
		<div class="controls">
			<input class="btn" type="submit" value="登録" />
		</div>
	</div>
</form>